<?php

include 'connect_db.php';

$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$num = $_POST['age'];
$phoneNo = $_POST['phone'];
$university = $_POST['university'];
$education_level = $_POST['education_level'];
$preference_type = $_POST['preference_type'];
$method = $_POST['method'];
$availability = $_POST['availability'];
$description = $_POST['description'];



$add = "INSERT INTO educator (name, username, email, password, gender, age, phone, university, education_level, preference_type, method, availability, description , image) 
VALUES ('$name', '$username', '$email', '$password', '$gender', '$num', '$phoneNo', '$university', '$education_level', '$preference_type','$method','$availability','$description','$image' )";


    $result = mysqli_query($conn,$add);
	
	if ($result){ 
		echo '<script language="javascript">
		alert("Educator data is successfully added.");
		window.location.href="tableEdu.php";</script>';		
	}
	else{ 
	echo "Problem occured !";
	}
    mysqli_close($conn);	
?>
