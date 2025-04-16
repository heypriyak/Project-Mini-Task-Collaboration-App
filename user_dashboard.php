<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>

    <!-- jQuery file -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap files -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- External CSS file -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $("#manage_task").click(function(e) {
        e.preventDefault();
        $("#right_sidebar").load("task.php"); // make sure this path is correct
    });
});
</script>

</head>
<body>
    <!-- Header -->
    <div class="p-3 bg-light d-flex justify-content-between">
        <div>
            <b>Email:</b> <?php echo $_SESSION['email']; ?>
            <span style="margin-left: 25px;"><b>Name:</b><?php echo $_SESSION['name']; ?></span>
        </div>
        <div>
            <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="row m-0">
        <!-- Sidebar -->
        <div class="col-md-2 bg-light" id="left_sidebar">
            <table class="table ">
                <tr>
                    <td style="text-align: center;">
                        <a href="user_dashboard.php"  type="button" id="logout_link">Dashboard</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a href="#" type="button" class="link" id="manage_task">Update Task</a>

                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a href="apply_leave.php" type="button">Apply Leave</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a href="view_leave.php" type="button">Leave Status</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a href="logout.php">Logout</a>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Right Sidebar -->
        <div class="col-md-10" id="right_sidebar">
            <h4>Instructions for Employees</h4>
            <ul style="line-height: 2em; font-size: 1.2em; list-style-type: none;">
                <li>1. All employees should mark their attendance daily.</li>
                <li>2. Complete the tasks assigned to you on time.</li>
                <li>3. Maintain decorum in the office.</li>
                <li>4. Keep your workspace neat and clean.</li>
            </ul>
        </div>
    </div>
</body>
</html>
