<?php declare(strict_types=1);

use function App\Utility\setupEnv;
use function App\Utility\extensionToContentType;

use React\Http\Server as HttpServer;
use Psr\Http\Message\ServerRequestInterface;
use React\Http\Response as ReactResponse;
use Slim\App as Slim;
use Slim\Container;
use Slim\Http\Response as SlimResponse;
use Slim\Http\Headers;


const APP_ROUTE = __DIR__ . '/../../';

require_once APP_ROUTE . 'vendor/autoload.php';

setupEnv();

$server = new HttpServer(function (ServerRequestInterface $request) {
    $_SERVER['HTTP_COOKIE'] = $request->getHeader('Cookie');

    $whitelist = 'css|css.map|png|jpg|jpeg|gif|js|js.map';
    $fileTypes = sprintf('/\.(?:%s)$/', $whitelist);

    if (preg_match($fileTypes, $request->getUri()->getPath())) {
        $assetFilePath = sprintf('%s%s', __DIR__, $request->getUri()->getPath());
        $contentType  = extensionToContentType($assetFilePath);

        try {
            if (is_file($assetFilePath) === true) {
                return new ReactResponse(
                    200,
                    ['Content-Type' => $contentType],
                    file_get_contents($assetFilePath)
                );
            }
        } catch (\Exception $exception) {
        }

        return new ReactResponse(
            404,
            ['Content-Type' => 'text/plain'],
            sprintf('%s not found', basename($assetFilePath))
        );
    }

    $configuration = require APP_ROUTE . 'src/Config/main.php';

    $app = new Slim(
        new Container($configuration)
    );

    include APP_ROUTE . 'src/Dependencies/main.php';
    include APP_ROUTE . 'src/Middlewares/main.php';
    include APP_ROUTE . 'src/Routes/main.php';

    $response = new SlimResponse(
        200,
        new Headers($request->getHeaders())
    );

    return $app->process($request, $response);
});

$loop = React\EventLoop\Factory::create();
$socket = new React\Socket\Server('0.0.0.0:8080', $loop);
$server->listen($socket);
$loop->run();