<?php

require_once("connect_db.php");

$studentID = $_GET['student_id'];

$query = "UPDATE student SET 
student_fullname='$_POST[student_fullname]',gender='$_POST[gender]', age='$_POST[age]', type='$_POST[type]', parents_name='$_POST[parents_name]', username='$_POST[username]', password='$_POST[password]', relationship='$_POST[relationship]', phone='$_POST[phone]' where student_id=$studentID";

    $result = mysqli_query($conn,$query) or die("Query failed");
	
	if ($result){ 
		echo '<script language="javascript">
		alert("Data is successfully updated!");
		window.location.href="studentpage.php"</script>';	
		
	}
	else{ 
	echo "Problem occured !";
	}
    mysqli_close($conn);	
?>