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

    public function loginValidateor($post)
    {
        $email = $post['Email'];
        $pass = $post['Password'];
        if (empty($email)) {
            $this->addErrors("email", "Email can not be empty!");
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->addErrors("email", "email must be valid email");
            }
        }
        if (empty($pass)) {
            $this->addErrors("password", "Password can not be empty!");
        }
        return $this->errors;
    }

    public function userAddressValidator($post)
    {
        $street = trim($post['street']);
        $house = trim($post['house']);
        $city = trim($post['city']);
        $phone = trim($post['phone']);
        $postal = trim($post['PostalCode']);
        
        $this->streetValidator($street);
        $this->houseValidator($house);
        $this->cityValidator($city);
        $this->phoneValidator($phone);
        $this->postalValidator($postal);

        return $this->errors;
    }

    public function userNewAddressValidator($post){
        $street = trim($post['street']);
        $house = trim($post['house']);
        $phone = trim($post['phone']);
        $postal = trim($post['PostalCode']);

        $this->streetValidator($street);
        $this->houseValidator($house);
        $this->phoneValidator($phone);
        $this->postalValidator($postal);

        return $this->errors;
    }

    public function  streetValidator($street)
    {
        if (empty($street)) {
            $this->addErrors("addfield", "City Name can not be empty!");
        }
    }
    public function  houseValidator($house)
    {
        if (empty($house)) {
            $this->addErrors("addfield", "House Name can not be empty!");
        }
    }
    public function  cityValidator($city)
    {
        if (empty($city)) {
            $this->addErrors("addfield", "City Name can not be empty!");
        }
    }
    public function phoneValidator($phone)
    {
        if (empty($phone)) {
            $this->addErrors("addfield", "Phone Number can not be empty!");
        } else {
            if (!preg_match('/^[0-9]{10}$/', $phone)) {
                $this->addErrors("addfield", "Phone Number's length must be 10 chars & number!");
            }
        }
    }
    public function  postalValidator($postal)
    {
        if (empty($postal)) {
            $this->addErrors("addfield", "Postal Code can not be empty!");
        } else if (strlen($postal) > 6 || strlen($postal) < 5) {
            $this->addErrors("addfield", "Postal Code must be 5 char long!");
        }
    }

    private function addErrors($key, $value)
    {
        $this->errors[$key] = $value;
    }
}
