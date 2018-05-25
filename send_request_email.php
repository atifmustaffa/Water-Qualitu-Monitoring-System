<?php

$data = array(
    'fullname' => $_POST['fullname'],
    'email' => $_POST['email'],
    'username' => $_POST['username'],
    'password' => $_POST['password']
);

$msg = "New registration needs your approval.<br>"
.$_POST['fullname']."<br>"
.$_POST['email']."<br>"
.$_POST['username']."<br>"
.$_POST['message']."<br><br>"
."<a href='http://localhost:8080/waterqualitysystem/register_user.php?".http_build_query($data)."'>Click here to approve</a><br>";

// headers
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

// use wordwrap() for lines no longer than 70 characters
$msg = wordwrap($msg,80);
echo "http://localhost:8080/waterqualitysystem/register_user.php?".http_build_query($data);
// send email
// mail("aretif95@gmail.com","Water Quality System User Registration",$msg,$headers);
?>