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
        if (isset($_POST['Login'])) {
            $email = $_POST['Email'];
            $pass = $_POST['Password'];
            $check = $_POST['check'];
            $result = $this->auth->LoginModel();
        }
        if ($result) {
            if ($result['Email'] == $email && $result['Password'] == $pass) {
                if ($result['UserTypeId'] == 1 || $result['UserTypeId'] == 2 && $result['IsApproved'] == 1) {
                    $_SESSION['user'] = $result;
                    if ($check == 1) {
                        setcookie('user', $email, time() + (86400 * 30), "/");
                        setcookie('pass', $pass, time() + (86400 * 30), "/");
                        setcookie('check', $check, time() + (86400 * 30), "/");
                    }
                    header("Location:" . Config::base_url . "?controller=Default&function=homepage");
                    exit();
                } else {
                    header("Location: errors.php?error=You are not approved wait till you get approved!");
                    exit();
                }
            } else {
?>
                <script>
                    alert('Incorrect email or password please try again with correct ones!');
                    window.location.href = "<?= Config::base_url . '?controller=Default&function=homepage' ?>";
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                alert('You can not login please register yourself!');
                window.location.href = "<?= Config::base_url . '?controller=Default&function=homepage' ?>";
            </script>
            <?php
        }
    }


    //user signup controller
    public function Signup()
    {
        if (isset($_POST['register'])) {
            //validate data
            $validate = new userValidator($_POST);
            $errors = $validate->Validator();
            if (!count($errors) > 0) {
                // insert data
                $result = $this->auth->SignupModel();
                if ($result) {
                    header("Location: " . Config::base_url . '?controller=Default&function=homepage');
                    exit;
                } else {
                    // error page redirect remaining
                    echo "fail";
                    exit;
                }
            } else {
                header("Location: errors.php?error=something went wrong with validation of form");
                exit;
            }
        }
    }


    //forgot password
    public function forgotPassword()
    {
        //email user select from database
        $result = $this->auth->forgotPasswordModel();

        //user exist validate
        $email = $_POST['email'];
        if ($result['Email'] == $email) {
            //send mail
            $url = Config::base_url . '?controller=Default&function=forgotPasspage';
            sendmail($email, 'This is link for Setting new password in Helperland!', 'Click here: ' . $url);

            //send session data
            $_SESSION['email'] = $email;

            // header("Location :".Config::base_url."?controller=Default&function=homepage");
            // include(Config::base_url."?controller=Default&function=homepage");
            // exit();
        } else {
            header("Location: errors.php?error=This email is not registered please try with registered email!");
            exit;
        }
    }


    //password set function
    public function setPass()
    {
        if (isset($_SESSION['email'])) {
            $pass = $_POST['pass'];
            $cpass = $_POST['cpass'];
            $email = $_SESSION['email'];
            if ($pass == $cpass) {
                $result = $this->auth->setPassModel($email);
                if ($result) {
                    header("Location: " . Config::base_url . '?controller=Default&function=homepage');
                    unset($_SESSION['email']);
                    exit;
                } else {
                    header("Location: errors.php?error=Password did not change try again!");
                    exit;
                }
            } else {
            ?>
                <script>
                    alert('Enter Same passwords in both fields!');
                    window.location.href = "<?= Config::base_url . '?controller=Default&function=forgotPasspage' ?>";
                </script>
<?php
            }
        } else {
            header("Location: errors.php?error= Session has been expired please try again!");
            // header("Location:" . Config::base_url . "?controller=Default&function=homepage");
            exit();
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
