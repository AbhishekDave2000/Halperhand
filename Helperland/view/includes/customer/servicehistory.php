<div class="container-fluid service-button">
    <span class="Service-History-span">
        Service History
    </span>
    <button class="export-button" id="SH-export-button">
        Export
    </button>
</div>

<table id="service-history-datatable" class="table-data" style="width:100%">
    <thead>
        <tr>
            <th>Service Id</th>
            <th>Service Detail</th>
            <th>Service Provider</th>
            <th>Payment</th>
            <th>Status</th>
            <th>Rate SP</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($result as $val) {
        ?>
            <tr>
                <td class="dashserviceid pl-5">
                    <input type="hidden" name="service-details" class="all-service-detail-input" value='<?php echo json_encode($val); ?>'>
                    <span><?= $val['ServiceRequestId']; ?></span>
                </td>
                <td class="servicedetail">
                    <img src="assets/Img/customer/calendar.png" alt="">
                    <span><?= substr($val['ServiceStartDate'], 0, 10); ?></span><br>
                    <span class="pl-3">
                        <?php
                        $endtime = str_replace(".5", ":30", str_replace(".0", ":00", floatval(str_replace(":00", ".0", str_replace(":30", ".5", substr($val['ServiceStartDate'], 11, 5)))) + $val['SubTotal']));
                        if (strlen($endtime) == 2) {
                            $endtime = $endtime . ":00";
                        }
                        echo substr($val['ServiceStartDate'], 11, 5) . ' to ' . $endtime;
                        ?>
                    </span>
                </td>
                <td class="serviceprovider d-flex">
                    <?php if (isset($val['FullName'])) { ?>
                        <div class="cap-div">
                            <img class="cap" src="assets/Img/assets/avatar-<?= $val['UserProfilePicture'] ?>.png" alt="cap">
                        </div>
                        <span style="padding-top:8px;"><?= $val['FullName']; ?> <br>
                            <?php for ($i = 0; $i < substr($val['AvarageRating'], 0, 1); $i++) { ?>
                                <i class="fas fa-star i-con"></i>
                                <?php }
                            $star = 0;
                            if (substr($val['AvarageRating'], 2, 1) != 0 ) {
                                $star = 1;
                                for ($i = 0; $i <$star; $i++) { ?>
                                    <i class="fa-solid fa-star-half-stroke"></i>
                                <?php }
                            } 
                            for ($i = 0; $i < (5 - (floatval(substr($val['AvarageRating'], 0, 1)) + $star)); $i++) { ?>
                                <i class="fas fa-star i-con-e"></i>
                            <?php } ?>
                            <?php if (isset($val['AvarageRating'])) {
                                echo substr($val['AvarageRating'], 0, 4);
                            } ?>
                        </span>
                    <?php } ?>
                </td>
                <td class="payment-text">
                    <i class="fas fa-euro-sign"></i> <?= $val['TotalCost']; ?><br>
                </td>
                <td class="servicestatus">
                    <span style="width: 90px;" class="status status-s<?= $val['Status']; ?>">
                        <?php if ($val['Status'] == 3) {
                            echo "Canceled";
                        } else if ($val['Status'] == 4) {
                            echo "Completed";
                        } ?>
                    </span>
                </td>
                <td class="ratesp-text">
                    <button class="btn btn-rounded-17 Rate-Service-Provider-btn" id="Rate-Service-Provider-btn" value="Cancel" data-bs-toggle="modal" data-bs-target="#RateSP">Rate SP</button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>