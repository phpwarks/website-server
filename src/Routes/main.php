<?php declare(strict_types=1);

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app->get('/', function (Request $req, Response $res, array $args) use ($container) {
   return (new \App\Welcome\WelcomeAction(
       $container->get('view'),
       $container->get('logging')
   ))->dispatch($req, $res, $args);
});
