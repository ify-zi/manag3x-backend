<?php

    //create a user validator class that will handle validation
    //constructor which takes in POST data from form
    //create method to validate individual fields
    //-- a method to validate username
    //-- a method to validate password
    // return an error array once all checks are done
    //for login purpose
    class UserValidator{
        private $data;
        private $errors = [];
        private static $fields = ['username', 'password'];


        public function __construct($postdata){
            $this->data = $postdata;
        }

        public function validateForm(){
            foreach(self::$fields as $field){
                if(!array_key_exists($field, $this->data)){
                    trigger_error("$field is not present in data");
                    return;
                }
            }
            $this->validateUsername();
            $this->validatePass();
            return $this->errors;
        }
        private function validateUsername(){
            $val=trim($this->data['username']);
            if(empty($val)){
                $this->addError('username', 'username cannot be empty');
            }

        }
        private function validatePass(){
            $val=trim($this->data['password']);
            if(empty($val)){
                $this->addError('password', 'password cannot be empty');
            }
            
        }
        private function addError($key, $val){
            $this->errors[$key] = $val;

        }

    }


?>