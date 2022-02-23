<!-- navbar start -->
<?php $base_url = Config::base_url; ?>
<nav class="navbar fixed-top navbar-expand-xl navbar-light" id="navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= $base_url . '?controller=Default&function=homepage' ?>">
            <img src="assets/Img/logo/white-logo-transparent-background.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link rounded-link" href="<?= $base_url . '?controller=Default&function=BookNowpage' ?>">Book a Cleaner</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url . '?controller=Default&function=pricespage' ?>">Prices & Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Our Guarantee</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url . '?controller=Default&function=homepage' ?>#Blog">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url . '?controller=Default&function=contactpage' ?>">Contact us</a>
                </li>
                <?php
                if (!isset($_SESSION['user'])) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link rounded-link" href="#" data-bs-toggle="modal" data-bs-target="#login-model">
                            Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded-link" href="<?= $base_url . '?controller=Default&function=ProviderSignup' ?>">Become a Helper</a>
                    </li>
                <?php } ?>
            </ul>

            <?php
            if (isset($_SESSION['user'])) {
            ?>
                <div class="float-right-notification drop-notification">
                    <ul>
                        <li class="nav-item dropdown" id="notification">
                            <a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><img src="assets/Img/spupcoming/notification.png" alt="" srcset=""></a>
                            <div class="Ellipse-5">0</div>

                            <div class="dropdown-menu dropdown-menu1" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>

                        <li class="nav-item" id="user-1">
                            <a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                                <img src="assets/Img/spupcoming/user.png" alt="" srcset="">
                                <img src="assets/Img/spupcoming/sp-arrow-down.png" class="Forma-1-copy">
                            </a>
                            <div class="dropdown-menu dropdown-menu2" aria-labelledby="navbarDropdown" style="width: 180px;">
                                <div class="label">
                                    <span style="padding-left: 15px;padding-bottom: 15px; font-size:medium ;">Welcome,<br>
                                        <span style="padding-left: 15px; font-weight:600; font-size:medium;"><?= $_SESSION['user']['FirstName']; ?></span>
                                    </span>
                                </div>
                                <div class="dropdown-divider" style="display: block;"></div>
                                <?php
                                    if($_SESSION['user']['UserTypeId'] == 1){ $function = 'customerDash'; $parameter = 'dashboard'; $setting = 'mysetting';}
                                    else if($_SESSION['user']['UserTypeId'] == 2){ $function = 'providerDash'; $parameter = 'new-service-request'; $setting='my-setting';}  
                                ?>
                                <a class="dropdown-item" href="<?= $base_url . '?controller=Default&function='.$function.'&parameter='.$parameter ?>">My Dashboard</a>
                                <a class="dropdown-item" href="<?= $base_url . '?controller=Default&function=customerDash&parameter='.$setting ?>">My Settings</a>
                                <a class="dropdown-item" href="<?= $base_url . '?controller=Authentication&function=Logout' ?>">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            <?php } ?>
        </div>
    </div>
</nav>
<!-- navbar end -->