<?php
session_start();
include('../includes/connection.php');
if(isset($_POST['adminLogin'])) {
    
        $query = "SELECT email, password, name FROM admin WHERE email='$_POST[email]' AND password='$_POST[password]'";



        $query_run = mysqli_query($connection, $query);

        if (mysqli_num_rows($query_run)) {
            while ($row = mysqli_fetch_assoc($query_run)) {
                $_SESSION['email'] = $row['email'];
                $_SESSION['name'] = $row['name'];
            }
            echo "<script type='text/javascript'>
           
            window.location.href='admin_dashboard.php';
            </script>";
        }
        else{
             echo "<script type='text/javascript'>
            alert('Please enter correct details!');
            window.location.href='admin_login.php';
            </script>";
        }
           
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
   
    <script src="../includes/jQuery_latest.js"></script>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

<div class="row">
    <div class="col-md-4 m-auto" id="register_user_page" style="margin-top: 50px;">
        <center><h3 style="background-color: #5A8F7B; padding: 5px; width: 40vh;">Admin Login</h3></center><br>

        <form action="" method="post">
            

            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
            </div><br>

            
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
            </div><br>

            <div class="form-group">
                <input type="submit" name="adminLogin" value="Login" class="btn btn-success btn-block">
            </div><br><br>
        </form>

        <center><a href="../index.php" class="btn btn-danger">Go To Home</a></center><br><br>
    </div>
</div>

</body>
</html>
