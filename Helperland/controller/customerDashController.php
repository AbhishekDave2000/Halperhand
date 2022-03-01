<?php
include("controller/validation/myDetailValidation.php");
include("controller/validation/ServiceValidator.php");
require_once("model/customerDashModel.php");
class customerDashController
{
    public $data;
    public $model;

    public function __construct()
    {
        $this->model = new customerDashModel();
    }

    public function getServiceRequestData($status)
    {
        $id = $_POST['userid'];
        $result = $this->model->getServiceRequestDataModel($id, $status);
        return $result;
    }

    public function getMyDetail()
    {
        $id = $_POST['id'];
        $result = $this->model->getMyDetailModel($id);
        echo json_encode($result);
    }

    public function resheduleDateAndTime()
    {
        $result = $this->model->resheduleDateAndTimeModel($_POST);
        print_r($result);
    }

    public function cancelServiceRequest()
    {
        $result = $this->model->cancelServiceRequestModel($_POST);
        print_r($result);
    }

    public function rateServiceProvider()
    {
        // validation of rating
        $val = new myDetailValidation($_POST);
        $res = $val->rateValidation();
        if (empty($res)) {
            $result = $this->model->rateServiceProviderModel($_POST);
            print_r($result);
        } else {
            echo 0;
            exit;
        }
    }

    public function getFavProviderData()
    {
        $id = $_POST['id'];
        $result = $this->model->getFavProviderDataModel($id);
        echo json_encode($result);
    }

    public function getUserAddressData()
    {
        $id = $_POST['data'];
        $result = $this->model->getUserAddressDataModel($id);
        echo json_encode($result);
    }

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

    public function userAddressupdate()
    {
        $val = new ServiceValidator();
        $result = $val->userNewAddressValidator($_POST);
        if (empty($result)) {
            $result = $this->model->userAddressupdateModel($_POST);
            if ($result) {
                $id = $_POST['data'];
                $res = $this->model->getUserAddressDataModel($id);
                echo json_encode($res);
            } else {
                echo 0;
            }
        }
    }

    public function addNewUserAddress()
    {
        $val = new ServiceValidator();
        $result = $val->userNewAddressValidator($_POST);
        if (empty($result)) {
            $result = $this->model->addNewUserAddressModel($_POST);
            if ($result) {
                $id = $_POST['data'];
                $res = $this->model->getUserAddressDataModel($id);
                echo json_encode($res);
            } else {
                echo 0;
            }
        }
    }

    public function deleteUserAddress()
    {
        $result = $this->model->deleteUserAddressModel($_POST);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function myDetailUpdate()
    {
        $val = new myDetailValidation($_POST);
        $result = $val->Validation();
        if (empty($result)) {
            $_POST['DOB'] = $_POST['DOB_Year'] . '-' . $_POST['DOB_Month'] . '-' . $_POST['DOB_Date'];
            $result = $this->model->myDetailUpdate($_POST);
            if ($result) {
                header("Location:" . Config::base_url . "?controller=Default&function=customerDash&parameter=mysetting");
                exit();
            } else {
                header("Location: errors.php?error=Details didn't change try again!");
                exit();
            }
        } else {
            header("Location: errors.php?error=Something went wrong woth details try again!");
            exit();
        }
    }

    public function myPasswordUpdate()
    {
        $val = new myDetailValidation($_POST);
        $result = $val->passwordValidate();
        if (empty($result)) {
            $res = $this->model->setNewPassword($_POST);
            if ($res) {
                header("Location:" . Config::base_url . "?controller=Default&function=customerDash&parameter=mysetting");
                exit();
            } else if ($res == False) {
                header("Location: errors.php?error=Old Password Does not match with your password Enter correct password!");
                exit();
            } else {
                header("Location: errors.php?error=Password didn't change try again!");
                exit();
            }
        } else {
            header("Location: errors.php?error=" . $result['password']);
            exit();
        }
    }
}
