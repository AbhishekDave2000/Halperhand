<?php
include("controller/AuthenticationController.php");
class DefaultController{
    public function __construct(){
        // header ('Location: view/home.php');
    }
    public function homepage(){
        include("view/home.php");
    }
    public function contactpage(){
        include("view/contact.php");
    }
    public function faqpage(){
        include("view/faq.php");
    }
    public function aboutpage(){
        include("view/about_us.php");
    }
    public function pricespage(){
        include("view/prices.php");
    }
    public function CustomerSignup(){
        include("view/createaccount.php");
    }
    public function ProviderSignup(){
        include("view/sprovider.php");
    }
    public function ForgotPasspage(){
        include("view/forgotpasspage.php");
    }
    public function BookNowpage(){
        include("view/bookservice.php");
    }
    public function customerDash($parameter){
        $para = $_GET['parameter']; 
        include("controller/customerDashController.php");
        $c = new customerDashController();
        include("view/customerDash.php");
    }
    public function providerDash($parameter){
        $para = $_GET['parameter']; 
        include("view/providerDash.php");
    }
    public function adminDash(){
        include("view/usermanagement.php");
    }
}
