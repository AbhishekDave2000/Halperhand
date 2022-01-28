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

  <link rel="stylesheet" href="Css/about_us.css">
  <link rel="stylesheet" href="Css/uparr.css">
  <link rel="stylesheet" href="Css/loginmodal.css">

  <script src="js/uparr.js"></script>

  <title>About us</title>
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
  <section>
    <div class="container-fluid" id="faq-img">
      <!-- <img src="images/group-16.png" alt="" srcset=""> -->
    </div>
  </section>
  <!-- images end -->

  <!-- A Few Words -->
  <div class="container" id="word-main">
    <div id="words">
      A Few words about us
    </div>

    <div class="star-logo">
      <div class="Rectangle-5-copy-6"></div>
      <div>
        <img src="Img/faq/forma-1.png" alt="forma-1">
      </div>
      <div class="Rectangle-5-copy-6"></div>
    </div>

    <div class="container content1">
      <p>We are providers of professional home cleaning services, offering hourly based house cleaning options, which mean that you don’t have to fret about getting your house cleaned anymore. We will handle everything for you, so that you can focus on spending your precious time with your family members.</p>

      <p>We have a number of experienced cleaners to help you make cleaning out or shifting your home an easy affair.</p>
    </div>


    <div id="story">
      Our Story
    </div>

    <div class="star-logo">
      <div class="Rectangle-5-copy-6"></div>
      <div>
        <img src="Img/faq/forma-1.png" alt="forma-1">
      </div>
      <div class="Rectangle-5-copy-6"></div>
    </div>

    <div class="container content2">
      <p>A cleaner is a type of industrial or domestic worker who cleans homes or commercial premises for payment. Cleaners may specialise in cleaning particular things or places, such as window cleaners. Cleaners often work when the people who otherwise occupy the space are not around. They may clean offices at night or houses during the workday.
      </p>
    </div>
  </div>

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