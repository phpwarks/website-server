<?php declare(strict_types=1);

use Interop\Container\ContainerInterface;
use Slim\Views\Twig as SlimTwig;
use Slim\Views\TwigExtension;

$container['view'] = function (ContainerInterface $container) {
    $settings = $container->get('settings')['view'];

    $view = new SlimTwig(
        $settings['template_path'],
        $settings['twig']
    );

    $view->addExtension(
        new TwigExtension(
            $container->get('router'),
            $container->get('request')
                ->getUri()
        )
    );

    if ($settings['twig']['debug'] === true) {
        $view->addExtension(new Twig_Extension_Debug());
    }

    return $view;
};
