<?php
    include 'sql_conn.php';
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
    
        $sqlquery = "SELECT * FROM user WHERE username='".$username."'" ." AND password='" .$password."'";
        $result = $conn->query($sqlquery);
        // echo $sqlquery;
        if (mysqli_num_rows($result) > 0) {
            echo "Login Successful";
            while($row = $result->fetch_assoc()) {
                $role = $row["role"];
                // echo "id: " . $row["username"]. " - Name: " . $row["password"]. " " . $row["role"]. "<br>";
              }
              if ($role == "ADMIN"){
                header("Location: admin_dashboard.php");
              }
              else if ($role == "STUDENT"){
                header("Location: student_dashboard.php");
                exit();
            }
           
          } 
          else {
            echo "User not found";
          }

    }
    $conn->close();
        
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
    <li><a href="admin_dashboard.php">Admin Dashboard</a></li>
    <!-- <li><a href="about.asp">About</a></li> -->
    </ul>

    <form class="center" action="" method="POST">
        <input name="username" type="text" placeholder="username">
        <br>
        <input name="password" type="password" placeholder="password">
        <br>
        <input type="submit" value="Login">
    </form>


</body>
</html>