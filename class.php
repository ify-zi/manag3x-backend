<?php
    //during registration 
    class adimnUser{
       private $first;
       private $last;
       private $email;
       protected $bizname;
       private $num;
       private $role;
       private $username;
       private $password;
       private $password2;
       public $errors = [];


        protected function __construct($name,$last,$email,$bizname,$num,$role){
            $this->name= $name;
            $this->last = $last;
            $this->email =$email;
            $this->bizname=$bizname;
            $this->num = $num;
            $this->role = $role;
        }

        public function userValitdator(){
            $this->emailValidator();
            $this->usernameValidator();
            $this->passwordValidator();
            return $this->errors;
        }

        private function emailvalidator(){
            $value = trim($this->email);
            if(empty($value)){
                return $this->addError('email', "email field can't be empty");
            }
                elseif(!filter_var($value, FILTER_VALIDATE_EMAIL)){
                        return $this->addError('email', "email is invalid");
                }     
        }

        private function usernameValidator(){
            $value = trim($this->data['username']);
            if(empty($value)){
                return $this->addError('username', "username can't be empty");
            }
                else
                {
                    if(!preg_match('/^[a-zA-Z0-9]{6-12}$/', $value)){
                    return $this->addError('username', 'username must be 6-12 characters and must be alphanumeric');
                }
            }
            }

        private function passwordValidator(){
            $value = trim($this->password);
            $value2 = trim($this->password2);
            if(empty($value && $value2)){
                return $this->addError('password', 'password field cannot be empty');
            }
            elseif(!preg_match($value, $value2)){
                return $this->addError('password', 'password do not match');
                }

            else{
                if(!preg_match('/^[a-zA-Z0-9]{8-12}$/', $value && $value2)){
                    return $this->addError('password', 'password must be more that 8 and alphanumeric'); 
                }
            }

        }
        private function addError($key, $msg){
            return $this->errors[$key] = $msg;
        }
     

    
    }



?>