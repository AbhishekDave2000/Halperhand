<?php
include("dbconnection.php");

class ServiceModel
{
    public $data;

    public function __construct($data)
    {
        $connect = new DBConnection();
        $this->conn = $connect->Connection();
        $this->data = $data;
    }

    public function PostalCheckModel()
    {
        $postal = trim($this->data);
        $sql = "SELECT * FROM zipcode WHERE ZipcodeValue = '$postal'";

        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }else{
            return array();
        }
    }

}
?>