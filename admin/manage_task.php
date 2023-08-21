<?php
  include('../includes/connection.php');
?>
<html lang="en">
<body>
     <h3><center><b>All assigned tasks</b></center></h3>
     <table class="table" style="background-color:whitesmoke;width:75vw">
        <tr>
            <th>S.No</th>
            <th>Task ID</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php
            $sno = 1;
            $query = "select * from tasks";
            $query_run = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($query_run)){
            ?>
               <tr>
                <td><?php echo $sno; ?></td>
                <td><?php echo $row['tid']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['start_date']; ?></td>
                <td><?php echo $row['end_date']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><a href="edit_task.php?id=<?php echo $row['tid']; ?>">Edit</a> | <a href="delete_task.php?id=<?php echo $row['tid']; ?>">Delete</a></td>
               </tr>
            <?php
            $sno = $sno + 1;
           }
        ?>
     </table>
</body>
</html>