<?php
$con = mysqli_connect('localhost','root','qwe123') 
       or die('Cannot connect to the DB');

date_default_timezone_set("Asia/Kuala_Lumpur");
$dt = new DateTime();
// echo $dt->format('H:i:s');

mysqli_select_db($con, 'waterqualitysystem');
mysqli_query($con,"INSERT INTO reading (time,temperature,turbidity,ph)
  VALUES ('".$dt->format('H:i:s')."','".$_GET['temperature']."','".$_GET['turbidity']."','".$_GET['ph']."')");

mysqli_close($con);
echo "Successfully insert new data";

?>