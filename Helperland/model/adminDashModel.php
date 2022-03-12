<?php
include('model/dbconnection.php');
class adminDashModel
{

    public function __construct()
    {
        $conn = new DBConnection();
        $this->conn = $conn->Connection();
    }

    // get service request data model
    public function getAdminServiceRequestDataModel()
    {
        $rows = [];
        $sql = "SELECT sr.ServiceRequestId,sr.UserId,sr.ServiceStartDate,sr.ZipCode,sr.ServiceHours,sr.ExtraHours,sr.SubTotal,sr.Discount,sr.TotalCost,sr.Comments,sr.JobStatus,
                    sr.ServiceProviderId,sr.HasPets,sr.Status,sr.ModifiedDate,sr.ModifiedBy,sr.RefundedAmount,sr.HasIssue,sra.AddressLine1,sra.AddressLine2,sra.City,sra.State,
                    sra.Mobile,sra.Email,sre.ServiceExtraId,CONCAT(u.FirstName,' ',u.LastName) as CusName FROM servicerequest as sr 
                JOIN servicerequestaddress as sra 
                    ON sr.ServiceRequestId = sra.ServiceRequestId
                JOIN servicerequestextra as sre
                    ON sr.ServiceRequestId = sre.ServiceRequestExtraId
                JOIN user as u 
                    ON u.UserId = sr.UserId";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $res = $this->getSPReatingsModel($row['ServiceRequestId'], $row['ServiceProviderId']);
                if (count($res) > 0) {
                    $row = $row + $res;
                }
                array_push($rows, $row);
            }
            return $rows;
        }
    }
    public function getSearchedDataModel()
    {
        $sid = $_POST['SIS'];
        $cid = $_POST['CS'];
        $pid = $_POST['PS'];
        $sdate = $_POST['DOS-FROM']; 
        $edate = $_POST['DOS-TO']; 
        $status = $_POST['status'];
        $rows = [];
        $sql = "SELECT sr.ServiceRequestId,sr.UserId,sr.ServiceStartDate,sr.ZipCode,sr.ServiceHours,sr.ExtraHours,sr.SubTotal,sr.Discount,sr.TotalCost,sr.Comments,sr.JobStatus,
                sr.ServiceProviderId,sr.HasPets,sr.Status,sr.ModifiedDate,sr.ModifiedBy,sr.RefundedAmount,sr.HasIssue,sra.AddressLine1,sra.AddressLine2,sra.City,sra.State,
                sra.Mobile,sra.Email,sre.ServiceExtraId,CONCAT(u.FirstName,' ',u.LastName) as CusName FROM servicerequest as sr 
                JOIN servicerequestaddress as sra 
                    ON sr.ServiceRequestId = sra.ServiceRequestId
                JOIN servicerequestextra as sre
                    ON sr.ServiceRequestId = sre.ServiceRequestExtraId
                JOIN user as u 
                    ON u.UserId = sr.UserId
                WHERE sr.UserId LIKE '%$cid%' AND sr.ServiceProviderId LIKE '%$pid%' AND sr.ServiceRequestId LIKE '%$sid%' AND sr.Status LIKE '%$status%'";
        // AND sr.ServiceStartDate BETWEEN (`$sdate`,`$edate`)
        $result = $this->conn->query($sql);
        if ($result !== false && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $res = $this->getSPReatingsModel($row['ServiceRequestId'], $row['ServiceProviderId']);
                if (count($res) > 0) {
                    $row = $row + $res;
                }
                array_push($rows, $row);
            }
            return $rows;
        }
    }
    public function getSPReatingsModel($srid, $spid)
    {
        $id = $spid;
        $sql = "SELECT COUNT(*) as TotalRating,AVG(rating.Ratings) as AvarageRating, CONCAT(user.FirstName,' ',user.LastName) as FullName,user.UserProfilePicture FROM rating 
                JOIN user
                    ON user.UserId = rating.RatingTo
                WHERE rating.ServiceRequestId = $srid AND rating.RatingTo = $id";
        $res = $this->conn->query($sql);
        if ($res !== false && $res->num_rows > 0) {
            $result = $res->fetch_assoc();
        } else {
            $result = [];
        }
        return $result;
    }
    public function getUserCityDataModel($data)
    {
        $sql = "SELECT c.CityName as CityName,c.Id as CityId,s.StateName FROM zipcode as zc JOIN city as c ON zc.CityId = c.Id JOIN state as s ON s.Id = c.StateId WHERE zc.ZipcodeValue = '$data'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0 && $result != false) {
            return $result->fetch_assoc();
        }else{
            return [];
        }
    }


    public function getSearchOptionDataModel()
    {
        $rows = array();
        $sql = "SELECT UserId,CONCAT(u.FirstName,' ',u.LastName) as Name,u.UserTypeId FROM user as u WHERE u.UserTypeId IN (1,2)";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($rows, $row);
            }
            return $rows;
        }
    }

    public function editServiceRequestModel(){
        
    }
}
