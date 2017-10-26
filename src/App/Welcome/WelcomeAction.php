<?php declare(strict_types=1);

namespace App\Welcome;

use Psr\Log\LoggerInterface;
use Slim\Views\Twig as View;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;


final class WelcomeAction
{
    public function __construct(
        View $view,
        LoggerInterface $logger
    ) {
        $this->view = $view;
        $this->logger = $logger;
    }

    public function dispatch(
        Request  $req,
        Response $res,
        array    $args
    ) :Response {
        $this->logger->debug('Dispatching WelcomeAction');

        return $this->view->render(
            $res,
            '@Welcome/welcome.html.twig'
        );
    }
}
