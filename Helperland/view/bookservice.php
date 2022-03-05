<!DOCTYPE html>
<html lang="en">

<?php

$isLogin = true;
if (!isset($_SESSION['user'])) {
    $isLogin = false;
}

// if not set  
$base_url = Config::base_url;
?>
<head>
    <title>Book Now</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/booknow.js"></script>

    <!-- <script src="assets/js/booknow.js"></script> -->
    <link rel="stylesheet" href="assets/Css/bookservice.css">
    <link rel="stylesheet" href="assets/Css/uparr.css">
    <link rel="stylesheet" href="assets/Css/loginmodal.css">
    <link rel="stylesheet" href="assets/Css/loginnavbar.css">

    <script src="assets/js/uparr.js"></script>

</head>

<body>

    <?php
        include 'includes/uparr.php';
        include 'modal/loginmodal.php';
        include 'modal/forgotpassmodal.php';
        include 'modal/completeBooking.php';
    ?>

    <!-- session var -->
    <div id="user-session-val" class="session-var" style="padding-top: 70px;"><?php print_r($_SESSION['user']['UserId']); ?></div>
    <!-- session var end -->

    <!-- navbar -->
    <section class="navigation">
        <?php include("view/includes/navbar.php"); ?>
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
        <button type="button" class="btn prices-modal-button" data-bs-toggle="modal" data-bs-target="#prices-block">
            Payment Summary</button>

        <!-- Modal -->
        <div class="modal fade" id="prices-block" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" id="examplePaymentSummary">
                <div class="modal-content">
                    <div class="modal-header modal-prices-title">
                        <h5 class="modal-title">
                            <span>Payment Summary</span>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-3">
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
                    <a class="servicesetup-tab nav-link active" id="servicesetup-tab" data-bs-toggle="tab" data-bs-target="#servicesetup" type="button" role="tab" aria-controls="home" aria-selected="true">
                        <img class="grey" src="assets/Img/bookservice/setup-service.png" alt="">
                        <img class="white" src="assets/Img/bookservice/setup-service-white.png" alt="">
                        <span>Setup Service</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="scheduleplane-tab nav-link" id="scheduleplane-tab" data-bs-toggle="tab" data-bs-target="#scheduleplan" type="button" role="tab" aria-controls="profile" aria-selected="false">
                        <img class="grey" src="assets/Img/bookservice/schedule.png" alt="">
                        <img class="white" src="assets/Img/bookservice/schedule-white.png" alt="">
                        <span>Schedule Plan</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="yourdeatil-tab nav-link" id="yourdeatil-tab" data-bs-toggle="tab" data-bs-target="#yourdeatil" type="button" role="tab" aria-controls="contact" aria-selected="false">
                        <img class="grey" src="assets/Img/bookservice/details.png" alt="">
                        <img class="white" src="assets/Img/bookservice/details-white.png" alt="">
                        <span>Your Details</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="makepayment-tab nav-link" id="makepayment-tab" data-bs-toggle="tab" data-bs-target="#makepayment" type="button" role="tab" aria-controls="makepayment" aria-selected="false">
                        <img class="grey" src="assets/Img/bookservice/setup-service.png" alt="">
                        <img class="white" src="assets/Img/bookservice/setup-service-white.png" alt="">
                        <span>Setup Service</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">

                <!-- first tab content================ -->
                <div class="tab-pane fade show active" id="servicesetup" role="tabpanel" aria-labelledby="home-tab">
                    <form action="<?= $base_url . '?controller=booknow&function=postalCodeCheck'; ?>" method="POST" id="postal-Form" class="check-form first-step-form">
                        <div class="row postalcode-division">
                            <label for="postalcode" class="form-label enterpostal">Enter your postal code</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="postalcode" id="postalcode" placeholder="Postal code">
                            </div>
                            <div class="col-md-3">
                                <button type="submit" id="submit-step1" name="CheckAvailablity" value="CheckAvailablity" class="btn checkavailability-btn">Check Availablity</button>
                            </div>
                        </div>
                        <div class="alert alert-danger mt-4" id="postal-alert" role="alert">
                            We are not providing service in this area. We’ll notify you if any helper would start working near your area.
                        </div>
                    </form>
                </div>


                <!-- second tab content================= -->
                <div class="tab-pane fade" id="scheduleplan" role="tabpanel" aria-labelledby="profile-tab">
                    <form action="<?= $base_url . '?controller=booknow&function=bookNow'; ?>" class="Schedule-form">

                        <div class="container timing-div">
                            <div class="row first-row-second-tab pb-2">

                                <div class="col-md-6 wcn">
                                    <div class="row">
                                        <label for="whencleaing" class="form-label">When do you need a cleaner?</label>
                                        <div class="col">
                                            <input type="date" id="service-date" class="form-control" name="date-of-cleaning">
                                        </div>
                                        <div class="col">
                                            <select class="form-select" name="service-start-time" id="service-start-time" aria-label="">
                                                <option value="8.0">8:00</option>
                                                <option value="8.5">8:30</option>
                                                <option value="9.0">9:00</option>
                                                <option value="9.5">9:30</option>
                                                <option value="10.0">10:00</option>
                                                <option value="10.5">10:30</option>
                                                <option value="11.0">11:00</option>
                                                <option value="11.5">11:30</option>
                                                <option value="12.0">12:00</option>
                                                <option value="12.5">12:30</option>
                                                <option value="13.0">13:00</option>
                                                <option value="13.5">13:30</option>
                                                <option value="14.0">14:00</option>
                                                <option value="14.5">14:30</option>
                                                <option value="15.0">15:00</option>
                                                <option value="15.5">15:30</option>
                                                <option value="16.0">16:00</option>
                                                <option value="16.5">16:30</option>
                                                <option value="17.0">17:00</option>
                                                <option value="17.5">17:30</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 hlc">
                                    <label for="howlongcleaing" class="form-label">How long do you need a cleaner to
                                        stay?</label>
                                    <select class="form-select" name="service-hours-select" id="service-hour-select" aria-label="Default select example">
                                        <!-- <option>Hours</option> -->
                                        <option value="3">3.0 Hrs</option>
                                        <option value="3.5">3.5 Hrs</option>
                                        <option value="4">4.0 Hrs</option>
                                        <option value="4.5">4.5 Hrs</option>
                                        <option value="5">5.0 Hrs</option>
                                        <option value="5.5">5.5 Hrs</option>
                                        <option value="6">6.0 Hrs</option>
                                        <option value="6.5">6.5 Hrs</option>
                                        <option value="7">7.0 Hrs</option>
                                        <option value="7.5">7.5 Hrs</option>
                                        <option value="8">8.0 Hrs</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="container extraservice-div">
                            <label for="Extraservices" class="form-label">Extra Services</label>
                            <div class="service-row-1" id="service-row">

                                <div class="form-check extra-service-check">
                                    <input class="form-check-input extra-check-box" name="extra[]" type="checkbox" value="1" id="first-check">
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

                                <div class="form-check extra-service-check">
                                    <input class="form-check-input extra-check-box" name="extra[]" type="checkbox" value="2" id="second-check">
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

                                <div class="form-check extra-service-check">
                                    <input class="form-check-input extra-check-box" name="extra[]" type="checkbox" value="3" id="third-check">
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

                                <div class="form-check extra-service-check">
                                    <input class="form-check-input extra-check-box" type="checkbox" name="extra[]" value="4" id="fourth-check">
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

                                <div class="form-check extra-service-check">
                                    <input class="form-check-input extra-check-box" type="checkbox" name="extra[]" value="5" id="fifth-check">
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
                            <textarea class="form-control" name="service-comments-text" id="service-comments" aria-label="With textarea"></textarea>
                            <div class="form-check">
                                <input class="form-check-input" name="pets-at-home" id="petathome" type="checkbox" value="1">
                                <label class="form-check-label" for="gridCheck">
                                    I have pets at home
                                </label>
                            </div>
                        </div>

                        <div class="container continue-button ">
                            <button type="submit" name="step-2-submit" id="submit-step2" class="btn">Continue</button>
                        </div>
                    </form>
                </div>


                <!-- third tab start=========>>>>>>>> -->
                <div class="tab-pane fade" id="yourdeatil" role="tabpanel" aria-labelledby="contact-tab">

                    <form action="" method="POST" class="your-detail-form">
                        <div class="container Address-show-div">
                            <label for="Entercontactdetails" id="H" class="form-label">Enter your contact detail, so we can
                                serve
                                you in better way!</label>
                            <div id="address-div-wrap">
                                <!-- <div class="container address-detail">
                                    <input type="radio" name="address-radio" class="radio-btn-address">
                                    <div class="container detail-of-address">
                                        <span><strong>Address : </strong><span class="addressline1-2"></span></span><br>
                                        <span><strong>Phone Numebr :</strong><span class="address-phone-no"></span></span>
                                    </div>
                                </div> -->
                            </div>

                            <div class="add-select-radio pb-3"></div>

                            <div class="add-btn-div">
                                <a class="btn add-new-address-hide-btn" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-plus"></i>
                                    Add New Address
                                </a>
                            </div>

                            <div class="collapse add-address" id="collapseExample">
                                <div class="card card-body">
                                    <form action="" role="form" method="POST" class="add-address-form" id="Add-new-Address-form">
                                        <input type="hidden" id="useremailid" name="email-id" value="<?=$_SESSION['user']['Email']; ?>">
                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label">Street Name</label>
                                                <input type="text" id="stnm" class="form-control streetname-address" placeholder="Street Name" aria-label="Street Name">
                                            </div>
                                            <div class="col">
                                                <label class="form-label">House Number</label>
                                                <input type="text" id="housenm" class="form-control houseno-address" placeholder="House Number" aria-label="House Number">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label">Postal Code</label>
                                                <input type="text"  name="form-address-postal" id="address-postalcode" class="form-control postalcode-address" placeholder="Postal Code" aria-label="Postal Code" disabled>
                                            </div>
                                            <div class="col">
                                                <label class="form-label">City</label>
                                                <input type="text" id="citynm" class="form-control city-name-address" placeholder="City" aria-label="City" disabled>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col col-md-6">
                                                <label class="form-label">Phone Number</label>
                                                <div class="input-group flex-nowrap phone-number-address">
                                                    <span class="input-group-text" id="addon-wrapping">+49</span>
                                                    <input type="tel" id="phnm" class="form-control" placeholder="Phone Number" aria-label="Phone Number" aria-describedby="addon-wrapping">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col button-div-col">
                                                <button type="button" name="save-address" value="save-address" class="btn save-address save-address-btn">Save</button>

                                                <a class="btn cancle-address-btn" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    Cancle
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="container favourite-pro-select">
                                <label for="Entercontactdetails" class="form-label fv-pro-label">Your Favourite Service
                                    Provider</label>
                                <hr>

                                <div class="container choose-fav-pro">
                                    <h6>You Can Choose Your Favourite Provider From Below</h6>
                                    <div class="d-flex fav-pro-main-div">
                                        <!-- <div class="form-check avatar-card-select mr-1">
                                            <input class="form-check-input" type="radio" id="fp-1" name="favrioute-provider">
                                            <label class="form-check-label" for="fp-1">
                                                <div class="avatar-pro">
                                                    <img src="assets/Img/bookservice/cap.png" alt="">
                                                </div>
                                                <span class="avatar-pro-name">Sandip Patel</span>
                                                <p class="select-pro-btn">Select</p>
                                            </label>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="customer-userid" id="customer-user-input-id">
                            <hr>
                            <div class="container continue-button">
                                <button type="submit" id="submit-step3" class="btn">Continue</button>
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
                                    <input type="text" placeholder="Promo Code (Optional)" class="form-control" id="promo-code">
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
                                    <input type="checkbox" name="accept-terms-of-payment" class="form-input">
                                </div>
                                <div>
                                    <span class="condition-text">
                                        <span class="error" id="required-field-red">(* Required)</span>
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
                                <button type="submit" id="submit-step4" class="btn">Complete Booking</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>


        <div class="container book-prices side-payment-bar">
            <div class="book-prices-1">
                <div class="container header-price" id="payment-header">
                    <span>Payment Summary</span>
                </div>
                <div class="container body-prices">
                    <div class="heading-cleaning d-flex">
                        <span class="duration-date pr-2"></span>
                        <span class="duration-time"></span>
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
                                    <td class="service-hours basic-service-hours">0 Hrs</td>
                                </tr>
                                <tr id="s1" class="s">
                                    <td class="service-name" colspan="2" style="font-weight: 600;">Extras</td>
                                </tr>
                                <tr id="s1" class="s1">
                                    <td class="service-name">Inside cabinets</td>
                                    <td class="service-hours">30 Mins</td>
                                </tr>
                                <tr id="s2" class="s2">
                                    <td class="service-name">Inside oven</td>
                                    <td class="service-hours">30 Mins</td>
                                </tr>
                                <tr id="s3" class="s3">
                                    <td class="service-name">Inside Laundry wash & dry</td>
                                    <td class="service-hours">30 Mins</td>
                                </tr>
                                <tr id="s4" class="s4">
                                    <td class="service-name">Interior windows</td>
                                    <td class="service-hours">30 Mins</td>
                                </tr>
                                <tr id="s5" class="s5">
                                    <td class="service-name">Inside Fridge</td>
                                    <td class="service-hours">30 Mins</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>Total Service Time</td>
                                    <td class="total-hours">3 hrs</td>
                                </tr>
                            </tfoot>
                        </table>

                        <div class="dis-div">
                            <table>
                                <tr>
                                    <td>Per cleaning</td>
                                    <td class="dis-amm">9&nbsp; <i class="fas fa-euro-sign"></i></td>
                                </tr>
                                <!-- <tr>
                                    <td>Discount</td>
                                    <td class="dis-amm">-0 <i class="fas fa-euro-sign"></i></td>
                                </tr> -->
                            </table>
                        </div>

                        <div class="pay-div">
                            <table>
                                <thead>
                                    <tr>
                                        <td class="total-pay-head">Total Payment</td>
                                        <td class="total-pay-amm"><span class="t_payment">0,00</span>&nbsp;<i class="fas fa-euro-sign"></i></td>
                                    </tr>
                                </thead>
                                <!-- <tbody>
                                    <tr>
                                        <td class="effetive-pay-head">Effective Price</td>
                                        <td class="effetive-pay-amm"> <i class="fas fa-euro-sign"></i> </td>
                                    </tr>
                                </tbody> -->
                            </table>
                        </div>
                        <!-- <div class="diss-detail">
                            <span style="color: red; font-size: 16px;">*</span>
                            <span>You will save 20% according to §35a EStG.</span>
                        </div> -->
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
                                <button class="accordion-button accordion-button1 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <img src="assets/Img/bookservice/forma-1_3.png" class="arrow" alt="" id="arrow1">
                                    What's included in a cleaning?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Bedroom, Living Room & Common Areas, Bathrooms, Kitchen, Extras
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button accordion-button2 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <img src="assets/Img/bookservice/forma-1_3.png" class="arrow" alt="" id="arrow2">
                                    Which Helperland professional will come to my place?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Helperland has a vast network of experienced, top-rated cleaners. Based on the time and date of your request, we work to assign the best professional available. Like working with a specific pro? Add them to your Pro Team from the mobile app and they'll be requested first for all future bookings. You will receive an email with details about your professional prior to your appointment.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button accordion-button3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <img src="assets/Img/bookservice/forma-1_3.png" class="arrow" alt="" id="arrow3">
                                    Can I skip or reschedule bookings?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    You can reschedule any booking for free at least 24 hours in advance of the scheduled start time. If you need to skip a booking within the minimum commitment, we will credit the value of the booking to your account. You can use this credit on future cleanings and other Helperland services.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-2 mb-5">
                    <a href="<?= $base_url . '?controller=Default&function=faqpage'; ?>" target="_blank" class="extra-faq">For more help</a>
                </div>
            </div>
        </div>
    </section>


    <!-- footer start -->
    <?php include 'includes/footer.php'; ?>
    <!-- footer end -->

</body>

</html>

<?php if (!$isLogin) { ?>
    <script>
        $(document).ready(function() {
            $('#login-model').modal('show');
        });
    </script>
<?php } ?>