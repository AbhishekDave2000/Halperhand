<!DOCTYPE html>
<html lang="en">
<?php require("config.php");
session_start(); ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Error</title>
</head>

<body>
    <div class="container mt-3">
        <?php if (isset($_GET["error"])) { ?>
            <div class="alert alert-danger" role="alert">
                <?= $_GET["error"] ?>
                <?php
                    $email = "";
                    $pass = "";
                    if(isset($_SESSION['error'])){
                        if (isset($_SESSION['error']['email'])) {
                            $email = $_SESSION['error']['email'];
                            echo $email;
                        }
                        echo "  ";
                        if($_SESSION['error']['password']){
                            $pass = $_SESSION['error']['password'];
                            echo $pass;
                        }
                        unset($_SESSION['error']);
                    } 
                ?>
            </div>
        <?php
        } else {
            echo "<h1>try again!!</h1>";
        }
        ?>
        <a href="<?= Config::base_url . '?controller=Default&function=homepage' ?>">Back to the HomePage</a>
    </div>
</body>

</html>