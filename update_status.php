<?php
include('includes/connection.php');

if (isset($_POST['update'])) {

    $status = $_POST['status'];
    $tid = $_GET['id'];

    $query = "UPDATE tasks SET status = '$status' WHERE tid = '$tid'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        echo "<script type='text/javascript'>
                alert('Status updated successfully...');
                window.location.href = 'user_dashboard.php';
              </script>";
    } else {
        echo "<script type='text/javascript'>
                alert('Error... Please try again.');
                window.location.href = 'user_dashboard.php';
              </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management System</title>

    <!-- jQuery file -->
    <script src="includes/jquery_latest.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- External CSS -->
    <link rel="stylesheet" href="css/style.css">

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
            <h3><i class="fa fa-list" style="padding-right: 15px;"></i>Update the task</h3>
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
                           <select class="form-control" name="status">
                            <option>-select-</option>
                             <option>-In-Progress-</option>
                            <option>Complete</option>
                            </select>
                        </div>



                        <button type="submit" name="update"  value="update" class="btn btn-primary btn-block">Update Task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
