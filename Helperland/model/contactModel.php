<?php
include("dbconnection.php");
class contactModel
{
    public $data;
    public $error = [];
    public $conn;
    public function __construct($data)
    {
        $connect = new DBConnection();
        $this->conn = $connect->Connection();
        $this->data = $data;
    }
    public function insertContactData()
    {
        $Name = $this->data['firstname'] . " " . $this->data['lastname'];
        $Email = $this->data['email'];
        $SubjectType = $this->data['subject'];
        $PhoneNumber = $this->data['phonenumber'];
        $Message = $this->data['message'];
        $UploadFileName = $this->data['filename'];
        $FileName = $this->data['filepath'];

        $sql = "INSERT INTO contactus (Name, Email, Subject, PhoneNumber, Message, UploadFileName, FileName) 
                VALUES ('$Name', '$Email', '$SubjectType', '$PhoneNumber', '$Message', '$UploadFileName', '$FileName')";

        $result = $this->conn->query($sql);
        // die($result);
        if (!$result) {
            header("Location: ../errors.php?error=inserting failed!");
            exit;
        }
        return ($result);
    }
}
