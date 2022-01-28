<?php

class contactValidator{
        public $data;
        public $errors = [];
        private static $contactusfield = ['firstname', 'lastname', 'phonenumber', 'email', 'subject', 'message', 'agree'];
        private static $filefield = "attachment";
        function __construct($data){
            $this->data = $data;
        }
        function Validator(){
            if(!isset($this->data["agree"])){
                $this->data["agree"] = "";
            }
            foreach(self::$contactusfield as $field){
                if(!array_key_exists($field, $this->data)){
                    header("Location: ../errors.php?error=something went wrong with fieldname");
                    exit();
                }
            }
            $this->validateFirstname(trim($this->data["firstname"]));
            $this->validateLastname(trim($this->data["lastname"]));
            $this->validateEmail(trim($this->data["email"]));
            $this->validateMobile(trim($this->data["phonenumber"]));
            $this->validateSubject(trim($this->data["subject"]));
            $this->validateMessage(trim($this->data["message"]));
            $this->validateagree(trim($this->data["agree"]));

            return $this->errors;
        } 
        public function validateFirstname($fname){
            if(empty($fname)){
                $this->addErrors("firstname","field can`t be empty");
            }else{
                if(!preg_match("/^[^@$!%*#?&]+$/", $fname)){
                    $this->addErrors("firstname","special charcater can't be accepted");
                }
            }
        }
    
        public function validateLastname($lname){
            if(empty($lname)){
                $this->addErrors("lastname","field can`t be empty");
            }else{
                if(!preg_match("/^[^@$!%*#?&]+$/", $lname)){
                    $this->addErrors("lastname","special charcater can't be accepted");
                }
            }
        }
        public function validateEmail($email){
            if(empty($email)){
                $this->addErrors("email","field can`t be empty");
            }else{
                if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                    $this->addErrors("email","email must be valid email");
                }
            }
        }
        public function validateMobile($mobile){
            if(empty($mobile)){
                $this->addErrors("mobile","field can`t be empty");
            }else{
                if(!preg_match('/^[0-9]{10}$/',$mobile)){
                    $this->addErrors("mobile","length must be 10 chars & number");
                }
            }
        }

        public function validateSubject($subject){
            $subject = strtolower($subject);
            if(empty($subject)){
                $this->addErrors("subject","field can`t be empty");
            }else{
                if(!in_array($subject, Config::SUBJECT_TYPE)){
                    $this->addErrors("subject","Subject type is not validate");
                }
            }
        }

        public function validateMessage($message){
            if(empty($message)){
                $this->addErrors("message","field can`t be empty");
            }else{
                if(strlen($message) > Config::MESSAGE_MAX_LENGTH){
                    $this->addErrors("message","Message can't be longer than ".Config::MESSAGE_MAX_LENGTH." characters");
                } 
            }
        }

        public function validateagree($policy){
            if(empty($policy)){
                $this->addErrors("policy","privacy & policy must be accepted");
            }
        }
    
        public function isFileValidate($file){
            echo "0";
            if(isset($file[self::$filefield])){
                echo "1";
                $file_arr = $file[self::$filefield];
                $file_extension = strtolower(pathinfo($file_arr["name"], PATHINFO_EXTENSION));
                if($file_arr['size'] >= Config::FILE_MAX_SIZE){
                    return ["file-size", "File can't be extend the max-size: ".Config::FILE_MAX_SIZE/(1024*1024)."MB) "];
                }
                if(!in_array($file_extension, Config::FILE_EXTENSION)){
                    return ["file-extension", "File Type is not acceptable"];
                }
            }
            echo "3";
            exit();
            return [];
        }

        private function addErrors($key, $value){
            $this->errors[$key] = $value;
        }
    }
?>