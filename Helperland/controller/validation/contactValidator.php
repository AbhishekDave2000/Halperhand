<?php

class contactValidator{
        public $data;
        public $errors = [];
        private static $filefield = "attachment";
        function __construct($data){
            $this->data = $data;
        }
        function Validator(){
            if(!isset($this->data["agree"])){
                $this->data["agree"] = "";
            }
            $this->validateagree(trim($this->data["agree"]));
            $this->validateMessage(trim($this->data["message"]));
            $this->validateSubject(trim($this->data["subject"]));
            $this->validateMobile(trim($this->data["phonenumber"]));
            $this->validateEmail(trim($this->data["email"]));
            $this->validateLastname(trim($this->data["lastname"]));
            $this->validateFirstname(trim($this->data["firstname"]));

            return $this->errors;
        } 
        public function validateFirstname($fname){
            if(empty($fname)){
                $this->addErrors("error","First-name can`t be empty");
            }else{
                if(!preg_match("/^[^@$!%*#?&]+$/", $fname)){
                    $this->addErrors("error","special charcater can't be accepted in First-name");
                }
            }
        }
    
        public function validateLastname($lname){
            if(empty($lname)){
                $this->addErrors("error","Last-name can`t be empty");
            }else{
                if(!preg_match("/^[^@$!%*#?&]+$/", $lname)){
                    $this->addErrors("error","special charcater can't be accepted in Last-name");
                }
            }
        }
        public function validateEmail($email){
            if(empty($email)){
                $this->addErrors("error","Email can`t be empty");
            }else{
                if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                    $this->addErrors("error","Email must be valid email");
                }
            }
        }
        public function validateMobile($mobile){
            if(empty($mobile)){
                $this->addErrors("error","Mobile No. can`t be empty");
            }else{
                if(!preg_match('/^[0-9]{10}$/',$mobile)){
                    $this->addErrors("error","Mobile No. must be 10 chars & number");
                }
            }
        }

        public function validateSubject($subject){
            $subject = strtolower($subject);
            if($subject == 'subject'){
                $this->addErrors("error","You have to select one subject!");
            }else{
                if(!in_array($subject, Config::SUBJECT_TYPE)){
                    $this->addErrors("error","Subject type is not validate");
                }
            }
        }

        public function validateMessage($message){
            if(empty($message)){
                $this->addErrors("error","Mesaage can`t be empty");
            }else{
                if(strlen($message) > Config::MESSAGE_MAX_LENGTH){
                    $this->addErrors("error","Message can't be longer than ".Config::MESSAGE_MAX_LENGTH." characters");
                } 
            }
        }

        public function validateagree($policy){
            if(empty($policy)){
                $this->addErrors("error","privacy & policy must be accepted");
            }
        }
    
        public function isFileValidate($file){
            // echo "0";
            if(isset($file[self::$filefield])){
                // echo "1";
                $file_arr = $file[self::$filefield];
                $file_extension = strtolower(pathinfo($file_arr["name"], PATHINFO_EXTENSION));
                if($file_arr['size'] >= Config::FILE_MAX_SIZE){
                    return ["error", "File can't be extend the max-size: ".Config::FILE_MAX_SIZE/(1024*1024)."MB) "];
                }
                if(!in_array($file_extension, Config::FILE_EXTENSION)){
                    return ["error", "File Type is not acceptable"];
                }
            }
            // echo "3";
            // exit();
            return [];
        }

        private function addErrors($key, $value){
            $this->errors[$key] = $value;
        }
    }
?>