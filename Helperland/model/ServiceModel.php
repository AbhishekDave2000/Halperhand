<?php
include("dbconnection.php");

class ServiceModel
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
        $connect = new DBConnection();
        $this->conn = $connect->Connection();
    }

    public function PostalCheckModel()
    {
        $postal = trim($this->data);
        $sql = "SELECT * FROM zipcode as zc JOIN city as c ON c.Id = zc.CityId WHERE ZipcodeValue = '$postal'";

        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return array();
        }
    }

    public function LoginModel()
    {
        $email = trim($this->data['Email']);
        $password = trim($this->data['Password']);

        $sql = "SELECT * FROM user WHERE Email = '$email' 
                                   AND Password = '$password'";

        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
    }

    public function AddressModel()
    {
        $id = $_POST['userid'];
        $postal = $_POST['postal'];
        $rows = array();
        // change the query logic
        $sql = "SELECT user.UserTypeId, useraddress.* FROM user JOIN useraddress
                ON user.UserId = useraddress.UserId 
                WHERE useraddress.PostalCode = '$postal' AND useraddress.IsDeleted = 0 AND user.UserTypeId = 1 AND user.UserId = '$id' ";

        $address = $this->conn->query($sql);
        while ($row = $address->fetch_assoc()) {
            array_push($rows, $row);
        }
        return $rows;
    }

    public function addAddressModel()
    {
        $id = $_POST['userid'];
        $street = trim($_POST['street']);
        $house = trim($_POST['house']);
        $city = trim($_POST['city']);
        $phone = trim($_POST['phone']);
        $postal = trim($_POST['postal']);
        $email = trim($_POST['email']);

        $sql = "SELECT s.StateName FROM zipcode as zc 
                JOIN city as c
                        ON zc.CityId = c.Id
                JOIN state as s
                        ON c.StateId = s.Id
                WHERE zc.ZipcodeValue =  '$postal'";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
        }
        $state = $row['StateName'];
        $sql = "INSERT INTO useraddress (UserId, AddressLine1, AddressLine2, City, State, PostalCode, IsDefault, IsDeleted, Mobile, Email) 
                VALUES ('$id', '$house', '$street', '$city', '$state', '$postal', 0, 0, '$phone', '$email')";

        $this->conn->query($sql);
        if($result){
            return $this->AddressModel();
        }else{
            return 0;
        }
    }

    public function getFavProsModel(){
        $id = $_POST['userid'];
        $rows = array();
        $sql = "SELECT user.* FROM favoriteandblocked
                    JOIN user
                        ON user.UserId = favoriteandblocked.TargetUserId
                    WHERE favoriteandblocked.UserId = '$id'";

        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            array_push($rows, $row);
        }
        return $rows;
    }

    public function getFavProForEmail(){
        $pro_id = $_POST['favrioute-provider'];
        $sql = "SELECT * FROM favoriteandblocked fb
                    JOIN user u
                        ON fb.TargetUserId = u.UserId
                    WHERE u.UserId = $pro_id";
        $res = $this->conn->query($sql);
        if($res->num_rows > 0){
            return $res->fetch_assoc();
        }
    }

    public function getFavMultiProForEmail(){
        $postal = $_POST['postalcode'];
        $rows = array();
        $sql = "SELECT * FROM favoriteandblocked fb
                    JOIN user u
                        ON fb.TargetUserId = u.UserId
                    WHERE u.ZipCode =  '$postal'";
        $res = $this->conn->query($sql);
        while ($row = $res->fetch_assoc()) {
            array_push($rows, $row);
        }
        return $rows;
    }

    public function addServiceRequest(){
        $UserId = $_POST['customer-userid'];
        // $ServiceStartDate = $_POST['date-of-cleaning']; 
        $ServiceStartDate = $_POST['service-start-date-time'];  
        $ZipCode = $_POST['postalcode'];
        $ServiceHours = $_POST['service-hours-select'];
        $ExtraHours = $_POST['extra-hours'];
        $SubTotal = $_POST['service-hours'];
        $TotalCost = $_POST['total-cost'];
        $Comments = $_POST['service-comments-text'];
        $HasPets = $_POST['pets-at-home'];
        $sprovider = 'null';
        $status = 0;
        if(isset($_POST['favrioute-provider'])){
            $sprovider = $_POST['favrioute-provider'];
            $status = 1; 
        }

        $sql = "INSERT INTO servicerequest 
                    (UserId, ServiceStartDate, ZipCode, ServiceHourlyRate, ServiceHours, ExtraHours, SubTotal, TotalCost, Comments, PaymentDue, HasPets, Status, CreatedDate, PaymentDone, ServiceProviderId) 
                VALUES 
                    ( $UserId, '$ServiceStartDate', '$ZipCode', 18, $ServiceHours, $ExtraHours, $SubTotal, $TotalCost, '$Comments', 0, $HasPets, $status, now(), 1, $sprovider)";
        $result = $this->conn->query($sql);
        if($result){
            $last_id = $this->conn->insert_id;
            return $last_id;
        }else{
            return 0;
        }
    }

    public function addServiceRequestAddress($id){
        // Select Address from useraddress table
        $AddressId = $_POST['address-radio']; 
        $sql = "SELECT * FROM useraddress WHERE AddressId = '$AddressId'";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            $address = $result->fetch_assoc();
        }
        // add Address to servicerequest table
        $Aline1 = $address['AddressLine1'];
        $ALine2 = $address['AddressLine2'];
        $City = $address['City'];
        $State = $address['State'];
        $postal = $address['PostalCode'];
        $Mobile = $address['Mobile'];
        $Email = $address['Email'];
        $sql = "INSERT INTO servicerequestaddress (`ServiceRequestId`, `AddressLine1`, `AddressLine2`, `City`, `State`, `PostalCode`, `Mobile`, `Email`) 
                VALUES ($id, '$Aline1', '$ALine2', '$City', '$State', '$postal', '$Mobile', '$Email')";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function addExtraServices($data){
        // Add ExtraServices into table
        $id = $this->data;
        $extarid = implode("",$data);
        $sql = "INSERT INTO servicerequestextra (`ServiceRequestId`, `ServiceExtraId`) 
                VALUES ($id, $extarid)";
        $result = $this->conn->query($sql);
        return $result;
    }

}
