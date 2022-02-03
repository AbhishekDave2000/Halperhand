<!-- rate SP Modal -->
<div class="modal fade" id="RateSP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered rate-sp-model-dialog">
        <div class="modal-content rate-sp-modal-content">

            <div class="modal-header rate-sp-modal-header">
                <div class="name-sp d-flex">
                    <div class="cap-div">
                        <img class="cap" src="assets/Img/customer services history/cap.png" alt="cap">
                    </div>
                    <span>Lyum Watson <br>
                        <i class="fas fa-star i-con"></i>
                        <i class="fas fa-star i-con"></i>
                        <i class="fas fa-star i-con"></i>
                        <i class="fas fa-star i-con"></i>
                        <i class="fas fa-star i-con-e"></i>
                        4
                    </span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <h5 class="modal-title" id="exampleModalLabel">Rate your service provider</h5>
            </div>

            <form action="">
                <div class="modal-body rate-sp-modal-body">
                    <div class="col">
                        <div class="row">
                            <span>
                                <div class="Quali">On time arrival</div>
                                <i class="fas fa-star i-con"></i>
                                <i class="fas fa-star i-con"></i>
                                <i class="fas fa-star i-con"></i>
                                <i class="fas fa-star i-con"></i>
                                <i class="fas fa-star i-con-e"></i>
                            </span>
                        </div>
                        <div class="row">
                            <span>
                                <div class="Quali">Friendly</div>
                                <i class="fas fa-star i-con"></i>
                                <i class="fas fa-star i-con"></i>
                                <i class="fas fa-star i-con"></i>
                                <i class="fas fa-star i-con"></i>
                                <i class="fas fa-star i-con-e"></i>
                            </span>
                        </div>
                        <div class="row">
                            <span>
                                <div class="Quali">Quality of service</div>
                                <i class="fas fa-star i-con"></i>
                                <i class="fas fa-star i-con"></i>
                                <i class="fas fa-star i-con"></i>
                                <i class="fas fa-star i-con"></i>
                                <i class="fas fa-star i-con-e"></i>
                            </span>
                        </div>
                    </div>
                    <div class="feedbackonsp">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Feedback on the service
                                provider</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" value="submit" class="btn mb-3">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Reschedule-cancle">
    Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="Reschedule-cancle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-rcmodal">
        <div class="modal-content MCrcmodal">
            <div class="modal-header MHrc">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="modal-title" id="exampleModalLabel">Service Detail</h5>
            </div>
            <div class="modal-body MBrc">
                <div class="container-fluid modatl-time">
                    <div class="date-time">
                        <strong>05/10/2021 &nbsp; 8:00 - 11:30</strong>
                    </div>
                    <div class="modal-duration">
                        <span>Duration</span>: 3.5 hrs
                    </div>
                </div>
                <div class="container-fluid service-info">
                    <div>
                        <span class="service-info-heading">
                            Service Id:
                        </span>
                        <span>
                            8484
                        </span>
                    </div>
                    <div>
                        <span class="service-info-heading">
                            Extras:
                        </span>
                        <span>
                            Inside Cabinets
                        </span>
                    </div>
                    <div>
                        <span class="service-info-heading">
                            Net Amount:
                        </span>
                        <span class="modal-amount">
                            <i class="fas fa-euro-sign"></i> 87.5
                        </span>
                    </div>
                </div>
                <div class="container-fluid service-address-modal">
                    <div>
                        <span class="address-detail-head">
                            Service Address:
                        </span>
                        <span>
                            Tatvasoft,Ahmedabad.
                        </span>
                    </div>
                    <div>
                        <span class="address-detail-head">
                            Billing Address:
                        </span>
                        <span>
                            Same as cleaning Address
                        </span>
                    </div>
                    <div>
                        <span class="address-detail-head">
                            Phone:
                        </span>
                        <span>
                            +91 6543219879
                        </span>
                    </div>
                    <div>
                        <span class="address-detail-head">
                            Email:
                        </span>
                        <span>
                            abcxyz@hmail.com
                        </span>
                    </div>
                </div>
                <div class="container-fluid comments-div">
                    <span class="heading-comments">
                        Comments
                    </span>
                    <span class="comment-body">
                        <div class="cross">
                            <i class="fas fa-times"></i>
                        </div>
                        <span>I don't have pets at home</span>
                    </span>
                </div>


            </div>
            <div class="modal-footer rc-btn-div">
                <button type="button" class="btn Reschedule-btn" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#Reschedule-Request">
                    <i class="fas fa-history"></i> Reschedule
                </button>

                <button type="button" class="btn Cancel-btn" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#cancel-request">
                    <i class="fas fa-times"></i>Cancel
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="Reschedule-Request" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered reshedule-request-modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Reschedule Service Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="">
                    <label for="form" class="Reschedule-form-label">Select New Date And Time</label>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="date" class="form-control" placeholder="DD/MM/YYYY" aria-label="Date">
                        </div>
                        <div class="col-md-6">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Time</option>
                                <option value="8:00 AM">8:00 AM</option>
                                <option value="8:30 AM">8:30 AM</option>
                                <option value="9:00 AM">9:00 AM</option>
                                <option value="9:30 AM">9:30 AM</option>
                                <option value="10:00 AM">10:00 AM</option>
                                <option value="10:30 AM">10:30 AM</option>
                                <option value="11:00 AM">11:00 AM</option>
                                <option value="11:30 AM">11:30 AM</option>
                                <option value="12:00 PM">12:00 PM</option>
                                <option value="12:30 PM">12:30 PM</option>
                                <option value="1:00 PM">1:00 PM</option>
                                <option value="1:30 PM">1:30 PM</option>
                                <option value="2:00 PM">2:00 PM</option>
                                <option value="2:30 PM">2:30 PM</option>
                                <option value="3:00 PM">3:00 PM</option>
                                <option value="3:30 PM">3:30 PM</option>
                                <option value="4:00 PM">4:00 PM</option>
                                <option value="4:30 PM">4:30 PM</option>
                                <option value="5:00 PM">5:00 PM</option>
                                <option value="5:30 PM">5:30 PM</option>
                                <option value="6:00 PM">6:00 PM</option>
                                <option value="6:30 PM">6:30 PM</option>
                                <option value="7:00 PM">7:00 PM</option>
                                <option value="7:30 PM">7:30 PM</option>
                                <option value="8:00 PM">8:00 PM</option>
                            </select>
                        </div>
                    </div>
                    <div class="row btn-row">
                        <button class="btn Update-btn-reschedule" value="submit">Update</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="cancel-request" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered cancel-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <label for="form" class="cancel-form-label">Why you want to cancel the request?</label>
                    <textarea class="form-control" aria-label="With textarea"></textarea>
                    <button type="submit" class="btn cancel-btn-modal">Cancel Now</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- address modal end-->
