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
    <div class="center">
        <ul>
            <li><a href="login.php">Home</a></li>
        <li><a href="student_dashboard.php">Student Dashboard</a></li>
        </ul>
        <h3>You want to change your Slot?</h3>
        <form  action="" method="post">
            <input  type="submit" value="yes">
            <input type="hidden" name="conf" value="yes">
        </form>
        <form action="" method="post">
            <input type="submit" value="no">
            <input type="hidden" name="conf" value="no">

        </form>
        <?php
            include 'sql_conn.php';
            $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $parts = parse_url($url);
            parse_str($parts['query'], $query);
            $sid = $query['sid'];
            $newSlotId = $query['newSlotId'];

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if($_POST["conf"] == "yes"){
                    // $str = $_POST["search"];
                    $sql = "SELECT * FROM `enrollment` WHERE `sid` ='".$sid."'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $sql = "UPDATE enrollment SET `slot`='".$newSlotId."' WHERE `sid` ='".$sid."'";
                            if ($conn->query($sql) === TRUE) {
                            echo "Updated successfully";
                            } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        }
                    }
                }
                else{
                    header("Location: student_dashboard.php");
                    exit();
                }
            }

        ?>
    </div>
    
</body>
</html>