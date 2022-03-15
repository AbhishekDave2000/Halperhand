<?php
include('model/dbconnection.php');
class adminDashModel
{

    public function __construct()
    {
        $conn = new DBConnection();
        $this->conn = $conn->Connection();
    }

    // service request page model start
    public function getAdminServiceRequestDataModel()
    {
        $rows = [];
        $sql = "SELECT sr.ServiceRequestId,sr.UserId,sr.ServiceStartDate,sr.ZipCode,sr.ServiceHours,sr.ExtraHours,sr.SubTotal,sr.Discount,sr.TotalCost,sr.Comments,sr.JobStatus,
                    sr.ServiceProviderId,sr.HasPets,sr.Status,sr.ModifiedDate,sr.ModifiedBy,sr.RefundedAmount,sr.HasIssue,sra.AddressLine1,sra.AddressLine2,sra.City,sra.State,
                    sra.Mobile,sra.Email,sre.ServiceExtraId,CONCAT(u.FirstName,' ',u.LastName) as CusName,sr.RefundedAmount,sr.RefundReason FROM servicerequest as sr 
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
                WHERE sr.UserId LIKE '%$cid%' AND sr.ServiceProviderId LIKE '%$pid%' AND sr.ServiceRequestId LIKE '%$sid%' AND sr.ServiceStartDate BETWEEN '$sdate' AND '$edate' AND sr.Status LIKE '%$status%'";
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
        } else {
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
    public function editServiceRequestModel()
    {
        $admin = $_POST['admin'];
        $sr = $_POST['Service-id'];
        $date = $_POST['DT'];
        $street = $_POST['street'];
        $house = $_POST['house'];
        $postal = $_POST['postal'];
        $city = $_POST['city'];
        $reason = $_POST['Reason-Res'];

        $sql = "UPDATE servicerequest SET ServiceStartDate = '$date',ZipCode = '$postal', ModifiedDate = now(), HasIssue = '$reason',ModifiedBy = '$admin' WHERE ServiceRequestId = '$sr'";
        $result = $this->conn->query($sql);
        if ($result) {
            $add = $this->getUserCityDataModel($postal);
            $state = $add['StateName'];

            $sql = "UPDATE servicerequestaddress SET AddressLine1 = '$house' , AddressLine2 = '$street' , City = '$city' , State = '$state' , PostalCode = '$postal' WHERE ServiceRequestId = '$sr' ";
            $res = $this->conn->query($sql);
            return $res;
        } else {
            return $result;
        }
    }
    public function refundServiceRequestAmountModel()
    {
        $srid = $_POST['srid'];
        $refund = $_POST['ramount'];
        $comment = $_POST['comment'];

        $sql = "UPDATE servicerequest SET RefundedAmount = '$refund' , RefundReason = '$comment' WHERE ServiceRequestId = '$srid'";
        return $this->conn->query($sql);
    }
    public function getProviderToMail()
    {
        $rows = array();
        $sr = $_POST['Service-id'];
        $postal = $_POST['postal'];
        $sql = "SELECT u.Email FROM `user` as u 
                RIGHT JOIN servicerequest as sr 
                    ON u.UserId = sr.ServiceProviderId
                WHERE u.UserTypeId = 2 AND sr.ServiceRequestId = $sr AND u.ZipCode = '$postal'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0 && $result != false) {
            while ($row = $result->fetch_assoc()) {
                array_push($rows, $row);
            }
            return $rows;
        } else {
            return 0;
        }
    }
    public function getMultiProviderModel()
    {
        $postal = $_POST['postal'];
        $rows = array();
        $sql = "SELECT u.Email FROM user as u WHERE u.UserTypeId = 2 AND u.ZipCode = '$postal'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0 && $result != false) {
            while ($row = $result->fetch_assoc()) {
                array_push($rows, $row);
            }
            return $rows;
        }
    }
    // service request page model end

    // user management page model start
    public function getAdminPageUserModel()
    {
        $rows = array();
        $sql = "SELECT u.UserId,u.FirstName,u.LastName,u.Email,u.Mobile,u.UserTypeId,u.RoleId,u.Gender,u.DateOfBirth,u.UserProfilePicture,
                u.ZipCode,u.LanguageId,u.NationalityId,u.IsApproved,u.IsActive,u.IsDeleted,u.Status,c.CityName FROM `user` as u
                LEFT JOIN zipcode as zc
                    ON zc.ZipcodeValue = u.ZipCode
                LEFT JOIN city as c
                    ON c.Id = zc.CityId
                WHERE u.UserTypeId != 3";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($rows, $row);
            }
            return $rows;
        }
    }
    public function setUserStatusesModel()
    {
        $uid = $_POST['uid'];
        $active = $_POST['active'];
        $approve = $_POST['approve'];
        $delete = $_POST['delete'];
        $sql = "UPDATE user SET IsActive = $active , IsApproved = $approve , IsDeleted = $delete WHERE UserId = $uid ";
        return $this->conn->query($sql);
    }
    public function getUserManagementSearchDataModel()
    {
        $id = $_POST['username'];
        $type = $_POST['usertype'];
        $phone = $_POST['phone'];
        $postal = $_POST['postal'];
        $email = $_POST['email'];
        $from = $_POST['from-date'];
        $to = $_POST['to-date'];
        $rows = array();
        $sql = "SELECT u.UserId,u.FirstName,u.LastName,u.Email,u.Mobile,u.UserTypeId,u.RoleId,u.Gender,u.DateOfBirth,u.UserProfilePicture,
                u.ZipCode,u.LanguageId,u.NationalityId,u.IsApproved,u.IsActive,u.IsDeleted,u.Status,c.CityName FROM `user` as u
                LEFT JOIN zipcode as zc
                    ON zc.ZipcodeValue = u.ZipCode
                LEFT JOIN city as c
                    ON c.Id = zc.CityId
                WHERE u.UserTypeId != 3 AND u.UserId LIKE '%$id%' AND u.UserTypeId LIKE '%$type%' AND u.Mobile LIKE '%$phone%' AND u.Email LIKE '%$email%' AND u.ZipCode LIKE '%$postal%' AND u.CreatedDate BETWEEN '$from' AND '$to'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0 && $result != false) {
            while ($row = $result->fetch_assoc()) {
                array_push($rows, $row);
            }
            return $rows;
        }
    }
    public function getSearchDataUMModel()
    {
        $rows = array();
        $sql = "SELECT u.FirstName,u.LastName,u.UserId,u.UserTypeId FROM user as u WHERE u.UserTypeId != 3";
        $result = $this->conn->query($sql);
        if ($result != false && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($rows, $row);
            }
            return $rows;
        }
    }
    // user management page model end

}
