<?php
if(!isset($_SESSION['user'])){
    header("Location: " . Config::base_url . '?controller=Default&function=homepage');
}
?>