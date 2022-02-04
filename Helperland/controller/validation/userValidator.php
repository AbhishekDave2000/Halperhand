<?php

class userValidator{
    public $data;
    public $errors = [];

    public function __construct($data){
        $this->data = $data;
    }
    public function Validator(){
        if(!isset($this->data["agree"])){
            $this->data["agree"] = "";
        }

        $this->fistnameValidator(trim($this->data["firstname"]));
        $this->lastnameValidator(trim($this->data["lastname"]));
        $this->emailValidator(trim($this->data["email"]));
        $this->phoneValidator(trim($this->data["phone"]));
        $this->passwordValidator(trim($this->data["password"]),trim($this->data['confirmpassword']));
        $this->policyValidator(trim($this->data["agree"]));

        return $this->errors;
    }
    
    public function fistnameValidator($fname){
        if(empty($fname)){
            $this->addErrors("firstname","field can`t be empty");
        }else{
            if(!preg_match("/^[^@$!%*#?&]+$/", $fname)){
                $this->addErrors("firstname","Special Characters can't be used in FirstName");
            }
        }
    }

    public function lastnameValidator($lname){
        if(empty($lname)){
            $this->addErrors("lastname","field can`t be empty");
        }else{
            if(!preg_match("/^[^@$!%*#?&]+$/", $lname)){
                $this->addErrors("lastname","Special Characters can't be used in LastName");
            }
        }
    }

    public function emailValidator($email){
        if(empty($email)){
            $this->addErrors("email","field can`t be empty");
        }else{
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $this->addErrors("email","email must be valid email");
            }
        }
    }

    public function phoneValidator($phone){
        if(empty($phone)){
            $this->addErrors("phone","field can`t be empty");
        }else{
            if(!preg_match('/^[0-9]{10}$/',$phone)){
                $this->addErrors("phone","length must be 10 chars & number");
            }
        }
    }

    public function passwordValidator($pass,$cpass){
        if(empty($pass)){
            $this->addErrors("password","Password can not be empty!");
        }elseif(strlen($pass) <= 7){
            $this->addErrors("password","Password must be 8 characters long");
        }

        if($pass != $cpass){
            $this->addErrors("password","password and confirm password are different");
            // header("Location: ".Config::base_url."?controller=Default&function=CustomerSignup&parameter=1");
            // exit;
        }
    }

    public function loginValidateor(){
        $email = $this->data['Email'];
        $pass = $this->data['Password'];
        if(empty($email)){
            $this->addErrors("email","Email can not be empty!");
        }else{
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $this->addErrors("email","email must be valid email");
            }
        }
        if(empty($pass)){
            $this->addErrors("password","Password can not be empty!");
        }
        return $this->errors;
    }

    public function policyValidator($policy){
        if(empty($policy)){
            $this->addErrors("agree","Click on the checkbox");
        }
    }

    private function addErrors($key,$value){
        $this->errors[$key] = $value;
    }

}

?>