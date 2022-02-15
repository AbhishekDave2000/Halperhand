<?php
class ServiceValidator
{
    public $errors = [];

    public function postalcodeValidator($postal)
    {
        if (empty($postal)) {
            $this->addErrors("postalcode", "Postalcode can't be empty!");
        } elseif (strlen($postal) < 5) {
            $this->addErrors("postalcode", "Postal Code must be 5 characters long!");
        }
        return $this->errors;
    }

    public function loginValidateor($post){
        $email = $post['Email'];
        $pass = $post['Password'];
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

    public function userAddressValidator($post){
        $street = $post['street'];
        $house = $post['house'];
        $city = $post['city'];
        $phone = $post['phone'];
        if(empty($street)){
            $this->addErrors("addfield","City Name can not be empty!");
        }
        if(empty($house)){
            $this->addErrors("addfield","House Name can not be empty!");
        }
        if(empty($city)){
            $this->addErrors("addfield","City Name can not be empty!");
        }
        if(empty($phone)){
            $this->addErrors("addfield","Phone Number can not be empty!");
        }else{
            if(!preg_match('/^[0-9]{10}$/',$phone)){
                $this->addErrors("addfield","Phone Number's length must be 10 chars & number!");
            }
        }
    }


    private function addErrors($key, $value)
    {
        $this->errors[$key] = $value;
    }
}
?>
