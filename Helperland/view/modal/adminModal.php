<div class="modal fade" id="aminModel-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Service Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="admin-form-EditService" action="">
                    <input type="hidden" name="Service-id" id="SR-ID-Form">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="Res-date" class="form-label">Date</label>
                            <input type="date" name="date" class="form-control" id="Res-date">
                        </div>
                        <div class="col-md-6">
                            <label for="service-reshedule-time" class="form-label">Time</label>
                            <select class="form-select" name="rescheduled-time" id="service-reshedule-time" aria-label="Default select example">
                                <option value="08:00">8:00 AM</option>
                                <option value="08:30">8:30 AM</option>
                                <option value="09:00">9:00 AM</option>
                                <option value="09:30">9:30 AM</option>
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
                    <div class="pb-3 pt-3">
                        <label class="form-label">Service Address</label>
                        <div class="row">
                            <div class="col-md-6 pb-2">
                                <label for="Street-name" class="form-label">Street Name</label>
                                <input type="text" name="street" placeholder="Street Name" class="form-control" id="Street-name">
                            </div>
                            <div class="col-md-6 pb-2">
                                <label for="House-Number" class="form-label">House Name</label>
                                <input type="text" name="house" placeholder="House Name" class="form-control" id="House-Number">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 pb-2">
                                <label for="Postal-code" class="form-label">Postal Code</label>
                                <input type="text" name="postal" placeholder="Postal Code" class="form-control" id="Postal-code">
                            </div>
                            <div class="col-md-6 pb-2">
                                <label for="city-select" class="form-label">City</label>
                                <input type="text" class="form-control" name="city" id="city-select" readonly> 
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 pb-2">
                                <label for="Reason-For-Res" class="form-label">Why Do you wnat to reschedule service request?</label>
                                <textarea name="Reason-Res" id="Reason-For-Res" cols="3" rows="3" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="row pb-2">
                            <div class="col-md-12">
                                <button type="button" class="btn res-service-update">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>