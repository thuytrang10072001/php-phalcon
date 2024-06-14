<?php

namespace App\Modules\Auth\Models\Customer;

use App\Models\Users;
use App\Modules\Auth\Models\Customer\Customer;
use Phalcon\Di\Injectable;
use Phalcon\Encryption\Security;
use Phalcon\Encryption\Security\Random;


class Repository extends Injectables
{
    private $sercurity;
    public function __construct()
    {
        $this->sercurity = new Security();
    }

    public function checkLogin($email = null, $pass = null)
    {
        $user = $this->getDi()->get('modelsManager')->createBuilder()
            ->from(['customer' => "App\Models\Auth\Models\Customer\Customer"])
            ->columns([
                "customer.*",

                "role.name as role",
            ])
            ->getQuery()->getSingleResult();

//        $user = Users::findFirst([
//            "conditions" => "username = :username:",
//            "bind" => [
//                "username" => $username,
//            ],
//            "join" =>
////        ]);

        if (!empty($user)) {

           $passwordCheck = $password . $user->user->salt_key;

           if ($this->sercurity->checkHash($passwordCheck, $user->user->password)) {
               $userReturn = $user->user->toArray();
               unset($userReturn["password"]);
               unset($userReturn["salt_key"]);
               unset($userReturn["created_date"]);
               unset($userReturn["updated_date"]);
               $userReturn["role"] = $user->role;
               return $userReturn;
           }
       }

       return false;
    }
}