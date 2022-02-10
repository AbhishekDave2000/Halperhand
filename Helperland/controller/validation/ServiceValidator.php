<?php
class ServiceValidator{
    public $errors = [];
    public function __construct(){   

    }
    public function postalcodeValidator($postal){
        if(empty($postal)){
            $this->addErrors("postalcode","Postalcode can't be empty!");
        }elseif(strlen($postal) < 5){
            $this->addErrors("postalcode","Postal Code must be 5 characters long!");
        }
        return $this->errors;
    }

    private function addErrors($key, $value){
        $this->errors[$key] = $value;
    }
}
?>
