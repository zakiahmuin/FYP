<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empowering Information: Personal Educator for Special Kids System</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-image: url('images/pinkbackground.webp'); /* Update the path to your image */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
            position: relative; /* Added to position the login button */
        }
        .homepage {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            text-align: center;
            color: black;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            padding: 20px;
        }
        .login {
            position: absolute; /* Changed to absolute positioning */
            top: 20px; /* Adjust the distance from the top */
            right: 20px; /* Adjust the distance from the right */
        }
        .content {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            margin: 30px;
            margin-right: 380px;
            margin-top: 100px;
            
        }
        .texthome, .texthomee {
            margin: 10px;
            
            
        }
        .button, .submit {
            padding: 10px 20px;
            margin: 10px;
            background-color: rgba(255, 255, 255, 0.8);
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .button:hover, .submit:hover {
            background-color: #fc46aa;
            color: white;
            border: whitesmoke;
        }
        /* New styles for the image */
        
        .intro {
            margin-left: 400px;
            flex: 1;
            text-align: left; /* Align text to the left */
            margin-top: 80px;
        }
        .align{
            text-align: justify;
            margin-left: 90px;
            margin-right: 90px;
        }
    </style>
</head>
<body>

    <div class="homepage">
        <div class="login"><button class="submit" id="login">Login</button></div>
        <div class="content">
            <h1 class="intro">Welcome Buddyzz to <br>Empowering Information: Personal Educator for Special Kids!<br>Make your kids feel fun with school</h1>
            <img src="images/best-websites-for-teachers-768x523-removebg-preview.png" alt="Educators and students" class="image">
        </div>
        <div class="texthome">
            <p>We're here to support your special child's education journey. <br>This website will help you to find great and qualified educators. <br><div class="align">✔ Available 24/7.Unlimited access to our website. <br>✔ Capable educator with good qualification.<br>✔ Find educator with your own criteria.</div><br>Let's get started!<br><br>
            For first-time users, you need to create an account. <br>If you're looking for a qualified educator for your child, click the 'Student account' button.<br> If you're an educator seeking a job, click the 'Educator account' button.
            </p>
        </div>
        <div class="texthomee">
            <button class="button" id="button1">Educator account</button>
            <button class="button" id="button2">Student account</button>
        </div>
    </div>

    <script>
    document.getElementById("login").addEventListener("click", function() {
        window.location.href = "login1.php"; // Navigate to the login page
    });
    document.getElementById("button1").addEventListener("click", function() {
        window.location.href = "confirmationEdu.php"; // Navigate to the confirmation educator page
    });
    document.getElementById("button2").addEventListener("click", function() {
        window.location.href = "registerStudent.php"; // Navigate to the register student page
    });
    </script>
</body>
</html>

