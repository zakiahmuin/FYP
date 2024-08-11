
<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: log.php");
    exit();
}

require_once 'connect_db.php';

$username = $_SESSION['username'];

$query = "SELECT * FROM approve WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "No user found!";
    exit();
}

$user = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Account</title>
    <style>
       body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('images/pinkbackground.webp'); /* Update the path to your image */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #account-info{
            
            max-width: 1000px;
        }
        .container {
           
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: white;
        }
        h3 {
            text-align: center;
        }
        .details {
            margin-top: 20px;
        }
        .details dl {
            display: flex;
            flex-wrap: wrap;
            margin: 0;
            padding: 0;
        }
         dt,  dd {
            flex: 0 0 50%;
            margin: 0;
            padding: 10px 0;
        }
        dt {
            font-weight: bold;
        }
        dd {
            margin-left: 10px;
        }
        .btn-container {
            
           margin-left: 50px;
            justify-content: center;
            margin-top: 10px;
        }
        .btn {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
            margin: auto;
            
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
<body>
    <header>
        
    </header>
    <main>
        <section id="account-info">
            <div class="container">
                <h3>Account Details</h3>
                <table>
                    <dl>
                    
                    
                    
                        <dt class="text-center">Name:</dt>
                        <dd class="text-center"><?php echo htmlspecialchars($user['name']); ?></dd>
                        
                        <dt class="text-center">Username:</dt>
                        <dd class="text-center"><?php echo htmlspecialchars($user['username']); ?></dd>
                        <?php $id = $user['id']; ?>

                        <dt class="text-center">Email:</dt>
                        <dd class="text-center"><?php echo htmlspecialchars($user['email']); ?></d>

                        <dt class="text-center">Gender:</dt>
                        <dd class="text-center"><?php echo htmlspecialchars($user['gender']); ?></d>
                    
                        <dt class="text-center">Age:</dt>
                        <dd class="text-center"><?php echo htmlspecialchars($user['age']); ?></d>
                    
                        <dt class="text-center">Phone No:</dt>
                        <dd class="text-center"><?php echo htmlspecialchars($user['phone']); ?></d>

                        <dt class="text-center">Univaersity's Name:</dt>
                        <dd class="text-center"><?php echo htmlspecialchars($user['university']); ?></d>

                        <dt class="text-center">Education Level:</dt>
                        <dd class="text-center"><?php echo htmlspecialchars($user['education_level']); ?></d>

                        <dt class="text-center">Type Special Needs that Preferred:</dt>
                        <dd class="text-center"><?php echo htmlspecialchars($user['preference_type']); ?></d>
                        
                        <dt class="text-center">Method Learning:</dt>
                        <dd class="text-center"><?php echo htmlspecialchars($user['method']); ?></d>
                        
                        <dt class="text-center">Availability:</dt>
                        <dd class="text-center"><?php echo htmlspecialchars($user['availability']); ?></d>
                    
                        <dt class="text-center">Description:</dt>
                        <dd class="text-center"><?php echo htmlspecialchars($user['description']); ?></d>
                    


                        <dd class="btn-container">
               
                        <a type="button" class="btn btn-outline-warning"  href='update.php?id=<?=$id;?>'>Update</a>
                <a type="button" class="btn btn-outline-primary" href='educatorpage.php'>Back</a>
                <a type="button" class="btn btn-outline-danger" href='del.php?id=<?=$id;?>'>Delete</a>
                </dd>
            </dl>
                </table>
            </div>
        </section>
    </main>
</body>
</html>
