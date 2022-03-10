<?php
include("dbconnection.php");
class AuthenticationModel
{
    public $data;
    public $error = [];

    public function __construct($data)
    {
        $this->data = $data;
        $connect = new DBConnection();
        $this->conn = $connect->Connection();
    }

    public function LoginModel()
    {
        $email = trim($this->data['Email']);
        $password = trim($this->data['Password']);

        $sql = "SELECT * FROM user WHERE Email = '$email'";
        // AND Password = '$password'
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
    }

    public function SignupModel($password)
    {
        $firstname  = trim($this->data['firstname']);
        $lastname = trim($this->data['lastname']);
        $email = trim($this->data['email']);
        $phone = trim($this->data['phone']);
        $UserTypeId = $this->data['UserTypeId'];
        if ($UserTypeId == 1) {
            $approved = 1;
        } elseif ($UserTypeId == 2) {
            $approved = 0;
        }
        $sql = "INSERT INTO user (FirstName,LastName,Email,Password,Mobile, UserTypeId, CreatedDate, IsApproved, UserProfilePicture) 
                            VALUES ('$firstname' , '$lastname', '$email','$password', '$phone', $UserTypeId, now(), $approved, 1)";

        $result = $this->conn->query($sql);
        return $result;
    }

    public function forgotPasswordModel()
    {
        $email = trim($this->data['email']);
        $sql = "SELECT `UserId`,`Email` FROM user WHERE Email = '$email'";

        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        }
    }

    public function setPassModel($id)
    {
        $pass = $this->data['pass'];
        $sql = "UPDATE user SET `Password` = '$pass' WHERE UserId = '$id'";
        $result = $this->conn->query($sql);
        return $result;
    }
}
