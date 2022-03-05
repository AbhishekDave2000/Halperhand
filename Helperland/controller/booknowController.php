<?php
include("controller/validation/ServiceValidator.php");
include("model/ServiceModel.php");
include("controller/phpmailer/mail.php");

class booknowController
{
    public $errors = [];
    public $val;
    public function __construct()
    {
        $this->val = new ServiceValidator();
    }

    public function postalCodeCheck()
    {
        if (isset($_POST['postalcode'])) {
            $zip = $_POST['postalcode'];
            // validate the postalcode
            $error = $this->val->postalcodeValidator($zip);
            // print_r($error);
            if (count($error) < 1) {
                // check it exists or not            
                $m = new ServiceModel($zip);
                $result = $m->PostalCheckModel();
                if (!empty($result)) {
                    // echo $result['ZipcodeValue'];
                    echo json_encode($result);
                } else {
                    echo 0;
                }
            } else {
                echo $error['postalcode'];
            }
        } else {
            echo 'Please try again';
        }
    }


    public function getUserAddress()
    {
        // send userid to model and select address of user
        $m  = new ServiceModel($_POST);
        $result = $m->AddressModel();
        if (!empty($result)) {
            echo json_encode($result);
        } else {
            echo 0;
        }
    }


    public function addNewAddress()
    {
        // validation of field
        $err = $this->val->userAddressValidator($_POST);
        if (empty($err)) {
            // add to the database
            $m = new ServiceModel($_POST);
            $result = $m->addAddressModel();
            if ($result != 0) {
                echo json_encode($result);
            } else {
                echo "Address is not added";
            }
        } else {
            echo $err['addfield'];
        }
    }


    public function getFavPros()
    {
        // get favourite service provider from model
        $m = new ServiceModel($_POST);
        $result = $m->getFavProsModel();
        if ($result) {
            echo json_encode($result);
        } else {
            echo "No Faviourite Provider";
        }
    }


    public function addServiceRequest()
    {
        if(!isset($_POST['pets-at-home'])){
            $_POST['pets-at-home'] = 0;
        }
        
        if(!isset($_POST['extra'])){
            $_POST['extra'] = [0];
            $count = 0;
        }else{
            $extra = $_POST['extra'];
            $count = count($extra)*0.5;
        }
        $_POST['service-hourly-rate'] = 18;
        $_POST['extra-hours'] = $count;
        $_POST['service-hours'] = $_POST['service-hours-select'] + $_POST['extra-hours'];
        $_POST['total-cost'] = $_POST['service-hours'] * 18;
        $time_str = $_POST['service-start-time'];
        if (preg_match("/.5/", $time_str)) {
            $time = str_replace('.5', ':3', $time_str);
        } else {
            $time = str_replace('.', ':', $time_str);
        }
        $_POST['service-start-date-time'] = $_POST['date-of-cleaning'] . ' ' . $time . '0:00.000';
        // send all the data to model addrequestmodel *** FIRST STEP
        $m = new ServiceModel($_POST);
        $result = $m->addServiceRequest();
        if ($result != 0) {
            // add service request address *** SECOND STEP
            $res = $m->addServiceRequestAddress($result);

            // add extra services of last service request *** THIRD STEP
            $serviceextra = new ServiceModel($result);
            $e = $serviceextra->addExtraServices($_POST['extra']);
            if (!$e) {
                echo 0;
                exit;
            }else if (!$res) {
                echo 0;
                exit;
            } else {
                // Send Mail to provider *** FOURTH STEP
                $Date = $_POST['date-of-cleaning'];
                $time = str_replace(".",":",str_replace(".5",":30",($_POST['service-hours-select']+$count)));
                $start_time = str_replace(".",":",str_replace(".5",":30",$_POST['service-start-time']));
                if ($_POST['pets-at-home'] == 1) {
                    $pets = "<span style='color:green; font-size:16px;'>Customer Has Pets</span>";
                } else {
                    $pets = "<span style='color:red; font-size:16px;'>Customer Does not have pets!</span>";
                }
                $html = "<p style='font-size:18px;'>You Have new Service Request!</p>
                        <hr>
                        <span style='font-size:15px;'><b>Service Date : </b>{$Date}</span><br>
                        <span style='font-size:15px;'><b>Service Start Time : </b>{$start_time}</span><br>
                        <span style='font-size:15px;'><b>Total Hours : </b>{$time}</span><br>
                        {$pets}";
                if (isset($_POST['favrioute-provider'])) {
                    // if favourite provider is selected
                    $favpro = $m->getFavProForEmail();
                    sendmail($favpro['Email'], "Service Request", $html);
                } else {
                    // if favourite provider is not selected
                    $favpros = $m->getFavMultiProForEmail();
                    for ($i = 0; $i < count($favpros); $i++) {
                        sendmail($favpros[$i]['Email'], "Service Request", $html);
                    }
                }
                echo $result;
                exit;
            }
        } else {
            echo 0;
            exit;
        }
    }
}
