<?php

include 'connect_db.php';

$ID = $_GET['id'];
$delete = "delete from approve where id='$ID'";

$result = mysqli_query($conn,  $delete);

if(!$result){
	die('Error: '.mysqli_error($conn));
}
	echo '<script language="javascript">
	alert("Educator is successfully deleted!");
	window.location.href="tableEdu.php";</script>';

?>