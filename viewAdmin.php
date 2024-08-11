

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
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
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: white;
        }
        h1 {
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
        .details dt, .details dd {
            flex: 0 0 50%;
            margin: 0;
            padding: 10px 0;
        }
        .details dt {
            font-weight: bold;
        }
        .details dd {
            margin-left: 10px;
        }
        dd{
            align-items: center;
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
             align-items: center;
             
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
    <div class="container">
        <h1>Admin Details</h1>
        <div class="details">
        <?php 
                include 'connect_db.php';
                $sql = "SELECT admin_id, username, password, email FROM admin";
                $result = mysqli_query($conn, $sql);					
                while ($row = mysqli_fetch_row($result)) { ?>
                    <dl>
                        <dt class="text-center">Username</dt>
                        <dd class="text-center"><?=$row[1];?></dd>
                        <dt class="text-center">Password</dt>
                        <dd class="text-center"><?=$row[2];?></dd>
                        <dt class="text-center">Email</dt>
                        <dd class="text-center"><?=$row[3];?></dd>
                        <dd class="btn-container">
                            <a type="button" class="btn btn-outline-warning" href='updateAdmin.php?id=<?=$row[0];?>'>Update</a>
                            <a type="button" class="btn btn-outline-primary" href='adminApproval.php?id=<?=$row[0];?>'>Back</a>
                           
                        </dd>
                    </dl>                          
            <?php } ?>
            </div>
    </div>
</body>
</html>

