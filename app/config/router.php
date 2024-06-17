<?php

use Phalcon\Mvc\Router\Annotations;
$router = $di->getRouter();

// Instantiate the Annotations router

$router->addModuleResource('auth', 'App\Modules\Auth\Controllers\Index', '/');
$router->addModuleResource('auth', 'App\Modules\Auth\Controllers\Login', '/auth/login');
$router->addModuleResource('auth', 'App\Modules\Auth\Controllers\Login', '/auth/logout');

$router->addModuleResource('backend', 'App\Modules\Backend\Controllers\Customer', '/admin/customer/list');


// $router->addModuleResource('hastag', '\App\Modules\Hashtag\Controllers\Image', '/admin/hashtag');
// $router->addModuleResource('news', '\App\Modules\News\Controllers\News', '/admin/news');
// $router->addModuleResource('image', '\App\Modules\Image\Controllers\Image', '/admin/media');
// $router->addModuleResource('heroBanner', '\App\Modules\Herobanner\Controllers\HeroBanner', '/admin/herobanner');
// $router->addModuleResource('admin', '\App\Modules\Admin\Controllers\Index', '/admin');
// $router->addModuleResource('auth', '\App\Modules\Auth\Controllers\Auth', '/auth');




