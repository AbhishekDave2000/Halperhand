<?php  

class Config{
    
    /*------------ Database Constant ------------*/
    const DB_HOST = "localhost";
    const DB_USER = "root";
    const DB_PASS = "";
    const DB_NAME = "helperland";
    
    /*------------ Users Constant--------------*/
    const SESSION_DESTROY_TIME = 60*60*1; // 1 hour (60sec * 60min * 1hour)
    const USER_TYPE = ["customer", "servicer", "admin"];

    /*------------- FOR SMTP --------------*/
    const SMTP_HOST = "smtp.gmail.com";
    const SMTP_EMAIL = "abhidave2000@gmail.com";
    const SMTP_PASS = "Abhidave2108@!";
    const ADMIN_EMAIL = "abhidave2000@gmail.com";
    
    /*-------------Contact US ------------*/
    const SUBJECT_TYPE = ['subject', 'inquiry', 'complaint', 'help'];
    const MESSAGE_MAX_LENGTH = 250; // 250 characters long
 
    /*-------------- File Upload Validation ----------------*/
    const FILE_MAX_SIZE = 1*1024*1024*4; //(bit*byte*kb*mb) max_size = 4mb
    const FILE_EXTENSION = ['jpg', 'jpeg', 'png', 'docx', 'pdf', 'gif'];

    /* ----------------Base url path----------------------- */
    const base_url = "http://localhost/Halperhand/Helperland/";
}

?>