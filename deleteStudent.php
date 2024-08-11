<?php

include 'connect_db.php';

$studentID = $_GET['student_id'];
$delete = "delete from student where student_id='$studentID'";

$result = mysqli_query($conn,  $delete);

if(!$result){
	die('Error: '.mysqli_error($conn));
}
	echo '<script language="javascript">
	alert("Student is successfully deleted!");
	window.location.href="home.php";</script>';

?>