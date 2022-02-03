<?php
include("dbconnection.php");
class contactModel
{
    public $data;
    public $error = [];
    public $conn;
    public function __construct($data)
    {
        $this->data = $data;
        $connect = new DBConnection();
        $this->conn = $connect->Connection();
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
        if (!$result) {
            header("Location: ../errors.php?error=inserting failed!");
            exit;
        }
        
        // if (!empty($UploadFileName)) {
        //     $last_id = $this->conn->insert_id;
        //     $FilePath = $this->data['filepath'];
        //     $sql = "INSERT INTO contactusattachment (ContactUsId, Name, FileName)
        //             VALUES ($last_id, '$UploadFileName', '$FilePath')";

        //     $result = $this->conn->query($sql);
        //     if (!$result) {
        //         header("Location: ../errors.php?error=attachment inserting failed!");
        //     }
        // }
        return ($result);
    }
}
