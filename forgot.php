<?php

include_once "db_connection.php";
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


session_start();
$customer = false;
$admin = false;
$show_error = false;
$show_otp_section = false;  
$show_reset_pass = false;
$error_message = '';  // Initialize error message
if(isset($_POST['email_submit'])) {
    $email = isset($_POST['mail']) ? $_POST['mail'] : '';  // Get the email from the form input

    // Check if email is empty
    if (empty($email)) {
        $error_message = "Please enter your email.";
        $show_error = true;
    } else {
        // Query to check if email exists in the database
        $mail_check = "SELECT * FROM user_data WHERE email = '$email'";
        $result = mysqli_query($conn, $mail_check);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION['email'] = $email;
            // Email exists, proceed (e.g., redirect to OTP page)
            $otp = generateOTP();
            if (sendOTPEmail($email, $otp)) {
                $_SESSION['otp'] = $otp; // Store OTP in session for later verification
                $_SESSION['otp_time'] = time();
                $show_modal = false;
                $show_otp_section = true;
                $customer = true;
            } 
            else {
                $error_message = "Failed to send OTP. Please try again.";
                $show_modal = true;
            }

            $show_error = false;
            $show_otp_section = true;
        } else {
            $mail_check = "SELECT * FROM admin WHERE email = '$email'";
            $result = mysqli_query($conn, $mail_check);

            if (mysqli_num_rows($result) > 0) {
                $_SESSION['email'] = $email;
                // Email exists, proceed (e.g., redirect to OTP page)
                $otp = generateOTP();
                if (sendOTPEmail($email, $otp)) {
                    $_SESSION['otp'] = $otp; // Store OTP in session for later verification
                    $_SESSION['otp_time'] = time();
                    $show_modal = false;
                    $show_otp_section = true;
                    $admin = true;
                } 
                else {
                    $error_message = "Failed to send OTP. Please try again.";
                    $show_modal = true;
                }
                // Email not found, set flag to show modal
           }
           else{
            $error_message = "E-mail Not Found , please try again.";
            $show_error = true;
           }
         }
}
}

if(isset($_POST['otp_submit'])) {
  $otp = $_POST['otp'];
  if($otp == $_SESSION['otp'] && time() - $_SESSION['otp_time'] < 600){
    
    $show_reset_pass = true;
  }
  else {
    $error_message = "Invalid OTP or OTP expired.";
    $show_error = true;
  }

}

if(isset($_POST['reset_password_submit'])) {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    
    if($new_password == $confirm_password) {
        // Update password in database (ensure you hash the password for security)
        if($customer == true){
          $email = $_SESSION['email'];
          echo "<script>alert('$email');</script>";
          $update_pass = "UPDATE user_data SET password = '$new_password' WHERE email = '$email'";
          if(mysqli_query($conn, $update_pass)) {
              header("Location:login.php");
              session_destroy(); // Destroy session after successful reset
          } else {
              $error_message = "Failed to update password. Please try again.";
              $show_error = true;
          }
        }
        
        if($admin == true){
          $email = $_SESSION['email'];
          echo "<script>alert('$email');</script>";
          $update_pass = "UPDATE admin SET password = '$new_password' WHERE email = '$email'";
          if(mysqli_query($conn, $update_pass)) {
              header("Location:login.php");
              session_destroy(); // Destroy session after successful reset
          } else {
              $error_message = "Failed to update password. Please try again.";
              $show_error = true;
          }
        }
    } else {
        $error_message = "Passwords do not match.";
        $show_error = true;
    }
}

function generateOTP() {
    return rand(100000, 999999);
}

