<!-- Modal -->
<div class="modal fade" id="complete-cancel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-dialog-ccmodal">
        <div class="modal-content MCccmodal">
            <div class="modal-header MHcc">
                <h5 class="modal-title" id="exampleModalLabel">Service Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body MBcc p-0">
                <div class="container-fluid mr-3 p-0">
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
                                Total Payment:
                            </span>
                            <span class="modal-amount"><i class="fas fa-euro-sign"></i> <span class="modal-totalcost-show"></span></span>
                        </div>
                    </div>
                    <div class="container-fluid service-address-modal">
                        <div>
                            <span class="address-detail-head">Customer Name:</span>
                            <span class="customer-name-show"></span>
                        </div>
                        <div>
                            <span class="address-detail-head">Service Address:</span>
                            <span class="service-address-detail-show"></span>
                        </div>
                        <!-- <div>
                        <span class="address-detail-head">Phone:</span>
                        <span class="mobile-no-modal-show">6546546544</span>
                    </div>
                    <div>
                        <span class="address-detail-head">Email:</span>
                        <span class="email-modal-show">asdasj.asdah.com</span>
                    </div> -->
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
                    <div class="d-flex pt-1 pb-1">
                        <button type="button" class="btn Cancel-btn m-1" id="cancel-serreq-btn" data-bs-dismiss="modal" >
                            <i class="fas fa-times"></i>Cancel
                        </button>
                        <button type="button" class="btn Reschedule-btn m-1" id="complete-serreq-btn" data-bs-dismiss="modal">
                            <i class="fa fa-check"></i> Complete
                        </button>
                        <button type="button" class="btn accept-btn m-1" id="accept-sr-btn" data-bs-dismiss="modal">
                            <i class="fa fa-check"></i> Accept
                        </button>
                    </div>
                </div>
                <div class="mapouter container-fluid pb-2 pl-0 pr-0">
                    <div class="gmap_canvas">
                        <!-- <iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=11 pratham vatika opp.RutuVilla&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>