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
            ->getQuery()
            ->execute();  

        if (!empty($list)) {
            return $list;
       }

       return false;
    }
}