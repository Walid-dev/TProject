<?php

$eventLat = $_POST['eventLat'];
$eventLon = $_POST['eventLon'];
$eventPlace = $_POST['eventPlace'];
$eventTime = $_POST['eventTime'];
$eventDate = $_POST['eventDate'];
$sendEventFormAjax = $_POST['sendEventFormAjax'];


function sayHi2($eventLat, $eventLon, $eventPlace, $eventTime, $eventDate, $sendEventFormAjax)
{
    echo "First Name: " . $eventLat . "<br/>Last Name:" . $eventLon . "<br/>Place:" . $eventPlace . "<br/>Time:" . $eventTime . "<br/>Date:" . $eventDate . "<br>action:" . $sendEventFormAjax;
}

sayHi2($eventLat, $eventLon, $eventPlace, $eventTime, $eventDate, $sendEventFormAjax);
