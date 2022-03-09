<div class="container-fluid head-us">
    <span class="upcoming-heading">New Service Request</span>
</div>
<div class="container-fluid head-filter-nsr pt-3">
    <div class="row mb-2">
        <div class="col">
            Service area
        </div>
        <div class="col">
            <select class="form-select distance-filter-select" aria-label="Default select example">
                <option selected>Distance</option>
                <option value="1">1Km</option>
                <option value="1">2Km</option>
                <option value="1">5Km</option>
                <option value="1">10Km</option>
                <option value="2">12Km</option>
                <option value="2">15Km</option>
                <option value="2">18Km</option>
                <option value="2">20Km</option>
                <option value="2">23Km</option>
                <option value="3">25Km</option>
                <option value="3">30Km</option>
                <option value="3">50Km</option>
            </select>
        </div>
        <div class="col">
            <div class="form-check">
                <input class="form-check-input" name="pet-at-home-filter" type="checkbox" value="1" id="pah-filter">
                <label class="form-check-label" id="pah-filter-label" for="pah-filter">
                    Include Pet at Home 
                </label>
            </div>
        </div>
    </div>
</div>
<table id="sp-ns-table" class="table-data" style="width:100%">
    <thead>
        <tr>
            <th class="serviceid">Service ID</th>
            <th class="servicedata">Service date
            </th>
            <th class="customerdetail">Customer details</th>
            <th class="servicedistance">Payment
            </th>
            <th class="serviceaction">Time conflict</th>
            <th class="serviceaction">Actions</th>
            <!-- <th style="display: none;">Haspets</th> -->
        </tr>
    </thead>
    <tbody>
        <!-- <tr data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#complete-cancel">
            <input type="hidden" name="srdata" class="SReqData">
            <td class="serviceid">323431</td>
            <td class="servicedata"><img src="assets/Img/spupcoming/calendar2.png" alt="">
                <span>09/04/2018</span> <br>
                <img src="assets/Img/spupcoming/layer-14.png" alt=""> 12:00 - 18:00
            </td>
            <td class="customerdetail">David Bough <br>
                <img src="assets/Img/spupcoming/layer-15.png" alt=""> Musterstrabe 5,12345 Bonn
            </td>
            <td class="servicedistance">15km</td>
            <td class="timeconflict"></td>
            <td class="serviceactions-body"><button class="btn btn-rounded-17" value="Cancel">Accept</button></td>
        </tr> -->
    </tbody>
</table>
