<?php

include 'connect_db.php';

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];


$add = "insert into admin (username, password, email) VALUES 

	('$username','$password','$email')";

    $result = mysqli_query($conn,$add) or die("Query failed");
	
	if ($result){ 
		echo '<script language="javascript">
		alert("Data is successfully added!");
		window.location.href="login.php";</script>';		
	}
	else{ 
	echo "Problem occured !";
	}
    mysqli_close($conn);	
?>