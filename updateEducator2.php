<?php
require_once("connect_db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $educator_id = mysqli_real_escape_string($conn, $_GET['educator_id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $university = mysqli_real_escape_string($conn, $_POST['university']);
    $education_level = mysqli_real_escape_string($conn, $_POST['education_level']);
    $preference_type = mysqli_real_escape_string($conn, $_POST['preference_type']);
    $explanation = mysqli_real_escape_string($conn, $_POST['explaination']);

    $query = "UPDATE educator SET 
                name='$name', 
                username='$username', 
                email='$email', 
                password='$password', 
                gender='$gender', 
                age='$age', 
                phone='$phone', 
                university='$university', 
                education_level='$education_level', 
                preference_type='$preference_type', 
                explaination='$explaination' 
              WHERE educator_id='$educator_id'";

    if (mysqli_query($conn, $query)) {
        echo '<script language="javascript">
		alert("Data is successfully updated!");
		window.location.href="viewEducatoraccount.php"</script>';
        
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>
