<!DOCTYPE html>
<html>
<head>
    <title>Registration Admin</title>
</head>
<body>
<style>
  /* General styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-image: url("images/pink.jpg");
}

h2 {
    text-align: center;
    color: #333;
}

/* Form container */
.login-form {
    background: #fff;
    padding: 20px 40px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
}

/* Form groups */
.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.form-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

/* Button styles */
.au-btn {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 4px;
    background-color: #007BFF;
    color: white;
    font-size: 16px;
    cursor: pointer;
}

.au-btn:hover {
    background-color: #45a049;
}

/* Checkbox styles */
.login-checkbox {
    margin-bottom: 15px;
}

.login-checkbox label {
    font-size: 14px;
}

/* Password message styles */
#message {
    display: none;
    background: #f1f1f1;
    color: #000;
    padding: 10px;
    margin-top: 10px;
    border: 1px solid #ccc;
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

/* Register link styles */
.register-link {
    text-align: center;
    margin-top: 10px;
}

.register-link a {
    color: #4CAF50;
    text-decoration: none;
}

.register-link a:hover {
    text-decoration: underline;
}

</style>
<h2>Registration Admin</h2>

<div class="login-form">
                            <form action="addAdmin.php" method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="Username">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" id="password" name="password" minlength="8"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password" required >
                                </div><br>
                                <div id="message">
                                <h3>Password must contain the following:</h3>
                                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                <p id="number" class="invalid">A <b>number</b></p>
                                <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                                </div>
								 <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                </div><br>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="agree">Agree the terms and policy
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--blue m-b-20" type="submit">Sign Up</button>
                            </form>

        
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="login.php">Sign In</a>
                                </p>
                            </div>
                            
      
<script>
var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
function Validate(){
  var x= getElementById("password");
  var y= getElementById("confirmPassword");
  if(x==y) return;
  else alert("password not same");}



  const messageHistory = document.querySelector('.message-history');
  const messageText = document.getElementById('message-text');
  const sendButton = document.getElementById('send-button');
  const fileInput = document.getElementById('file-input');
  const attachButton = document.getElementById('attach-button');
  
  function sendMessage(sender, message, image) {
    const messageElement = document.createElement('div');
    messageElement.classList.add('message');
    if (sender === 'You') {
      messageElement.classList.add('sent');
    } else {
      messageElement.classList.add('received');
    }
    const content = document.createElement('p');
    content.textContent = message;
    const senderName = document.createElement('span');
    senderName.classList.add('message-sender');
    senderName.textContent = sender + ': ';
    messageElement.appendChild(senderName);
    if (image) {
      const messageImage = document.createElement('img');
      messageImage.classList.add('message-image');
      messageImage.src = image;
      messageElement.appendChild(messageImage)
      }  }
      </script>

</body>
</html>
