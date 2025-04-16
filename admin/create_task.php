<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>

    <!-- Optional: Bootstrap for form styling -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <h3>Create a new task.</h3>
    <div class="row">
        <div class="col-md-6">
            <form action="admin_dashboard.php" method="post">
                <div class="form-group">
                    <label>Select User:</label>
                    <select class="form-control" name="id" required>
                        <option>-Select-</option>
                        <?php
                        include('../includes/connection.php');
                        $query = "SELECT uid, name FROM users";
                        $query_run = mysqli_query($connection, $query);
                        if (mysqli_num_rows($query_run)) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                                ?>
                                <option value="<?php echo $row['uid']; ?>"><?php echo $row['name']; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Description:</label>
                    <textarea class="form-control" rows="3" cols="50" name="description" placeholder="Mention the task" required></textarea>
                </div>

                <div class="form-group">
                    <label>Start date:</label>
                    <input type="date" name="start_date" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>End date:</label>
                    <input type="date" name="end_date" class="form-control" required>
                </div>

                <input type="submit" name="create_task" value="Create" class="btn btn-primary">
            </form>
        </div>
    </div>
</body>
</html>
