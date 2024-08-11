<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login</title>
    <style>
      body {
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
      .container {
        background: rgba(255, 255, 255, 0.9);
        padding: 20px;
        margin: 50px 10px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        max-width: 500px;
        width: 100%;
      }
      .form-group {
        margin-bottom: 15px;
      }
      .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
      }
      .form-group input {
        width: 95%;
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
      #submit {
        width: 100%;
        padding: 10px;
        background-color: #007BFF;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }
      #submit:hover {
        background-color: #45a049;
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
      .invalid:before {
        position: relative;
        left: -35px;
        content: "✖";
      }
      .content a {
        color: #888;
        text-decoration: underline;
      }
      .content .forgot-pass {
        position: relative;
        top: 2px;
        font-size: 14px;
      }
      .other {
        text-align: center;
      }
      .social-login a {
        text-decoration: none;
        position: relative;
        text-align: center;
        color: #fff;
        margin-bottom: 10px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: inline-block;
        align-content: center;
      }
      .social-login a span {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
      }
      .social-login a:hover {
        color: #fff;
      }
      .social-login a.facebook {
        background: #3b5998;
      }
      .social-login a.facebook:hover {
        background: #344e86;
      }
      .social-login a.twitter {
        background: #1da1f2;
      }
      .social-login a.twitter:hover {
        background: #0d95e8;
      }
      .social-login a.google {
        background: #ea4335;
      }
      .social-login a.google:hover {
        background: #e82e1e;
      }
      .register-link a {
        color: #4CAF50;
        text-decoration: none;
      }
      .register-link a:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body>
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 contents">
            <div class="row justify-content-center">
              <div class="col-md-8">
                <div class="mb-4">
                  <h3>Log In</h3>
                  <p class="mb-4">Enter your username and password.</p>
                </div>
                <div class="login-container">
                  <form class="box" action="admin.php" method="post">
                    <form action=".php" method="post">
                      
                      <div class="form-group first">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                      </div><br>
                      <div class="form-group last mb-4">
                        <label for="password">Password</label>
                        <input class="au-input au-input--full" type="password" id="password" name="password" minlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password" required>
                      </div><br>
                      <div id="message">
                        <h3>Password must contain the following:</h3>
                        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                        <p id="number" class="invalid">A <b>number</b></p>
                        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                      </div>
                      <div class="d-flex mb-5 align-items-center">
                        <label class="control control--checkbox mb-0">
                          <span class="caption">Remember me</span>
                          <input type="checkbox" checked="checked" />
                          <div class="control__indicator"></div>
                        </label>
                      </div>
                      <div class="mb-5">
                        <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
                      </div>
                      <input type="submit" value="Log In" id="submit" class="btn btn-block btn-primary">
                      <br>
                      <div class="other">
                        <div class="register-link">
                          <p>Create new account?
                            <a href="registerAdmin.php">Sign up</a>
                          </p>
                        </div>
                        <div class="col-md-12 mb-4">
                                        <p class="text-center"><a href="home.php">Go Back Home</a></p>
                                    </div>
                          </a>
                        </div>
                      </div>
                    </form>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      var myInput = document.getElementById("password");
      var letter = document.getElementById("letter");
      var capital = document.getElementById("capital");
      var number = document.getElementById("number");
      var length = document.getElementById("length");

      // When the user clicks on the password field, show the message box
      myInput.onfocus = function () {
        document.getElementById("message").style.display = "block";
      }

      // When the user clicks outside of the password field, hide the message box
      myInput.onblur = function () {
        document.getElementById("message").style.display = "none";
      }

      // When the user starts to type something inside the password field
      myInput.onkeyup = function () {
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        if (myInput.value.match(lowerCaseLetters)) {
          letter.classList.remove("invalid");
          letter.classList.add("valid");
        } else {
          letter.classList.remove("valid");
          letter.classList.add("invalid");
        }

        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if (myInput.value.match(upperCaseLetters)) {
          capital.classList.remove("invalid");
          capital.classList.add("valid");
        } else {
          capital.classList.remove("valid");
          capital.classList.add("invalid");
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if (myInput.value.match(numbers)) {
          number.classList.remove("invalid");
          number.classList.add("valid");
        } else {
          number.classList.remove("valid");
          number.classList.add("invalid");
        }

        // Validate length
        if (myInput.value.length >= 8) {
          length.classList.remove("invalid");
          length.classList.add("valid");
        } else {
          length.classList.remove("valid");
          length.classList.add("invalid");
        }
      }
      function Validate() {
        var x = getElementById("password");
        var y = getElementById("confirmPassword");
        if (x == y) return;
        else alert("password not same");
      }

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
          messageElement.appendChild(messageImage);
        }
      }
    </script>
  </body>
</html>
