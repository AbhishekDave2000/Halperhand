<?php include('view/includes/sessionCheck.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Service Provider Dashbord</title>
    <link rel="stylesheet" href="assets/Css/sp.css">
    <link rel="stylesheet" href="assets/Css/uparr.css">
    <link rel="stylesheet" href="assets/Css/spmodal.css">
    <link rel="stylesheet" href="assets/Css/calender.css">
    <script src="assets/js/uparr.js"></script>
</head>

<body>

    <?php
        include 'includes/uparr.php';
        include 'modal/spmodal.php';
    ?>

    <!-- navbar -->
    <section class="navigation">
        <div class="container-lg-fluid">
            <nav class="navbar navbar-expand-xl">
                <!-- Brand -->
                <a class="navbar-brand" href="index.php">
                    <img src="assets/Img/logo/white-logo-transparent-background.png" alt="">
                </a>
                <!-- assets/Img/logo/white-logo-transparent-background.png -->

                <!-- Navbar links -->
                <div class="nav-sp">
                    <!-- Toggler/collapsibe Button -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon">
                            <i class="fas fa-bars"></i>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav ms-auto mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= $base_url . '?controller=Default&function=pricespage' ?>">Prices & Service</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Our Guarantee</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= $base_url . '?controller=Default&function=homepage' ?>#Blog">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= $base_url . '?controller=Default&function=contactpage' ?>">Contact us</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 sidebar-ul-navbar">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?= Config::base_url . '?controller=Default&function=providerDash&parameter=dashboard' ?>">Dashbord</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?= Config::base_url . '?controller=Default&function=providerDash&parameter=new-service-request' ?>">New Service</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?= Config::base_url . '?controller=Default&function=providerDash&parameter=upcoming-service' ?>">upcoming Service</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?= Config::base_url . '?controller=Default&function=providerDash&parameter=service-schedule' ?>">Service Schedule</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?= Config::base_url . '?controller=Default&function=providerDash&parameter=service-history' ?>">Service History</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?= Config::base_url . '?controller=Default&function=providerDash&parameter=my-rating' ?>">My Ratings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?= Config::base_url . '?controller=Default&function=providerDash&parameter=block-customer' ?>">Block Customer</a>
                            </li>
                        </ul>
                    </div>
                    <div class="float-right-notification">
                        <ul>
                            <li class="nav-item dropdown" id="notification">
                                <a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><img src="assets/Img/spupcoming/notification.png" alt="" srcset=""></a>
                                <div class="Ellipse-5">0</div>

                                <div class="dropdown-menu dropdown-menu1" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                            <li class="nav-item" id="user-1">
                                <a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                                    <img src="assets/Img/spupcoming/user.png" alt="" srcset="">
                                    <img src="assets/Img/spupcoming/sp-arrow-down.png" class="Forma-1-copy">
                                </a>
                                <div class="dropdown-menu dropdown-menu2" aria-labelledby="navbarDropdown" style="width: 180px;">
                                    <div class="label">
                                        <span style="padding-left: 15px;padding-bottom: 15px; font-size:medium ;">Welcome,<br>
                                            <span style="padding-left: 15px; font-weight:600; font-size:medium;"><?= $_SESSION['user']['FirstName']; ?></span>
                                        </span>
                                    </div>
                                    <div class="dropdown-divider" style="display: block;"></div>
                                    <?php
                                    if ($_SESSION['user']['UserTypeId'] == 2) {
                                        $function = 'providerDash';
                                        $parameter = 'dashboard';
                                        $setting = 'my-setting';
                                    ?>
                                        <a class="dropdown-item" href="<?= Config::base_url . '?controller=Default&function=' . $function . '&parameter=' . $parameter ?>">My Dashboard</a>
                                        <a class="dropdown-item" href="<?= Config::base_url . '?controller=Default&function=' . $function . '&parameter=' . $setting ?>">My Settings</a>
                                        <a class="dropdown-item" href="<?= Config::base_url . '?controller=Authentication&function=Logout' ?>">Logout</a>
                                    <?php } else {
                                        echo "Not Happning";
                                    } ?>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </section>
    <!-- navbar end -->


    <!-- name header -->
    <div class="container-fluid name-header">
        <span class="Welcome-name">
            Welcome,
            <span class="text-style-1"><?= $_SESSION['user']['FirstName'] . " " . $_SESSION['user']['LastName'] . "!"; ?></span>
            <span class="sp-id" style="display: none;"><?= $_SESSION['user']['UserId']; ?></span>
        </span>
    </div>

    <!-- name header end -->

    <!-- content -->
    <section class="upcoming-service">
        <div class="container-fluid content">
            <nav class="navbar-expand-md sidebar-main">
                <aside class="container__sidebar">
                    <div class="collapse navbar-collapse sidebar-div-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 sidebar-ul">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?= Config::base_url . '?controller=Default&function=providerDash&parameter=dashboard' ?>">Dashbord</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?= Config::base_url . '?controller=Default&function=providerDash&parameter=new-service-request' ?>">New Service</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?= Config::base_url . '?controller=Default&function=providerDash&parameter=upcoming-service' ?>">upcoming Service</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?= Config::base_url . '?controller=Default&function=providerDash&parameter=service-schedule' ?>">Service Schedule</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?= Config::base_url . '?controller=Default&function=providerDash&parameter=service-history' ?>">Service History</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?= Config::base_url . '?controller=Default&function=providerDash&parameter=my-rating' ?>">My Ratings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?= Config::base_url . '?controller=Default&function=providerDash&parameter=block-customer' ?>">Block Customer</a>
                            </li>
                        </ul>
                    </div>
                </aside>
            </nav>

            <main class="container__main">
                <?php
                switch ($para) {
                    case 'dashboard':
                        include("includes/provider/dashboard.php");
                        break;
                    case 'new-service-request':
                        include("includes/provider/new-service-request.php");
                        break;
                    case 'upcoming-service':
                        include("includes/provider/upcoming-service.php");
                        break;
                    case 'service-schedule':
                        include("includes/provider/service-schedule.php");
                        break;
                    case 'service-history':
                        include("includes/provider/service-history.php");
                        break;
                    case 'my-rating':
                        include("includes/provider/my-ratings.php");
                        break;
                    case 'block-customer':
                        include("includes/provider/block-customer.php");
                        break;
                    case 'my-setting':
                        include("includes/provider/my-setting.php");
                        break;
                    default:
                        echo "<h2>404 This page does not exist!</h2>";
                        break;
                }
                ?>
            </main>
        </div>
    </section>
    <!-- content end -->

    <!-- footer start -->
    <?php include 'includes/footer.php'; ?>
    <!-- footer end -->


    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/ae6d6e0254.js" crossorigin="anonymous"></script>
    <!-- Data Table -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/table-data.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/js/providerDash.js"></script>
</body>

</html>