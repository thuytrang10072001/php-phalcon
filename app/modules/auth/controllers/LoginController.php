<?php
namespace App\Modules\Auth\Controllers;

use Phalcon\Http\Response\Cookies;
use Phalcon\Mvc\Controller;
use Phalcon\Flash\Session;
/**
 *
 * @RoutePrefix("/auth")
 */
class LoginController extends Controller
{   
    private $session;

    private $authRepo;



    public function initialize()
    {
        $this->session = $this->di->get('session');
        $this->authRepo = $this->di->get('authRepo');
    }

     /**
     * @Route(
     *      '/login',
     *      methods={'POST'}
     *  )
     *
     * @property Session $flashSession
     */
    public function loginAction(){
        $loginResult = $this->authRepo->checkLogin($this->request->getPost("email"), $this->request->getPost("pass"));

        if ($loginResult == 1) {
            $this->session->set('user', $loginResult);
            $this->session->set('start_time', time());
            $this->response->redirect('/admin/customer/list');
        } else if($loginResult == -1){
            $this->flashSession->error('Not account exists!');
            $this->response->redirect('/');
        }else{
            $this->flashSession->error('Incorrect password!');
            $this->response->redirect('/');
        }
    }


    /**
     * @Route(
     *      '/logout',
     *      methods={'GET'}
     *  )
     *
     * @property Session $flashSession
     */
    public function logoutAction()
    {
        $this->session->destroy();
        unset($this->session->user);
        $this->response->redirect('/');
    }


    /**
     * @Route(
     *      '/signup',
     *      methods={'POST'}
     *  ) 
     * @property Session $flashSession
     */
    public function signUpAction(){
        $name = $this->request->getPost("name");
        $phone = $this->request->getPost("phone");
        $address = $this->request->getPost("address");
        $email = $this->request->getPost("email");
        $pass = $this->request->getPost("pass");

        $signUpResult = $this->authRepo->signUp($name, $phone, $address, $email, $pass);

        if($signUpResult == 1){
            $this->flashSession->success('Registration success!');
            $this->response->redirect('/');
        }else if ($signUpResult == -1) {
            $this->flashSession->error("Email exists!");
            $this->response->redirect('/signup');
        } else {
            $this->flashSession->error('Registration failed. Please try again.');
            $this->response->redirect('/signup');
        }
    }

}