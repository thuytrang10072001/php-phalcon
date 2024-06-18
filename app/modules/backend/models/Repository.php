<?php

namespace App\Modules\Backend\Models;

use App\Models\Users;
use App\Modules\Auth\Models\Customer\Customer;
use Phalcon\Encryption\Security;
use Phalcon\Di\Injectable;



class Repository extends Injectable
{
    private $security;
    public function __construct()
    {
        $this->security = new Security();
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

    public function insertCustomer($name, $phone, $address, $email){
        $checkCustomer = Customer::findFirst([
            'conditions' => 'email = :email:',
            'bind'       => [
                'email' => $email,
            ],
        ]);

        if($checkCustomer){
            return -1;
        }

        $pass = $this->security->hash('123456');

        $customer = new Customer();
        $customer->name = $name;
        $customer->phone = $phone;
        $customer->address = $address;
        $customer->email = $email;
        $customer->pass = $pass;
        $customer->save();

        if($customer){
            return 1;
        }else{
            return 0;
        }

    }
}