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
    </style>
</head>
<body class="bg">
    <div class="form"></div>
    <form class="box" action="addEducator1.php" method="post">
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
            <button class="submit" type="submit">Submit</button>
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
