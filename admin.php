<?php
	
	session_start();
	include 'connect_db.php';

	if (isset($_POST['username'])){
	
		$username = $_POST['username'];
		$pass = $_POST['password'];
		
		
		$_SESSION["username"] = $username;
		
		/*echo $_SESSION["username"];*/
		
		$sql = "select * from admin where username='".$username."'AND password='".$pass."' ";
	
		$result = mysqli_query($conn, $sql);
	
		if(mysqli_num_rows($result)){
		
			echo '<script>language="javascript">
			alert("Hello '.$_POST['username'].' ");
			window.location.href="adminApproval.php";
			</script>';
			
		}
		else {
			echo '<script>language="javascript">
			alert("username/password invalid!");
			window.location.href="login.php"</script>';		
		}
	}
?>