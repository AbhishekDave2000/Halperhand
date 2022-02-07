<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script defer src="https://pro.fontawesome.com/releases/v5.10.0/js/all.js" integrity="sha384-G/ZR3ntz68JZrH4pfPJyRbjW+c0+ojii5f+GYiYwldYU69A+Ejat6yIfLSxljXxD" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <link rel="stylesheet" href="assets/Css/contact.css">
    <link rel="stylesheet" href="assets/Css/uparr.css">
    <link rel="stylesheet" href="assets/Css/loginmodal.css">
    <link rel="stylesheet" href="assets/Css/loginnavbar.css">

    <script src="assets/js/uparr.js"></script>
    <script src="assets/js/contactform.js"></script>

    <title>Contact us</title>
</head>

<body>

    <?php
    include 'includes/uparr.php';
    include 'modal/loginmodal.php';
    include 'modal/forgotpassmodal.php';
    ?>

    <!-- navbar start -->
    <?php include 'includes/navbar.php'; ?>
    <!-- navbar end -->

    <!-- images -->
    <section>
        <div class="container-fluid" id="faq-img">
        </div>
    </section>
    <!-- images end -->


    <!-- contact-us -->
    <section class="contact-us-section">
        <div class="container" id="contact-heading">
            <div id="FAQ">
                Contact us
            </div>
            <div class="star-logo">
                <div class="Rectangle-5-copy-6"></div>
                <div>
                    <img src="assets/Img/contact/forma-1-copy-5.png" alt="forma-1">
                </div>
                <div class="Rectangle-5-copy-6"></div>
            </div>
        </div>

        <div class="container" id="contact-details">
            <div class="contacts">
                <div class="contacts-image">
                    <img src="assets/Img/contact/forma-1_2.png" alt="">
                </div>
                <div class="contacts-text">
                    1111 Lorem ipsum text 100, <br> Lorem ipsum AB
                </div>
            </div>
            <div class="contacts">
                <div class="contacts-image">
                    <img src="assets/Img/contact/phone-call.png" alt="">
                </div>
                <div class="contacts-text">
                    +49 (40) 123 56 7890 <br>
                    +49 (40) 987 56 0000
                </div>
            </div>
            <div class="contacts">
                <div class="contacts-image" style="padding-top: 7px;">
                    <img src="assets/Img/contact/vector-smart-object.png" alt="">
                </div>
                <div class="contacts-text">
                    info@helperland.com
                </div>
            </div>
        </div>

        <div class="Rectangle-21"></div>

        <div class="container-fluid contact-form">
            <span class="Get-in-touch-with-us">
                Get in touch with us
            </span>
            <!-- action="../controller/contactController.php" -->
            <form id="first_form" action="<?= $base_url.'?controller=contact&function=insertContact' ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <input type="text" name="firstname" id="c-first-name" class="form-control" placeholder="First name">
                    </div>
                    <div class="col">
                        <input type="text" name="lastname" id="c-last-name" class="form-control" placeholder="Last name">
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="input-group mb-2" id="phone-div">
                            <div class="input-group-prepend">
                                <div class="input-group-text">+49</div>
                            </div>
                            <input type="tel" name="phonenumber" id="c-phone-no" class="form-control" placeholder="Mobile Number">
                        </div>
                    </div>
                    <div class="col">
                        <input type="email" name="email" class="form-control" id="c-email-id" placeholder="Email Address">
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <select id="inputState" name="subject" class="form-control" required>
                            <option selected value="subject">Subject</option>
                            <option value="inquiry">Inquiry</option>
                            <option value="complaint">Complaint</option>
                            <option value="help">Help</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <textarea class="form-control" name="message" id="c-contact-message" rows="3"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col form-group">
                        <label for="formFile">Attechment</label>
                        <input class="form-control" name="attachment" type="file" id="formFile">
                    </div>
                </div>

                <div class="row">
                    <div class="form-check">
                        <input class="form-check-input" name="agree" type="checkbox" id="c-agreed-terms" required>
                        <label class="form-check-label" for="flexCheckDefault">
                            I hearby agree that my data entered into the contact form will be store electronically.
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <button type="submit" id="c-submit" name="submit" value="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- contact end -->

    <!-- map -->
    <section class="map-image">
        <iframe allowfullscreen="" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJxzZgCD_hvkcRTC-2Pt6bXt0&amp;key=AIzaSyAag-Mf1I5xbhdVHiJmgvBsPfw7mCqwBKU"></iframe>
    </section>
    <!-- map end -->

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