<?php
    use Phalcon\Mvc\Router;

    $di->setShared('router', function () {
        $router = new Router();

        $router->setDefaultModule('frontend');

        $router->add('/', [
            'module'     => 'auth',
            'controller' => 1,
            'action'     => 2,
            'params'     => 3,
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