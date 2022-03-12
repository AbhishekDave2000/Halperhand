<?php 

class adminValidate{
    public $errors = [];

    public function editServicevalidate(){
        $street = $_POST['street'];
        $house = $_POST['house'];
        $postal = $_POST['postal'];
        $city = $_POST['city'];

        $this->streetValidator($street);
        $this->houseValidator($house);
        $this->postalValidator($postal);
        $this->cityValidator($city);

        return $this->errors;
    }

    public function  streetValidator($street)
    {
        if (empty($street)) {
            $this->addErrors("error", "Street Name can not be empty!");
        }
    }
    public function  houseValidator($house)
    {
        if (empty($house)) {
            $this->addErrors("error", "House Name can not be empty!");
        }
    }
    public function  cityValidator($city)
    {
        if (empty($city)) {
            $this->addErrors("error", "City Name can not be empty!");
        }
    }

    public function  postalValidator($postal)
    {
        if (empty($postal)) {
            $this->addErrors("error", "Postal Code can not be empty!");
        } else if (strlen($postal) < 5) {
            $this->addErrors("error", "Postal Code must be 6 char long!");
        }
    }
    
    private function addErrors($key, $value)
    {
        $this->errors[$key] = $value;
    }
}
 
?>