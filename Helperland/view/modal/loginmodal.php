<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="assets/js/userValidator.js"></script>
<style>
  .error {
    color: red;
    margin-left: 5px;
    display: inline;
  }
  label.error {
    display: inline !important;
  }
</style>

<?php
  $base_url = "http://localhost/Halperhand/Helperland/";
  // include("controller/AuthenticationController.php");
?>

<div class="modal fade" id="login-model" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-header l-m-h">
          <h5 class="modal-title" id="staticBackdropLabel">Login to your account</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body l-m-b">
          <form action="<?= $base_url.'?controller=Authentication&function=Login'?>" method="post" id="login-form-modal">
            <div class="col">
              <div class="row">
                <input type="text" class="form-control" id="login-Email" name="Email" placeholder="Email" aria-label="Email" value="<?php if(isset($_COOKIE['user'])){echo $_COOKIE['user'];} ?>">
                <i class="fa fa-user" aria-hidden="true"></i>
              </div>
              <div class="row">
                <input type="password" class="form-control" id="login-Password" name="Password" placeholder="Password" aria-label="Password" value="<?php if(isset($_COOKIE['pass'])){echo $_COOKIE['pass'];} ?>">
                <i class="fas fa-lock" aria-hidden="true"></i>
              </div>
              <div class="row">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="check" value="1" id="gridCheck" <?php if(isset($_COOKIE['check'])){ ?> checked <?php } ?>>
                  <label class="form-check-label" for="gridCheck">
                    Remember me
                  </label>
                </div>
              </div>
              <div class="row">
                <button type="submit" name="Login" id="login-btn" value="Login" class="btn">Login</button>
              </div>
              <div class="row">
                <p><a href="" data-bs-toggle="modal" data-bs-target="#forgotpass" data-bs-dismiss="modal">Forgot Password</a></p>
                <span>Don't have an account?<a class="forgot-modal-link" href="<?= $base_url.'?controller=Default&function=CustomerSignup'?>"> Create
                    an account</a></span>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

