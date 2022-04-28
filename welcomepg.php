<?php
session_start();
	$_SESSION;
?>

<html>
<head>
	<title> WELCOME PAGE </title>
<link rel="stylesheet" type ="text/css" href="style1.css">
</head>
<body>
	
		<div class="main">
			<div class="navbar">
				<div class="menu">
		   <ul>
			<li class="active"><a href="#">HOME</a></li>
			<li><a href="https://www.redcross.org/about-us/who-we-are/mission-and-values.html">ABOUT</a></li>
			<li><a href="https://thebloodconnection.org/hospitals/services/">SERVICES</a></li>
			<li><a href="https://thebloodconnection.org/hospitals/">HOSPITALS </a></li>
			<li><a href="https://www.redcross.org/get-help.html">HELP</a></li>
			<li><a href="https://thebloodconnection.org/contact/">CONTACT</a></li>
			
		    </ul>
				</div>
			<div class="search">
			<input class="srch" type="search" name="search" placeholder="Type to search">
				<a href="#"> <button class="btn"> Search </button></a>	
			</div>
			</div>
			<div class="content">
			<h1>DONATE BLOOD SAVE LIVES</h1>
			<p class="par">Do you feel you don’t have much to offer?<br>
			 You have the most precious resource of all:<br>
			 the ability to save a life by donating blood!<br>
			 Help share this invaluable gift with someone in need<br>
			</p>
		    	<a href="register.php" class="btn1"> Register</a>
		    	<a href="login.php" class="btn1"> Login</a>
			</div>
			
		</div>
		
		
	
	
</body>

	
 


</html>
