<?php
session_start();
include('includes/connection.php');

if (isset($_POST['userLogin'])) {

    $query = "SELECT email, password, name, uid FROM users WHERE email='$_POST[email]' AND password='$_POST[password]'";

    $query_run = mysqli_query($connection, $query);

    if (mysqli_num_rows($query_run)) {

        while ($row = mysqli_fetch_array($query_run)) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['uid'] = $row['uid'];
        }

        echo "<script type='text/javascript'>
            window.location.href='user_dashboard.php';
        </script>";

    } else {
        echo "<script type='text/javascript'>
            alert('Please enter correct details!');
            window.location.href='user_login.php';
        </script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Task Collaboration App</title>
   
    <script src="includes/jQuery_latest.js"></script>
    <link rel="stylesheet" type="text/css"  href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet"  type="text/css" href="css/style.css">
</head>
<body>
<div  class="row">
    <div class="col-md-3 m-auto"  id="login_home_page">
        <center><h3 style = "background-color: #5A8F7B; padding: 5px; width: 40vh;"> User Login</h3></center><br>
            <form action="" method="post">
                <div class="form-group">

        
                    <input type="email" name="email" class="form-control" placeholder=" Enter Email" required>
                </div><br>
                <div class="form-group">

        
                    <input type="password" name="password" class="form-control" placeholder=" Enter password" required>
                    </div><br>
                    <div class="form-group">

        
                    <input type="submit" name="userLogin"  value="login" class="btn btn-warning" required>
                    </div><br><br>

                

</form>

  <center><a href="index.php" class="btn btn-danger ce">Go To Home</a></center><br><br>
</div>
    
</body>
</html>