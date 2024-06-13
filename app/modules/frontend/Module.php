<?php
namespace App\Frontend;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();
        $loader->registerNamespaces([
            'App\Frontend\Controllers' => __DIR__ . '/controllers/',
            'App\Frontend\Models'      => __DIR__ . '/models/',
        ]);
        $loader->register();
    }

    public function registerServices(DiInterface $di)
    {
        // Register the dispatcher
        $di->set('dispatcher', function() {
            $dispatcher = new \Phalcon\Mvc\Dispatcher();
            $dispatcher->setDefaultNamespace('App\Frontend\Controllers');
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