<div class="modal fade" id="add-address-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered addressMD">
        <div class="modal-content addressMC">
            <div class="modal-header addressMH">
                <h5 class="modal-title" id="">Add New Address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body addressMB">
                <form action="" method="post">
                    <div class="row pb-3">
                        <div class="col-md-6">
                            <label for="" class="form-label">Street Name</label>
                            <input type="text" class="form-control" id="" placeholder="Street Name">
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">House Number</label>
                            <input type="text" class="form-control" id="" placeholder="House Number">
                        </div>
                    </div>
                    <div class="row pb-3">
                        <div class="col-md-6">
                            <label for="" class="form-label">Postal Code</label>
                            <input type="text" class="form-control" id="" placeholder="Postal Code">
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">City</label>
                            <input type="text" class="form-control" id="" placeholder="City">
                        </div>
                    </div>
                    <div class="row pb-3">
                        <div class="col-md-6">
                            <label for="" class="form-label">Phone Number</label>
                            <div class="input-group">
                                <div class="input-group-text">+49</div>
                                <input type="tel" class="form-control" id="" placeholder="Phone Number">
                            </div>
                        </div>
                    </div>
                    <div class="row btn-row-add pb-2 pt-1">
                        <button class="btn new-address-btn" type="submit">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- address modal end -->