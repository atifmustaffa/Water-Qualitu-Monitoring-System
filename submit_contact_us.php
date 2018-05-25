<?php

$msg = "Contact Us Page<br>"
.$_POST['contact_name']."<br>"
.$_POST['contact_email']."<br>"
.$_POST['contact_message']."<br>";

// headers
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

// use wordwrap() for lines no longer than 70 characters
$msg = wordwrap($msg,80);

// send email
// mail("aretif95@gmail.com","Water Quality System Message",$msg,$headers);

?>