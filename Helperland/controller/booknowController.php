<?php
include("model/ServiceModel.php");
include("controller/validation/ServiceValidator.php");

class booknowController{
    public $errors = [];
    public function __construct(){
        
    }
    public function postalCodeCheck(){
        if(isset($_POST['postalcode'])){
            $zip = $_POST['postalcode'];
            // validate the postalcode
            $validate = new ServiceValidator();
            $error = $validate->postalcodeValidator($zip);
            
            if(count($error) < 1){
                // check it exists or not            
                $m = new ServiceModel($zip);
                $result = $m->PostalCheckModel();
                if(!empty($result)){
                    echo $result['ZipcodeValue'];
                }else{
                    echo 0;
                }
            }
        }else{
            echo 'failed!';
        }
    }
}

?>