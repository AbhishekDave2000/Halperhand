<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Provider</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script defer src="https://pro.fontawesome.com/releases/v5.10.0/js/all.js"
        integrity="sha384-G/ZR3ntz68JZrH4pfPJyRbjW+c0+ojii5f+GYiYwldYU69A+Ejat6yIfLSxljXxD"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="       crossorigin="anonymous"></script>

    <link rel="stylesheet" href="assets/Css/sprovider.css">
    <link rel="stylesheet" href="assets/Css/uparr.css">
    <link rel="stylesheet" href="assets/Css/loginmodal.css">

    <script src="assets/js/uparr.js"></script>
    <script src="assets/js/snavbar.js"></script>
    <script src="assets/js/userValidator.js"></script>

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


    <!-- registration -->
    <section class="registration-div">

        <div class="container" id="formdiv">
            <span class="Register-Now">
                Register Now!
            </span>
            <form id="pro-register-form" class="pro-register-form" action="<?= $base_url.'?controller=Authentication&function=Signup' ?>" method="POST">
            
            <input type="hidden" value="2" name="UserTypeId">
                <div class="col">
                    <div class="row">
                        <input type="text" name="firstname" id="firstname" class="form-control register-form-control" placeholder="First name">
                    </div>
                    <div class="row">
                        <input type="text" name="lastname" id="lastname" class="form-control register-form-control" placeholder="Last name">
                    </div>
                    <div class="row">
                        <input type="email" name="email" id="email" class="form-control register-form-control" placeholder="Email Address">
                    </div>
                    <div class="row" id="phone-div">
                        <input type="text" name="phone" id="phone" class="form-control register-form-control" placeholder="Phone Number">
                    </div>
                    <div class="row">
                        <input type="password" name="password" id="password" class="form-control register-form-control" placeholder="Password">
                    </div>
                    <div class="row">
                        <input type="password" name="confirmpassword" id="cpassword" class="form-control register-form-control" placeholder="Confirm Password">
                    </div>
                    <div class="row agree-div" id="check-box">
                        <input type="checkbox" name="agree" class="form-control register-form-control form-check-input" id="agreed">
                        <span class="I-accept-terms-and-conditions-privacy-policy">
                            <span class="text-style-1">I accept </span>terms and conditions<span
                                class="text-style-2">&</span>
                            privacy policy
                        </span>
                    </div>
                    <div class="row get-started-btn-main-div">
                        <button type="button" value="register" name="register" id="submit2" class="btn get-started-btn">Get Started
                            <img src="assets/Img/serviceprovider/shape-2.png" alt="arrow">
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- arrow image -->
        <div class="container down-arrow-div">
            <a href="#hiw"><img src="assets/Img/serviceprovider/group-18_5.png" alt="down arrow"></a>
        </div>
        <!-- arrow image end -->

    </section>
    <!-- registration end -->

    <!-- how it works -->
    <section class="how-it-works-container" id="hiw">
        <img src="assets/Img/serviceprovider/blog-left-bg.png" id="left-bg" alt="">
        <img src="assets/Img/serviceprovider/blog-right-bg.png" id="right-bg" alt="">

        <span class="How-it-works">
            How it works
        </span>
        <div class="container container-1">

            <div class="container container-1-1">
                <div class="container container-1-1-1">
                    <span class="Register-yourself">
                        Register yourself
                    </span>
                    <p class="text-para">
                        Provide your basic information to register
                        yourself as a service provider.
                    </p>
                    <a href="">Read more<img src="assets/Img/serviceprovider/shape-2-copy-3.png" alt="" srcset=""></a>
                </div>
                <div class="container container-1-1-2">
                    <img src="assets/Img/serviceprovider/group-18_3.png" alt="photo">
                </div>
            </div>

            <div class="container container-1-2">
                <div class="container container-1-2-1">
                    <img src="assets/Img/serviceprovider/group-18_2.png" alt="photo">
                </div>

                <div class="container container-1-2-2">
                    <span class="Get-service-requests">
                        Get service requests
                    </span>
                    <p class="text-para">
                        You will get service requests from
                        customes depend on service area and profile.
                    </p>
                    <a href="">Read more<img src="assets/Img/serviceprovider/shape-2-copy-3.png" alt="" srcset=""></a>
                </div>
            </div>

            <div class="container container-1-1 container-3">
                <div class="container container-1-1-1">
                    <span class="Register-yourself">
                        Complete service
                    </span>
                    <p class="text-para">
                        Accept service requests from your customers
                        and complete your work.
                    </p>
                    <a href="">Read more<img src="assets/Img/serviceprovider/shape-2-copy-3.png" alt="" srcset=""></a>
                </div>
                <div class="container container-1-1-2">
                    <img src="assets/Img/serviceprovider/group-18_4.png" alt="photo">
                </div>
            </div>

        </div>
    </section>
    <!-- how it works end -->

    <!-- footer start -->
    <?php include 'includes/footer.php'; ?>
    <!-- footer end -->

</body>

</html>