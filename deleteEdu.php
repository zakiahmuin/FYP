<?php

include 'connect_db.php';

$educatorID = $_GET['educator_id'];
$delete = "delete from educator where educator_id='$educatorID'";

$result = mysqli_query($conn,  $delete);

if(!$result){
	die('Error: '.mysqli_error($conn));
}
	echo '<script language="javascript">
	alert("Educator is successfully deleted!");
	window.location.href="adminpage.php";</script>';

?>