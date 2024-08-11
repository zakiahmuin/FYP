<?php
require_once("connect_db.php");

$ID = $_GET['id'];

$stmt = $conn->prepare("UPDATE approve SET 
    name=?, 
    username=?, 
    password=?, 
    gender=?, 
    age=?, 
    phone=?, 
    university=?, 
    education_level=?, 
    preference_type=?, 
    method=?, 
    availability=?, 
    description=? 
    WHERE id=?");

$stmt->bind_param("ssssisssssssi", 
    $_POST['name'], 
    $_POST['username'], 
    $_POST['password'], 
    $_POST['gender'], 
    $_POST['age'], 
    $_POST['phone'], 
    $_POST['university'], 
    $_POST['education_level'], 
    $_POST['preference_type'], 
    $_POST['method'], 
    $_POST['availability'], 
    $_POST['description'], 
    $ID);

if ($stmt->execute()) { 
    echo '<script language="javascript">
    alert("Data is successfully updated!");
    window.location.href="educatorpage.php"</script>';   
} else { 
    echo "Problem occurred!";
}

$stmt->close();
$conn->close();

?>