function sendOTPEmail($email, $otp) {
    require './vendor/phpmailer/phpmailer/src/Exception.php';
    require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require './vendor/phpmailer/phpmailer/src/SMTP.php';

    $mail = new PHPMailer(true);
    $sender = "no.reply.2427.php@gmail.com";
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $sender;
        $mail->Password = 'gnuv fmgh ozdy nknl'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('no-reply@anonymous.com', 'Password Reset OTP');
        $mail->addAddress($email, 'User');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Your OTP for password reset';
        $mail->Body    = "Your OTP is: $otp";

        // Send email
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;  // Add this for debugging
        return false;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css" />
    <link rel="stylesheet" href="assets/popup/style.css" />  
    <link rel="stylesheet" href="bootstrap/css/bootstrap5.css" />
    <title>Forgot Password</title>
</head>
<body>
    <div class="container pt-5">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 text-center">
          <img src="assets/images/main.png" alt="Main IMG" class="img-fluid" />
        </div>
        
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 pt-5" id="mail">
          <h2 class="main-text pt-5 mt-5">
            Forgot <br />
            Your Password
          </h2>
          <form method="post">
            <input
                type="email"
                name="mail"
                placeholder="Enter Your E-mail"
                class="form-control main-input mt-5"
            />
            <div class="row">
                <div class="col-3">
                  <button type="submit" name="email_submit" class="btn btn-sz-primary mt-5">Submit</button>
                </div>
                <div class="col-6 pt-5">
                  <a href="login.php" style="text-decoration:none;" class="back-to-login">Back To Login</a>
                </div>
            </div>
          </form>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 pt-5" id="otp" style="display:none;">
          <h2 class="main-text pt-5 mt-5">
            Enter OTP
          </h2>
          <form method="post">
            <input
              type="text"
              placeholder="Enter OTP"
              name="otp"
              class="form-control main-input mt-5"
            />
            <div class="row">
              <div class="col-3">
                <button type="submit" name="otp_submit" class="btn btn-sz-primary mt-5">Submit</button>
              </div>
              <div class="col-6 pt-5">
                <a href="login.php" style="text-decoration:none;" class="back-to-login">Back To Login</a>
              </div>
            </div>
          </form>
        </div>

      <div class="col-12 col-sm-12 col-md-12 col-lg-6 pt-5" id="new_pass" style="display:none;">
        <form method="post">
          <h2 class="main-text pt-5 mt-2">
            New Password
          </h2>
          <input
            type="password"
            placeholder="Enter New Password"
            name="new_password"
            class="form-control main-input mt-5" required
          />
          <h2 class="main-text pt-5 mt-2">
            Confirm Password
          </h2>
          <input
            type="password"
            placeholder="Enter Confirm Password"
            name="confirm_password"
            class="form-control main-input mt-5" required
          />
          <div class="row">
            <div class="col-3">
              <button type="submit" name="reset_password_submit" class="btn btn-sz-primary mt-5">Submit</button>
            </div>
            <div class="col-6 pt-5">
              <a href="login.php" style="text-decoration:none;" class="back-to-login">Back To Login</a>
            </div>
          </div>
        </form>
      </div>
    </div>
    
    
    <!-- Modal Trigger Script -->
    <?php if ($show_error): ?>
    <script>
         alert("<?php echo $error_message; ?>");
    </script>
    <?php endif; ?>

    <!-- OTP section visibility script -->
    <?php if ($show_otp_section): ?>
    <script>
        document.getElementById("mail").style.display = "none";
        document.getElementById("otp").style.display = "block";
        console.log("OTP ");
    </script>
    <?php endif; ?>

  <?php if ($show_reset_pass): ?>
    <script>
        document.getElementById("mail").style.display = "none";
        document.getElementById("otp").style.display = "none";
        document.getElementById("new_pass").style.display = "block";
        console.log("Reset Password Section is displayed.");
    </script>
  <?php endif; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.bundle.min.js"></script>

    <script>
      function validateForm(){
      const new_password = document.getElementById("new_password").value.trim();
      const confirm_password = document.getElementById("confirm_password").value.trim();
       if (!validatePassword(new_password)) {
          alert("Password must have at least 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character.");
          return false;
        }
      } 
function validatePassword(password) {
  password = password.trim();
  const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&_])[A-Za-z\d@$!%*?&_]{8,}$/;
  return regex.test(password);
}

    </script>
</body>
</html>