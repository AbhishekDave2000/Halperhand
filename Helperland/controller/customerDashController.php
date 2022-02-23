<?php
include("controller/validation/myDetailValidation.php");
require_once("model/customerDashModel.php");
class customerDashController{
    public $data;
    public $model;

    public function __construct(){
        $this->model = new customerDashModel();
    }

    public function getServiceRequestData(){
        $id = $_POST['userid'];
        $result = $this->model->getServiceRequestDataModel($id);
        // echo json_encode($result);
        include 'view/includes/customer/dashboard.php';
    }

    public function getMyDetail(){
        $id = $_POST['id'];
        $result = $this->model->getMyDetailModel($id);
        echo json_encode($result);
    }

    public function myDetailUpdate(){
        $val = new myDetailValidation($_POST);
        $result = $val->Validation();
        if(empty($result)){
            $_POST['DOB'] = $_POST['DOB_Year'].'-'.$_POST['DOB_Month'].'-'.$_POST['DOB_Date'];
            $result = $this->model->myDetailUpdate($_POST);
            if($result){
                header("Location:".Config::base_url."?controller=Default&function=customerDash&parameter=mysetting");
                exit();
            }else{
                header("Location: errors.php?error=Details didn't change try again!");
                exit();
            }
        }else{
            header("Location: errors.php?error=Something went wrong woth details try again!");
            exit();
        }
    } 

    public function myPasswordUpdate(){
        $val = new myDetailValidation($_POST);
        $result = $val->passwordValidate();
        if(empty($result)){
            $res = $this->model->setNewPassword($_POST);
            if($res){
                header("Location:".Config::base_url."?controller=Default&function=customerDash&parameter=mysetting");
                exit();
            }else if($res == False){
                header("Location: errors.php?error=Old Password Does not match with your password Enter correct password!");
                exit();
            }else{
                header("Location: errors.php?error=Password didn't change try again!");
                exit();
            }
        }else{
            header("Location: errors.php?error=".$result['password']);
            exit();
        }
    }


}

?>