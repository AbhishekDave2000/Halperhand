<?php
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
}
