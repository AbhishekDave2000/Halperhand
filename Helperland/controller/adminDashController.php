<?php
include('model/adminDashModel.php');
include('controller/validation/adminvalidate.php');
session_start();
class adminDashController
{
    public $model;

    public function __construct()
    {
        $this->model = new adminDashModel();
    }

    // get service request data for service request page
    public function getAdminServiceRequestData()
    {
        $result = $this->model->getAdminServiceRequestDataModel();
        echo json_encode($result);
    }

    // search data of admin page service request data
    public function getServiceRequestSearchData()
    {
        if ($_POST['DOS-FROM'] == "" || $_POST['DOS-FROM'] == null) {
            $_POST['DOS-FROM'] = '2020-01-01 00:00:00.000';
        } else {
            $_POST['DOS-FROM'] = $_POST['DOS-FROM'] . ' ' . "00:00:00.000";
        }
        if ($_POST['DOS-TO'] == "" || $_POST['DOS-TO'] == null) {
            $_POST['DOS-TO'] = date("Y-m-d") . ' :00:00:00.000';
        } else {
            $_POST['DOS-TO'] = $_POST['DOS-TO'] . ' ' . "00:00:00.000";
        }
        $result = $this->model->getSearchedDataModel();
        echo json_encode($result);
    }

    // get user-management page data
    public function getAdminPageUserData()
    {
        $result = $this->model->getAdminPageUserModel();
        echo json_encode($result);
    }
    public function setUserStatuses()
    {
        $change = $_POST['set_status'];
        if ($change == 1) {
            if ($_POST['active'] == 1) {
                $_POST['active'] = 0;
            } else {
                $_POST['active'] = 1;
            }
        } else if ($change == 2) {
            if ($_POST['approve'] == 1) {
                $_POST['approve'] = 0;
            } else {
                $_POST['approve'] = 1;
            }
        }
        echo $this->model->setUserStatusesModel();
    }

    // searc option data
    public function getSearchOptionDataSR()
    {
        $result = $this->model->getSearchOptionDataModel();
        echo json_encode($result);
    }

    // edit service request data
    public function editServiceRequest()
    {
        $et = floatval($_POST['Service-end']);
        $st = floatval(str_replace(':', '.', str_replace(':3', '.5', $_POST['rescheduled-time'])));
        $endtime = $et + $st;
        if ($endtime <= 21) {
            $val = new adminValidate();
            $error = $val->editServicevalidate();
            if (count($error) <= 0) {
                $_POST['admin'] = $_SESSION['user']['UserId'];
                $_POST['DT'] = $_POST['date'] . ' ' . $_POST['rescheduled-time'] . ':00.000';
                $result = $this->model->editServiceRequestModel();
                echo $result;
            } else {
                echo $error['error'];
            }
        } else {
            echo 2;
        }
    }

    // refund amount of service request
    public function refundServiceRequestAmount()
    {
        $_POST['ramount'] = ($_POST['payment'] * $_POST['percentage']) + $_POST['previous-refund'];
        $result = $this->model->refundServiceRequestAmountModel();
        echo $result;
    }
}
