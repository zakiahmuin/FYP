<?php

include 'connect_db.php';

$Studentname = $_POST['student_fullname'];
$gender = $_POST['gender'];
$num = $_POST['age'];
$type = $_POST['type'];
$Parentsname = $_POST['parents_name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$relationship = $_POST['relationship'];
$phoneNo = $_POST['phone'];



$add = "insert into student (student_fullname,gender, age,type, parents_name, username, email, password, relationship, phone) VALUES 

	('$Studentname', '$gender', '$num', '$type', '$Parentsname', '$username','$email', '$password','$relationship','$phoneNo')";

    $result = mysqli_query($conn,$add) or die("Query failed");
	
	if ($result){ 
		echo '<script language="javascript">
		alert("Data is successfully added!");
		window.location.href="loginStudent.php";</script>';		
	}
	else{ 
	echo "Problem occured !";
	}
    mysqli_close($conn);	
?>