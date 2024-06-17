<?php

namespace App\Modules\Auth\Models\Customer;

use App\Models\Users;
use App\Modules\Auth\Models\Customer\Customer;
use Phalcon\Di\Injectable;
use Phalcon\Encryption\Security;
use Phalcon\Encryption\Security\Random;


class Repository extends Injectable
{
    private $security;
    public function __construct()
    {
        $this->security = new Security();
    }

    public function signUp($name, $phone, $address, $email, $pass){
        $checkEmail = Customer::findFirst([
            'conditions' => 'email = :email:',
            'bind'       => [
                'email' => $email,
            ],
        ]);
        if($checkEmail){
            return -1;
        }

        $this->security->setWorkFactor(12);

        $hashedPassword = $this->security->hash($pass);

        $customer = new Customer();
        $customer->name = $name;
        $customer->phone = $phone;
        $customer->address = $name;
        $customer->email = $email;
        $customer->pass = $hashedPassword;
        $customer->save();

        if ($customer) {
            // Return success
            return 1;
        } else {
            // if have error exception;
            return 0;
        }
    }

    public function checkLogin($email = null, $pass = null)
    {
        $user = Customer::findFirst([
            'conditions' => 'email = :email:',
            'bind'       => [
                'email' => $email,
            ],
        ]);
        if(!$user){
            return -1;
        }
        

        if($this->security->checkHash($pass, $user->pass)){
            return 1;
        }else{
            return 0;
        }
    }
}