<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Parking Management System - OTP Verification</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <style>
    .container1 {
      max-width: 400px;
      margin: 50px auto;
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

  </style>
</head>
<body>
<?php include 'header.php'; ?>
  <div class="container1">
    <h2>OTP Verification</h2>
    <form  method="POST">
      <div class="form-group">
        <label for="otp">Enter OTP:</label>
        <input type="text" class="form-control" id="otp" name="otp" required>
      </div>
      <button type="submit" class="btn btn-primary" name="verify">Verify</button>
    </form>
    <center><a href="http://localhost/final/userlogin.php">Back to Login<a></center>
  </div>
 
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <?php require_once('footer.php') ?>
</body>

</html>
<?php
require 'conn.php';


// Step 2: Handle OTP verification
if (isset($_POST['verify'])) {
    // Retrieve the entered OTP and email
    $enteredOTP = $_POST['otp'];
    $name = $_SESSION['name'];
    $email1 = $_SESSION['email1'];
    $phone = $_SESSION['phone'];
    $address = $_SESSION['address'];
    $password = $_SESSION['password'];
    $otp=$_SESSION['otp'];
    $hpassword=$_SESSION['hpassword'];
    // echo $otp;
    
        // Step 4: Compare the entered OTP with the stored OTP
        if ($enteredOTP == $otp) {
          $sql = "INSERT INTO `register` (`name`, `email`, `phone`, `address`, `password`, `otp`) VALUES ('$name', '$email1', '$phone', '$address', '$hpassword', '$otp');";
        
          $result = $conn->query($sql);
          if($result)
          
            // OTP verification successful
            // Redirect to a success page or perform further actions
            // echo '<div class="success-message"><h4> Registration Successfull!</h4>';
            // echo '<p>Thank you for verifying your OTP.</p> </div>';
           
            // echo "<h2>Verification Successful!</h2>";
            // echo "<p>Thank you for verifying your OTP.</p>";
            echo '<script>swal("Good job!", "Registration Successfull!", "success");</script>';

        } else {
            // OTP verification failed
            // Display an error message
            // echo '<div class="error-message"><h4> Registration Failed</h4>';
            // echo '<p>Invalid OTP .. Please Enter Valid OTP.</p> </div>';
            echo '<script>swal("Oops!", "Invalid OTP, Registration Failed !", "error");</script>';
        }
    } 


    

?>

