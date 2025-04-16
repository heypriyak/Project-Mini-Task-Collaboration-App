<?php
session_start();
include('includes/connection.php');
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Task Collaboration App | Task</title>

    <!-- jQuery file -->
    <script src="includes/jquery_latest.js"></script>

    <!-- Bootstrap files -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- External CSS file -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="container mt-3">
        <h3 class="text-center">Your Tasks</h3>
        <br>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Serial No.</th>
                    <th>Task Name</th>
                    <th>Task Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Task Status</th>
                    <th>Action</th>
                </tr>
                <?php

                $query = "SELECT * FROM tasks WHERE uid = $_SESSION[uid]";
                $sno=1;
                $query_run = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($query_run)) {
                   ?>
                   <tr>
                    <td><?php echo $sno;?></td>
                    <td><?php echo $row['tid'];?></td>
                    
                    <td><?php echo $row['description'];?></td>
                    <td><?php echo $row['start_date'];?></td>
                    <td><?php echo $row['end_date'];?></td>
                    <td><?php echo $row['status'];?></td>
                    <td><a href="update_status.php?id=<?php echo $row['tid'];?>" class="btn btn-primary">Update</a></td>
                </tr>
                <?php
                    $sno++;
                }
                ?>
            </thead>
            <tbody>
                
                
        </table>
    </div>
</body>
</html>
