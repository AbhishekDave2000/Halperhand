<!DOCTYPE html>
<html lang="en">

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
                <?=$_GET["error"]?>
            </div>
        <?php
        } else {
            echo "<h1>try again!!</h1>";
        }
        ?>
        <a href="views/home.php">Back to the HomePage</a>
    </div>
</body>

</html>