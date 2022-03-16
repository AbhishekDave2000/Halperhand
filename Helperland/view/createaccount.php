<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Customer Account</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <script src="assets/js/userValidator.js"></script>
    <link rel="stylesheet" href="assets/Css/createaccount.css">
    <link rel="stylesheet" href="assets/Css/loginmodal.css">
</head>


<body>
    <?php include("view/modal/loginmodal.php"); ?>

    <!-- navbar start -->
    <?php include("view/includes/navbar.php"); ?>
    <!-- navbar end -->

    <section class="form-section">
        <div class="main-div container-fluid">
            <div id="words">
                Create an Account
            </div>

            <div class="star-logo">
                <div class="Rectangle-5-copy-6"></div>
                <div>
                    <img src="assets/Img/assets/forma-1.png" alt="forma-1">
                </div>
                <div class="Rectangle-5-copy-6"></div>
            </div>

            <div class="container-fluid form-div">

                <form class="customer-register-form" method="post" action="<?= Config::base_url . '?controller=Authentication&function=Signup' ?>">

                    <input type="hidden" value="1" name="UserTypeId">

                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name" aria-label="First name">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name" aria-label="Last name">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" aria-label="Email Address">
                        </div>
                        <div class="col">
                            <label class="visually-hidden" for="autoSizingInputGroup">Mobile Number</label>
                            <div class="input-group" id="phone-div">
                                <div class="input-group-text">+49</div>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <input type="password" class="form-control pass" name="password" id="password" placeholder="Password" aria-label="Password">
                        </div>
                        <div class="col">
                            <input type="password" class="form-control pass" name="confirmpassword" id="cpassword" placeholder="Confirm Password" aria-label="Confirm Password">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col agree-div">
                            <input class="form-check-input" value="agree" name="agree" type="checkbox" id="agreed">

                            <label class="form-check-label" for="gridCheck">
                                I have read the <a href="#" class="privacy-policy-link">privacy policy</a>
                            </label>
                        </div>
                    </div>

                    <div class="row text-center submit-btn-main-div">
                        <div class="col">
                            <button class="btn" id="submit1" type="button" value="register" name="register">Register</button>
                        </div>
                    </div>

                    <div class="row text-center">
                        <div class="col">
                            <span>Already Registered ? <a href="#" data-bs-target="#login-model" class="login-now-link">Login Now</a></span>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>


    <!-- footer start -->
    <?php include("view/includes/footer.php"); ?>
    <!-- footer end -->

</body>

</html>