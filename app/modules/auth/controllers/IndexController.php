<?php

    namespace App\Modules\Auth\Controllers;

    use Phalcon\Mvc\Controller;
    use Phalcon\Mvc\View;
    /**
     * @RoutePrefix("/")
     */

    /** 
     * @property View $view
     */


    class IndexController extends Controller
    {
        /**
         * @Get("/")
         */
        public function indexAction(){
            // unset($_SESSION['admin']); 
            try {
                $this->view->pick(['auth/login']);
            } catch (\Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }       
            
        }
         /**
         * @Get("/signup")
         */
        public function signUpAction(){
            // unset($_SESSION['admin']); 
            try {
                $this->view->pick(['auth/signUp']);
            } catch (\Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }       
            
        }
    }