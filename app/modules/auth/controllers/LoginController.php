<?php
namespace App\Modules\Auth\Controllers;

use Phalcon\Mvc\Controller;

class LoginController extends Controller
{
    public function indexAction(){
        // unset($_SESSION['admin']); 
        try {
            $this->view->pick(['auth/login']);
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }       
        
    }

    public function loginAction(){
        $loginInfo = $this->request->getPost();

    }
}