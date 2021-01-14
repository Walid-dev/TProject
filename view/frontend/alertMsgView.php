<div id="messageTruckSection" class="cyberTruck_alert_box <?= $_SESSION['msg_type'] ?>">
    <img class="mr-1" src="public/images/cn-tower.gif" width="90" alt="">
    <div class="truck_msg_box">
        <div class="truck_msg"><?= $_SESSION['message'];
                                unset($_SESSION['message']); ?></div>
    </div>
</div>