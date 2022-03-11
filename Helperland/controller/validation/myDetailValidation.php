<?php

class myDetailValidation
{
    public $data;
    public $errors = [];
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function Validation()
    {
        $this->validateFirstname(trim($_POST['FirstName']));
        $this->validateLastname(trim($_POST['LastName']));
        $this->validateEmail(trim($_POST['EmailAddress']));
        $this->validateMobile(trim($_POST['Phone']));
        return $this->errors;
    }

    public function validateFirstname($fname)
    {
        if (empty($fname)) {
            $this->addErrors("firstname", "field can`t be empty");
        } else {
            if (!preg_match("/^[^@$!%*#?&]+$/", $fname)) {
                $this->addErrors("firstname", "special charcater can't be accepted");
            }
        }
    }

    public function validateLastname($lname)
    {
        if (empty($lname)) {
            $this->addErrors("lastname", "field can`t be empty");
        } else {
            if (!preg_match("/^[^@$!%*#?&]+$/", $lname)) {
                $this->addErrors("lastname", "special charcater can't be accepted");
            }
        }
    }

    public function validateEmail($email)
    {
        if (empty($email)) {
            $this->addErrors("email", "field can`t be empty");
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->addErrors("email", "email must be valid email");
            }
        }
    }

    public function validateMobile($mobile)
    {
        if (empty($mobile)) {
            $this->addErrors("mobile", "field can`t be empty");
        } else {
            if (!preg_match('/^[0-9]{10}$/', $mobile)) {
                $this->addErrors("mobile", "length must be 10 chars & number");
            }
        }
    }

    public function passwordValidate()
    {
        $oldpass = $this->data['oldpass'];
        $pass = $this->data['newpass'];
        $cpass = $this->data['cpass'];

        if (empty($oldpass)) {
            $this->addErrors("password", "Password can not be empty!");
        } elseif (strlen($oldpass) <= 7) {
            $this->addErrors("password", "Password must be 8 characters long");
        }

        if (empty($pass)) {
            $this->addErrors("password", "Password can not be empty!");
        } elseif (strlen($pass) <= 7) {
            $this->addErrors("password", "Password must be 8 characters long");
        }

        if ($pass != $cpass) {
            $this->addErrors("password", "password and confirm password are different");
        }

        return $this->errors;
    }

    public function rateValidation()
    {
        if (!isset($this->data['ota-rate']) || !isset($this->data['Friendly-rate']) || !isset($this->data['Qos-rate'])) {
            $this->addErrors("RateError", "Please enter all ratinggs!");
        }
        return $this->errors;
    }

    private function addErrors($key, $value)
    {
        $this->errors[$key] = $value;
    }
}
