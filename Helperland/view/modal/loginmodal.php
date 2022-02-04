<?php
  $base_url = "http://localhost/Halperhand/Helperland/";
  // include("controller/AuthenticationController.php");
?>

<div class="modal fade" id="login-model" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Login to your account</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <form action="<?= $base_url.'?controller=Authentication&function=Login'?>" method="post">
            <div class="col">
              <div class="row">
                <input type="text" class="form-control" name="Email" placeholder="Email" aria-label="Email" value="<?php if(isset($_COOKIE['user'])){echo $_COOKIE['user'];} ?>" required>
                <i class="fa fa-user" aria-hidden="true"></i>
              </div>
              <div class="row">
                <input type="password" class="form-control" name="Password" placeholder="Password" aria-label="Password" value="<?php if(isset($_COOKIE['pass'])){echo $_COOKIE['pass'];} ?>" required>
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
                <button type="submit" name="Login" value="Login" class="btn">Login</button>
              </div>
              <div class="row">
                <p><a href="" data-bs-toggle="modal" data-bs-target="#forgotpass" data-bs-dismiss="modal">Forgot Password</a></p>
                <span>Don't have an account?<a href="<?= $base_url.'?controller=Default&function=CustomerSignup'?>"> Create
                    an account</a></span>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

