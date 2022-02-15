<!-- <button type="button" class="btn btn-primary pt-5 mt-5" data-bs-toggle="modal" data-bs-target="#complete-booking-modal">
  Launch static backdrop modal
</button> -->
<div class="modal" id="complete-booking-modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered cb-md">
        <div class="modal-content cb-mc">
            <div class="modal-header cb-mh">
                <h5 class="modal-title cb-mh-mt"></h5>
                <button type="button" class="btn-close c-b-m-close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body cb-mb">
                <div class="container pb-4">
                    <div class="cb-logo">
                        <i class="fa-solid fa-check complete-booking-icon"></i>
                    </div>
                    <div class="cb-logo-fail">
                        <i class="fa-solid fa-xmark failed-booking-icon"></i>
                    </div>
                </div>
                <div class="container pb-2 message-of-booking">
                    <div id="book-success-msg">Booking has been successfully submitted</div>
                    <div id="book-fail-msg">Booking has not submitted try again</div>
                </div>
                <div class="container pb-3 service-request-show-div">
                    <div id="service-req-id-div">Service Request Id: <span id="s-r-id"></span></div>
                </div>
                <div class="container pb-2">
                    <button type="button" class="btn" id="booking-ok-btn" data-bs-dismiss="modal" aria-label="Close">Ok</button>
                </div>
            </div>
        </div>
    </div>
</div>