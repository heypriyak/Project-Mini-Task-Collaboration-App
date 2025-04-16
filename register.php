<?php
include("includes/connection.php");
if(isset($_POST['userRegistration'])) {
    
        $query = "INSERT INTO users values(NULL, '$_POST[name]', '$_POST[email]', $_POST[mobile], '$_POST[password]')";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            echo "<script type='text/javascript'>
            alert('User Registered Successfully!');
            window.location.href='index.php';
            </script>";
        }
        else{
 echo "<script type='text/javascript'>
            alert('Error...Plz try again!');
            window.location.href='register.php';
            </script>";
        }
           
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration - Mini Task Collaboration App</title>
   
    <script src="includes/jQuery_latest.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class="row">
    <div class="col-md-4 m-auto" id="register_user_page" style="margin-top: 50px;">
        <center><h3 style="background-color: #5A8F7B; padding: 5px; width: 40vh;">User Registration</h3></center><br>

        <form action="" method="post">
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Enter Full Name" required>
            </div><br>

            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
            </div><br>

            <div class="form-group">
                <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number" required pattern="[0-9]{10}" title="Enter a valid 10-digit mobile number">
            </div><br>

            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
            </div><br>

            <div class="form-group">
                <input type="submit" name="userRegistration" value="Register" class="btn btn-success btn-block">
            </div><br><br>
        </form>

        <center><a href="index.php" class="btn btn-danger">Go To Home</a></center><br><br>
    </div>
</div>

</body>
</html>
