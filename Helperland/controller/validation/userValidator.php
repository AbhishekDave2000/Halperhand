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
        $this->policyValidator(trim($this->data["agree"]));
        $this->passwordValidator(trim($this->data["password"]),trim($this->data['confirmpassword']));
        $this->phoneValidator(trim($this->data["phone"]));
        $this->emailValidator(trim($this->data["email"]));
        $this->lastnameValidator(trim($this->data["lastname"]));
        $this->fistnameValidator(trim($this->data["firstname"]));

        return $this->errors;
    }

    public function SPDetailValidation(){
        $this->fistnameValidator(trim($this->data["firstname"]));
        $this->lastnameValidator(trim($this->data["lastname"]));
        $this->emailValidator(trim($this->data["email"]));
        $this->phoneValidator(trim($this->data["phone"]));
        $this->streetValidator(trim($this->data["street"]));
        $this->houseValidator(trim($this->data["house"]));
        $this->cityValidator(trim($this->data["cityname"]));
        $this->postalValidator(trim($this->data["postal"]));
        return $this->errors;
    }
    
    public function fistnameValidator($fname){
        if(empty($fname)){
            $this->addErrors("error","Fist-name can`t be empty");
        }else{
            if(!preg_match("/^[^@$!%*#?&]+$/", $fname)){
                $this->addErrors("error","Special Characters can't be used in FirstName");
            }
        }
    }

    public function lastnameValidator($lname){
        if(empty($lname)){
            $this->addErrors("error","Last-name can`t be empty");
        }else{
            if(!preg_match("/^[^@$!%*#?&]+$/", $lname)){
                $this->addErrors("error","Special Characters can't be used in LastName");
            }
        }
    }

    public function emailValidator($email){
        if(empty($email)){
            $this->addErrors("error","Email can`t be empty");
        }else{
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $this->addErrors("error","email must be valid email");
            }
        }
    }

    public function phoneValidator($phone){
        if(empty($phone)){
            $this->addErrors("error","Mobile No. can`t be empty");
        }else{
            if(!preg_match('/^[0-9]{10}$/',$phone)){
                $this->addErrors("error","length must be 10 chars & number");
            }
        }
    }

    public function passwordValidator($pass,$cpass){
        if(empty($pass)){
            $this->addErrors("error","Password can not be empty!");
        }elseif(strlen($pass) <= 7){
            $this->addErrors("error","Password must be 8 characters long");
        }

        if($pass != $cpass){
            $this->addErrors("error","password and confirm password are different");
        }
    }

    public function  streetValidator($street)
    {
        if (empty($street)) {
            $this->addErrors("error", "street Name can not be empty!");
        }
    }
    public function  houseValidator($house)
    {
        if (empty($house)) {
            $this->addErrors("error", "House Name can not be empty!");
        }
    }
    public function  cityValidator($city)
    {
        if (empty($city)) {
            $this->addErrors("error", "City Name can not be empty!");
        }
    }
    
    public function  postalValidator($postal)
    {
        if (empty($postal)) {
            $this->addErrors("error", "Postal Code can not be empty!");
        } else if (strlen($postal) > 6 || strlen($postal) < 5) {
            $this->addErrors("error", "Postal Code must be 5 char long!");
        }
    }

    public function policyValidator($policy){
        if(empty($policy)){
            $this->addErrors("error","Click on the checkbox");
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

    private function addErrors($key,$value){
        $this->errors[$key] = $value;
    }
}

?>