
<?php

require_once("connect_db.php");

$adminID = $_GET['admin_id'];

$query = "UPDATE admin SET 
username='$_POST[username]', password='$_POST[password]'where admin_id=$adminID";

    $result = mysqli_query($conn,$query) or die("Query failed");
	
	if ($result){ 
		echo '<script language="javascript">
		alert("Data is successfully updated!");
		window.location.href="adminApproval.php"</script>';	
		
	}
	else{ 
	echo "Problem occured !";
	}
    mysqli_close($conn);	
?>