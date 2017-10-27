<?php declare(strict_types=1);

return [
    'settings' => [
        // Slim settings
        'determineRouteBeforeAppMiddleware' => getenv('APP_DETERMINE_ROUTE_BEFORE_APP_MIDDLEWARE') === 'true',
        'displayErrorDetails'               => getenv('APP_DISPLAY_ERROR_DETAILS') === 'true',
        // View settings
        'view' => [
            'template_path' => [
                '__main__' => __DIR__ . '/../App/Core/Templates/',
                'Welcome'  => __DIR__ . '/../App/Welcome/Templates',
            ],
            'twig' => [
                'cache'       => getenv('APP_DEBUG_MODE') === 'true' ? false : __DIR__ . '/../../var/cache/twig',
                'debug'       => getenv('APP_DEBUG_MODE') === 'true',
                'auto_reload' => false,
            ]
        ],
        // Logger settings
        'logger' => [
            'name' => 'PHPWARKS_WEBSERVER',
            'path' => __DIR__ . '/../../var/log/server.log',
        ]
    ]
];