<?php
require_once("dbconnection.php");
class customerDashModel
{
    public $data;

    public function __construct()
    {
        $connect = new DBConnection();
        $this->conn = $connect->Connection();
    }

    public function getServiceRequestDataModel($id, $status)
    {
        $sql = "SELECT sr.ServiceRequestId,sr.UserId,sr.ServiceStartDate,sr.ZipCode,sr.ServiceHourlyRate,sr.ServiceHours,sr.ExtraHours,sr.SubTotal,
                sr.TotalCost,sr.Comments,sr.ServiceProviderId,sr.SPAcceptedDate,sr.HasPets,sr.Status,sr.HasIssue,sra.AddressLine1,sra.AddressLine2,sra.City,sra.State,sra.PostalCode,sra.Mobile,sra.Email,sre.ServiceExtraId,u.Email as SPEmail,CONCAT(u.FirstName,' ',u.LastName) as FullName FROM `servicerequest` AS sr 
                JOIN servicerequestaddress AS sra
                    ON sra.ServiceRequestId = sr.ServiceRequestId
                LEFT JOIN servicerequestextra AS sre
                    ON sra.ServiceRequestId = sre.ServiceRequestId
                LEFT JOIN user as u
                    ON sr.ServiceProviderId = u.UserId
                WHERE sr.UserId = '$id' AND sr.Status IN $status";
        $result = $this->conn->query($sql);
        $services = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!is_null($row['ServiceProviderId'])) {
                    $spid = $row['ServiceProviderId'];
                    $sprating = $this->getRatingBySpId($spid);
                    if (count($sprating) > 0) {
                        $row = $row + $sprating;
                    }
                }
                array_push($services, $row);
            }
        }
        return $services;
    }

    public function getRatingBySpId($id)
    {
        $sql = "SELECT COUNT(*) as TotalRating,AVG(rating.Ratings) as AvarageRating, CONCAT(user.FirstName,' ',user.LastName) as FullName,user.UserProfilePicture FROM rating 
                JOIN user
                    ON user.UserId = rating.RatingTo
                WHERE rating.RatingTo = '$id'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $result = $result->fetch_assoc();
        } else {
            $result = [];
        }
        return $result;
    }

    public function resheduleDateAndTimeModel($data)
    {
        $id = $data['service-id'];
        $date = $data['rescheduled-date'] . " " . $data['rescheduled-time'] . ":00.000";
        $sql = "UPDATE servicerequest SET ServiceStartDate = '$date' WHERE ServiceRequestId = '$id'";
        return $this->conn->query($sql);
    }

    public function cancelServiceRequestModel($data)
    {
        $id = $data['service-id'];
        $issue = $data['Has-issue-text'];
        $sql = "UPDATE servicerequest SET HasIssue = '$issue', Status = 3 WHERE ServiceRequestId = '$id'";
        return $this->conn->query($sql);
    }

    public function rateServiceProviderModel($data)
    {
        $frate = $data['ota-rate'];
        $srate = $data['Friendly-rate'];
        $trate = $data['Qos-rate'];
        $comments = $data['rate-comments'];
        $ratefrom = $data['c-id'];
        $rateto = $data['sp-id'];
        $srid = $data['sr-id'];
        $rate = floatval(($frate + $srate + $trate) / 3);

        $sql = "INSERT INTO rating (`ServiceRequestId`, `RatingFrom`, `RatingTo`, `Ratings`, `Comments`, `RatingDate`, `OnTimeArrival`, `Friendly`, `QualityOfService`) 
                VALUES ( $srid, $ratefrom, $rateto, $rate, '$comments', now(), '$frate', '$srate', '$trate' )";
        return $this->conn->query($sql);
    }

    public function getFavProviderDataModel($id)
    {
        $sql = "SELECT fb.*, CONCAT(user.FirstName,' ', user.LastName) as FullName, user.UserProfilePicture FROM favoriteandblocked as fb 
                JOIN user 
                    ON user.UserId = fb.TargetUserId 
                WHERE fb.UserId = $id ";
        $result = $this->conn->query($sql);
        $favpro = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!is_null($row['TargetUserId'])) {
                    $target = $row['TargetUserId'];
                    $sprating = $this->getRatingBySpId($target);
                    if (count($sprating) > 0) {
                        $row = $row + $sprating;
                    }
                }
                array_push($favpro, $row);
            }
        }
        return $favpro;
    }

    public function addRemoveFavBlockModel($favstatus, $blockstatus)
    {
        $uid = $_POST['uid'];
        $tid = $_POST['tid'];
        $sql = "UPDATE favoriteandblocked SET IsFavorite = $favstatus , IsBlocked = $blockstatus WHERE UserId = $uid AND TargetUserId = $tid";
        return $this->conn->query($sql);
    }

    public function getUserAddressDataModel($data)
    {
        $rows = array();
        $sql = "SELECT ua.*,c.CityName,c.Id as CityId FROM useraddress as ua
                JOIN zipcode as zc
                    ON zc.ZipcodeValue = ua.PostalCode
                JOIN city as c 
                    ON zc.CityId = c.Id
                WHERE UserId = $data AND IsDeleted = 0";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            array_push($rows, $row);
        }
        return $rows;
    }

    public function getUserCityDataModel($data)
    {
        $sql = "SELECT c.* FROM zipcode as zc JOIN city as c ON zc.CityId = c.Id WHERE zc.ZipcodeValue = $data";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
    }

    public function getCityStateOfUser($cid, $pc)
    {
        $sql = "SELECT zc.ZipcodeValue,c.Id as CityId,c.CityName,s.StateName FROM `zipcode` as zc JOIN city as c ON zc.CityId = c.Id JOIN state as s ON s.Id = c.StateId WHERE zc.ZipcodeValue = '$pc' AND c.Id = '$cid'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $res = $result->fetch_assoc();
        }
        return $res;
    }

    public function userAddressupdateModel($data)
    {
        $al1 = $data['house'];
        $al2 = $data['street'];
        $pc = $data['PostalCode'];
        $cid = $data['AddressCity'];
        $phone = $data['phone'];
        $email = $data['Email'];
        $id = $data['data'];
        $uaid = $data['add-data'];
        $res = $this->getCityStateOfUser($cid, $pc);
        $state = $res['StateName'];
        $city = $res['CityName'];
        $sql = "UPDATE useraddress SET AddressLine1 = '$al1', AddressLine2 = '$al2', City = '$city', State = '$state', PostalCode = '$pc', Mobile = '$phone', Email = '$email'
                WHERE useraddress.UserId = $id AND AddressId = $uaid";
        return $this->conn->query($sql);
    }

    public function addNewUserAddressModel($data)
    {
        $al1 = $data['house'];
        $al2 = $data['street'];
        $pc = $data['PostalCode'];
        $cid = $data['AddressCity'];
        $phone = $data['phone'];
        $email = $data['Email'];
        $id = $data['data'];
        $res = $this->getCityStateOfUser($cid, $pc);
        $state = $res['StateName'];
        $city = $res['CityName'];
        $sql = "INSERT INTO useraddress ( `UserId`, `AddressLine1`, `AddressLine2`, `City`, `State`, `PostalCode`, `IsDefault`, `IsDeleted`, `Mobile`, `Email`) 
                VALUES ($id,'$al1','$al2','$city','$state','$pc',0,0,'$phone','$email')";
        return $this->conn->query($sql);
    }

    public function deleteUserAddressModel($data)
    {
        $uid = $data['uid'];
        $id = $data['id'];
        $sql = "UPDATE useraddress SET IsDeleted = 1 WHERE AddressId = '$id' AND UserId = '$uid' ";
        return $this->conn->query($sql);
    }

    public function getMyDetailModel($id)
    {
        $sql = "SELECT * FROM user WHERE UserId = '$id' AND UserTypeId = 1";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
    }

    public function myDetailUpdate($data)
    {
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

    public function setNewPassword($data)
    {
        $id = $data['user-logged-in-id'];
        $oldpass = trim($data['oldpass']);
        $pass = trim($data['newpass']);

        $sql = "SELECT Password FROM user WHERE UserId = '$id' AND Password = '$oldpass'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $sql = "UPDATE user 
                    SET Password = '$pass'
                    WHERE UserId = '$id'";
            return $this->conn->query($sql);
        } else {
            return False;
        }
    }
}
?>