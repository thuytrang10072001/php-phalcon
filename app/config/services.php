<?php
    use Phalcon\Mvc\Router;

    $di->setShared('router', function () {
        $router = new Router();

        $router->setDefaultModule('auth');

        $router->add('/', [
            'module'     => 'auth',
            'controller' => "Login",
            'action'     => 'index',
            'params'     => '',
        ]);

        $router->add('/auth/:controller/:action/:params', [
            'module'     => 'auth',
            'controller' => 1,
            'action'     => 2,
            'params'     => 3,
        ]);

        $router->add('/admin/:controller/:action/:params', [
            'module'     => 'backend',
            'controller' => 1,
            'action'     => 2,
            'params'     => 3,
        ])->setName('admin-route');

        $router->add('/:controller/:action/:params', [
            'module'     => 'frontend',
            'controller' => 1,
            'action'     => 2,
            'params'     => 3,
        ]);

        return $router;
    });

    $di->setShared('db', function () {
        $config = $this->getConfig();
    
        $class = 'Phalcon\Db\Adapter\Pdo\\' . $config->database->adapter;
        $params = [
            'host'     => $config->database->host,
            'username' => $config->database->username,
            'password' => $config->database->password,
            'dbname'   => $config->database->dbname,
            'charset'  => $config->database->charset
        ];
    
        if ($config->database->adapter == 'Postgresql') {
            unset($params['charset']);
        }
    
        return new $class($params);
    });