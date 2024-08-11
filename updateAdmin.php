<?php
require_once("connect_db.php");

// Check if 'admin_id' parameter is set in the URL
if (isset($_GET['id'])) {
    $admin_id = $_GET['id'];
    
    // Sanitize the input
    $admin_id = mysqli_real_escape_string($conn, $admin_id);
    
    $update = "SELECT * FROM admin WHERE admin_id='$admin_id'";
    $result = mysqli_query($conn, $update);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Error fetching admin details: " . mysqli_error($conn);
        exit;
    }
} else {
    echo "No admin ID specified!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Admin Details</title>
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
<body>
    <h2>Update Admin Details</h2>

    <div class="login-form">
        <form action="updateAdmin2.php?admin_id=<?= htmlspecialchars($row['admin_id']); ?>" method="POST">
            <div class="form-group">
                <label for="admin_id">Admin ID:</label>
                <input name="admin_id" type="text" class="form-control prodID" value="<?= htmlspecialchars($row['admin_id']); ?>" readonly>
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

            <div class="text-center">
                <input type="submit" class="btn btn-outline-primary" value="Update">
                <a type="button" class="btn btn-outline-danger" href="viewAdmin.php">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
