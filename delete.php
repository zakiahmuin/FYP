<?php

include 'connect_db.php';

$adminID = $_GET['admin_id'];
$delete = "delete from admin where admin_id='$adminID'";

$result = mysqli_query($conn,  $delete);

if(!$result){
	die('Error: '.mysqli_error($conn));
}
	echo '<script language="javascript">
	alert("Data is successfully deleted!");
	window.location.href="home.php";</script>';

?>