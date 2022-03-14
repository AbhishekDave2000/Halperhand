<!DOCTYPE html>
<html lang="en">
<?php $base_url = 'http://localhost/Halperhand/Helperland/'; ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin > User Managaement</title>
    <link rel="stylesheet" href="assets/Css/admin.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/Css/adminModal.css">

    <link rel="stylesheet" href="assets/Css/uparr.css">
    <script src="assets/js/uparr.js"></script>
    <script src="assets/js/adminDash.js"></script>
</head>

<body>

    <?php
    include 'view/modal/adminModal.php';
    include 'includes/uparr.php';
    ?>

    <!-- navbar -->
    <section class="navigation">
        <div class="container-lg-fluid">
            <nav class="navbar navbar-expand-sm">
                <!-- Brand -->
                <a class="navbar-brand" href="index.html">helperland</a>
                <!-- assets/Img/logo/white-logo-transparent-background.png -->

                <!-- Navbar links -->
                <div class="nav-sp">
                    <!-- Toggler/collapsibe Button -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <i class="fas fa-bars"></i>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <img class="admin-img" src="assets/Img/admin/admin-user.png" alt="">
                                <span><?= $_SESSION['user']['FirstName'] . ' ' . $_SESSION['user']['LastName'] ?></span>
                                <span class="admin-id" style="display: none;"><?= $_SESSION['user']['UserId'] ?></span>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= $base_url . '?controller=Authentication&function=Logout' ?>">
                                    <img src="assets/Img/admin/logout.png" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </section>
    <!-- navbar end -->

    <!-- content -->
    <div class="container-fluid content">
        <!-- Sidebar -->
        <aside class="container__sidebar container-fluid">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" href="http://localhost/Halperhand/Helperland/?controller=Default&function=adminDash&parameter=usermanagement">User Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Halperhand/Helperland/?controller=Default&function=adminDash&parameter=servicerequest">Service Requests</a>
                </li>
            </ul>
        </aside>

        <!-- Main -->
        <main class="container__main container-fluid">
            <?php
            switch ($para) {
                case 'usermanagement':
                    include('view/includes/admin/usermanagement.php');
                    break;
                case 'servicerequest':
                    include('view/includes/admin/servicerequest.php');
                    break;
                default:
                    echo "<h2>This Page does not exist</h2>";
                    break;
            }
            ?>
        </main>
    </div>
    <!-- content end -->

    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/ae6d6e0254.js" crossorigin="anonymous"></script>
    <!-- Data Table -->

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/table-data.js"></script>
</body>

</html>