
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Document</title>
</head>
<body>
<ul>
    <li><a href="login.php">Home</a></li>
    <li><a href="student_dashboard.php">Student Dashboard</a></li>
    <li><a href="admin_dashboard.php">Admin Dashboard</a></li>
    <!-- <li><a href="about.asp">About</a></li> -->
    </ul>
    <div class="center">
        <form action="" method="post">
            <input type="text" name="search" placeholder="Search">
            <input type="submit" value="Search">
            <input type="hidden" value="search" name="method">
            <br>
            <br>
        </form>
        <form action="" method="post">
        <label for="">Filter by</label>
        <input type="hidden" value="filter" name="method">
            <select name="slot_filter" id="">
                <option value="1">Slot 1</option>
                <option value="2">Slot 2</option>
                <option value="3">Slot 3</option>
                <option value="4">Slot 4</option>
            </select>
            <input type="submit" value="Filter">
            <br> <br>
        </form>

        <form action="" method="post">
        <label for="">Sort by</label>
        <input type="hidden" value="sort" name="method">
            <select name="sort_option" id="">
                <option value="name">Name</option>
                <option value="sid">Student ID</option>
                <option value="slot">Slot </option>
            </select>
            <input type="submit" value="Sort">
            <br> <br>
        </form>
        


        <?php
            include 'sql_conn.php';
            
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if($_POST["method"] == "search"){
                    $str = $_POST["search"];
                    $sql = "SELECT * FROM `enrollment` WHERE `name` ='".$str."' OR `sid` ='".$str."' OR `first_name` ='".$str."'";
                }
                else if ($_POST["method"] == "filter"){
                    $selectOption = $_POST['slot_filter'];
                    $sql = "SELECT * FROM `enrollment` WHERE `slot` ='".$selectOption."'";
                }
                else if ($_POST["method"] == "sort"){
                    $selectOption = $_POST['sort_option'];
                    $sql = "SELECT * FROM `enrollment` ORDER BY " .$selectOption;
                }
            
            }
            else{
                $sql = "SELECT * FROM enrollment";
            }
            
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            // output data of each row
            echo "<table border='1'>
                <tr>
                <th>Name</th>
                <th>First name</th>
                <th>Student ID</th>
                <th>email</th>
                <th>Slot No</th>
                </tr>";
            while($row = $result->fetch_assoc()) {
                {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['first_name'] . "</td>";
                    echo "<td>" . $row['sid'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['slot'] . "</td>";
                    echo "</tr>";              
                    }
            }
            echo "</table>";
            } else {
            echo "0 results";
            }
        ?>

    </div>
</body>
</html>