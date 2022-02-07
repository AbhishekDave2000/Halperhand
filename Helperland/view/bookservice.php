<!DOCTYPE html>
<html lang="en">

<head>
    <title>Book Now</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script>
        $(document).ready(function () {
            $(".accordion-button1").click(function () {
                $('#arrow1').toggleClass("arrow-down");
            });
            $(".accordion-button2").click(function () {
                $('#arrow2').toggleClass("arrow-down");
            });
            $(".accordion-button3").click(function () {
                $('#arrow3').toggleClass("arrow-down");
            });
        });
    </script>

    <link rel="stylesheet" href="assets/Css/bookservice.css">
    <link rel="stylesheet" href="assets/Css/uparr.css">
    <script src="assets/js/uparr.js"></script>
    <script src="assets/js/booknow.js"></script>
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
            <nav class="navbar navbar-expand-xl">
                <a class="navbar-brand" href="index.html">
                    <img src="assets/Img/logo/white-logo-transparent-background.png" alt="">
                </a>
                <div class="nav-sp">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon">
                            <i class="fas fa-bars"></i>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav ms-auto mb-lg-0">
                            <li class="nav-item" style="width: 111px; text-align: center;">
                                <a class="nav-link rounded-link" href="bookservice.php">Book now</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link a" href="prices.php">Prices & services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link a" href="#">Warranty</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link a" href="index.php#blog-1">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link a" href="contact.php">Contact us</a>
                            </li>
                        </ul>
                    </div>
                    <div class="float-right-notification">
                        <ul>
                            <li class="nav-item dropdown" id="notification">
                                <a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" href="#"><img
                                        src="assets/Img/customer services history/notification.png" alt="" srcset=""></a>
                                <div class="Ellipse-5">0</div>
                                <div class="dropdown-menu dropdown-menu1" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <!-- <div class="dropdown-divider"></div> -->
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                            <li class="nav-item" id="user-1">
                                <a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" href="#">
                                    <img src="assets/Img/customer services history/user.png" alt="" srcset="">
                                    <img src="assets/Img/customer services history/sp-arrow-down.png" class="Forma-1-copy">
                                </a>
                                <div class="dropdown-menu dropdown-menu2" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <!-- <div class="dropdown-divider"></div> -->
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

    <!-- banner -->
    <section>
        <div class="container-fluid" id="faq-img">
        </div>
    </section>
    <!-- banner end -->

    <section class="heading-of-page">
        <div class="container">
            <div id="words">
                Set up your cleaning service
            </div>

            <div class="star-logo">
                <div class="Rectangle-5-copy-6"></div>
                <div>
                    <img src="assets/Img/assets/forma-1.png" alt="forma-1">
                </div>
                <div class="Rectangle-5-copy-6"></div>
            </div>
        </div>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success prices-modal-button" data-bs-toggle="modal"
            data-bs-target="#prices-block">
            << </button>

                <!-- Modal -->
                <div class="modal fade" id="prices-block" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="book-prices-1">
                                    <div class="container header-price">
                                        <span>Payment Summary</span>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="container body-prices">
                                        <div class="heading-cleaning">
                                            <span>01/01/2018 @ 4:00 pm </span><br>
                                            <span>1 bed, 1 bath.</span>
                                        </div>
                                        <div class="duration-heading">
                                            <table class="time-tabel">
                                                <thead>
                                                    <tr>
                                                        <td colspan="2">Duration</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="service-name">Basic</td>
                                                        <td class="service-hours">3 Hrs</td>
                                                    </tr>
                                                    <tr id="s1" class="s1">
                                                        <td class="service-name">Inside cabinets (extra)</td>
                                                        <td class="service-hours">30 Mins</td>
                                                    </tr>
                                                    <tr id="s2" class="s2">
                                                        <td class="service-name">Inside oven (extra)</td>
                                                        <td class="service-hours">30 Mins</td>
                                                    </tr>
                                                    <tr id="s3" class="s3">
                                                        <td class="service-name">Inside Laundry wash & dry (extra)</td>
                                                        <td class="service-hours">30 Mins</td>
                                                    </tr>
                                                    <tr id="s4" class="s4">
                                                        <td class="service-name">Interior windows (extra)</td>
                                                        <td class="service-hours">30 Mins</td>
                                                    </tr>
                                                    <tr id="s5" class="s5">
                                                        <td class="service-name">Inside Fridge (extra)</td>
                                                        <td class="service-hours">30 Mins</td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td>Total Service Time</td>
                                                        <td class="total-hours">3.0</td>
                                                    </tr>
                                                </tfoot>
                                            </table>

                                            <div class="dis-div">
                                                <table>
                                                    <tr>
                                                        <td>Per cleaning</td>
                                                        <td class="dis-amm"><i class="fas fa-euro-sign"></i> 20</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Discount</td>
                                                        <td class="dis-amm">- <i class="fas fa-euro-sign"></i> 0</td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <div class="pay-div">
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <td class="total-pay-head">Total Payment</td>
                                                            <td class="total-pay-amm"><i class="fas fa-euro-sign"></i>
                                                                60</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="effetive-pay-head">Effective Price</td>
                                                            <td class="effetive-pay-amm"><i
                                                                    class="fas fa-euro-sign"></i> 50.4
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="diss-detail">
                                                <span style="color: red; font-size: 16px;">*</span>
                                                <span>You will save 20% according to §35a EStG.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container footer-prices">
                                        <img src="assets/Img/bookservice/smiley.png" alt="">
                                        See what is always included
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

    </section>

    <!-- book process start -->
    <section class="main-content container-fluid">
        <div class="container book-process">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="servicesetup-tab" data-bs-toggle="tab" data-bs-target="#servicesetup"
                        type="button" role="tab" aria-controls="home" aria-selected="true">
                        <img class="grey" src="assets/Img/bookservice/setup-service.png" alt="">
                        <img class="white" src="assets/Img/bookservice/setup-service-white.png" alt="">
                        <span>Setup Service</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="scheduleplane-tab" data-bs-toggle="tab" data-bs-target="#scheduleplan"
                        type="button" role="tab" aria-controls="profile" aria-selected="false">
                        <img class="grey" src="assets/Img/bookservice/schedule.png" alt="">
                        <img class="white" src="assets/Img/bookservice/schedule-white.png" alt="">
                        <span>Schedule Plan</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="yourdeatil-tab" data-bs-toggle="tab" data-bs-target="#yourdeatil"
                        type="button" role="tab" aria-controls="contact" aria-selected="false">
                        <img class="grey" src="assets/Img/bookservice/details.png" alt="">
                        <img class="white" src="assets/Img/bookservice/details-white.png" alt="">
                        <span>Your Details</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="makepayment-tab" data-bs-toggle="tab" data-bs-target="#makepayment"
                        type="button" role="tab" aria-controls="makepayment" aria-selected="false">
                        <img class="grey" src="assets/Img/bookservice/setup-service.png" alt="">
                        <img class="white" src="assets/Img/bookservice/setup-service-white.png" alt="">
                        <span>Setup Service</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">

                <!-- first tab content================ -->
                <div class="tab-pane fade show active" id="servicesetup" role="tabpanel" aria-labelledby="home-tab">
                    <form action="" class="check-form">
                        <div class="row postalcode-division">
                            <label for="postalcode" class="form-label enterpostal">Enter your postal code</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="postalcode" placeholder="Postal code">
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn checkavailability-btn">Check Availablity</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- second tab content================= -->
                <div class="tab-pane fade" id="scheduleplan" role="tabpanel" aria-labelledby="profile-tab">
                    <form action="" class="Schedule-form">

                        <!-- <div class="container norab">
                            <label for="numberofroomandbath" class="form-label">Select number of rooms and baths</label>
                            <div class="row">
                                <div class="col-md-3">
                                    <select class="form-select" id="numberofroom">
                                        <option selected>bed</option>
                                        <option value="1">1 bed</option>
                                        <option value="2">2 bed</option>
                                        <option value="3">3 bed</option>
                                        <option value="4">4 bed</option>
                                        <option value="5">5 bed</option>
                                        <option value="6">more bed</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-select" id="numberofbath">
                                        <option selected>bath</option>
                                        <option value="1">1 bath</option>
                                        <option value="2">2 bath</option>
                                        <option value="3">3 bath</option>
                                        <option value="4">4 bath</option>
                                        <option value="5">5 bath</option>
                                        <option value="6">more bath</option>
                                    </select>
                                </div>
                            </div>
                        </div> -->

                        <div class="container timing-div">
                            <div class="row first-row-second-tab">

                                <div class="col-md-6 wcn">
                                    <div class="row">
                                        <label for="whencleaing" class="form-label">When do you need a cleaner?</label>
                                        <div class="col">
                                            <input type="date" class="form-control" name="date-of-cleaning">
                                        </div>
                                        <div class="col">
                                            <select class="form-select" aria-label="">
                                                <option selected>2:00 PM</option>
                                                <option value="9:00 AM">9:00 AM</option>
                                                <option value="10:00 AM">10:00 AM</option>
                                                <option value="11:00 AM">11:00 AM</option>
                                                <option value="12:00 PM">12:00 PM</option>
                                                <option value="1:00 PM">1:00 PM</option>
                                                <option value="2:00 PM">2:00 PM</option>
                                                <option value="3:00 PM">3:00 PM</option>
                                                <option value="4:00 PM">4:00 PM</option>
                                                <option value="5:00 PM">5:00 PM</option>
                                                <option value="6:00 PM">6:00 PM</option>
                                                <option value="7:00 PM">7:00 PM</option>
                                                <option value="8:00 PM">8:00 PM</option>
                                                <option value="9:00 PM">9:00 PM</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 hlc">
                                    <label for="howlongcleaing" class="form-label">How long do you need a cleaner to
                                        stay?</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Hours</option>
                                        <option value="3">3 hrs</option>
                                        <option value="4">4 hrs</option>
                                        <option value="5">5 hrs</option>
                                        <option value="6">6 hrs</option>
                                        <option value="7">7 hrs</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="container extraservice-div">
                            <label for="Extraservices" class="form-label">Extra Services</label>
                            <div class="service-row-1" id="service-row">

                                <div class="form-check">
                                    <input class="form-check-input" onclick="addHours()" type="checkbox"
                                        value="Inside cabinets" id="first-check">
                                    <label class="form-check-label Inside-cabinets-click" for="first-check">
                                        <div>
                                            <img src="assets/Img/bookservice/3.png" alt="" class="grey-img">
                                            <img src="assets/Img/bookservice/3-green.png" alt="" class="green-img">
                                        </div>
                                        <span class="Inside-cabinets">
                                            Inside cabinets
                                        </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Inside oven"
                                        id="second-check">
                                    <label class="form-check-label Inside-oven-click" for="second-check">
                                        <div>
                                            <img src="assets/Img/bookservice/4.png" alt="" class="grey-img">
                                            <img src="assets/Img/bookservice/4-green.png" alt="" class="green-img">
                                        </div>
                                        <span class="Inside-oven">
                                            Inside oven
                                        </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Laundry wash & dry"
                                        id="third-check">
                                    <label class="form-check-label Laundry-click" for="third-check">
                                        <div>
                                            <img src="assets/Img/bookservice/2.png" alt="" class="grey-img">
                                            <img src="assets/Img/bookservice/2-green.png" alt="" class="green-img">
                                        </div>
                                        <span class="Laundry-wash-dry">
                                            Laundry wash & dry
                                        </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Interior windows"
                                        id="fourth-check">
                                    <label class="form-check-label windows-click" for="fourth-check">
                                        <div>
                                            <img src="assets/Img/bookservice/1.png" alt="" class="grey-img">
                                            <img src="assets/Img/bookservice/1-green.png" alt="" class="green-img">
                                        </div>
                                        <span class="Interior-windows">
                                            Interior windows
                                        </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Inside cabinets"
                                        id="fifth-check">
                                    <label class="form-check-label cabinets-click" for="fifth-check">
                                        <div>
                                            <img src="assets/Img/bookservice/5.png" alt="" class="grey-img">
                                            <img src="assets/Img/bookservice/5-green.png" alt="" class="green-img">
                                        </div>
                                        <span class="Inside-cabinets">
                                            Inside Fridge
                                        </span>
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="container comments-div">
                            <label for="Comments" class="form-label">Comments</label>
                            <textarea class="form-control" aria-label="With textarea"></textarea>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    I have pets at home
                                </label>
                            </div>
                        </div>

                        <div class="container continue-button">
                            <button type="submit" class="btn">Continue</button>
                        </div>
                    </form>
                </div>


                <!-- third tab start=========>>>>>>>> -->
                <div class="tab-pane fade" id="yourdeatil" role="tabpanel" aria-labelledby="contact-tab">

                    <form action="">
                        <div class="container Address-show-div">
                            <label for="Entercontactdetails" class="form-label">Enter your contact detail, so we can
                                serve
                                you in better way!</label>
                            <div class="container address-detail">
                                <input type="radio" name="address" id="" class="radio-btn-address">
                                <div class="container detail-of-address">
                                    <span><strong>Address : </strong>112-ABC,XYZ</span><br>
                                    <span><strong>Phone Numebr :</strong>3216543215</span>
                                </div>
                            </div>

                            <div class="container address-detail">
                                <input type="radio" name="address" id="" class="radio-btn-address">
                                <div class="container detail-of-address">
                                    <span><strong>Address : </strong>112-ABC,XYZ</span><br>
                                    <span><strong>Phone Numebr :</strong>3216543215</span>
                                </div>
                            </div>

                            <div class="add-btn-div">
                                <a class="btn" data-bs-toggle="collapse" href="#collapseExample" role="button"
                                    aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-plus"></i>
                                    Add New Address
                                </a>
                            </div>

                            <div class="collapse add-address" id="collapseExample">
                                <div class="card card-body">

                                    <div class="row">
                                        <div class="col">
                                            <label for="inputEmail4" class="form-label">Street Name</label>
                                            <input type="text" class="form-control" placeholder="Street Name"
                                                aria-label="Street Name">
                                        </div>
                                        <div class="col">
                                            <label for="inputEmail4" class="form-label">House Number</label>
                                            <input type="text" class="form-control" placeholder="House Number"
                                                aria-label="House Number">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <label for="inputEmail4" class="form-label">Postal Code</label>
                                            <input type="text" class="form-control" placeholder="Postal Code"
                                                aria-label="Postal Code">
                                        </div>
                                        <div class="col">
                                            <label for="inputEmail4" class="form-label">City</label>
                                            <input type="text" class="form-control" placeholder="City"
                                                aria-label="City">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col col-md-6">
                                            <label for="inputEmail4" class="form-label">Phone Numbe</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping">+49</span>
                                                <input type="tel" class="form-control" placeholder="Phone Number"
                                                    aria-label="Phone Number" aria-describedby="addon-wrapping">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col button-div-col">
                                            <button type="submit" class="btn save-address">Save</button>

                                            <a class="btn cancle-address-btn" data-bs-toggle="collapse"
                                                href="#collapseExample" role="button" aria-expanded="false"
                                                aria-controls="collapseExample">
                                                Cancle
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="container favourite-pro-select">
                                <label for="Entercontactdetails" class="form-label fv-pro-label">Your Favourite Dervice
                                    Provider</label>
                                <hr>

                                <div class="container choose-fav-pro">
                                    <h6>You Can Choose Your Favourite Provider From Below</h6>
                                    <div>
                                        <div class="form-check avatar-card">
                                            <input class="form-check-input" type="checkbox" value="Sandip Patel"
                                                id="fav-pro">
                                            <label class="form-check-label" for="fav-pro">
                                                <div class="avatar-pro">
                                                    <img src="assets/Img/bookservice/cap.png" alt="">
                                                </div>
                                                <span class="avatar-pro-name">Sandip Patel</span>
                                                <button class="select-pro-btn">Select</button>
                                            </label>
                                        </div>
                                        <!-- <div class="container avatar-card">
                                            
                                        </div> -->
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="container continue-button">
                                <button type="submit" class="btn">Continue</button>
                            </div>
                        </div>
                    </form>

                </div>

                <!-- fourth tab start=======>>>>>>>>> -->
                <div class="tab-pane fade" id="makepayment" role="tabpanel" aria-labelledby="makepayment-tab">
                    <div class="container promo-code-div">
                        <form action="">
                            <label for="Payment-Gateway" class="form-label pay-securely-label">Pay Securely With
                                Helperland Payment Gateway!</label>
                            <div>
                                <div class="col-md-6 promo-input-div">
                                    <label for="inputEmail4" class="form-label">Promo Code (Optional)</label>
                                    <input type="text" placeholder="Promo Code (Optional)" class="form-control"
                                        id="promo-code">
                                </div>
                                <div class="col">
                                    <button class="apply-promo">Apply</button>
                                </div>
                            </div>
                            <hr>
                            <div class="card-number container">

                            </div>
                            <div class="accept-pay-terms container">
                                <div>
                                    <input type="checkbox" name="accept-terms-of-payment" id="" class="form-input">
                                </div>
                                <div>
                                    <span class="condition-text">
                                        I accept <a href="">terms and condition</a>, the <a href="">cancellation
                                            policy</a>
                                        and the <a href="">privacy policy</a>. I confirm that Helperland starts to
                                        execute the
                                        contract before the expiry of the withdrawal period and I lose my right of
                                        withdrawal as a consumer
                                        with fill performance of the contract.
                                    </span>
                                </div>
                            </div>
                            <hr>
                            <div class="complete-booking container">
                                <button type="submit" class="btn">Complete Booking</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <div class="container book-prices">
            <div class="book-prices-1">
                <div class="container header-price">
                    <span>Payment Summary</span>
                </div>
                <div class="container body-prices">
                    <div class="heading-cleaning">
                        <span>01/01/2018 @ 4:00 pm </span><br>
                        <span>1 bed, 1 bath.</span>
                    </div>
                    <div class="duration-heading">
                        <table class="time-tabel">
                            <thead>
                                <tr>
                                    <td colspan="2">Duration</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="service-name">Basic</td>
                                    <td class="service-hours">3 Hrs</td>
                                </tr>
                                <tr id="s1" class="s1">
                                    <td class="service-name">Inside cabinets (extra)</td>
                                    <td class="service-hours">30 Mins</td>
                                </tr>
                                <tr id="s2" class="s2">
                                    <td class="service-name">Inside oven (extra)</td>
                                    <td class="service-hours">30 Mins</td>
                                </tr>
                                <tr id="s3" class="s3">
                                    <td class="service-name">Inside Laundry wash & dry (extra)</td>
                                    <td class="service-hours">30 Mins</td>
                                </tr>
                                <tr id="s4" class="s4">
                                    <td class="service-name">Interior windows (extra)</td>
                                    <td class="service-hours">30 Mins</td>
                                </tr>
                                <tr id="s5" class="s5">
                                    <td class="service-name">Inside Fridge (extra)</td>
                                    <td class="service-hours">30 Mins</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>Total Service Time</td>
                                    <td class="total-hours">3.0</td>
                                </tr>
                            </tfoot>
                        </table>

                        <div class="dis-div">
                            <table>
                                <tr>
                                    <td>Per cleaning</td>
                                    <td class="dis-amm"><i class="fas fa-euro-sign"></i> 20</td>
                                </tr>
                                <tr>
                                    <td>Discount</td>
                                    <td class="dis-amm">- <i class="fas fa-euro-sign"></i> 0</td>
                                </tr>
                            </table>
                        </div>

                        <div class="pay-div">
                            <table>
                                <thead>
                                    <tr>
                                        <td class="total-pay-head">Total Payment</td>
                                        <td class="total-pay-amm"><i class="fas fa-euro-sign"></i> 60</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="effetive-pay-head">Effective Price</td>
                                        <td class="effetive-pay-amm"><i class="fas fa-euro-sign"></i> 50.4</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="diss-detail">
                            <span style="color: red; font-size: 16px;">*</span>
                            <span>You will save 20% according to §35a EStG.</span>
                        </div>
                    </div>
                </div>
                <div class="container footer-prices">
                    <img src="assets/Img/bookservice/smiley.png" alt="">
                    See what is always included
                </div>
            </div>
            <div class="freq-questions">
                <h2>Questions?</h2>
                <div class="container">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button accordion-button1" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                    aria-controls="collapseOne">
                                    <img src="assets/Img/bookservice/forma-1_3.png" class="arrow arrow-down" alt="" id="arrow1">
                                    Which Helperland professional will come to my place?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the first item's accordion body.</strong> It is shown
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button accordion-button2 collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                    <img src="assets/Img/bookservice/forma-1_3.png" class="arrow" alt="" id="arrow2">
                                    Which Helperland professional will come to my place?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the second item's accordion body.</strong> It is hidden by default,
                                    until the collapse plu
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button accordion-button3 collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    <img src="assets/Img/bookservice/forma-1_3.png" class="arrow" alt="" id="arrow3">
                                    Which Helperland professional will come to my place?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- footer start -->
    <?php include 'includes/footer.php'; ?>
    <!-- footer end -->

</body>

</html>