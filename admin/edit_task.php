<?php
include('../includes/connection.php');

if(isset($_POST['edit_task'])){
    $query = "UPDATE tasks SET uid=?, description=?, start_date=?, end_date=? WHERE tid=?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'isssi', $_POST['id'], $_POST['description'], $_POST['start_date'], $_POST['end_date'], $_GET['id']);
    $query_run = mysqli_stmt_execute($stmt);
    if($query_run){
        echo "<script type='text/javascript'>
        alert('Task updated successfully..');
        window.location.href = 'admin_dashbord.php';
        </script>";
    }
    else{
        echo "<script type='text/javascript'>
        alert('Error..Please try again.');
        window.location.href = 'admin_dashbord.php';
        </script>";
    } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <title>EDIT</title>
     <!-- jQuery file -->
     <script src="../includes/juqery_latest.js"></script>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- External css file -->
    <link rel="stylesheet" type="text/css" href="../css/style.css"> 
</head>
<body>
    <!-- header code starts here -->
    <div class="row" id="header">
        <div class="col-md-12">
            <h3><i class="fa fa-solid fa-list" style="padding-right: 15px;"></i>Task Management System</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 m-auto" style="color:white;"><br>
            <h3 style="color: white;">Edit the task</h3><br>
            <?php
               $query = "select * from tasks where tid = $_GET[id]";
                $query_run = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($query_run)){
                    ?>
            <form action="" method="post">
                <div class="form-group">
                   <input type="hidden" name="id" class="form-control" value="" required>
                </div>
                <div class="form-group">
               <label>Select user:</label>
               <select class="form-control" name="id" required>
                  <option>-Select-</option>
                  <?php
                     $query1 = "select uid,name from users";
                     $query_run1 = mysqli_query($connection,$query1);
                     if(mysqli_num_rows($query_run1)){
                       while($row1 = mysqli_fetch_assoc($query_run1)){
                        ?>
                        <option value="<?php echo $row1['uid'] ?>">
                        <?php echo $row1['name']; ?></option>
                        <?php
                       }
                     }
                  ?>
               </select>
            </div>
            <div class="form-group">
                <label>Description:</label>
                <textarea class="form-control" cols="50" rows="3" name="description" value="<?php echo $row['description']; ?> " required></textarea>
            </div>
            <div class="form-group">
                <label>Start date:</label>
                <input type="date" class="form-control" name="start_date" value="<?php echo $row['start_date']; ?>" required>
             </div>
             <div class="form-group">
                <label>End date:</label>
                <input type="date" class="form-control" name="end_date" value="<?php echo $row['end_date']; ?>" required>
             </div>
                </br>
             <input type="submit" class="btn btn-warning" name="edit_task" value="Update">
            </form>
            <?php
                }
            ?>  
        </div>
    </div>
</body>
</html>