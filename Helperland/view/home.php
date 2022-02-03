<?php
  // if(isset($_SESSION['user'])){
  //   $user = $_SESSION['user'];
  // }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script defer src="https://pro.fontawesome.com/releases/v5.10.0/js/all.js" integrity="sha384-G/ZR3ntz68JZrH4pfPJyRbjW+c0+ojii5f+GYiYwldYU69A+Ejat6yIfLSxljXxD" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="assets/Css/uparr.css">
  <link rel="stylesheet" href="assets/Css/loginmodal.css">
  <link rel="stylesheet" href="assets/Css/loginnavbar.css">
  <link rel="stylesheet" href="assets/Css/style.css">

  <script src="assets/js/uparr.js"></script>
  <script src="assets/js/snavbar.js"></script>

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

  <!-- Home Section -->
  <section class="home" id="home" style="padding: 0px;">
    <div class="home-content container-fluid">
      <div class="home-text container-fluid">
        <h1 class="title">Do not feel like housework?</h1>
        <h5>Great! Book now for Helperland and enjoy the benefits</h5>
        <ul class="List">
          <li><i class="fas fa-check pl-1"></i>certified & insured helper</li>
          <li><i class="fas fa-check pl-1"></i>easy booking procedure</li>
          <li><i class="fas fa-check pl-1"></i>friendly customer service</li>
          <li><i class="fas fa-check pl-1"></i>secure online payment method</li>
        </ul>
      </div>
      <div class="text-center button">
        <button class="">Let's Book a Cleaner</button>
      </div>
      <div class="payment-process">
        <div class="payment-process-box text-center">
          <div class="icon-box">
            <img src="assets/Img/Home/forma-1-copy.png" alt="forma-1" class="img-size">
          </div>
          <h6>Enter your postcode</h6>
        </div>
        <div class="arrow icon-box">
          <img src="assets/Img/Home/country-flag/step-arrow-1.png" alt="arrow">
        </div>
        <div class="payment-process-box text-center">
          <div class="icon-box">
            <img src="assets/Img/Home/group-22.png" alt="group-22" class="img-size">
          </div>
          <h6>Select your plan</h6>
        </div>
        <div class="arrow icon-box">
          <img src="assets/Img/Home/step-arrow-1-copy.png" alt="arrow-flip" class="rotateImg">
        </div>
        <div class="payment-process-box text-center">
          <div class="icon-box">
            <img src="assets/Img/Home/forma-1.png" alt="group-22" class="img-size">
          </div>
          <h6>Pay securely online</h6>
        </div>
        <div class="arrow icon-box">
          <img src="assets/Img/Home/country-flag/step-arrow-1.png" alt="arrow">
        </div>
        <div class="payment-process-box text-center">
          <div class="icon-box">
            <img src="assets/Img/Home/forma-1.png" alt="group-22" class="img-size">
          </div>
          <h6>Enjoy amzing service</h6>
        </div>
      </div>
      <div class="darr container-fluid">
        <a href="#helperland">
          <img src="assets/Img/Home/shape-1.png" alt="down-arrow" class="down-arrow">
        </a>
      </div>
    </div>
  </section>
  <!-- home section end -->

  <!-- halperhand -->
  <section id="helperland" class="helperland">
    <div class="heading row text-center">
      <h2>Why Helperland</h2>
    </div>
    <div class="row mainhealper m-5">
      <div class="card">
        <img class="card-img-top cardimg" src="assets/Img/Home/group-21.png" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Friendly & Certified Helpers</h5>
          <p class="card-text">We want you to be completely satisfied with our service and feel comfortable at home. In order to guarantee this, our helpers go through a test procedure. Only when the cleaners meet our high standards, they may call themselves Helper.</p>

        </div>
      </div>

      <div class="card">
        <img class="card-img-top cardimg" src="assets/Img/Home/group-23.png" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Transparent and secure payment</h5>
          <p class="card-text">We have transparent prices, you do not have to scratch money or money on the sideboard Leave it: Pay your helper easily and securely via the online payment method. You will also receive an invoice for each completed cleaning.</p>

        </div>
      </div>

      <div class="card">
        <img class="card-img-top cardimg" src="assets/Img/Home/group-24.png" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">We're here for you</h5>
          <p class="card-text">You have a question or need assistance with the booking process? Our customer service is happy to help and advise you. How you can reach us you will find out when you look under "Contact". We look forward to hearing from you or reading.</p>

        </div>
      </div>
    </div>
  </section>
  <!-- halperhand end -->

  <!-- our blog -->
  <section id="Blog" class="blog  m-5 p-5">

    <img id="left-bg" src="assets/Img/Home/blog-left-bg.png" alt="" srcset="">
    <img id="right-bg" src="assets/Img/Home/blog-right-bg.png" alt="" srcset="">

    <div class="container mindiv">
      <div class="row frist container">

        <div class="blog-text col-md-6 col-sm-12 col-12">

          <div class="head-text">
            <h2>We do not know what makes you happy, </h2>
            <h2>but ...</h2>
          </div>

          <div class="body-text">
            <p>If it's not dusting off, our friendly helpers will free you from this burden - do not worry anymore about spending valuable time doing housework, but savor life, you're well worth your time with beautiful experiences. Free yourself and enjoy the gained time: Go celebrate, relax, play with your children, meet friends or dare to jump on the bungee.Other leisure ideas and exclusive events can be found in our blog - guaranteed free from dust and cleaning tips!</p>
          </div>

        </div>

        <div class="bog-img col-md-6 col-sm-12 col-12">
          <img src="assets/Img/Home/group-36.png" class="img1" alt="">
        </div>

      </div>
    </div>
  </section>
  <!-- our blog end -->

  <!-- what customer say -->
  <section class="say" id="testis">

    <div class="max-width">

      <div class="heading" style="margin-bottom: 60px;">
        <p class="heding-text">What Our Customers say</p>
      </div>

      <div class="review">

        <div class="col-md-3 people" style="background-color: white;">
          <div class="media-all">
            <div class="media d-flex align-items-center p-3">
              <img class="mr-3" src="assets/Img/Home/group-31.png" alt="Generic placeholder image">
              <div class="media-body pl-15">
                <h5 class="mt-0">Lary Watson</h5>
                Manchester
              </div>
            </div>
            <span class="top-message"><a href=""><img src="assets/Img/Home/message.png" alt="" srcset=""></a></span>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi ullam corporis adipisci aut dolor,
              officia
              laudantium quidem tempora in vero!
            </p>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit autem voluptas illo eligendi. Vero
              illum impedit alias earum p
            </p>
            <p><a href="" class="blog-read">Read More<img class="shape-2" src="assets/Img/Home/shape-2.png" alt="arrow" srcset=""></a></p>
          </div>
        </div>

        <div class="col-md-3 people" style="background-color: white;">
          <div class="media-all">
            <div class="media d-flex align-items-center p-3">
              <img class="mr-3" src="assets/Img/Home/group-32.png" alt="Generic placeholder image">
              <div class="media-body pl-15">
                <h5 class="mt-0">John Smith</h5>
                Manchester
              </div>
            </div>
            <span class="top-message"><a href=""><img src="assets/Img/Home/message.png" alt="" srcset=""></a></span>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi ullam corporis adipisci aut dolor,
              officia
              laudantium quidem tempora in vero!
            </p>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit autem voluptas illo eligendi. Vero
              illum impedit alias earum p
            </p>
            <p><a href="" class="blog-read">Read More<img class="shape-2" src="assets/Img/Home/shape-2.png" alt="arrow" srcset=""></a></p>
          </div>
        </div>

        <div class="col-md-3 people" style="background-color: white;">
          <div class="media-all">
            <div class="media d-flex align-items-center p-3">
              <img class="mr-3" src="assets/Img/Home/group-33.png" alt="Generic placeholder image">
              <div class="media-body pl-15">
                <h5 class="mt-0">Lars Johnson</h5>
                Manchester
              </div>
            </div>
            <span class="top-message"><a href=""><img src="assets/Img/Home/message.png" alt="" srcset=""></a></span>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi ullam corporis adipisci aut dolor,
              officia
              laudantium quidem tempora in vero!
            </p>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit autem voluptas illo eligendi. Vero
              illum impedit alias earum p
            </p>
            <p><a href="" class="blog-read">Read More<img class="shape-2" src="assets/Img/Home/shape-2.png" alt="arrow" srcset=""></a></p>
          </div>
        </div>
      </div>
    </div>

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
  </section>
  <!-- what customer say end -->

  <!-- footer start -->
  <?php include 'includes/footer.php'; ?>
  <!-- footer end -->

</body>

</html>