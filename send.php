

<?php

$userName         = $_POST['myName'];
$userEmail         = $_POST['myEmail'];
$userMessage         = $_POST['myMessage'];
$to             = "hlaliwalid@gmail.com";
$subject         = "Email from my website";
$body             = "Information Submitted:";
$body .= "\r\n Name: " . $userName;
$body .= "\r\n Email: " . $userEmail;
$body .= "\r\n Message: " . $userMessage;
mail($to, $subject, $body);


echo "Message from " . "$userEmail" . " to " . $to . " about the subject " . $subject . " and the message: " . $userMessage;
?>