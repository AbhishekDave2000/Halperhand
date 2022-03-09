<!-- Modal Forgotpassword -->
<div class="modal fade fpass" id="forgotpass" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header f-m-h">
          <h2 class="modal-title" id="exampleModalLabel">Forgot password</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body forgot-body">
          <form action="<?= $base_url.'?controller=Authentication&function=forgotPassword' ?>" method="POST" class="SendEmail-Form">
            <div class="col">
              <div class="row">
                <input type="text" name="email" id="F-send-Email" class="form-control" placeholder="Email Address" aria-label="Email">
              </div>
              <div class="row pt-4 send-btn-div">
                <button type="submit" name="send" value="send" id="E-send" class="btn">Send</button>
              </div>
              <div class="row">
                <span class="login-link"><a href="#" data-bs-toggle="modal"
                    data-bs-target="#login-model" data-bs-dismiss="modal">Login</a></span>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- modal forgotpassword end -->