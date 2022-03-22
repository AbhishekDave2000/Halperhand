<?php
include("model/contactModel.php");
include("phpmailer/mail.php");
include("controller/validation/contactValidator.php");
class contactController
{
    public $post;
    public $base_url = "localhost/Tatvasoft/Halperland/";

    public function insertContact()
    {
        //validate the data
        $validate = new contactValidator($_POST);
        $errors = $validate->Validator();
        if (count($errors) <= 0) {
            //attachment file
            $filepath = "";
            $filename = "";
            if (isset($_FILES['attachment']) && !empty($_FILES['attachment']['name'])) {
                $filerrors = $validate->isFileValidate($_FILES);
                if (count($filerrors) <= 0) {
                    $filename = $_FILES['attachment']['name'];
                    $filepath = "assets/attachments/" . $filename;
                    $temp_file_path = $_FILES['attachment']['tmp_name'];
                    if (!move_uploaded_file($temp_file_path, $filepath)) {
                        header('Location: errors.php?error=File did not uploaded!');
                        exit;
                    }
                } else {
                    header('Location: errors.php?error=Something wrong with Validation!');
                    exit;
                }
            }
            $_POST['filepath'] = $filepath;
            $_POST['filename'] = $filename;
            
            $contactus = new contactModel($_POST);
            $result = $contactus->insertContactData();
            if ($result) {
                $this->contactMail();
            }
            header('Location: http://localhost/Halperhand/Helperland/?controller=Default&function=homepage');
            exit;
        } else {
            header('Location: errors.php?error='.$errors['error']);
            exit;
        }
    }

    public function contactMail()
    {
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $name = $_POST['firstname'] . " " . $_POST['lastname'];
        $filepath = $_POST['filepath'];
        $html = "<span style='font-size:16px;'><strong>You have message from : </strong>{$name}</span><br>
                <span style='font-size:16px;'><strong>The subject of message is : </strong>{$subject}</span><br>
                <span style='font-size:16px;'><strong>Message : </strong>{$message}</span>";

        sendmail(Config::ADMIN_EMAIL, 'You have been contacted by : '.$name, $html, $filepath);
    }   
}
