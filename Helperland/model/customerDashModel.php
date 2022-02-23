<?php
// include("dbconnection.php");
require_once("dbconnection.php");
class customerDashModel{
    public $data;

    public function __construct(){
        $connect = new DBConnection();
        $this->conn = $connect->Connection();
    }

    public function getServiceRequestDataModel($id){
        $rows = array();
        $sql = "SELECT servicerequest.*,rating.RatingFrom,rating.RatingTo,rating.Ratings,user.* FROM rating  
                RIGHT JOIN servicerequest
                    ON servicerequest.ServiceRequestId = rating.ServiceRequestId 
                LEFT JOIN user
                    ON rating.RatingTo = user.UserId
                WHERE servicerequest.UserId = '$id'";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            array_push($rows, $row);
        }
        return $rows;
    }

    public function getMyDetailModel($id){
        $sql = "SELECT * FROM user WHERE UserId = '$id' AND UserTypeId = 1";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            return $result->fetch_assoc();
        }
    }

    public function myDetailUpdate($data){
        $id = $data['user-logged-in-id'];
        $fname = $data['FirstName'];
        $lname = $data['LastName'];
        $email = $data['EmailAddress'];
        $phone = $data['Phone'];
        $Language = $data['Language'];
        $date = $data['DOB'];

        $sql = "UPDATE user
                SET FirstName = '$fname', LastName = '$lname', Email = '$email',
                Mobile = '$phone', LanguageId = '$Language', DateOfBirth = '$date'
                WHERE UserId = '$id'";

        $result = $this->conn->query($sql);
        return $result;
    }

    public function setNewPassword($data){
        $id = $data['user-logged-in-id'];
        $oldpass = trim($data['oldpass']);
        $pass = trim($data['newpass']);

        $sql = "SELECT Password FROM user WHERE UserId = '$id' AND Password = '$oldpass'";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            $sql = "UPDATE user 
                    SET Password = '$pass'
                    WHERE UserId = '$id'";
            return $this->conn->query($sql);
        }else{
            return False;
        }
    }
}
