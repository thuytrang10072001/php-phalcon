<?php
    use Phalcon\Mvc\Router;
    use Phalcon\Autoload\Loader;
    use Phalcon\Mvc\Router\Annotations as AnnotationsRouter;
    use Phalcon\Annotations\Adapter\Memory;
    use Phalcon\Html\Escaper;
    use Phalcon\Flash\Direct as Flash;
    use Phalcon\Mvc\Model\Manager as ModelsManager;
    use Phalcon\Session\Adapter\Stream as SessionAdapter;
    use Phalcon\Session\Manager as SessionManager;
    use Phalcon\Encryption\Security;


    $loader = new Loader();

    $loader->setNamespaces(
        [
            'App\Config' => APP_PATH . '/config',
            'App\Modules' => APP_PATH . '/modules',
            'App\Modules\Auth\Controllers' => APP_PATH . '/modules/auth/controllers',
            'App\Modules\Auth\Models\Customer' => APP_PATH . '/modules/auth/models/customer',
            'App\Modules\Backend\Controllers' => APP_PATH . '/modules/backend/controllers',
        ]
    );

    $loader->register();


    $di->setShared('config', function () {
        return include APP_PATH . "/config/config.php";
    });

    $di->setShared('db', function () {
        $config = $this->getConfig();
    
        $class = 'Phalcon\Db\Adapter\Pdo\\' . $config->database->adapter;
        $params = [
            'host'     => $config->database->host,
            'username' => $config->database->username,
            'password' => $config->database->password,
            'dbname'   => $config->database->dbname
            //'charset'  => $config->database->charset
        ];
    
        // if ($config->database->adapter == 'Postgresql') {
        //     unset($params['charset']);
        // }
    
        return new $class($params);
    });

    /**
     * Register the session flash service with the Twitter Bootstrap classes
     */
    $di->setShared('flash', function () {
        $escaper = new Escaper();
        $flash = new Flash($escaper);
        $flash->setImplicitFlush(false);
        $flash->setCssClasses([
            'error'   => 'alert alert-danger',
            'success' => 'alert alert-success',
            'notice'  => 'alert alert-info',
            'warning' => 'alert alert-warning'
        ]);
    
        return $flash;
    });

    /**
     * Start the session the first time some component request the session service
     */
    $di->setShared('session', function () {
        $session = new SessionManager();
        $files = new SessionAdapter([
            'savePath' => APP_PATH . "/tmp",
        ]);
        $session->setAdapter($files);
        $session->setOptions([
            'lifetime' => 60, // Limit time is 3600 seconds (same 1 hours)
        ]);

        $session->start();

        return $session;
    });

    //Register secirity to crypt and encrypt
    // $di->setShared('security', function () {
    //     $security = new Security();
    
    //     // Set the password hashing factor to 12 rounds
    //     $security->setWorkFactor(12);
    
    //     return $security;
    // });

    $di->set(
        "modelsManager",
        function() {
            return new ModelsManager();
        }
    );

    // Register the 'annotations' service as shared
    $di->setShared(
        'annotations',
        function () {
            // You can choose the appropriate adapter and configure it here
            return new Memory();
        }
    );


    // Register the 'router' service as shared
    $di->setShared(
        'router',
        function () use ($di) {
            // Retrieve the 'annotations' service from the DI container
    //        $annotations = $di->get('annotations');


            // Create an Annotations router and set the 'annotations' service
            // Pass `false` to enable automatic scanning
            $router = new AnnotationsRouter(false);


            return $router;
        }
    );