<?php

namespace App\Modules\Backend\Models;

use App\Models\Users;
use App\Modules\Auth\Models\Customer\Customer;
use Phalcon\Di\Injectable;



class Repository extends Injectable
{
    public function __construct()
    {
    }

    public function getList()
    {
        $list = $this->getDi()->get('modelsManager')->createBuilder()
            ->from(['customer' => "App\Modules\Auth\Models\Customer\Customer"])
            ->columns([
                "customer.*",
            ])
            ->orderBy('customer.id')
            ->getQuery()
            ->execute();  

        if (!empty($list)) {
            return $list;
       }

       return false;
    }

    public function getCustomerByID($id){
        $checkCustomer = Customer::findFirst([
            'conditions' => 'id = :id:',
            'bind'       => [
                'id' => $id,
            ],
        ]);

        if($checkCustomer){
            return $checkCustomer;
        }
        return false;
    }
}