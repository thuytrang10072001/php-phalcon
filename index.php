<?php
    use Phalcon\Loader;
    use Phalcon\Mvc\Application;
    use Phalcon\Di\FactoryDefault;
    
    define('BASE_PATH', dirname(__DIR__));
    define('APP_PATH', BASE_PATH . '/app');
    
    require BASE_PATH . '/vendor/autoload.php';
    
    // Register an autoloader
    $loader = new Loader();
    
    $loader->registerDirs(
        [
            APP_PATH . '/common/',
        ]
    )->register();
    
    $config = include APP_PATH . "/config/config.php";
    
    // Create a DI
    $di = new FactoryDefault();
    
    include APP_PATH . "/config/services.php";
    
    // Handle the request
    $application = new Application($di);
    
    $application->registerModules([
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
    ]);
    
    // Handle the request
    try {
        $response = $application->handle($_SERVER['REQUEST_URI']);
        $response->send();
    } catch (\Exception $e) {
        echo 'Exception: ', $e->getMessage();
    }