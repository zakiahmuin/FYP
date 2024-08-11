<?php
    include 'connect_db.php';

    if(isset($_POST['register'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, ($_POST['password']));
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $num = mysqli_real_escape_string($conn, $_POST['age']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $university = mysqli_real_escape_string($conn, $_POST['university']);
    $education_level = mysqli_real_escape_string($conn, $_POST['education_level']);
    $preference_type = mysqli_real_escape_string($conn, $_POST['preference_type']);
    $method = isset($_POST['method']) ? mysqli_real_escape_string($conn, $_POST['method']) : '';
    $availability = isset($_POST['availability']) ? mysqli_real_escape_string($conn, $_POST['availability']) : '';
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $image = isset($_FILES['f1']['name']) ? $_FILES['f1']['name'] : '';
    $image_size = isset($_FILES['f1']['size']) ? $_FILES['f1']['size'] : 0;
    $image_tmp_name = isset($_FILES['f1']['tmp_name']) ? $_FILES['f1']['tmp_name'] : '';
    $image_folder = 'uploaded_img/' . $image;
        
        // Corrected SELECT query with WHERE clause
        $select = "SELECT * FROM approve WHERE username = '$username'";
        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){
            echo '<script language="javascript">
                  alert("User already exists.");
                  window.location.href="registerEducator.php";
                  </script>';
        } else {
            // Corrected INSERT query with proper column order
            $register = "INSERT INTO approve (name, username, email, password, gender, age, phone, university, education_level, preference_type, method, availability, description, image, status) VALUES ('$name','$username', '$email', '$password','$gender', '$num', '$phone', '$university', '$education_level', '$preference_type', '$method', '$availability', '$description', '$image', 'pending')";
            mysqli_query($conn, $register);
            echo '<script language="javascript">
                  alert("Your account is now pending for approval");
                  window.location.href="loginEducator.php";
                  </script>';
        }
    }
    ?>