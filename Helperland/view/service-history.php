<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer > services History</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="assets/Css/service-history.css">
    <link rel="stylesheet" href="assets/Css/uparr.css">
    <link rel="stylesheet" href="assets/Css/ratespmodal.css">
    <link rel="stylesheet" href="assets/Css/servicerequestmodal.css">

    <script src="assets/js/uparr.js"></script>
</head>

<body>
    <?php include("view/modal/servicerequest.php"); ?>
    <?php include("view/includes/uparr.php"); ?>

    <!-- navbar -->
    <section class="navigation">
        <div class="container-lg-fluid">
            <nav class="navbar navbar-expand-xl">
                <!-- Brand -->
                <a class="navbar-brand" href="index.html">
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
                            <li class="nav-item" style="width: 111px; text-align: center;">
                                <a class="nav-link rounded-link" href="#">Book now</a>
                            </li>
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
                                <a class="nav-link" aria-current="page" href="#">Dashbord</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Service History</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Service Schedule</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Favourite Pros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Invoices</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Notifications</a>
                            </li>
                        </ul>
                    </div>

                    <div class="float-right-notification">
                        <ul>
                            <li class="nav-item dropdown" id="notification">
                                <a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><img src="assets/Img/customer services history/notification.png" alt="" srcset=""></a>
                                <div class="Ellipse-5">0</div>
                                <div class="dropdown-menu dropdown-menu1" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <!-- <div class="dropdown-divider"></div> -->
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>

                            <li class="nav-item" id="user-1">
                                <a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                                    <img src="assets/Img/customer services history/user.png" alt="" srcset="">
                                    <img src="assets/Img/customer services history/sp-arrow-down.png" class="Forma-1-copy">
                                </a>
                                <div class="dropdown-menu dropdown-menu2" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?= Config::base_url . '?controller=Default&function=customerDash&parameter=dashboard' ?>">My Dashboard</a>
                                    <a class="dropdown-item" href="<?= Config::base_url . '?controller=Default&function=customerDash&parameter=mysetting' ?>">My Setting</a>
                                    <a class="dropdown-item" href="#">Logout</a>
                                    <!-- <div class="dropdown-divider"></div> -->
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
    <section>
        <div class="container-fluid name-header">
            <span class="Welcome-name">
                Welcome,
                <span class="text-style-1">Abhishek Dave!</span>
            </span>
        </div>
    </section>
    <!-- name header end -->

    <!-- content -->
    <section class="customerservicehistory">
        <div class="container-fluid content">
            <nav class="navbar-expand-md sidebar-main">
                <aside class="container__sidebar">
                    <div class="collapse navbar-collapse sidebar-div-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 sidebar-ul">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?= Config::base_url . '?controller=Default&function=customerDash&parameter=dashboard' ?>">Dashbord</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?= Config::base_url . '?controller=Default&function=customerDash&parameter=service-history' ?>">Service History</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?= Config::base_url . '?controller=Default&function=customerDash&parameter=dashboard' ?>">Service Schedule</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?= Config::base_url . '?controller=Default&function=customerDash&parameter=favpros' ?>">Favourite Pros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Invoices</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Notifications</a>
                            </li>
                        </ul>
                    </div>
                </aside>
            </nav>

            <main class="container__main">
                <?php
                switch ($para) {
                    case 'dashboard':
                        include("includes/admin/dashboard.php");
                        break;
                    case 'service-history':
                        include("includes/admin/servicehistory.php");
                        break;
                    case 'mysetting';
                        include("includes/admin/mysetting.php");
                        break;
                    case 'favpros';
                        include("includes/admin/favpros.php");
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
    <section class="footer">
        <div class="div1">
            <!-- <div class="fimg"> -->
            <img src="assets/Img/assets/white-logo-transparent-background.png" alt="" srcset="">
            <!-- </div> -->
            <div class="footer-list">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about_us.html">About</a></li>
                    <li><a href="">Testimonials</a></li>
                    <li><a href="faq.html">FAQs</a></li>
                    <li><a href="">Insurance Policy</a></li>
                    <li><a href="">Impressum</a></li>
                </ul>
            </div>
            <div class="fi">
                <a href=""><img id="fi2" src="assets/Img/assets/ic-facebook.png" alt="facebook" srcset=""></a>
                <a href=""><img id="fi1" src="assets/Img/assets/ic-instagram.png" alt="insta" srcset=""></a>
            </div>
        </div>
        <div class="Rectangle-12-copy-2"></div>
        <div class="div2">
            <span>©2018 Helperland. All rights reserved.
                <a href="">Terms and Conditions</a> |
                <a href="">Privacy Policy</a></span>
        </div>
    </section>
    <!-- footer end -->


    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/ae6d6e0254.js" crossorigin="anonymous"></script>
    <!-- Data Table -->

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "order": [
                    [3, "desc"]
                ],
                "bPaginate": false, //hide pagination
                "bFilter": false, //hide Search bar
                "bInfo": false, // hide showing entries

            });
        });
    </script>

</body>

</html>