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
    <script defer src="https://pro.fontawesome.com/releases/v5.10.0/js/all.js" integrity="sha384-G/ZR3ntz68JZrH4pfPJyRbjW+c0+ojii5f+GYiYwldYU69A+Ejat6yIfLSxljXxD" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="Css/faq.css">
    <link rel="stylesheet" href="Css/uparr.css">
    <link rel="stylesheet" href="Css/loginmodal.css">

    <script src="js/uparr.js"></script>

    <title>FAQs</title>
</head>

<body>

    <?php
    include 'includes/uparr.php';
    include 'modal/loginmodal.html';
    include 'modal/forgotpassmodal.html';
    ?>

    <!-- navbar start -->
    <?php include 'includes/navbar.php'; ?>
    <!-- navbar end -->

    <!-- images -->
    <section id="faqimg">
        <div class="container-fluid" id="faq-img">
            <!-- <img src="images/group-16.png" alt="" srcset=""> -->
        </div>
    </section>
    <!-- images end -->

    <!-- FAQ -->
    <section class="faq-1">
        <div class="container-fluid" style="padding-left: 0; padding-right: 0; margin: 0;">
            <div class="container" id="heading-faq">
                <div id="FAQ">
                    FAQs
                </div>
                <div class="star-logo">
                    <div class="Rectangle-5-copy-6"></div>
                    <div>
                        <img src="Img/faq/forma-1.png" alt="forma-1">
                    </div>
                    <div class="Rectangle-5-copy-6"></div>
                </div>
                <div id="text-bottom">
                    Whether you are Customer or Service provider,<br>
                    We have tried our best to solve all your queries and questions.
                </div>
            </div>
        </div>
        <div class="container-fluid" id="body-faq-1">
            <div class="container d-flex justify-content-center" id="body-faq">
                <div id="tabs">

                    <div class="d-flex justify-content-center">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="li-1 nav-item" role="presentation">
                                <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#tabs-1" type="button" role="tab" aria-controls="pills-home" aria-selected="true">For Customer
                                </a>
                            </li>
                            <li class="li-2 nav-item" role="presentation">
                                <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#tabs-2" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">For Service Provider
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="tab-content" id="pills-tabContent">
                        <div id="tabs-1" class="tab-pane fade show active" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <img src="Img/faq/vector-smart-object.png" alt="" srcset="">

                                            </button>
                                            What's included in a cleaning?
                                        </h2>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            Bedroom, Living Room & Common Areas, Bathrooms, Kitchen, Extras
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                <img src="Img/faq/vector-smart-object.png" alt="" srcset="">
                                            </button>
                                            Which Helperland professional will come to my place?
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body">
                                            Helperland has a vast network of experienced, top-rated cleaners. Based on the time and date of your request, we work to assign the best professional available. Like working with a specific pro? Add them to your Pro Team from the mobile app and they'll be requested first for all future bookings. You will receive an email with details about your professional prior to your appointment.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                <img src="Img/faq/vector-smart-object.png" alt="" srcset="">
                                            </button>
                                            Can I skip or reschedule bookings?
                                        </h2>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="card-body">
                                            You can reschedule any booking for free at least 24 hours in advance of the scheduled start time. If you need to skip a booking within the minimum commitment, we will credit the value of the booking to your account. You can use this credit on future cleanings and other Helperland services.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingfour">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                                <img src="Img/faq/vector-smart-object.png" alt="" srcset="">
                                            </button>
                                            Do I need to be home for the booking?
                                        </h2>
                                    </div>
                                    <div id="collapsefour" class="collapse" aria-labelledby="headinfive" data-parent="#accordionExample">
                                        <div class="card-body">
                                            We strongly recommend that you are home for the first clean of your booking to show your cleaner around. Some customers choose to give a spare key to their cleaner, but this decision is based on individual preferences.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- =================== -->
                        <div id="tabs-2" class="tab-pane fade" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingethirty">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapsethirty" aria-expanded="true" aria-controls="collapsethirty">
                                                <img src="Img/faq/vector-smart-object.png" alt="" srcset="">
                                            </button>
                                            How much do service providers earn?
                                        </h2>
                                    </div>

                                    <div id="collapsethirty" class="collapse show" aria-labelledby="headingthirty" data-parent="#accordionExample">
                                        <div class="card-body">
                                            The self-employed service providers working with Helperland set their own payouts, this means that they decide how much they earn per hour.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingthirtyone">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsethirtyone" aria-expanded="false" aria-controls="collapsethirtyone">
                                                <img src="Img/faq/vector-smart-object.png" alt="" srcset="">
                                            </button>
                                            What support do you provide to the service providers?
                                        </h2>
                                    </div>
                                    <div id="collapsethirtyone" class="collapse" aria-labelledby="headingthirtyone" data-parent="#accordionExample">
                                        <div class="card-body">
                                            Our call-centre is available to assist the service providers with all queries or issues in regards to their bookings during office hours. Before a service provider starts receiving jobs, every individual partner receives an orientation session to familiarise with the online platform and their profile.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- foq end -->

    <!-- get news -->
    <section class="news-letter">
        <div class="newsletter text-center">
            <div class="new-head">GET OUR NEWSLETTER</div>
            <div id="news-id">
                <form class="yourname">
                    <div class="form-group">
                        <div class="text-box">
                            <input type="text" class="form-control" id="input-t-1" placeholder="YOUR EMIAL">
                        </div>
                        <div>
                            <button id="new-btn" class="col-form-label button-submit">Submit</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- get news -->

    <!-- footer start -->
    <?php include 'includes/footer.php'; ?>
    <!-- footer end -->
</body>

</html>