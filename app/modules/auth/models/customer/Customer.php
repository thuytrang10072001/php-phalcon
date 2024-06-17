<?php 
    namespace App\Modules\Auth\Models\Customer;
    class Customer extends \Phalcon\Mvc\Model{
        public $id;
        public $name;
        public $phone;
        public $address;
        public $email;

        // public function __construct($id, $name, $phone, $address, $email) {
        //     $this->id = $id;
        //     $this->name = $name;
        //     $this->phone = $phone;
        //     $this->address = $address;
        //     $this->email = $email;
        // }

        public function initialize()
        {
            // Define the table associated with the model if it's different from the default naming convention
            $this->setSource('customer'); // Assuming your table name is 'customers'
        }

        public function insert($name, $phone, $address, $email) {
            $this->name = $name;
            $this->phone = $phone;
            $this->address = $address;
            $this->email = $email;
        }

        public function getId(){
            return $this->id;
        }

        public function getName(){
            return $this->name;
        }

        public function setName($name){
            $this->name = $name;
        }

        public function getPhone(){
            return $this->phone;
        }

        public function setPhone($phone){
            $this->phone = $phone;
        }

        public function getAddress(){
            return $this->address;
        }

        public function setAddress($address){
            $this->address = $address;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setEmail($email){
            $this->email = $email;
        }
    }
?>