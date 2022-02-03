<?php
include("dbconnection.php");
class AuthenticationModel{
    public $data;
    public $error = [];

    public function __construct($data)
    {
        $this->data = $data;
        $connect = new DBConnection();
        $this->conn = $connect->Connection();
    }

    public function LoginModel(){
        $email = trim($this->data['Email']);
        $password = trim($this->data['Password']);

        $sql = "SELECT * FROM user WHERE Email = '$email' 
                                   AND Password = '$password'";
                                   
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            return $result->fetch_assoc();
        }
    }

    public function SignupModel(){
        $firstname  = trim($this->data['firstname']);
        $lastname = trim($this->data['lastname']);
        $email = trim($this->data['email']);
        $phone = trim($this->data['phone']);
        $password = trim($this->data['password']);
        $UserTypeId = $this->data['UserTypeId'];

        $sql = "INSERT INTO user (FirstName,LastName,Email,Password,Mobile, UserTypeId) 
                            VALUES ('$firstname' , '$lastname', '$email','$password', '$phone', $UserTypeId)";

        $result = $this->conn->query($sql);
        return $result;
    }

    public function forgotPasswordModel(){
        $email = trim($this->data['email']);

        $sql = "SELECT `Email` FROM user WHERE Email = '$email'";

        $result = $this->conn->query($sql);
        if($result->num_rows > 0 ){
            $row = $result->fetch_assoc();
            return $row;
        }
    }

    public function setPassModel($email){
        $pass = $this->data['pass'];
        $sql = "UPDATE user SET `Password` = '$pass' WHERE Email = '$email'";

        $result = $this->conn->query($sql);
        return $result;
    }
}

?>