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
                    echo $result['ZipcodeValue'];
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
            if (!empty($result)) {
                $address = $m->AddressModel();
                echo json_encode($address);
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
        $e = array('extra-cabinates','extra-oven','extra-laundry','extra-window','extra-fridge','pets-at-home');
        for($i = 0; $i < count($e); $i++){
            if(!isset($_POST[$e[$i]])){
                $_POST[$e[$i]] = 0;
            }
        }
        $extra = array($_POST['extra-cabinates'], $_POST['extra-oven'], $_POST['extra-laundry'], $_POST['extra-window'], $_POST['extra-fridge']);
        $count = 0;
        for ($i = 0; $i < count($extra); $i++) {
            if ($extra[$i] != 0) {
                $count += 0.5;
            }
        }
        $_POST['service-hourly-rate'] = 18;
        $_POST['extra-hours'] = $count;
        $_POST['service-hours'] = $_POST['service-hours-select'] - $_POST['extra-hours'];
        $_POST['total-cost'] = $_POST['service-hours-select'] * 18;

        // send all the data to model addrequestmodel *** FIRST STEP
        $m = new ServiceModel($_POST);
        $result = $m->addServiceRequest();
        if ($result != 0) {
            // add service request address *** SECOND STEP
            $res = $m->addServiceRequestAddress($result);

            // add extra services of last service request *** THIRD STEP
            $serviceextra = new ServiceModel($result);
            for ($i = 0; $i < count($extra); $i++) {
                if ($extra[$i] != 0) {
                    $e = $serviceextra->addExtraServices($extra[$i]);
                    if(!$e){
                        echo 0;
                    }
                }
            }

            if (!$res) {
                echo 0;
            } else {
                // Send Mail to provider *** FOURTH STEP
                $Date = $_POST['date-of-cleaning'];
                $time = $_POST['service-hours-select'];
                $start_time = $_POST['service-start-time'];
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
            }
        } else {
            echo 0;
        }
    }
}
