<?php

use Phalcon\Mvc\Router\Annotations;
$router = $di->getRouter();

// Instantiate the Annotations router

$router->addModuleResource('auth', 'App\Modules\Auth\Controllers\Index', '/');
$router->addModuleResource('auth', 'App\Modules\Auth\Controllers\Index', '/signup');
$router->addModuleResource('auth', 'App\Modules\Auth\Controllers\Login', '/auth');

$router->addModuleResource('backend', 'App\Modules\Backend\Controllers\Customer', '/admin/customer');








