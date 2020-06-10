<?php
    class Entity_Contact{
        public $id;
        public $name;
        public $phone;
        public $email;

        public function __construct($_id, $_name, $_phone, $_email)
        {
            $this->$id = $_id;
            $this->$name = $_name;
            $this->$phone = $_phone;
            $this->$email = $_email;
        }
    }
?>