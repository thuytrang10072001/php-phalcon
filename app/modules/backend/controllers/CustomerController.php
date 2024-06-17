<?php
namespace App\Modules\Backend\Controllers;

use Phalcon\Mvc\Controller;
/**
 *
 * @RoutePrefix("/admin/customer")
 */
class CustomerController extends Controller
{   

    private $session;
    private $beRepo;



    public function initialize()
    {
        $this->session = $this->di->get('session');
        $this->beRepo = $this->di->get('beRepo');
    }

    /**
    * @Get("/list")
    */
    public function listAction(){
        if(!isset($this->session->user)){
            $this->response->redirect('/');
        }else{
            $listCustomer = $this->beRepo->getList();
            $this->view->customers = $listCustomer;           
            $this->view->pick(['backend/customer/list']);
        }
       
    }

    /**
     * @Get('/show/{id:[0-9]+}')
     * 
     * @property Session $flashSession
     */
    public function showAction($id)
    {
        if(!isset($this->session->user)){
            $this->response->redirect('/');
        }else{
            $customer = $this->beRepo->getCustomerByID($id);
            if(!$customer){
                $this->flashSession->error("Customer not exists!");
                $this->response->redirect('/admin/customer/list');
            }else{
                $this->view->customer = $customer;
                $this->view->pick(['backend/customer/show']);
            }
        }        
    }
}