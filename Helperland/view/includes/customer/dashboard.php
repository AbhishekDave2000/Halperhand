<div class="container-fluid service-button" style="padding-bottom: 5px;">
    <span class="Service-History-span">
        Current Service Request
    </span>
    <button class="add-service-button">
        Add new Service Request
    </button>
</div>

<table id="example" class="table-data dashboard-data-table" style="width:100%">
    <thead>
        <tr>
            <th>Service Id</th>
            <th>Service Date</th>
            <th>Service Provider</th>
            <th>Payment</th>
            <th class="sction-head-dash">Action</th>
        </tr>
    </thead>
    <tbody class="dashboard-data">
        
        <?php
        foreach ($result as $val) {
        ?>
            <tr data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#Reschedule-cancle">
                <input type="hidden" name="service-details" value='<?php echo json_encode($val); ?>'>
                <td class="dashserviceid">
                    <span><?= $val['ServiceRequestId']; ?></span>
                </td>
                <td class="dashservicedate" style="flex-direction:column;">
                    <span>
                        <img src="assets/Img/customer/calendar2.png" alt=""> <?= substr($val['ServiceStartDate'], 0, 10); ?>
                    </span>
                    <br>
                    <span>
                        <img src="assets/Img/customer/layer-14.png" alt="">
                        <?php
                            $endtime = str_replace(".5",":30",str_replace(".0",":00", floatval(str_replace(":00",".0",str_replace(":30",".5",substr($val['ServiceStartDate'], 11, 5)))) + $val['SubTotal']));
                            if(strlen($endtime) == 2){$endtime = $endtime.":00";}
                            echo  substr($val['ServiceStartDate'], 11, 5) . ' to ' . $endtime; 
                        ?>
                    </span>
                </td>
                <td class="serviceprovider d-flex">
                    <?php if(isset($val['FullName'])){ ?>
                    <div class="cap-div">
                        <img class="cap" src="assets/Img/customer/cap.png" alt="cap">
                    </div>
                    <span><?= $val['FullName']; ?> <br>
                        <i class="fas fa-star i-con"></i>
                        <i class="fas fa-star i-con"></i>
                        <i class="fas fa-star i-con"></i>
                        <i class="fas fa-star i-con"></i>
                        <i class="fas fa-star i-con-e"></i>
                        <?php if(isset($val['AvarageRating'])){echo substr($val['AvarageRating'],0,3);} ?>
                    </span>
                    <?php } ?>
                </td>
                <td class="payment-text">
                    <i class="fas fa-euro-sign"></i> <?= $val['TotalCost']; ?><br>
                </td>
                <td class="dash-action">
                    <a href="#" type="button" data-bs-dismiss="modal" data-bs-toggle="modal" class="btn reshedule-btn" data-bs-target="#Reschedule-Request">Reshedule</a>
                    <a href="#" type="button" data-bs-dismiss="modal" data-bs-toggle="modal" class="btn cancel-btn" data-bs-target="#cancel-request">Cancel</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>