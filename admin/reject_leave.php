<?php
    include('../includes/connection.php');
    $query = "update leaves set status = 'Rejected' where lid = $_GET[id]";
    $query_run = mysqli_query($connection,$query);
    if($query_run){
        echo "<script type='text/javascript'>
        alert('leave status successfully..');
        window.location.href = 'admin_dashbord.php';
        </script>
        ";
    }
    else{
        echo "<script type='text/javascript'>
        alert('Error...Plz try again.');
        window.location.href = 'admin_dashbord.php';
        </script>
        ";
    }
?> 