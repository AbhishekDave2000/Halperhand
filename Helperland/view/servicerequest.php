<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin > Service Requests</title>

    <link rel="stylesheet" href="Css/admin.css">

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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="Css/uparr.css">    
    <script src="js/uparr.js"></script>
</head>

<body>

    <?php
        include 'includes/uparr.php';
        // include 'modal/loginmodal.html';
        // include 'modal/forgotpassmodal.html';
    ?>

    <!-- navbar -->
    <section class="navigation">
        <div class="container-lg-fluid">
            <nav class="navbar navbar-expand-sm">
                <!-- Brand -->
                <a class="navbar-brand" href="index.html">helperland</a>
                <!-- Img/logo/white-logo-transparent-background.png -->

                <!-- Navbar links -->
                <div class="nav-sp">
                    <!-- Toggler/collapsibe Button -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <i class="fas fa-bars"></i>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <img class="admin-img" src="Img/admin/admin-user.png" alt="">
                                <span>Abhishek Dave</span>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <img src="Img/admin/logout.png" alt="">
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
                    <a class="nav-link" href="usermanagement.php">User Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="servicerequest.php">Service Requests</a>
                </li>
            </ul>
        </aside>

        <!-- Main -->
        <main class="container__main container-fluid">

            <div class="container-fluid heading-class">
                <div class="container-fluid" id="heading-div">
                    <span class="heading-main-content">Service Requests</span>
                </div>
                <!-- <div>
                    <button type="button" class="btn">
                        <img class="add-button" src="images/add.png" alt=""> Add New User
                    </button>
                </div> -->
            </div>

            <div class="second-div container-fluid">
                <form>
                    <div class="sr-main-div-form">
                        <div class="sr-div">
                            <div class="">
                                <input type="text" class="form-control s-first-input" placeholder="Service ID">
                            </div>
                            <div class="">
                                <select class="form-control s-second-input" name="Customer">
                                    <option>Customer</option>
                                    <option>Inquiry Manager</option>
                                    <option>Content Manager</option>
                                    <option>Finance Manager</option>
                                </select>
                            </div>

                            <div class="">
                                <select class="form-control s-third-input" name="Service Provider">
                                    <option>Service Provider</option>
                                    <option>Inquiry Manager</option>
                                    <option>Content Manager</option>
                                    <option>Finance Manager</option>
                                </select>
                            </div>

                            <div class="">
                                <select class="form-control s-fourth--input" name="Status">
                                    <option>Status</option>
                                    <option>Inquiry Manager</option>
                                    <option>Content Manager</option>
                                    <option>Finance Manager</option>
                                </select>
                            </div>

                            <div class="">
                                <input type="date" class="form-control s-fifth-input" placeholder="From">
                            </div>

                            <div class="">
                                <input type="datetime" class="form-control s-sixth-input" placeholder="To">
                            </div>
                        </div>
                        <div class="sr-btn-div">
                            <div class="">
                                <button type="submit" class="btn submit-btn">Search</button>
                            </div>

                            <div class="col-reset">
                                <button type="Reset" class="btn clear-btn">Clear</button>
                            </div>
                        </div>


                    </div>
                </form>
            </div>

            <div class="container-fluid third-div">
                <table id="example" class="table-data" style="width:100%">
                    <thead>
                        <tr>
                            <th class="serviceid">Service ID <img src="Img/admin/sort.png" alt="" class="sorting-img"></th>
                            <th class="servicedate">Service date <img src="Img/admin/sort.png" alt="" class="sorting-img">
                            </th>
                            <th class="customerdetails">Customer details</th>
                            <th class="serviceprovider">Service provider <img src="Img/admin/sort.png" alt=""
                                    class="sorting-img">
                            </th>
                            <th class="status">Status</th>
                            <th class="action">Actions</th>
                            <!-- <th class="userstatus">User Status</th>
                            <th class="action">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="serviceid-data">
                                323434
                            </td>
                            <td class="servicedate-data">
                                <img src="Img/admin/calendar2.png" alt=""> <span>09/04/2018</span> <br>
                                <img src="Img/admin/layer-14.png" alt=""> 12:00 - 18:00
                            </td>
                            <td class="customerdetails-data">
                                David Bough <br>
                                <img src="Img/admin/layer-15.png" alt=""> Musterstrabe 5,12345 Bonn
                            </td>
                            <td class="serviceprovider-data">
                                <div class="cap-div">
                                    <img class="cap" src="Img/admin/cap.png" alt="cap">
                                </div>
                                <span>Lyum Watson <br>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con-e"></i>
                                    4
                                </span>
                            </td>
                            <td class="status-data">
                                <span class="status new">
                                    new
                                </span>
                            </td>
                            <td class="action-data">
                                <div class="dropdown">
                                    <button class="btn action-dropdown" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="Img/admin/group-38.png" alt="">
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <div class="polygon">

                                        </div>
                                        <a class="dropdown-item" href="#">Edit & Reschedule</a>
                                        <a class="dropdown-item" href="#">Refund</a>
                                        <a class="dropdown-item" href="#">Cancel</a>
                                        <a class="dropdown-item" href="#">Change SP</a>
                                        <a class="dropdown-item" href="#">Escalate</a>
                                        <a class="dropdown-item" href="#">History Log</a>
                                        <a class="dropdown-item" href="#">Download Invoice</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <!-- <tr>
                            <td class="serviceid-data">
                                323434
                            </td>
                            <td class="servicedate-data">
                                <img src="images/calendar2.png" alt=""> <span>09/04/2018</span> <br>
                                <img src="images/layer-14.png" alt=""> 12:00 - 18:00
                            </td>
                            <td class="customerdetails-data">
                                David Bough <br>
                                <img src="images/layer-15.png" alt=""> Musterstrabe 5,12345 Bonn
                            </td>
                            <td class="serviceprovider-data">
                                <div class="cap-div">
                                    <img class="cap" src="images/cap.png" alt="cap">
                                </div>
                                <span>Lyum Watson <br>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con-e"></i>
                                    4
                                </span>
                            </td>
                            <td class="status-data">
                                <span class="status new">
                                    new
                                </span>
                            </td>
                            <td class="action-data">
                                <div class="dropdown">
                                    <button class="btn action-dropdown" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="images/group-38.png" alt="">
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <div class="polygon">

                                        </div>
                                        <a class="dropdown-item" href="#">Edit & Reschedule</a>
                                        <a class="dropdown-item" href="#">Refund</a>
                                        <a class="dropdown-item" href="#">Cancel</a>
                                        <a class="dropdown-item" href="#">Change SP</a>
                                        <a class="dropdown-item" href="#">Escalate</a>
                                        <a class="dropdown-item" href="#">History Log</a>
                                        <a class="dropdown-item" href="#">Download Invoice</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="serviceid-data">
                                323434
                            </td>
                            <td class="servicedate-data">
                                <img src="images/calendar2.png" alt=""> <span>09/04/2018</span> <br>
                                <img src="images/layer-14.png" alt=""> 12:00 - 18:00
                            </td>
                            <td class="customerdetails-data">
                                David Bough <br>
                                <img src="images/layer-15.png" alt=""> Musterstrabe 5,12345 Bonn
                            </td>
                            <td class="serviceprovider-data">
                                <div class="cap-div">
                                    <img class="cap" src="images/cap.png" alt="cap">
                                </div>
                                <span>Lyum Watson <br>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con-e"></i>
                                    4
                                </span>
                            </td>
                            <td class="status-data">
                                <span class="status new">
                                    new
                                </span>
                            </td>
                            <td class="action-data">
                                <div class="dropdown">
                                    <button class="btn action-dropdown" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="images/group-38.png" alt="">
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <div class="polygon">

                                        </div>
                                        <a class="dropdown-item" href="#">Edit & Reschedule</a>
                                        <a class="dropdown-item" href="#">Refund</a>
                                        <a class="dropdown-item" href="#">Cancel</a>
                                        <a class="dropdown-item" href="#">Change SP</a>
                                        <a class="dropdown-item" href="#">Escalate</a>
                                        <a class="dropdown-item" href="#">History Log</a>
                                        <a class="dropdown-item" href="#">Download Invoice</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="serviceid-data">
                                323434
                            </td>
                            <td class="servicedate-data">
                                <img src="images/calendar2.png" alt=""> <span>09/04/2018</span> <br>
                                <img src="images/layer-14.png" alt=""> 12:00 - 18:00
                            </td>
                            <td class="customerdetails-data">
                                David Bough <br>
                                <img src="images/layer-15.png" alt=""> Musterstrabe 5,12345 Bonn
                            </td>
                            <td class="serviceprovider-data">
                                <div class="cap-div">
                                    <img class="cap" src="images/cap.png" alt="cap">
                                </div>
                                <span>Lyum Watson <br>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con-e"></i>
                                    4
                                </span>
                            </td>
                            <td class="status-data">
                                <span class="status new">
                                    new
                                </span>
                            </td>
                            <td class="action-data">
                                <div class="dropdown">
                                    <button class="btn action-dropdown" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="images/group-38.png" alt="">
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <div class="polygon">

                                        </div>
                                        <a class="dropdown-item" href="#">Edit & Reschedule</a>
                                        <a class="dropdown-item" href="#">Refund</a>
                                        <a class="dropdown-item" href="#">Cancel</a>
                                        <a class="dropdown-item" href="#">Change SP</a>
                                        <a class="dropdown-item" href="#">Escalate</a>
                                        <a class="dropdown-item" href="#">History Log</a>
                                        <a class="dropdown-item" href="#">Download Invoice</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="serviceid-data">
                                323434
                            </td>
                            <td class="servicedate-data">
                                <img src="images/calendar2.png" alt=""> <span>09/04/2018</span> <br>
                                <img src="images/layer-14.png" alt=""> 12:00 - 18:00
                            </td>
                            <td class="customerdetails-data">
                                David Bough <br>
                                <img src="images/layer-15.png" alt=""> Musterstrabe 5,12345 Bonn
                            </td>
                            <td class="serviceprovider-data">
                                <div class="cap-div">
                                    <img class="cap" src="images/cap.png" alt="cap">
                                </div>
                                <span>Lyum Watson <br>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con-e"></i>
                                    4
                                </span>
                            </td>
                            <td class="status-data">
                                <span class="status new">
                                    new
                                </span>
                            </td>
                            <td class="action-data">
                                <div class="dropdown">
                                    <button class="btn action-dropdown" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="images/group-38.png" alt="">
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <div class="polygon">

                                        </div>
                                        <a class="dropdown-item" href="#">Edit & Reschedule</a>
                                        <a class="dropdown-item" href="#">Refund</a>
                                        <a class="dropdown-item" href="#">Cancel</a>
                                        <a class="dropdown-item" href="#">Change SP</a>
                                        <a class="dropdown-item" href="#">Escalate</a>
                                        <a class="dropdown-item" href="#">History Log</a>
                                        <a class="dropdown-item" href="#">Download Invoice</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="serviceid-data">
                                323434
                            </td>
                            <td class="servicedate-data">
                                <img src="images/calendar2.png" alt=""> <span>09/04/2018</span> <br>
                                <img src="images/layer-14.png" alt=""> 12:00 - 18:00
                            </td>
                            <td class="customerdetails-data">
                                David Bough <br>
                                <img src="images/layer-15.png" alt=""> Musterstrabe 5,12345 Bonn
                            </td>
                            <td class="serviceprovider-data">
                                <div class="cap-div">
                                    <img class="cap" src="images/cap.png" alt="cap">
                                </div>
                                <span>Lyum Watson <br>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con-e"></i>
                                    4
                                </span>
                            </td>
                            <td class="status-data">
                                <span class="status new">
                                    new
                                </span>
                            </td>
                            <td class="action-data">
                                <div class="dropdown">
                                    <button class="btn action-dropdown" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="images/group-38.png" alt="">
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <div class="polygon">

                                        </div>
                                        <a class="dropdown-item" href="#">Edit & Reschedule</a>
                                        <a class="dropdown-item" href="#">Refund</a>
                                        <a class="dropdown-item" href="#">Cancel</a>
                                        <a class="dropdown-item" href="#">Change SP</a>
                                        <a class="dropdown-item" href="#">Escalate</a>
                                        <a class="dropdown-item" href="#">History Log</a>
                                        <a class="dropdown-item" href="#">Download Invoice</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="serviceid-data">
                                323434
                            </td>
                            <td class="servicedate-data">
                                <img src="images/calendar2.png" alt=""> <span>09/04/2018</span> <br>
                                <img src="images/layer-14.png" alt=""> 12:00 - 18:00
                            </td>
                            <td class="customerdetails-data">
                                David Bough <br>
                                <img src="images/layer-15.png" alt=""> Musterstrabe 5,12345 Bonn
                            </td>
                            <td class="serviceprovider-data">
                                <div class="cap-div">
                                    <img class="cap" src="images/cap.png" alt="cap">
                                </div>
                                <span>Lyum Watson <br>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con-e"></i>
                                    4
                                </span>
                            </td>
                            <td class="status-data">
                                <span class="status new">
                                    new
                                </span>
                            </td>
                            <td class="action-data">
                                <div class="dropdown">
                                    <button class="btn action-dropdown" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="images/group-38.png" alt="">
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <div class="polygon">

                                        </div>
                                        <a class="dropdown-item" href="#">Edit & Reschedule</a>
                                        <a class="dropdown-item" href="#">Refund</a>
                                        <a class="dropdown-item" href="#">Cancel</a>
                                        <a class="dropdown-item" href="#">Change SP</a>
                                        <a class="dropdown-item" href="#">Escalate</a>
                                        <a class="dropdown-item" href="#">History Log</a>
                                        <a class="dropdown-item" href="#">Download Invoice</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="serviceid-data">
                                323434
                            </td>
                            <td class="servicedate-data">
                                <img src="images/calendar2.png" alt=""> <span>09/04/2018</span> <br>
                                <img src="images/layer-14.png" alt=""> 12:00 - 18:00
                            </td>
                            <td class="customerdetails-data">
                                David Bough <br>
                                <img src="images/layer-15.png" alt=""> Musterstrabe 5,12345 Bonn
                            </td>
                            <td class="serviceprovider-data">
                                <div class="cap-div">
                                    <img class="cap" src="images/cap.png" alt="cap">
                                </div>
                                <span>Lyum Watson <br>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con-e"></i>
                                    4
                                </span>
                            </td>
                            <td class="status-data">
                                <span class="status new">
                                    new
                                </span>
                            </td>
                            <td class="action-data">
                                <div class="dropdown">
                                    <button class="btn action-dropdown" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="images/group-38.png" alt="">
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <div class="polygon">

                                        </div>
                                        <a class="dropdown-item" href="#">Edit & Reschedule</a>
                                        <a class="dropdown-item" href="#">Refund</a>
                                        <a class="dropdown-item" href="#">Cancel</a>
                                        <a class="dropdown-item" href="#">Change SP</a>
                                        <a class="dropdown-item" href="#">Escalate</a>
                                        <a class="dropdown-item" href="#">History Log</a>
                                        <a class="dropdown-item" href="#">Download Invoice</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="serviceid-data">
                                323434
                            </td>
                            <td class="servicedate-data">
                                <img src="images/calendar2.png" alt=""> <span>09/04/2018</span> <br>
                                <img src="images/layer-14.png" alt=""> 12:00 - 18:00
                            </td>
                            <td class="customerdetails-data">
                                David Bough <br>
                                <img src="images/layer-15.png" alt=""> Musterstrabe 5,12345 Bonn
                            </td>
                            <td class="serviceprovider-data">
                                <div class="cap-div">
                                    <img class="cap" src="images/cap.png" alt="cap">
                                </div>
                                <span>Lyum Watson <br>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con-e"></i>
                                    4
                                </span>
                            </td>
                            <td class="status-data">
                                <span class="status new">
                                    new
                                </span>
                            </td>
                            <td class="action-data">
                                <div class="dropdown">
                                    <button class="btn action-dropdown" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="images/group-38.png" alt="">
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <div class="polygon">

                                        </div>
                                        <a class="dropdown-item" href="#">Edit & Reschedule</a>
                                        <a class="dropdown-item" href="#">Refund</a>
                                        <a class="dropdown-item" href="#">Cancel</a>
                                        <a class="dropdown-item" href="#">Change SP</a>
                                        <a class="dropdown-item" href="#">Escalate</a>
                                        <a class="dropdown-item" href="#">History Log</a>
                                        <a class="dropdown-item" href="#">Download Invoice</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="serviceid-data">
                                323434
                            </td>
                            <td class="servicedate-data">
                                <img src="images/calendar2.png" alt=""> <span>09/04/2018</span> <br>
                                <img src="images/layer-14.png" alt=""> 12:00 - 18:00
                            </td>
                            <td class="customerdetails-data">
                                David Bough <br>
                                <img src="images/layer-15.png" alt=""> Musterstrabe 5,12345 Bonn
                            </td>
                            <td class="serviceprovider-data">
                                <div class="cap-div">
                                    <img class="cap" src="images/cap.png" alt="cap">
                                </div>
                                <span>Lyum Watson <br>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con"></i>
                                    <i class="fas fa-star i-con-e"></i>
                                    4
                                </span>
                            </td>
                            <td class="status-data">
                                <span class="status new">
                                    new
                                </span>
                            </td>
                            <td class="action-data">
                                <div class="dropdown">
                                    <button class="btn action-dropdown" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="images/group-38.png" alt="">
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <div class="polygon">

                                        </div>
                                        <a class="dropdown-item" href="#">Edit & Reschedule</a>
                                        <a class="dropdown-item" href="#">Refund</a>
                                        <a class="dropdown-item" href="#">Cancel</a>
                                        <a class="dropdown-item" href="#">Change SP</a>
                                        <a class="dropdown-item" href="#">Escalate</a>
                                        <a class="dropdown-item" href="#">History Log</a>
                                        <a class="dropdown-item" href="#">Download Invoice</a>
                                    </div>
                                </div>
                            </td>
                        </tr> -->
                    </tbody>
                </table>

                <div class="pagination-div container-fluid">
                    <div class="entry-show">
                        <span class="span-show">
                            show
                        </span>
                        <select class="form-select" aria-label=".form-select-sm example">
                            <option selected>10</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                        <span class="span-entry">
                            Entries
                        </span>
                    </div>

                    <nav class="pagination-nav" aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <i class="fas fa-caret-left"></i>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <i class="fas fa-caret-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="footer container-fluid">
                <span>
                    ©2018 Helperland. All rights reserved.
                </span>
            </div>
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