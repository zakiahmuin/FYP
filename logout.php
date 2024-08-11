<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);
	echo '<script language="javascript">
	alert("Logout!");
	window.location.href="home.php";</script>';	
?>