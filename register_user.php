<?php
$con = mysqli_connect('localhost','root','qwe123') 
       or die('Cannot connect to the DB');

mysqli_select_db($con, 'waterqualitysystem');
mysqli_query($con,"INSERT INTO user (fullname,email,username,password)
  VALUES ('".$_GET['fullname']."','".$_GET['email']."','".$_GET['username']."','".$_GET['password']."')");

mysqli_close($con);

$msg = "Your registration for water quality system has been approved.<br>"
."<b>Username: ".$_GET['username']."</b><br>"
."<b>Password: ".$_GET['password']."</b><br><br>"
."<a href='http://waterqualitysystem.000webhostapp.com'>Login to Water Quality System</a>";

// headers
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

// use wordwrap() for lines no longer than 70 characters
$msg = wordwrap($msg,80);

// send email
// mail($_GET['email'],"Water Quality System User Registration",$msg,$headers);
echo "Successfully register to database";

?>