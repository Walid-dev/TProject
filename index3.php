<?php

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$place = $_POST['place'];


function sayHi($fname, $lname, $place)
{
    echo "First Name: " . $fname . "<br/>Last Name:" . $lname . "<br/>Place:" . $place ;
}

sayHi($fname, $lname, $place);
