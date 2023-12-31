<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create New Password</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <style>
    body {
      background-color: #f8f9fa;
    }
    .success-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-top: 20px;
        }

    
    .error-message {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-top: 20px;
    }
    .container1 {
      max-width: 400px;
      margin: 0 auto;
      padding: 40px;
      margin-top: 50px;
      background-color: #fff;
      border-radius: 4px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>
<?php include 'header.php'; ?>
  <div class="container1">
    <h2 class="text-center">Create New Password</h2>
    <form method="POST">
      <div class="form-group">
        <label for="password">New Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your new password">
      </div>
      <div class="form-group">
        <label for="confirm-password">Confirm Password</label>
        <input type="password" class="form-control" id="confirm-password" name="cpassword" placeholder="Confirm your new password">
      </div>
      <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
    </form>
    <br>
    <center><a href="userlogin.php">Back to Login</a></center>
  </div>
  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <?php require_once('footer.php') ?>
</body>
</html>
<?php



require 'conn.php';
if (isset($_POST['submit']))
{
    $email2 = $_SESSION['email2'];
    $password=$_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $cpassword=$_POST['cpassword'];
    if($password==$cpassword)
    {
        $sql="UPDATE `register` SET `password`='$hashedPassword' WHERE email='$email2';";
        mysqli_query($conn,$sql);
        echo '<script>swal("Good job!", "Password Updated Successfully!", "success");</script>';
    }
    else{
      echo '<script>swal("Oops!", "Something Went Wrong Please Try Again!", "error");</script>';
    }

}

?>
