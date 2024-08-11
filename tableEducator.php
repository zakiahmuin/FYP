<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <style>
    body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('images/pinkbackground.webp'); 
            overflow-x: hidden; /* Prevent horizontal scroll */
        }
        .header {
            background-color: #fc46aa;
            color: #fff;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header .logo {
            font-size: 24px;
        }
        .header .user-actions {
            display: flex;
            align-items: center;
            position: relative;
        }
        .header .user-actions a {
            color: #fff;
            margin-left: 20px;
            text-decoration: none;
        }
        .container {
            margin-left: 200px; /* Adjust for side nav */
            padding: 20px;
            transition: margin-left 0.3s;
            align-content: center;
            align-items: center;
        }
        
        
        /* Side Navigation Bar */
        .side-nav {
            height: 23%;
            width: 200px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: white;
            border-right: 1px solid pink;
            padding-top: 20px;
            margin-top: 85px;
            transition: 0.3s;
            overflow-x: hidden;
            border-radius: 5px;
           
        }
        .side-nav.hidden {
            width: 0;
            padding-top: 0;
        }
        .side-nav ul {
            list-style-type: none;
            padding: 0;
            display: none; /* Hide the content initially */
           
        }
        .side-nav ul.visible {
            display: block; /* Show the content when the menu is open */
        }
        .side-nav li {
            padding: 8px 16px;
           
            
        }
        .side-nav a {
            color: #333;
            text-decoration: none;
            display: block;
           
        }
        .side-nav a:hover {
            background-color: #fc46aa;
            color: white;
            padding: 8px 16px;
            
        }
        
        .toggle-btn {
            position: fixed;
            top: 20px;
            left: 20px;
            margin-top: 63px;
            padding: 5px;
            font-size: 20px;
            cursor: pointer;
            z-index: 1;
            transition: left 0.3s;
            background-color: white;
            color: black;
            
            
        }

        .icon {
            border-radius: 50%;
            width: 40px;
            height: 40px;
        }
        .educator, .t {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            position: center;
            margin: 50px;
        }
        .dropdown {
            position: relative;
            display: inline-block;
            cursor: pointer;
            color: black;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            right: 0; /* Align with the right edge of the parent container */
            background-color: black;
            color: black;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 5px;
            
        }
        .dropdown-content a {
            color: black; /* Set text color */
            padding: 12px 16px;
           
            display: block;
            border-bottom: 1px solid #fc46aa;
        }
        .dropdown-content a:hover {
            background-color: #fc46aa;
            color: white; /* Change text color on hover */
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .dropdown-content a i {
            margin-right: 10px;
        }
        .header .user-info {
            display: flex;
            align-items: center;
        }
        .header .user-info h5 {
            margin: 0;
            margin-right: 10px;
            font-size: 18px;
            color: #fff;
        }
        .header .user-info span {
            color: #fff;
            font-size: 14px;
        }

.header .user-info {
    display: flex;
    align-items: center;
}

.header .user-info h5 {
    margin: 0;
    margin-right: 10px;
    font-size: 18px;
    color: #fff;
}

.header .user-info span {
    color: #fff;
    font-size: 14px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin: 10px;
}

th,
td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    
    color: black;
}

/* Style for table header */
th.text-center,
td.text-center {
    text-align: center;
}

/* Style for table rows */
tr.tr-shadow {
    background-color: #f8f8f8;
}

/* Style for hover effect */
tr.tr-shadow:hover {
    background-color: #f1f1f1;
}

/* Style for buttons */
.btn-primary {
    padding: 8px 16px;
    background-color: white;
    color: #007BFF;
    border: 1px solid #007BFF;
    border-radius: 4px;
    text-decoration: none;
    display: inline-block;
    transition: background-color 0.3s, color 0.3s, border 0.3s;
    display: block;
    width: 100px;
    margin: 60px;
    text-align: center;
    
}

.btn-primary:hover {
    background-color: #007BFF;
    color: white;
    border: 1px solid #007BFF;
}

.btn {
    padding: 8px 16px;
    border: none;
    cursor: pointer;
    border-radius: 4px;
    text-decoration: none;
    display: inline-block;
    margin-right: 5px;
}

.btn-outline-warning {
    background-color: transparent;
    color: #ffc107;
    border: 1px solid #ffc107;
}

.btn-outline-warning:hover {
    background-color: #ffc107;
    color: white;
}

.btn-outline-danger {
    background-color: transparent;
    color: #dc3545;
    border: 1px solid #dc3545;
}

