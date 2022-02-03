<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <title>Service Provide > Upcoming services</title>
    <link rel="stylesheet" href="Css/sp.css">
    <link rel="stylesheet" href="Css/uparr.css">
    
    <script src="js/uparr.js"></script>
</head>

<body>

    <?php   
        include 'includes/uparr.php';
    ?>

    <!-- navbar -->
    <section class="navigation">
        <div class="container-lg-fluid">
            <nav class="navbar navbar-expand-xl">
                <!-- Brand -->
                <a class="navbar-brand" href="../index.html">
                    <img src="Img/logo/white-logo-transparent-background.png" alt="">
                </a>
                <!-- Img/logo/white-logo-transparent-background.png -->


                <!-- Navbar links -->
                <div class="nav-sp">
                    <!-- Toggler/collapsibe Button -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon">
                            <i class="fas fa-bars"></i>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav ms-auto mb-lg-0">
                            <!-- <li class="nav-item" style="width: 111px; text-align: center;">
                                <a class="nav-link rounded-link" href="#">Book now</a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link a" href="prices.html">Prices & services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link a" href="#">Warranty</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link a" href="index.html#blog-1">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link a" href="contact.html">Contact us</a>
                            </li>
                        </ul>

                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 sidebar-ul-navbar">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Dashbord</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">New Service</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">upcoming Service</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Service Schedule</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Service History</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">My Ratings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Block Customer</a>
                            </li>
                        </ul>
                    </div>

                    <div class="float-right-notification">
                        <ul>
                            <li class="nav-item dropdown" id="notification">
                                <a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" href="#"><img
                                        src="Img/spupcoming/notification.png" alt="" srcset=""></a>
                                <div class="Ellipse-5">0</div>

                                <div class="dropdown-menu dropdown-menu1" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>

                            <li class="nav-item" id="user-1">
                                <a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" href="#">
                                    <img src="Img/spupcoming/user.png" alt="" srcset="">
                                    <img src="Img/spupcoming/sp-arrow-down.png" class="Forma-1-copy">
                                </a>
                                <div class="dropdown-menu dropdown-menu2" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
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
            <span class="text-style-1">Abhihshek!</span>
        </span>
    </div>

    <!-- name header end -->

    <!-- content -->
    <section class="upcomingservice">
        <div class="container-fluid content">
            <nav class="navbar-expand-md sidebar-main">
                <aside class="container__sidebar">
                    <div class="collapse navbar-collapse sidebar-div-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 sidebar-ul">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Dashbord</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">New Service</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">upcoming Service</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Service Schedule</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Service History</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">My Ratings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Block Customer</a>
                            </li>
                        </ul>
                    </div>
                </aside>
            </nav>

            <main class="container__main">
                <div class="container-fluid head-us">
                    <span class="upcoming-heading">Upcoming Services</span>
                </div>
                <table id="example" class="table-data" style="width:100%">
                    <thead>
                        <tr>
                            <th class="serviceid">Service ID <img src="Img/spupcoming/sort.png" alt=""
                                    class="sorting-img"></th>
                            <th class="servicedata">Service data <img src="Img/spupcoming/sort.png" alt=""
                                    class="sorting-img">
                            </th>
                            <th class="customerdetail">Customer details <img src="Img/spupcoming/sort.png" alt=""
                                    class="sorting-img"></th>
                            <th class="servicedistance">Distance <img src="Img/spupcoming/sort.png" alt=""
                                    class="sorting-img">
                            </th>
                            <th class="serviceaction">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="serviceid">323431</td>
                            <td class="servicedata"><img src="Img/spupcoming/calendar2.png" alt="">
                                <span>09/04/2018</span> <br>
                                <img src="Img/spupcoming/layer-14.png" alt=""> 12:00 - 18:00
                            </td>
                            <td class="customerdetail">David Bough <br>
                                <img src="Img/spupcoming/layer-15.png" alt=""> Musterstrabe 5,12345 Bonn
                            </td>
                            <td class="servicedistance">15km</td>
                            <td class="serviceaction"><button class="btn btn-danger btn-rounded-17"
                                    value="Cancel">Cancel</button></td>
                        </tr>
                    </tbody>

                </table>
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

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                "order": [[3, "desc"]],
                "bPaginate": false, //hide pagination
                "bFilter": false, //hide Search bar
                "bInfo": false, // hide showing entries

            });
        });
    </script>
</body>

</html>