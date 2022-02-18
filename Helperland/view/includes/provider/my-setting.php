<div class="div-content">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">My Detailes</button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Change Password</button>
        </div>
    </nav>

    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="cudtomer-status pt-2 pb-2">
                <span class="a-s-heading">Account Status</span>
                <span class="a-s-text">Active</span>
            </div>
            <form action="">
                
            </form>
        </div>
        <div class="tab-pane" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <form action="" method="post" class="pt-1">
                <div class="row pt-3">
                    <div class="col-md-4">
                        <label for="" class="form-label">Old Password</label>
                        <input type="password" name="oldpass" class="form-control" id="" placeholder="Old Password">
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-md-4">
                        <label for="" class="form-label">New Password</label>
                        <input type="password" name="newpass" class="form-control" id="" placeholder="Password">
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-md-4">
                        <label for="" class="form-label">Confirm Password</label>
                        <input type="text" name="cpass" class="form-control" id="" placeholder="Confirm Password">
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-md-4">
                        <button type="submit" name="save" value="save" class="btn save-pass-btn">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>