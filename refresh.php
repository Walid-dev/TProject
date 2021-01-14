<?php
require('controller/frontendController.php');
session_start();




?>


<div id="eventsAddressFinderWrapper">
    <form id="getLatLngForm" class="form" method="post">
        <div class="form-group">
            <input id="address" class="form-control" type="text" name="" placeholder="Veillez indiquez l'adresse de l'événement" id="">
        </div>
        <a id="getLatLngBtn" class="btn btn-blue mt-2 ml-2" name="">Chercher</a>

        <a id="tester" class="btn btn-blue mt-2 ml-2" name="">Call Ajax</a>

        <div class="messageNoData"></div>
    </form>

    <div id="eventBookingBox">
        <div class="address_field"></div>
        <a id="validateAddressBtn" class="btn mt-3"></a>
        <a id="returnBtn" class="btn mt-3"></a>
        <div id="refreshDiv">
            <?php

            ?>
        </div>
    </div>
    <form id="eventForm" method="post">
        <input type="hidden" id="eventLat" name="eventLat">
        <input type="hidden" id="eventLon" name="eventLon">

        <div class="form-group">
            <input class="form-control" type="text" id="eventPlace" name="eventPlace">
        </div>
        <div class="form-group">
            <input class="form-control" type="date" min="2020-01-01" max="2022-01-01" id="evenDate" name="eventDate">
        </div>

        <div class="form-group">
            <input class="form-control" type="time" id="evenTime" name="eventTime">
        </div>

        <div class="form-group">
            <input class="form-control" type="text" id="eventName" name="eventName" placeholder="Nom de l'évenement">
        </div>

        <div class="form-group">
            <input id="saveEventBtn2" href="refresh.php?test" class="btn btn-green" type="submit" name="saveEvent" value="Partager">
        </div>
    </form>
</div>