<?php
require_once("connect_db.php");

// Check if 'educator_id' parameter is set in the URL
if (isset($_GET['id'])) {
    $educator_id = $_GET['id'];
    
    // Sanitize the input
    $educator_id = mysqli_real_escape_string($conn, $educator_id);
    
    $update = "SELECT * FROM educator WHERE educator_id='$educator_id'";
    $result = mysqli_query($conn, $update);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Error fetching educator details: " . mysqli_error($conn);
        exit;
    }
} else {
    echo "No educator ID specified!";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empowering Information: Personal Educator for Special Kids System</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body.bg {
            background-image: url('images/pinkbackground.webp'); /* Update the path to your image */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            height: 100%;
        }
        h4{
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            text-align: center;
        }
        .box , h4{
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 90%;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 96%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group button.submit {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-group button.submit:hover {
            background-color: #45a049;
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
        /* Button styles */
        .btn {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-outline-warning {
            background-color: #f0ad4e;
        }

        .btn-outline-danger {
            background-color: #d9534f;
        }

        .btn-outline-primary {
            background-color: #45a049;
        }

        .btn-outline-warning:hover {
            background-color: #ec971f;
        }

        .btn-outline-danger:hover {
            background-color: #c9302c;
        }

        .btn-outline-primary:hover {
            background-color: green;
        }
    </style>
</head>
<body class="bg">
    <div class="form"></div>
    <form class="box" action="updateEducator2.php?educator_id=<?= htmlspecialchars($row['educator_id']); ?>" method="POST">
    <h4>EDUCATOR DETAIL</h4>
    <div class="form-group">
        <label for="educator_id">Educator ID:</label>
        <input name="educator_id" type="text" class="form-control prodID" value="<?= htmlspecialchars($row['educator_id']); ?>" readonly>
    </div>
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control name" id="name" name="name" value="<?= htmlspecialchars($row['name']); ?>">
    </div>
    <div class="form-group">
        <label for="username" class="control-label mb-1">Username:</label>
        <input name="username" type="text" class="form-control username" value="<?= htmlspecialchars($row['username']); ?>">
    </div>
    <div class="form-group">
        <label for="email" class="control-label mb-1">Email:</label>
        <input name="email" type="text" class="form-control email" value="<?= htmlspecialchars($row['email']); ?>">
    </div>
    <div class="form-group">
        <label for="password" class="control-label mb-1">Password:</label>
        <input name="password" type="password" class="form-control password" value="<?= htmlspecialchars($row['password']); ?>">
    </div>
    <div class="form-group">
        <label for="gender">Gender:</label>
        <select id="gender" name="gender">
            <option value="Select">Select</option>
            <option value="male" <?= $row['gender'] == 'male' ? 'selected' : ''; ?>>Male</option>
            <option value="female" <?= $row['gender'] == 'female' ? 'selected' : ''; ?>>Female</option>
        </select>
    </div>
    <div class="form-group">
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" value="<?= htmlspecialchars($row['age']); ?>">
    </div>
    <div class="form-group">
        <label for="phone">Phone No:</label>
        <input type="tel" name="phone" id="phone" pattern="[0]{1}[1-9]{2}-[0-9]{7}" title="Must follow the pattern 0xx-xxxxxxx" placeholder="xxx-xxxxxxx" value="<?= htmlspecialchars($row['phone']); ?>">
    </div>
    <div class="form-group">
        <label for="university">What's university?</label>
        <input type="text" name="university" id="university" value="<?= htmlspecialchars($row['university']); ?>">
    </div>
    <div class="form-group">
        <label for="education_level">Education level:</label>
        <select id="education_level" name="education_level">
            <option value="Select">Select</option>
            <option value="SPM" <?= $row['education_level'] == 'SPM' ? 'selected' : ''; ?>>SPM</option>
            <option value="Diploma" <?= $row['education_level'] == 'Diploma' ? 'selected' : ''; ?>>Diploma</option>
            <option value="STPM" <?= $row['education_level'] == 'STPM' ? 'selected' : ''; ?>>STPM</option>
            <option value="Matriculation" <?= $row['education_level'] == 'Matriculation' ? 'selected' : ''; ?>>Matriculation</option>
            <option value="Bachelor" <?= $row['education_level'] == 'Bachelor' ? 'selected' : ''; ?>>Bachelor/Degree</option>
            <option value="Master" <?= $row['education_level'] == 'Master' ? 'selected' : ''; ?>>Master</option>
            <option value="PhD" <?= $row['education_level'] == 'PhD' ? 'selected' : ''; ?>>PhD</option>
        </select>
    </div>
    <div class="form-group">
        <label for="preference_type">Preferred type of special needs kids:</label>
        <select id="preference_type" name="preference_type">
            <option value="Select">Select</option>
            <option value="Dyslexia" <?= $row['preference_type'] == 'Dyslexia' ? 'selected' : ''; ?>>Dyslexia</option>
            <option value="ASD" <?= $row['preference_type'] == 'ASD' ? 'selected' : ''; ?>>Autism Spectrum Disorder (ASD)</option>
            <option value="Down Syndrome" <?= $row['preference_type'] == 'Down Syndrome' ? 'selected' : ''; ?>>Down Syndrome</option>
        </select>
    </div>
    <div class="form-group">
        <label for="experience">Explain/introduce yourself and your experience:</label>
        <textarea id="explanation" cols="30" rows="5" placeholder="Describe your experience" name="explaination"><?= htmlspecialchars($row['explaination']); ?></textarea>
    </div>
    <div class="text-center">
        <input type="submit" class="btn btn-outline-primary" value="Update">
        <a type="button" class="btn btn-outline-danger" href="viewEducatoraccount.php">Cancel</a>
    </div>
</form>


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
