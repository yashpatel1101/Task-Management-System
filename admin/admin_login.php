<?php
session_start();
include('../includes/connection.php');

if(isset($_POST['adminLogin'])){
  $email = mysqli_real_escape_string($connection, $_POST['email']);
  $password = mysqli_real_escape_string($connection, $_POST['password']);

  $query = "SELECT email, name FROM admins WHERE email = '$email' AND password = '$password'";
  $query_run = mysqli_query($connection, $query);

  if(mysqli_num_rows($query_run) > 0){
    $row = mysqli_fetch_assoc($query_run);
    $_SESSION['email'] = $row['email'];
    $_SESSION['name'] = $row['name'];
    
    header("Location: admin_dashbord.php");
    exit();
  } 
  else{
    echo "<script type='text/javascript'>
      alert('Please enter correct details');
      window.location.href = 'admin_login.php';
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
    <title>Admin Login</title>
    <!-- jQuery file -->
    <script src="../includes/jquery_latest.js"></script>
    <!-- Bootstrap file -->
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- External css file -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <div class="row">
        <div class="col-md-3 m-auto" id="login_home_page">
            <center><h3 style="background-color: blueviolet; padding: 5px; width: 5px;">Admin Login</h3></center>
           <form action="" method="post">
             <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
             </div>
             <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
             </div>
             <div class="form-group">
                <center><input type="submit" name="adminLogin" value="Login" class="btn btn-warning"></center>
             </div>
           </form>
           <center><a href="../index.php" class="btn btn-danger">go to home</a></center>
        </div>
    </div>
</body>
</html>