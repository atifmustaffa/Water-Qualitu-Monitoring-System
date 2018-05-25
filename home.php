<?php
$isLoggedOn = false;
session_start();
if (array_key_exists('loginId', $_SESSION)) {
	$isLoggedOn = true;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Water Quality Monitoring System</title>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
	<script src="./jquery.min.js"></script>
	<script src="./loginScript.js"></script>
	<script src="./submitScript.js"></script>
	<script src="./data.angular.js"></script>
	<link rel="icon" href="favicon.png">
	<link rel="stylesheet" href="styles.css">
	<link href="https://fonts.googleapis.com/css?family=Varela+Round|Khula|Roboto" rel="stylesheet">
</head>
<body>
	<nav id="topnav">
		<ul id="menu">
			<li style="float: left"><a href="./home.php">Water Quality Monitoring System</a></li>
			<li style="float: right"><a id="loginBtn" href="javascript:void(0)"><?php if($isLoggedOn) echo "Logout"; else echo "Login"; ?></a></li>
			<li style="float: right"><a href="./about-us.php">About Us</a></li>
			<li style="float: right"><a href="./contact-us.php">Contact Us</a></li>
			<li class="selected" style="float: right"><a href="./home.php">Home</a></li>
		</ul>	
	</nav>

	<div ng-app="myApp" ng-controller="customersCtrl" class="main_div">
		<?php if($isLoggedOn) echo "<span style='float:left; font-size:small'>Logged in as ".$_SESSION['loginId']."</span><br>"; ?>
		<h3>Water Quality Status</h3>
		<?php if($isLoggedOn) echo '<table id="average"><tr><td>Average temperature:</td><td>{{average[0].temperature}}</td></tr>'
			.'<tr><td>Average turbidity:</td><td>{{average[0].turbidity}}</td></tr>'
			.'<tr><td>Average pH:</td><td>{{average[0].ph}}</td></tr></table>'
			.'<div style="text-align:  center;"><input id="settingsBtn" type="button" value="Settings"/></div>'
			.'<table id="status_table">'
			.'<tr>
			    <th>Time</th>
			    <th>Temperature (&#176C)</th>
			    <th>Turbidity (%)</th>
			    <th>pH Value</th>
				</tr>
			<tr ng-repeat="x in reading">
			    <td>{{x.time}}</td>
			    <td>{{x.temperature}}</td>
			    <td>{{x.turbidity}}</td>
			    <td>{{x.ph}}</td>
		  	</tr>
		</table>';
		else echo "<h4 style='text-align: center'>** Please login to view data **</h4>";
		?>
	</div>
	<div class="login_div" style="display: none;">
		<h3 style="margin-top: 0px">Login</h3>
		<br>
		<div class="login_field">
			<form id="login_form" method="post">
				<table>
					<tr><td>User ID</td><td><input type="text" name="loginId" size="15"/></td></tr>
					<tr><td>Password</td><td><input type="password" name="loginPassword" size="15"/></td></tr>
				</table>
				<span style="font-size: smaller;">For login problems, please <a href="./contact-us.php">contact us</a>.</span><br><br>
				<input id="submit-login" type="button" value="Login"/><br>
				<span style="font-size: smaller;"><a id="registerBtn" href="javascript:void(0)">Register new ID</a></span><br><br>
			</form>
		</div>
	</div>
		
	<div class="register_div" style="display: none;">
		<h3 style="margin-top: 0px">Register</h3>
		<br>
		<div class="register_field">
			<span style="font-size: smaller;">Send request email to administrator</span><br>
			<form id="register_form" method="post">
			<!-- <form action="./register_user.php" id="register_form" method="get"> -->
				<table>
					<tr><td>Full Name</td><td class="required"><input type="text" name="fullname" size="30" /></td></tr>
					<tr><td>Email</td><td class="required"><input type="email" name="email" size="22" /></td></tr>
					<tr><td>User ID</td><td class="required"><input type="text" name="username" size="15" /></td></tr>
					<tr><td>Password</td><td class="required"><input type="password" name="password" size="15" /></td></tr>
					<tr><td>Message</td><td><textarea name="message" cols="30" placeholder="Insert your message to admin (optional)"></textarea></td></tr>
				</table><br>
				<input id="submit-register" type="button" value="Send Request"/>
			</form>
		</div>
	</div>

	<div class="settings_div" style="display: none; text-align: center; font-size: smaller;">
		<h3 style="margin-top: 0px">Settings</h3>
		<br>
		<div class="settings_field">
			<form id="settings_form" method="post">
				<input type="checkbox" name="sendEmailCB" <?php if($_SESSION['isWarningEmail']=="true") echo "checked";?> value="yes"/> Send me warning emails<br><br>
				Set data warning values:<br>
				<input type="number" name="temp_limit" placeholder="Temperature" min=0 <?php if(array_key_exists('temp_limit', $_SESSION)) echo "value=".$_SESSION['temp_limit'];?> style="width: 90px; text-align: center;" /><br>
				<input type="number" name="turb_limit" placeholder="Turbidity" min=0 <?php if(array_key_exists('turb_limit', $_SESSION)) echo "value=".$_SESSION['turb_limit'];?> style="width: 90px; text-align: center;" /><br>
				<input type="number" name="ph_limit" placeholder="pH" min=0 <?php if(array_key_exists('ph_limit', $_SESSION)) echo "value=".$_SESSION['ph_limit'];?> style="width: 90px; text-align: center;" /><br>
				<span style="font-size: x-small;"><i>* Leave blank to unset values</i></span><br><br>
				<input id="submit-settings" type="button" value="Save"/>
			</form>
		</div>
	</div>
	<div class="black_bg" style="display: none;"></div>
	<footer>
		<p style="text-align: center;">Copyright &copy 2018<br>Water Quality Monitoring System for Aquaculture</p>
	</footer>
</body>
</html>
