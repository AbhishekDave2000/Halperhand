<?php
session_start();
include("./model/AuthenticationModel.php");
include("validation/userValidator.php");
require("phpmailer/mail.php");

class AuthenticationController
{
    public $data;
    public $error = [];
    public function __construct()
    {
        $this->auth = new AuthenticationModel($_POST);
    }

    //login controller
    public function Login()
    {
        $result = "";
        $check = 0;
        $validator = new userValidator($_POST);
        $err = $validator->loginValidateor();
        if (count($err) > 0) {
            echo "Email or Password is not valid!";
        } else {
            $email = $_POST['Email'];
            $pass = trim($_POST['Password']);
            if (isset($_POST['check'])) {
                $check = $_POST['check'];
            } else {
                $check = 0;
            }
            $result = $this->auth->LoginModel();
            if ($result) {
                if ($result['Email'] == $email && password_verify($pass, $result['Password'])) {
                    if ($result['UserTypeId'] == 1 || $result['UserTypeId'] == 2 && $result['IsApproved'] == 1 || $result['UserTypeId'] == 3) {
                        $_SESSION['user'] = $result;
                        if ($check == 1) {
                            setcookie('user', $email, time() + (86400 * 30), "/");
                            setcookie('pass', $pass, time() + (86400 * 30), "/");
                            setcookie('check', $check, time() + (86400 * 30), "/");
                        }
                        echo 1;
                    } else {
                        echo 2;
                    }
                } else {
                    echo 3;
                }
            } else {
                echo 4;
            }
        }
    }

    //user signup controller
    public function Signup()
    {
        // print_r($_POST);exit;
        // validate data
        $validate = new userValidator($_POST);
        $errors = $validate->Validator();
        if (!count($errors) > 0) {
            $_POST['pass'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $res = $this->auth->checkuserEmailModel();
            // insert data
            if ($res) {
                $result = $this->auth->SignupModel();
                if ($result) {
                    echo 1;
                } else {
                    echo 0;
                }
            } else {
                echo 2;
            }
        } else {
            echo $errors['error'];
        }
    }

    //forgot password
    public function forgotPassword()
    {
        //email user select from database
        $result = $this->auth->forgotPasswordModel();
        $email = $_POST['email'];
        //user exist validate
        if (count($result) > 0) {
            if ($result['Email'] == $email) {
                //send session data
                $_SESSION['email'] = $email;
                $id = $result['UserId'];
                //send mail
                $url = Config::base_url . '?controller=Default&function=forgotPasspage&parameter=' . $id;
                sendmail($email, 'This is link for Setting new password in Helperland!', 'Click here: ' . $url);
                echo 1;
            }
        } else {
            echo 2;
        }
    }

    //password set function
    public function setPass($id)
    {
        if (isset($_SESSION['email'])) {
            $pass = $_POST['pass'];
            $cpass = $_POST['cpass'];
            $email = $_SESSION['email'];
            if ($pass == $cpass) {
                $_POST['pass'] = password_hash($_POST['pass'], PASSWORD_BCRYPT);
                $result = $this->auth->setPassModel($id);
                if ($result) {
                    unset($_SESSION['email']);
                    echo 1;
                } else {
                    echo 2;
                }
            } else {
                echo 3;
            }
        }
    }

    //logout
    public function Logout()
    {
        unset($_SESSION['user']);
        if (!isset($_SESSION['user'])) {
            header("Location: " . Config::base_url . '?controller=Default&function=homepage');
            exit();
        }
    }
}
