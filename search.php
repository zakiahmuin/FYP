<?php
$connect = mysqli_connect("localhost", "root", "", "register");

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search and Filter Students</title>
    <style>
        /* Add your styling here */
    </style>
</head>
<body>
    <div class="container">
        <form method="POST" action="">
            <div class="search-container">
                <input type="text" name="student_fullname" placeholder="Search by name">
                <select name="gender">
                    <option value="">Select Gender</option>
                    <option value="Boy">Boy</option>
                    <option value="Girl">Girl</option>
                </select>
               
                <select name="type">
                    <option value="">Select Special Needs Type</option>
                    <option value="Down Syndrome">Down Syndrome</option>
                    <option value="ASD">Autism Spectrum Disorder (ASD)</option>
                    <option value="Dyslexia">Dyslexia</option>
                </select>
                <button type="submit" name="search">Search</button>
            </div>
        </form>
        <div class="results">
            <?php
            if (isset($_POST['search'])) {
                $student_fullname = $_POST['student_fullname'];
                $gender = $_POST['gender'];
                $type = $_POST['type'];

                $query = "SELECT student_id, student_fullname, gender, type FROM student WHERE 1=1";

                if (!empty($student_fullname)) {
                    $query .= " AND student_fullname LIKE '%$student_fullname%'";
                }
                if (!empty($gender)) {
                    $query .= " AND gender = '$gender'";
                }
                if (!empty($type)) {
                    $query .= " AND type = '$type'";
                }

                $res = mysqli_query($connect, $query);

                if (mysqli_num_rows($res) > 0) {
                    echo "<table class='table table-bordered table-striped'>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Type Special Needs</th>
                            </tr>";
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo "<tr>
                                <td>".$row['student_id']."</td>
                                <td>".$row['student_fullname']."</td>
                                <td>".$row['gender']."</td>
                                <td>".$row['type']."</td>
                              </tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>No data found</p>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
