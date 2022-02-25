<?php
// include("dbconnection.php");
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
                sr.TotalCost,sr.Comments,sr.ServiceProviderId,sr.SPAcceptedDate,sr.HasPets,sr.Status,sr.HasIssue,sra.AddressLine1,sra.AddressLine2,sra.City,sra.State,sra.PostalCode,sra.Mobile,sra.Email,sre.ServiceExtraId,CONCAT(u.FirstName,' ',u.LastName) as FullName FROM `servicerequest` AS sr 
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