.btn-outline-danger:hover {
    background-color: #dc3545;
    color: white;
}

/* Additional styles for responsiveness */
@media only screen and (max-width: 768px) {
    .container {
        margin-left: 0;
    }
}
/* Style for search container */
.search-container {
    display: flex;
    align-items: center;
    margin-left: 30px;
    padding: 20px;
    width: 80%; 
    border-radius: 10px;
}

.au-input {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 10px;
    margin-left: 5px; /* Adjust margin as needed */
    width: 400px; /* Adjust width as needed */
}

.au-btn--submit {
    
    background-color: #ff85c0;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
/* Style for search button image */
.au-btn--submit img {
    vertical-align: middle;
    height: 30px; /* Adjust height as needed */
    border-radius: 10px;
}
    </style>
</head>
<body>
<div class="header">
        <span class="toggle-btn" id="toggleBtn">&#9776; </span>
        <div class="logo">Student Dashboard</div>
        <div class="user-actions">
            <div class="dropdown">
                <img src="images/icon-acc.avif" alt="User Icon" class="icon">
                <div class="dropdown-content">
                    <div class="account-dropdown">
                        <a href="viewEducatoraccount.php"><i class="zmdi zmdi-account"></i>Account</a>
                    </div>
                    
                    <div class="account-dropdown">
                        <a href="logout.php"><i class="zmdi zmdi-power"></i>Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Side Navigation Bar -->
    
    <div class="side-nav hidden" id="sideNav">
        <ul id="sideNavContent">
            <li><a href="studentpage.php">Dashboard</a></li>
            <li><a href="tableEducator.php">Table Educator</a></li>
            <li><a href=".php">Chat</a></li>
        </ul>
    </div>

    
 <!-- PAGE CONTAINER-->
        <div class="page-container">
           
            
                           <!-- Search bar -->
<form class="form-header" action="" method="POST">
    <div class="search-container">
        <input class="au-input au-input--xl" type="text" name="search" placeholder="Search " />
        <button class="au-btn--submit" type="submit"><img src="images/OIP.jpeg"  alt="">
            <i class="zmdi zmdi-search"></i>
        </button>
    </div>
</form>
 <!-- DATA TABLE -->
 <h4 class="educator">Lists of Educator</h4>
 
 <!-- The table section -->
    <div class="t">
        <table class="table table-data2">
            <thead>
                <tr>                                           
                    <th class="text-center">Educator ID</th>
                    <th class="text-center">Name</th>            
                    <th class="text-center">Email</th>
                    <th class="text-center">Gender</th>
                    <th class="text-center">Age</th>
                    <th class="text-center">Phone No</th>
                    <th class="text-center">University</th>
                    <th class="text-center">Education Level</th>
                    <th class="text-center">Type Preference</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php 
                    include 'connect_db.php';
                    $sql = "select educator_id, name, email, gender, age, phone, university, education_level, preference_type from educator";
                    $result = mysqli_query($conn, $sql);                  
                    $i=1; 
                    while($row = mysqli_fetch_row($result)){?>
                    
                    <tr class="tr-shadow">                                              
                        <td class="text-center"><?=$i;?></td>
                        <td ><?=$row[1];?></td>
                        <td ><?=$row[2];?></td>
                        <td class="text-center"><?=$row[3];?></td>
                        <td class="text-center"><?=$row[4];?></td>
                        <td class="text-center"><?=$row[5];?></td>
                        <td class="text-center"><?=$row[6];?></td>
                        <td class="text-center"><?=$row[7];?></td>
                        <td class="text-center"><?=$row[8];?></td>                                              
                                                                               
                    </tr>
                    <tr class="spacer"></tr>                                                                                                                          
                <?php 
                $i++;
                }
                ?>
            </tbody>
        </table>
        <br>
    </div>
    <!-- End table section -->
									
									
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2024 Empowering Information: Personal Educator for Special Kids. All rights reserved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        document.getElementById("toggleBtn").onclick = function() {
            var sideNav = document.getElementById("sideNav");
            var sideNavContent = document.getElementById("sideNavContent");
            var container = document.querySelector('.page-container');
            if (sideNav.classList.contains("hidden")) {
                sideNav.classList.remove("hidden");
                sideNavContent.classList.add("visible");
                container.style.marginLeft = "200px";
            } else {
                sideNav.classList.add("hidden");
                sideNavContent.classList.remove("visible");
                container.style.marginLeft = "0";
            }
        };
    </script>
</body>

</html>
<!-- end document-->
