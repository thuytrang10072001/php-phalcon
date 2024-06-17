<?php 
namespace App\Modules\Auth;

use Phalcon\Di\DiInterface;
use Phalcon\Autoload\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Model\Manager as ModelsManager;
use App\Modules\Auth\Models\Customer\Repository;

class Module implements ModuleDefinitionInterface
{
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();
        $loader->setNamespaces([
            'App\Modules\Auth\Controllers' => __DIR__ . '/controllers/',
            'App\Modules\Auth\Models'      => __DIR__ . '/models/',
            'App\Modules\Auth\Models\Customer'      => __DIR__ . '/models/customer',
        ]);
        $loader->register();
    }

    public function registerServices(DiInterface $di)
    {
        // Register the dispatcher

        $di->set('dispatcher', function() {
            $dispatcher = new \Phalcon\Mvc\Dispatcher();
            $dispatcher->setDefaultNamespace('App\Modules\Auth\Controllers');
            return $dispatcher;
        });

        // Register the view component
        // $di->set('view', function() {
        //     $view = new View();
        //     $view->setDI($this);
        //     $view->setViewsDir(__DIR__ . '/views/');
        //     return $view; 
        // });

        $di->setShared('view', function () {
            $view = new View();
            $view->setDI($this);
            $view->setViewsDir(APP_PATH . '/views/');
        
            $view->registerEngines([
                '.volt' => function ($view) {
                    $volt = new VoltEngine($view, $this);
        
                    $volt->setOptions([
                        'always' => true,
                        'separator' => '_',
                        'stat' => true,
                        'path' => function ($templatePath) {
                            $dirName = str_replace(APP_PATH . "/", '', dirname($templatePath));
        
                            if (!is_dir('cache/' . $dirName)) {
                                mkdir('cache/' . $dirName, 0777, true);
                            }
        
                            return 'cache/' . $dirName . '/' . basename($templatePath) . '.php';
                        },
                    ]);
        
                    return $volt;
                },
                '.phtml' => PhpEngine::class
            ]);
        
            return $view;
        });

        $di->set(
            "modelsManager",
            function() {
                return new ModelsManager();
            }
        );

        $di->setShared(
            "authRepo",
            function (){
                return new Repository();
            }
        );
        
    }
}