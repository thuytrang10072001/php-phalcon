<?php
namespace App\Modules\Auth\Controllers;

use Phalcon\Http\Response\Cookies;
use Phalcon\Mvc\Controller;
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
        //$loginInfo = $this->request->getPost();
        $loginResult = $this->authRepo->checkLogin($this->request->getPost("email"), $this->request->getPost("pass"));

        if ($loginResult) {
            $this->session->set('admin', $loginResult);
            $this->session->set('start_time', time());
//            echo $this->session->get('currentUrl');
//            die;
            $this->response->redirect('/admin/customer/list');
        } else {
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
        //unset($this->session->userId);
        $this->response->redirect('/');
    }

}