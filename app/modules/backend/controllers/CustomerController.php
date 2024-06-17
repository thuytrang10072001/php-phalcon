<?php
namespace App\Modules\Backend\Controllers;

use Phalcon\Mvc\Controller;
/**
 *
 * @RoutePrefix("/admin/customer")
 */
class CustomerController extends Controller
{   

    private $beRepo;



    public function initialize()
    {
        $this->beRepo = $this->di->get('beRepo');
    }

    /**
    * @Get("/list")
    */
    public function listAction(){
        //$loginInfo = $this->request->getPost();
        $listCustomer = $this->beRepo->getList();
        $this->view->customers = $listCustomer;
       
        $this->view->pick(['backend/customer/list']);
    }
}