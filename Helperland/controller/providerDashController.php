<?php
session_start();
include("model/providerDashModel.php");
include("controller/validation/userValidator.php");
include("controller/validation/myDetailValidation.php");
class providerDashController
{
    public $model;
    public function __construct()
    {
        $this->model = new providerDashModel();
    }

    // get MySetting Page Data
    public function getMySettingData()
    {
        $result = $this->model->getMySettingDataModel();
        echo json_encode($result);
    }

    // get PostalCode Data
    public function getUserCityData()
    {
        $postal = $_POST['postal'];
        $result = $this->model->getUserCityDataModel($postal);
        if (!empty($result)) {
            echo json_encode($result);
        } else {
            echo 0;
        }
    }

    // save service provider Details of Tab 1
    public function saveProviderDetail()
    {
        // validation
        $val = new userValidator($_POST);
        $res = $val->SPDetailValidation();
        if (count($res) <= 0) {
            $_POST['DOB'] = $_POST['year'] . "-" . $_POST['month'] . "-" . $_POST['date'];
            $result = $this->model->saveProviderDetailModel();
            echo $result;
        } else {
            echo json_encode($res);
        }
    }

    // save service provider password
    public function myPasswordUpdate()
    {
        $val = new myDetailValidation($_POST);
        $result = $val->passwordValidate();
        if (empty($result)) {
            $res = $this->model->setNewPasswordModel();
            echo $res;
        } else {
            echo $result['password'];
        }
    }

    // get service requests data of this service provider
    public function getServiceRequestData()
    {
        $status = '(0,1)';
        $NS = "OR sr.ServiceProviderId IS NULL";
        $result = $this->model->getServiceRequestDataModel($status, $NS);
        echo json_encode($result);
    }

    // get upcoming service request data
    public function getUpcomingServiceRequestData()
    {
        $status = '(2)';
        $NS = "";
        $result = $this->model->getServiceRequestDataModel($status, $NS);
        echo json_encode($result);
    }

    // get Service Provider's History of Service Requests
    public function getServiceHistoryData()
    {
        $status = '(4)';
        $NS = "";
        $result = $this->model->getServiceRequestDataModel($status, $NS);
        echo json_encode($result);
    }

    // get Service Provider's Ratings
    public function getServiceProviderReatings()
    {
        $result = $this->model->getServiceProviderRatingsModel();
        echo json_encode($result);
    }

    // get Customer Data Fro Block Page
    public function getCustomerBlockPage(){
        $result = $this->model->getCustomerBlockPageModel();
        echo json_encode($result);
    }

    // accept service request from new service request page
    public function acceptServiceRequest()
    {
        $st = $_POST['data'][1];
        $stsr = new DateTime($st);
        $newSST = floatval(str_replace('30', '5', str_replace(':', '.', substr($_POST['data'][1], 11, 5))));
        $newSET = str_replace('5', '30', str_replace('.', ':', ($newSST + floatval($_POST['data'][5]) + 1)));
        if (strlen($newSET) == 2) {
            $newSET = $newSET . ":00";
        } else if (strlen($newSET) == 1) {
            $newSET = "0" . $newSET . ":00";
        }
        $newSEDT = substr($_POST['data'][1], 0, 10) . " " . $newSET . ":00.000";
        $newSEDT = new DateTime($newSEDT);

        $_POST['spid'] = $_SESSION['user']['UserId'];
        $_POST['srid'] = $_POST['data'][0];
        $res = $this->model->checkServiceRequestModel();
        if (!empty($res)) {
            foreach ($res as $val) {
                $ASST = "";
                $ASET = "";
                $ASST = floatval(str_replace('30', '5', str_replace(':', '.', substr($val['ServiceStartDate'], 11, 5))));
                $ASET = str_replace('5', '30', str_replace('.', ':', (1 + $ASST + floatval($val['SubTotal']))));
                if (strlen($ASET) == 2) {
                    $ASET = $ASET . ":00";
                } else if (strlen($ASET) == 1) {
                    $ASET = "0" . $ASET . ":00";
                }
                $enddatetime = substr($val['ServiceStartDate'], 0, 10) . ' ' . $ASET . ':00.000';
                $startdatetime = $val['ServiceStartDate'];
                $sdt = new DateTime($startdatetime);
                $edt = new DateTime($enddatetime);
                if ($stsr >= $edt || $sdt >= $newSEDT) {
                    $result = $this->model->acceptServiceRequestModel();
                    echo $result;
                } else {
                    echo json_encode($val);
                    break;
                }
            }
        } else if (!$res) {
            $result = $this->model->acceptServiceRequestModel();
            echo $result;
        }
    }

    // send mail to all the provider working in the area
    public function getAllServiceProviderToMail()
    {
        $spid = $_SESSION['user']['UserId'];
        // return $this->model->getAllServiceProviderToMailModel($spid);
    }

    // cancel Service Request from Upcoming services page
    public function cancelServiceRequest()
    {
        $_POST['srid'] = $_POST['data'][0];
        $result = $this->model->cancelServiceRequestModel();
        echo $result;
    }

    // complete service request if completed
    public function completeServiceRequest()
    {
        $_POST['SPid'] = $_SESSION['user']['UserId'];
        $result = $this->model->completeServiceRequestModel();
        echo $result;
    }

    // Block Customer
    public function blockCustomer(){
        if($_POST['bc'] == 1){ $_POST['bc'] = 0; }
        else if($_POST['bc'] == 0){ $_POST['bc'] = 1; }
        $result = $this->model->blockCustomerModel();
        echo $result;
    }
    
}
