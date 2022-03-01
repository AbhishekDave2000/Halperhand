<!-- rate SP Modal -->
<div class="modal fade" id="RateSP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered rate-sp-model-dialog">
        <div class="modal-content rate-sp-modal-content">

            <div class="modal-header rate-sp-modal-header">
                <div class="name-sp d-flex">
                    <div class="cap-div cap-div-avatar-modal">
                        <img class="cap" src="assets/Img/customer/cap.png" alt="cap">
                    </div>
                    <div style="display: flex; flex-direction:column;">
                        <span class="sp-rate-name" style="font-size: 18px;"></span>
                        <span>
                            <span class="rating-of-sp"></span>
                            <span class="ratings-sp-no"></span>
                        </span>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <h5 class="modal-title pl-2" id="exampleModalLabel" style="width: 100%;">Rate your service provider</h5>
            </div>

            <form action="" method="POST" class="s-p-rate-form">
                <div class="modal-body rate-sp-modal-body">
                    <input type="hidden" name="c-id" value="<?= $_SESSION['user']['UserId'] ?>">
                    <input type="hidden" name="sp-id" class="sp_rating_name">
                    <input type="hidden" name="sr-id" class="sp_service_id">
                    <div class="col">
                        <div class="row">
                            <span>
                                <div class="Quali">On time arrival</div>
                                <div class="rate">
                                    <input type="radio" id="ota-star5" name="ota-rate" class="OTA-rate" value="5" />
                                    <label for="ota-star5" title="text">5 stars</label>
                                    <input type="radio" id="ota-star4" name="ota-rate" class="OTA-rate" value="4" />
                                    <label for="ota-star4" title="text">4 stars</label>
                                    <input type="radio" id="ota-star3" name="ota-rate" class="OTA-rate" value="3" />
                                    <label for="ota-star3" title="text">3 stars</label>
                                    <input type="radio" id="ota-star2" name="ota-rate" class="OTA-rate" value="2" />
                                    <label for="ota-star2" title="text">2 stars</label>
                                    <input type="radio" id="ota-star1" name="ota-rate" class="OTA-rate" value="1" />
                                    <label for="ota-star1" title="text">1 star</label>
                                </div>
                            </span>
                        </div>
                        <div class="row">
                            <span>
                                <div class="Quali">Friendly</div>
                                <div class="rate">
                                    <input type="radio" id="Friendly-star5" name="Friendly-rate" class="F-rate" value="5" />
                                    <label for="Friendly-star5" title="text">5 stars</label>
                                    <input type="radio" id="Friendly-star4" name="Friendly-rate" class="F-rate" value="4" />
                                    <label for="Friendly-star4" title="text">4 stars</label>
                                    <input type="radio" id="Friendly-star3" name="Friendly-rate" class="F-rate" value="3" />
                                    <label for="Friendly-star3" title="text">3 stars</label>
                                    <input type="radio" id="Friendly-star2" name="Friendly-rate" class="F-rate" value="2" />
                                    <label for="Friendly-star2" title="text">2 stars</label>
                                    <input type="radio" id="Friendly-star1" name="Friendly-rate" class="F-rate" value="1" />
                                    <label for="Friendly-star1" title="text">1 star</label>
                                </div>
                            </span>
                        </div>
                        <div class="row">
                            <span>
                                <div class="Quali">Quality of service</div>
                                <div class="rate">
                                    <input type="radio" id="Qos-star5" name="Qos-rate" class="QOS-rate" value="5" />
                                    <label for="Qos-star5" title="text">5 stars</label>
                                    <input type="radio" id="Qos-star4" name="Qos-rate" class="QOS-rate" value="4" />
                                    <label for="Qos-star4" title="text">4 stars</label>
                                    <input type="radio" id="Qos-star3" name="Qos-rate" class="QOS-rate" value="3" />
                                    <label for="Qos-star3" title="text">3 stars</label>
                                    <input type="radio" id="Qos-star2" name="Qos-rate" class="QOS-rate" value="2" />
                                    <label for="Qos-star2" title="text">2 stars</label>
                                    <input type="radio" id="Qos-star1" name="Qos-rate" class="QOS-rate" value="1" />
                                    <label for="Qos-star1" title="text">1 star</label>
                                </div>
                            </span>
                        </div>
                    </div>
                    <div class="feedbackonsp">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Feedback on the service
                                provider</label>
                            <textarea class="form-control" name="rate-comments" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" id="rating-submit-btn-pro" class="btn mb-3 rating-submit-btn">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="Reschedule-cancle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-dialog-rcmodal">
        <div class="modal-content MCrcmodal">
            <div class="modal-header MHrc">
                <h5 class="modal-title" id="exampleModalLabel">Service Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body MBrc">
                <div class="container-fluid modatl-time">
                    <div class="date-time">
                        <strong><span class="s-start-date"></span> &nbsp; <span class="start-end-time-service"></span></strong>
                    </div>
                    <div class="modal-duration">
                        <span>Duration : </span><span class="model-service-duration"></span> hrs
                    </div>
                </div>
                <div class="container-fluid service-info">
                    <div>
                        <span class="service-info-heading">Service Id:</span>
                        <span class="modal-s-id"></span>
                    </div>
                    <div>
                        <span class="service-info-heading">Extras:</span>
                        <span class="extra-service-modal-show"></span>
                    </div>
                    <div>
                        <span class="service-info-heading">
                            Net Amount:
                        </span>
                        <span class="modal-amount"><i class="fas fa-euro-sign"></i> <span class="modal-totalcost-show"></span></span>
                    </div>
                </div>
                <div class="container-fluid service-address-modal">
                    <div>
                        <span class="address-detail-head">Service Address:</span>
                        <span class="address-modal-show-detail"></span>
                    </div>
                    <div>
                        <span class="address-detail-head">Billing Address:</span>
                        <span class="billing-address-ddetail-show"></span>
                    </div>
                    <div>
                        <span class="address-detail-head">Phone:</span>
                        <span class="mobile-no-modal-show"></span>
                    </div>
                    <div>
                        <span class="address-detail-head">Email:</span>
                        <span class="email-modal-show"></span>
                    </div>
                </div>
                <div class="container-fluid comments-div">
                    <span class="heading-comments">Comments</span>
                    <span class="comment-body-modal-show"></span>
                    <span class="comment-body hpts pt-2">
                        <div class="cross">
                            <i class="fas fa-times"></i>
                        </div>
                        <span>I don't have pets at home</span>
                    </span>
                    <span class="comment-body nhpets pt-2">
                        <div class="check">
                            <i class="fa fa-check"></i>
                        </div>
                        <span>I have pets at home</span>
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
                <form action="" method="POST" id="reshedule-service-form">
                    <label for="form" class="Reschedule-form-label">Select New Date And Time</label>
                    <div class="row reschedule-dat-div">
                        <input type="hidden" name="service-id" class="service-id-input">
                        <div class="col-md-6">
                            <input type="date" id="rdate" name="rescheduled-date" class="form-control" placeholder="DD/MM/YYYY" aria-label="Date">
                        </div>
                        <div class="col-md-6">
                            <select class="form-select" name="rescheduled-time" id="service-reshedule-time" aria-label="Default select example">
                                <option value="8:00">8:00 AM</option>
                                <option value="8:30">8:30 AM</option>
                                <option value="9:00">9:00 AM</option>
                                <option value="9:30">9:30 AM</option>
                                <option value="10:00">10:00 AM</option>
                                <option value="10:30">10:30 AM</option>
                                <option value="11:00">11:00 AM</option>
                                <option value="11:30">11:30 AM</option>
                                <option value="12:00">12:00 PM</option>
                                <option value="12:30">12:30 PM</option>
                                <option value="13:00">1:00 PM</option>
                                <option value="13:30">1:30 PM</option>
                                <option value="14:00">2:00 PM</option>
                                <option value="14:30">2:30 PM</option>
                                <option value="15:00">3:00 PM</option>
                                <option value="15:30">3:30 PM</option>
                                <option value="16:00">4:00 PM</option>
                                <option value="16:30">4:30 PM</option>
                                <option value="17:00">5:00 PM</option>
                                <option value="17:30">5:30 PM</option>
                                <option value="18:00">6:00 PM</option>
                                <option value="18:30">6:30 PM</option>
                                <option value="19:00">7:00 PM</option>
                                <option value="19:30">7:30 PM</option>
                                <option value="20:00">8:00 PM</option>
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
                <form action="" class="cancel-sr-form">
                    <input type="hidden" name="service-id" class="service-id-input">
                    <label for="form" class="cancel-form-label">Why you want to cancel the request?</label>
                    <textarea name="Has-issue-text" class="form-control" aria-label="With textarea"></textarea>
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
                <h5 class="modal-title" id="aeaddresstitle">Add New Address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body addressMB">
                <form class="add-edit-address-form" action="" method="post">
                    <input type="hidden" name="data" class="user-id-address" value="<?= $_SESSION['user']['UserId']; ?>">
                    <input type="hidden" name="add-data" class="user-address-id">
                    <input type="hidden" name="Email" value="<?= $_SESSION['user']['Email']; ?>" class="user-email-address">
                    <div class="row pb-3">
                        <div class="col-md-6">
                            <label for="address-street-name" class="form-label">Street Name</label>
                            <input type="text" name="street" id="address-street-name" class="form-control address-street-name" placeholder="Street Name">
                        </div>
                        <div class="col-md-6">
                            <label for="address-house-name" class="form-label">House Number</label>
                            <input type="text" name="house" id="address-house-name" class="form-control address-house-name" placeholder="House Number">
                        </div>
                    </div>
                    <div class="row pb-3">
                        <div class="col-md-6">
                            <label for="address-postal-code" class="form-label">Postal Code</label>
                            <input type="text" name="PostalCode" id="address-postal-code" class="form-control address-postal-code" placeholder="Postal Code">
                        </div>
                        <div class="col-md-6">
                            <label for="address-city" class="form-label">City</label>
                            <select class="form-select address-city" name="AddressCity" id="address-city">
                                <option selected></option>
                            </select>
                        </div>
                    </div>
                    <div class="row pb-3">
                        <div class="col-md-6 address-user-phone-div">
                            <label for="address-user-phone" class="form-label">Phone Number</label>
                            <div class="input-group">
                                <div class="input-group-text">+49</div>
                                <input type="tel" id="address-user-phone" name="phone" class="form-control address-user-phone" placeholder="Phone Number">
                            </div>
                        </div>
                    </div>
                    <div class="row btn-row-add pb-2 pt-1">
                        <button class="btn new-address-btn" type="button">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- address modal end -->