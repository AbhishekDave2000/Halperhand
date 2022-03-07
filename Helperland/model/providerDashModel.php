<?php
include('dbconnection.php');
class providerDashModel
{
    public $conn;
    public function __construct()
    {
        $conn = new DBConnection();
        $this->conn = $conn->Connection();
    }

    // get MySetting Page Data
    public function getMySettingDataModel()
    {
        $spid = $_POST['spid'];
        $sql = "SELECT u.UserId,u.FirstName,u.LastName,u.Email,u.Mobile,u.Gender,u.DateOfBirth,u.UserProfilePicture,u.ZipCode,u.WorksWithPets,u.LanguageId,u.NationalityId,u.CreatedDate,u.ModifiedDate,ua.AddressId,ua.AddressLine1,ua.AddressLine2,ua.City,ua.State,ua.PostalCode,s.StateName,c.CityName FROM user as u
                LEFT JOIN useraddress as ua ON u.UserId = ua.UserId
                JOIN ZipCode as zc ON u.ZipCode = zc.ZipcodeValue
                JOIN city as c  ON c.Id = zc.CityId
                JOIN state as s  ON s.Id = c.StateId
                WHERE u.UserId = $spid";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $address = $this->getServiceProviderAddress();
                if (empty($address)) {
                    return $row;
                } else {
                    return $row + $address;
                }
            }
        }
    }

    // get city from PostalCode Data
    public function getUserCityDataModel($data)
    {
        $sql = "SELECT c.*,s.StateName FROM zipcode as zc JOIN city as c ON zc.CityId = c.Id JOIN state as s ON s.Id = c.StateId WHERE zc.ZipcodeValue = $data";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
    }

    // save service provider data of mydetail
    public function saveProviderDetailModel()
    {
        $id = $_POST['spid'];
        $Fname = $_POST['firstname'];
        $Lname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $date = $_POST['DOB'];
        $country = $_POST['country'];
        $gender = $_POST['gender'];
        $avatar = $_POST['avatar-val'];
        $street = $_POST['street'];
        $house = $_POST['house'];
        $postal = $_POST['postal'];
        $city = $_POST['cityname'];

        $sql = "UPDATE user SET FirstName = '$Fname',LastName = '$Lname',Email= '$email' ,Mobile= '$phone' ,Gender= $gender ,
                DateOfBirth= '$date' ,UserProfilePicture= $avatar ,ZipCode= '$postal' ,NationalityId= '$country' ,ModifiedDate=now(),ModifiedBy= $id
                WHERE UserId = $id";
        $result =  $this->conn->query($sql);
        if ($result) {
            $res = $this->getUserCityDataModel($postal);
            $address = $this->getServiceProviderAddress();
            $state = $res['StateName'];

            if (empty($address)) {
                $sql = "INSERT INTO useraddress(`UserId`, `AddressLine1`, `AddressLine2`, `City`, `State`, `PostalCode`, `IsDefault`, `Mobile`, `Email`) 
                        VALUES($id, '$house', '$street', '$city', '$state', '$postal',1,'$phone','$email')";
                return $this->conn->query($sql);
            } else {
                $uaid = $address['AddressId'];
                $sql = "UPDATE useraddress SET AddressLine1 = '$house', AddressLine2 = '$street', City = '$city', State = '$state', PostalCode = '$postal', Mobile = '$phone', Email = '$email'
                        WHERE useraddress.UserId = $id AND AddressId = $uaid";
                return $this->conn->query($sql);
            }
        } else {
            return 0;
        }
    }

    // Service Provider Address My Detail Page
    public function getServiceProviderAddress()
    {
        $id = $_POST['spid'];
        $sql = "SELECT * FROM useraddress WHERE UserId = $id";
        $addr = $this->conn->query($sql);
        if ($addr->num_rows > 0) {
            $address = $addr->fetch_assoc();
            return $address;
        }
    }

    // Set New Password Of service Provider
    public function setNewPasswordModel()
    {
        $id = $_POST['spid'];
        $oldpass = trim($_POST['oldpass']);
        $pass = trim($_POST['newpass']);

        $sql = "SELECT Password FROM user WHERE UserId = '$id' AND Password = '$oldpass'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $sql = "UPDATE user 
                    SET Password = '$pass'
                    WHERE UserId = '$id'";
            return $this->conn->query($sql);
        } else {
            return 2;
        }
    }

    // Get Service Request and upcoming service request data
    public function getServiceRequestDataModel($status,$NS)
    {
        $rows = array();
        $spid = $_POST['spid'];
        $sql = "SELECT sr.ServiceRequestId,sr.ServiceStartDate,sr.ZipCode,sr.ServiceHours,sr.ExtraHours,sr.SubTotal,sr.Discount,sr.TotalCost,sr.Comments,
                        sr.ServiceProviderId,sr.JobStatus,sr.HasPets,sr.Status,sr.CreatedDate,sr.Distance,sr.HasIssue,sra.AddressLine1,sra.AddressLine2,sra.City,sra.State,
                        sra.Mobile,sra.Email,sre.ServiceExtraId,u.FirstName as CFName, u.LastName as CLName,u.Gender,u.UserProfilePicture FROM servicerequest as sr
                JOIN servicerequestaddress as sra
                    ON sr.ServiceRequestId = sra.ServiceRequestId
                JOIN servicerequestextra as sre
                    ON sr.ServiceRequestId = sre.ServiceRequestId
                JOIN user as u
                    ON u.UserId = sr.UserId
                WHERE (sr.ServiceProviderId = $spid OR sr.ServiceProviderId $NS) AND sr.Status IN $status";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($rows, $row);
            }
            return $rows;
        } else {
            return 0;
        }
    }

    // get all service request of this provider
    public function checkServiceRequestModel()
    {
        $rows = array();
        $spid = $_POST['spid'];
        $sql = "SELECT * FROM servicerequest as sr WHERE sr.Status = 2 AND sr.ServiceProviderId = $spid";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($rows, $row);
            }
            return $rows;
        } else {
            return 0;
        }
    }

    // accept the service request if time is not overlapping
    public function acceptServiceRequestModel()
    {
        $srid = $_POST['srid'];
        $spid = $_POST['spid'];
        $sql = "UPDATE servicerequest as sr SET sr.ServiceProviderId = $spid, sr.SPAcceptedDate = now(),sr.Status = 2 WHERE sr.ServiceRequestId =$srid";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function cancelServiceRequestModel()
    {
        $srid = $_POST['srid'];
        $sql = "UPDATE servicerequest as sr SET sr.ServiceProviderId = Null, sr.SPAcceptedDate = Null,sr.Status = 0 WHERE sr.ServiceRequestId =$srid";
        $result = $this->conn->query($sql);
        return $result;
    }

}
