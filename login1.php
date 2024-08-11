<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Confirmation</title>
<style>
    body {
        font-family: Arial, sans-serif;
    }
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1000;
    }
    .modal {
        background: white;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        z-index: 1001;
    }
    .modal button {
        margin: 10px;
        padding: 10px 20px;
        border: none;
        background-color: #fc46aa;
        color: black;
        border-radius: 5px;
        cursor: pointer;
    }
    .modal button:hover {
            background-color:  #fc46aa;
            color: white;
           
        
    }
    .hidden {
        display: none;
    }
</style>
</head>
<body>

<!-- Overlay and Modal for Page 1 -->
<div id="overlay1" class="overlay">
    <div class="modal">
        <p>Login as what?</p>
        <button id="noButton1">admin</button>
        <button id="yesButton1">educator</button>
        <button id="yesButton2">student</button>
    </div>
</div>



<script>
document.getElementById("noButton1").addEventListener("click", function() {
    window.location.href = "login.php"; // Navigate to the home page
});

document.getElementById("yesButton1").addEventListener("click", function() {
    window.location.href = "log.php"; // Navigate to the home page
});

document.getElementById("yesButton2").addEventListener("click", function() {
    window.location.href = "loginStudent.php"; // Navigate to the home page
});


</script>

</body>
</html>
