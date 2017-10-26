<?php declare(strict_types=1);

namespace Test\Integration;

use function App\Utility\setupEnv;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Slim\App;
use PHPUnit\Framework\TestCase;

class WebTestCase extends TestCase
{
    /** @var App $app  */
    protected $app;
    /** @var Client $client */
    protected $client;

    /**
     * Set up the app and client instance
     * @inheritdoc
     */
    public function setUp() :void
    {
        setupEnv(__DIR__ . '/../../', '.env.test');

        $this->client = new Client();
    }

    /**
     * @param string $uri
     *
     * @return ResponseInterface
     */
    final public function getResponse(string $uri) :ResponseInterface
    {
        return $this->client->get(
            $this->makeURL($uri)
        );
    }

    /**
     * @param string $uri
     *
     * @return string
     */
    final public function makeURL(string $uri) :string
    {
        return sprintf(
            '%s:%d/%s',
            getenv('URL'),
            getenv('PORT'),
            $uri
        );
    }
}