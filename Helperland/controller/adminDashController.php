<?php 
include('model/adminDashModel.php');
include('controller/validation/adminvalidate.php');
class adminDashController{
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
    public function getServiceRequestSearchData(){
        if($_POST['DOS-FROM'] == "" || $_POST['DOS-FROM'] == null){
            $_POST['DOS-FROM'] = new DateTime('2020-01-01 00:00:00.000');
        }
        if($_POST['DOS-TO'] == "" || $_POST['DOS-TO'] == null){
            $_POST['DOS-TO'] = 'now()';
        }
        $result = $this->model->getSearchedDataModel();
        echo json_encode($result);
    }

    // searc option data
    public function getSearchOptionDataSR(){
        $result = $this->model->getSearchOptionDataModel();
        echo json_encode($result);
    }

    // edit service request data
    public function editServiceRequest(){
        $val = new adminValidate();
        $error = $val->editServicevalidate();
        if(count($error) <= 0){
            $result = $this->model->editServiceRequestModel();
            echo $result;
        }else{
            echo $error['error'];
        }
    }

}
?>