<?php
namespace App\Backend;

use Phalcon\Di\DiInterface;
use Phalcon\Autoload\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();
        $loader->registerNamespaces([
            'App\Modules\Backend\Controllers' => __DIR__ . '/controllers/',
            'App\Modules\Backend\Models'      => __DIR__ . '/models/',
        ]);
        $loader->register();
    }

    public function registerServices(DiInterface $di)
    {
        // Register the dispatcher
        $di->set('dispatcher', function() {
            $dispatcher = new \Phalcon\Mvc\Dispatcher();
            $dispatcher->setDefaultNamespace('App\Modules\Backend\Controllers');
            return $dispatcher;
        });

        // Register the view component
        $di->set('view', function() {
            $view = new View();
            $view->setViewsDir(__DIR__ . '/views/');
            return $view;
        });
    }
}