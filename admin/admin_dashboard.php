<?php
session_start();
include('../includes/connection.php');

if (isset($_POST['create_task'])) {
    $id = $_POST['id'];
    $description = $_POST['description'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $query = "INSERT INTO tasks VALUES (NULL, '$id', '$description', '$start_date', '$end_date', 'Not Started')";

    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        echo "<script type='text/javascript'>
            alert('Task Created Successfully!');
            window.location.href='admin_dashboard.php';
            </script>";
    } else {
        echo "<script type='text/javascript'>
            alert('Error creating task! Please try again.');
            window.location.href='admin_dashboard.php';
            </script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- External CSS (optional, add your own if needed) -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <script>
    $(document).ready(function() {
        $("#create_task").click(function(e) {
            e.preventDefault();
            $("#right_sidebar").load("create_task.php");
        });

        $("#manage_task").click(function(e) {
            e.preventDefault();
            $("#right_sidebar").load("manage_task.php");
        });

        $("#view_leave").click(function(e) {
            e.preventDefault();
            $("#right_sidebar").load("view_leave.php");
        });

        $("#dashboard").click(function(e) {
            e.preventDefault();
            $("#right_sidebar").html(`
                <h4>Instructions for Admin</h4>
                <ul style="line-height: 2em; font-size: 1.1em;">
                    <li>1. All the employees should mark their attendance daily.</li>
                    <li>2. Everyone must complete the task assigned to them.</li>
                    <li>3. Kindly maintain decorum of the office.</li>
                    <li>4. Keep office and your area neat and clean.</li>
                </ul>
            `);
        });
    });
</script>

    <!-- Header -->
    <div id="header" class="d-flex justify-content-between align-items-center p-3 bg-light border-bottom">
        <h3>Task Management System</h3>
        <div class="text-right">
            <b>Email:</b> <?php echo $_SESSION['email']; ?><br>
<b>Name:</b> <?php echo $_SESSION['name']; ?><br>

        </div>
    </div>

    <!-- Layout -->
    <div class="row no-gutters">
        <!-- Sidebar -->
        <div class="col-md-2 p-3">
            <a href="#" id="dashboard" class="btn btn-primary btn-block mb-2">Dashboard</a>
            <a href="#" id="create_task" class="btn btn-primary btn-block mb-2">Create Task</a>
           <a href="#" class="btn btn-primary btn-block mb-2" id="manage_task">Manage Task</a>

            <a href="#" class="btn btn-primary btn-block mb-2" id="view_leave">Leave Application</a>
            <a href="logout.php" class="btn btn-danger btn-block">Logout</a>

        </div>

        <!-- Right Sidebar -->
        <div class="col-md-10 p-4" id="right_sidebar">
            <h4>Instructions for Admin</h4>
            <ul style="line-height: 2em; font-size: 1.1em;">
                <li>1. All the employees should mark their attendance daily.</li>
                <li>2. Everyone must complete the task assigned to them.</li>
                <li>3. Kindly maintain decorum of the office.</li>
                <li>4. Keep office and your area neat and clean.</li>
            </ul>
        </div>
    </div>

</body>
</html>
