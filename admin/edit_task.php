<?php
include('../includes/connection.php');

if (isset($_POST['edit_task'])) {

    // Sanitize the input data to prevent SQL injection
    $uid = $_POST['id'];
    $description = $_POST['description'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $tid = $_GET['id'];

    // Update query
    $query = "UPDATE tasks SET uid = '$uid', description = '$description', start_date = '$start_date', end_date = '$end_date' WHERE tid = '$tid'";

    // Execute the query
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        // Success message and redirect
        echo "<script type='text/javascript'>
                alert('Task updated successfully...');
                window.location.href = 'admin_dashboard.php';
              </script>";
    } else {
        // Error message
        echo "<script type='text/javascript'>
                alert('Error... Please try again.');
                window.location.href = 'admin_dashboard.php';
              </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task | Task Management System</title>

    <!-- jQuery file -->
    <script src="../includes/jquery_latest.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- External CSS -->
    <link rel="stylesheet" href="../css/style.css">

    <style>
        body {
            background-color: #f0f2f5;
        }
        #header {
            background-color: #343a40;
            padding: 20px 0;
            margin-bottom: 30px;
        }
        #header h3 {
            color: white;
            font-weight: bold;
            text-align: center;
        }
        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
        }
        .btn-block {
            width: 100%;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="row" id="header">
        <div class="col-md-12">
            <h3><i class="fa fa-list" style="padding-right: 15px;"></i>Task Management System</h3>
        </div>
    </div>

    <!-- Centered Form -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-container">
                    <h4 class="text-center mb-4" style="color: #157ade;">Edit the Task</h4>

                    <form action="" method="post">
                        <input type="hidden" name="tid" value="<?php echo htmlspecialchars($taskData['tid'] ?? '', ENT_QUOTES); ?>">

                        <div class="form-group">
                            <label>Select User:</label>
                            <select class="form-control" name="uid" required>
                                <option>-Select-</option>
                                <?php
                                $query1 = "SELECT uid, name FROM users";
                                $query_run1 = mysqli_query($connection, $query1);
                                if (mysqli_num_rows($query_run1)) {
                                    while ($row1 = mysqli_fetch_assoc($query_run1)) {
                                        $selected = ($taskData['uid'] ?? '') == $row1['uid'] ? 'selected' : '';
                                        echo "<option value='{$row1['uid']}' $selected>{$row1['name']}</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Description:</label>
                            <textarea class="form-control" name="description" rows="3" required><?php echo htmlspecialchars($taskData['description'] ?? '', ENT_QUOTES); ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Start Date:</label>
                            <input type="date" class="form-control" name="start_date" value="<?php echo htmlspecialchars($taskData['start_date'] ?? '', ENT_QUOTES); ?>" required>
                        </div>

                        <div class="form-group">
                            <label>End Date:</label>
                            <input type="date" class="form-control" name="end_date" value="<?php echo htmlspecialchars($taskData['end_date'] ?? '', ENT_QUOTES); ?>" required>
                        </div>

                        <button type="submit" name="edit_task" class="btn btn-primary btn-block">Update Task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
