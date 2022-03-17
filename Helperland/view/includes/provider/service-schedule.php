<?php
include 'controller/Calender.php';
include 'controller/providerDashController.php';
$calendar = new Calendar();
$schedule = new providerDashController();
$result = $schedule->getScheduleDetail();
foreach($result as $val){
    $id = $val['ServiceRequestId'];
    $date = substr($val['ServiceStartDate'],0,10);
    $calendar->add_event('Service: '.$id, $date , 1, 'green');
}
?>
<div class="dov-content">
    <?= $calendar ?>
</div>