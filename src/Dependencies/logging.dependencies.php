<?php declare(strict_types=1);

use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Interop\Container\ContainerInterface;

$container['logging'] = function (ContainerInterface $container) {
    $settings = $container->get('settings')['logger'];

    $logger = new Logger($settings['name']);
    $logger->pushProcessor(new UidProcessor());

    return $logger;
};
