<?php
    include 'sql_conn.php';
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $name = $_REQUEST['name'];
        $first_name = $_REQUEST['first_name'];
        $sid = $_REQUEST['sid'];
        $email = $_REQUEST['email'];
        $selectOption = $_POST['slot_option'];
        $sqly = "SELECT * FROM enrollment WHERE sid = ".$sid;
        $result = $conn->query($sqly);
        // $user = "batman";
        // header("Location:temp.php?user=".$user);
        if ($result->num_rows > 0) {
            header("Location: confirmation.php?sid=".$sid."&newSlotId=".$selectOption);
            exit();
        }
        $sql = "INSERT INTO enrollment (name, first_name, sid, email, slot) VALUES ('".$name."','".$first_name."','".$sid."', '".$email."', '".$selectOption."')";
            //  VALUES ('d','d','d','d')";
        if ($conn->query($sql) === TRUE) {
          echo "<h4 class='center'> New record created successfully </h4>";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();

    }
?>

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
        <!-- <li><a href="admin_dashboard">Admin Dashboard</a></li> -->
        <!-- <li><a href="about.asp">About</a></li> -->
    </ul>
    <div class="center">
    
    <form action="" method="post">
        <label for="name">Name</label>
        <input  name="name" type="text" required>
        <label for="fname">First Name</label>
        <input name="first_name" type="text" required><br><br>
        <label for="name">SID</label>
        <input name="sid" type="text" required>
        <label for="name">Email</label>
        <input name="email" type="email" required>
        <br><br>

        <Select name="slot_option">
        <?php


        function enrolledQunatity($slot_id){
            include 'sql_conn.php';
            $sql = "SELECT * FROM enrollment WHERE slot= '".$slot_id."'";
            $result = $conn->query($sql);
            $conn->close();
            return mysqli_num_rows($result);
        }


        // echo "hi";
            $sql = "SELECT * FROM slot";
            $result = $conn->query($sql);
            
            if (mysqli_num_rows($result) > 0) {
                while($row = $result->fetch_assoc()) {
                    $timestamp = strtotime($row["date"]);
                    $day = date('D', $timestamp);
                    if($row["capacity"]-enrolledQunatity($row["slot_id"]) == 0){
                        echo "<option disabled value=". $row["slot_id"].">".$day." 15:00-17:00->  ".$row["capacity"]-enrolledQunatity($row["slot_id"])." Seats remaining</option>";
                    }
                    else{
                        echo "<option value=". $row["slot_id"].">".$day." 15:00-17:00->  ".$row["capacity"]-enrolledQunatity($row["slot_id"])." Seats remaining</option>";
                    }
                    
                  }
              } 
        ?>
        </Select>
        <br><br>
        <input type="submit" value="Register">
        <input type="button" value="Clear">
    </form>
    </div>
    
</body>
</html>