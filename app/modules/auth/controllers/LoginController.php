<?php
namespace App\Modules\Auth\Controllers;

use Phalcon\Mvc\Controller;

class LoginController extends Controller
{
    public function indexAction(){
        // unset($_SESSION['admin']); 

        $this->view->pick(['auth/login']);
    }
}