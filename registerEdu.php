<?php
include 'connect_db.php';

if (isset($_POST['register'])) {

    $student_fullname = mysqli_real_escape_string($conn, $_POST['name']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $num = mysqli_real_escape_string($conn, $_POST['age']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    
    $image = isset($_FILES['f2']['name']) ? $_FILES['f2']['name'] : '';
    $image_size = isset($_FILES['f2']['size']) ? $_FILES['f2']['size'] : 0;
    $image_tmp_name = isset($_FILES['f2']['tmp_name']) ? $_FILES['f2']['tmp_name'] : '';
    $image_folder = 'uploaded_img/' . $image;
    
    
    $parents_name = mysqli_real_escape_string($conn, $_POST['parents_name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, ($_POST['password']));
    $relationship = mysqli_real_escape_string($conn, $_POST['relationship']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    

    

    $select = mysqli_query($conn, "SELECT * FROM student WHERE username = '$username' AND password = '$pass'") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        echo '<script language="javascript">
              alert("User already exists.");
              window.location.href="registerStudent.php";
              </script>';
    } else {
        if ($image_size > 2000000) {
            echo '<script language="javascript">
                  alert("Image size is too large!");
                  window.location.href="registerStudent.php";
                  </script>';
        } else {
            $insert = mysqli_query($conn, "INSERT INTO `student` (student_fullname,gender, age,type,image,parents_name, username, email, password,  relationship,phone) VALUES ('$student_fullname','$gender', '$num','$type','$image', '$parents_name','$username', '$email', '$pass',  '$relationship','$phone')") or die('query failed');

            if ($insert) {
                move_uploaded_file($image_tmp_name, $image_folder);
                echo '<script language="javascript">
                      alert("Registered successfully!");
                      window.location.href="loginStudent.php";
                      </script>';
            } else {
                echo '<script language="javascript">
                      alert("Registration failed!");
                      window.location.href="registerStudent.php";
                      </script>';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
      body {
          font-family: Arial, sans-serif;
          margin: 0;
          padding: 0;
          background-color: #f4f4f4;
          background-image: url('images/pinkbackground.webp');
      }
      .page {
          max-width: 500px;
          margin: 0 auto;
          margin-top: 50px;
          padding: 20px;
          background-color: #fff;
          border-radius: 10px;
          box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      }
      .form {
          text-align: center;
          background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 90%;
      }
      .form h4 {
          margin-top: 0;
      }
      .form-group {
          margin-bottom: 15px;
      }
      .form-group label {
          display: block;
          font-weight: bold;
      }
      .form-group input[type="text"],
      .form-group input[type="number"],
      .form-group input[type="email"],
      .form-group input[type="password"],
      .form-group select,
      .form-group textarea,
      .form-group input {
          width: calc(100% - 20px);
          padding: 10px;
          border: 1px solid #ccc;
          border-radius: 5px;
      }
      input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }
        input[type="submit"]:active {
            background-color: #003f7f;
            transform: scale(1);
        
        }
      #message {
            display: none;
            background: #f1f1f1;
            color: #000;
            position: relative;
            padding: 20px;
            margin-top: 10px;
            border-radius: 5px;
        }
        #message p {
            padding: 10px 35px;
            font-size: 18px;
        }
        .valid {
            color: green;
        }
        .invalid {
            color: red;
        }
        .valid:before {
            position: relative;
            left: -35px;
            content: "✔";
        }
        .invalid {
          color: red;
        }
        .invalid:before {
          position: relative;
          left: -35px;
          content: "✖";
        }

        #phone { /*No phone validation */
            outline: 0;
        }

        #phone:valid{
            border-color: green;
        }

        #phone:focus:invalid{
            border-color: red;
        }
    </style>
</head>
<body>
    <div id="page1" class="page">
        <div class="form">
        <form  class="box" action="registerEdu.php" method="POST" enctype="multipart/form-data">
        <h4>EDUCATOR DETAIL</h4>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="name" id="name" name="name" placeholder="Name" required>
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" placeholder="Username" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="email" id="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" minlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password" required>
            <div id="message">
                <h3>Password must contain the following:</h3>
                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                <p id="number" class="invalid">A <b>number</b></p>
                <p id="length" class="invalid">Minimum <b>8 characters</b></p>
            </div>
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="Select">Select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" placeholder="Age" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone No:</label>
            <input type="tel" name="phone" id="phone" pattern="[0]{1}[1-9]{2}-[0-9]{7}" title="Must follow the pattern 0xx-xxxxxxx" placeholder="xxx-xxxxxxx" required>
        </div>
        <div class="form-group">
            <label for="university">What's university?</label>
            <input type="text" name="university" id="university" placeholder="Name of university" required>
        </div>
        <div class="form-group">
            <label for="education_level">Education level:</label>
            <select id="education_level" name="education_level" required>
                <option value="Select">Select</option>
                <option value="SPM">SPM</option>
                <option value="Diploma">Diploma</option>
                <option value="STPM">STPM</option>
                <option value="Matriculation">Matriculation</option>
                <option value="Bachelor">Bachelor/Degree</option>
                <option value="Master">Master</option>
                <option value="PhD">PhD</option>
            </select>
        </div>
        <div class="form-group">
            <label for="preference_type">Preferred type of special needs kids:</label>
            <select id="preference_type" class="preference_type" name="preference_type" required>
                <option value="Select">Select</option>
                <option value="Dyslexia">Dyslexia</option>
                <option value="ASD">Autism Spectrum Disorder (ASD)</option>
                <option value="Down Syndrome">Down Syndrome</option>
            </select>
        </div>
        <div class="form-group">
            <label for="method">Method Learning:</label>
            <input type="radio" name="method" value="Face-to-face" required>Face-to-face
            <input type="radio" name="method" value="Online" required>Online
            <input type="radio" name="method" value="Both" required>Both
        </div>
        <div class="form-group">
            <label for="availability">Availability:</label>
            <input type="radio" name="availability" value="Weekday" required>Weekday
            <input type="radio" name="availability" value="Weekend" required>Weekend
            <input type="radio" name="availability" value="Both" required>Both
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" cols="30" rows="5" placeholder="Describe your experience" class="description" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="image">Picture ID:</label>
            <input type="file" name="f1" accept="image/jpg, image/jpeg, image/png" required>
        </div>
        <div class="form-group">
            <input type="submit" name="register" value="Register">
            </div>
        </form>
    
    </div>
    <script>
        var myInput = document.getElementById("password");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");

        myInput.onfocus = function() {
            document.getElementById("message").style.display = "block";
        }

        myInput.onblur = function() {
            document.getElementById("message").style.display = "none";
        }

        myInput.onkeyup = function() {
            var lowerCaseLetters = /[a-z]/g;
            if(myInput.value.match(lowerCaseLetters)) {
                letter.classList.remove("invalid");
                letter.classList.add("valid");
            } else {
                letter.classList.remove("valid");
                letter.classList.add("invalid");
            }

            var upperCaseLetters = /[A-Z]/g;
            if(myInput.value.match(upperCaseLetters)) {
                capital.classList.remove("invalid");
                capital.classList.add("valid");
            } else {
                capital.classList.remove("valid");
                capital.classList.add("invalid");
            }

            var numbers = /[0-9]/g;
            if(myInput.value.match(numbers)) {
                number.classList.remove("invalid");
                number.classList.add("valid");
            } else {
                number.classList.remove("valid");
                number.classList.add("invalid");
            }

            if(myInput.value.length >= 8) {
                length.classList.remove("invalid");
                length.classList.add("valid");
            } else {
                length.classList.remove("valid");
                length.classList.add("invalid");
            }
        }
    </script>
</body>
</html>