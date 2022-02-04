<?php
include("model/contactModel.php");
include("phpmailer/mail.php");
include("controller/validation/contactValidator.php");
class contactController
{
    public $post;
    public $base_url = "localhost/Tatvasoft/Halperland/";
    public function __construct($post)
    {
        $this->post = $post;
    }
    public function insertContact()
    {
        //validate the data
        $validate = new contactValidator($this->post);
        $errors = $validate->Validator();

        if (!count($errors) > 0) {
            //attachment file
            $filepath = "";
            $filename = "";
            if (isset($_FILES['attachment'])) {
                $filerrors = $validate->isFileValidate($_FILES);
                print_r($filerrors);

                if(!count($filerrors) > 0) {
                    $filename = $_FILES['attachment']['name'];
                    $filepath = "assets/attachments/" . $filename;
                    $temp_file_path = $_FILES['attachment']['tmp_name'];
                    if (!move_uploaded_file($temp_file_path, $filepath)) {
                        header("Location: errors.php?error=file not uploaded!");
                        exit();
                    }
                }else{
                    header("Location: errors.php?error=File is not validated!");  
                }
            }

            //insert data into table
            $_POST['filepath'] = $filepath;
            $_POST['filename'] = $filename;
            $contactus = new contactModel($_POST);
            $result = $contactus->insertContactData();
            if ($result) {
                //send mail
                $this->contactMail();
            }
            //redirect to contact page
            header('Location: ?controller=Default&function=contactpage');
            exit();
        }
        else{
            header("Location: errors.php?error=Form is not validated!");
            exit();
        }
    }
    public function contactMail()
    {
        $subject = $this->post['subject'];
        $message = $this->post['message'];
        $name = $this->post['firstname'] . " " . $this->post['lastname'];
        $filepath = $_POST['filepath'];
        $html = "
                <p style='font-size:18px;'>You have message from: {$name}</p>
                <hr>
                <p style='font-size:18px;'> The subject of message is: {$subject}</p>
                <p style='font-size:16px;'>{$message}</p>";
        sendmail(Config::ADMIN_EMAIL, $name, $html, $filepath);
    }
}

$contact = new contactController($_POST);
if (isset($_POST['submit'])) {
    $contact->insertContact();
}
