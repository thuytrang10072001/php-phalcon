<?php
use Phalcon\Config\Config;

return new Config([
    'database' => [
        'adapter'     => 'PostgreSQL',
        'host'        => 'postgres_db',
        'username'    => 'postgres',
        'password'    => 'postgres',
        'dbname'      => 'db',
        'charset'     => 'utf8',
        // 'port'        =>  '5433',
    ],
    'application' => [
        'controllersDir' => APP_PATH . '/controllers/',
        'modelsDir'      => APP_PATH . '/models/',
        'viewsDir'       => APP_PATH . '/views/',
        'baseUri'        => '/',
        'modules'        => [
            'frontend' => [
                'className' => 'App\Modules\Frontend\Module',
                'path'      => APP_PATH . '/modules/frontend/Module.php'
            ],
            'backend' => [
                'className' => 'App\Modules\Backend\Module',
                'path'      => APP_PATH . '/modules/backend/Module.php'
            ],
            'auth' => [
                'className' => 'App\Modules\Auth\Module',
                'path'      => APP_PATH . '/modules/auth/Module.php'
            ]
        ]
    ]
]);