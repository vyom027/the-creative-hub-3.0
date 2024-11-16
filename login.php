<?php

include_once "db_connection.php";
session_start();
if (isset($_POST['login'])) {
    // Sanitize the input to avoid SQL injection
    $username = $_POST['username'];
    $password =  $_POST['password'];
    
    // Query the admin table
    $query = "SELECT * FROM `admin` WHERE (`username` = '$username' OR  `email` = '$username') AND `password` = '$password'";
    $admin = mysqli_query($conn, $query);

    if (!$admin) {
        // Display SQL error if the query fails
        echo "SQL Error: " . mysqli_error($conn);
        exit(); // Stop script execution if there's an error
    }

    if (mysqli_num_rows($admin) != 0) {
      $admin_data = mysqli_fetch_assoc($admin);

      $_SESSION['admin_logged_in'] = true;
      $_SESSION['admin_username'] =  $admin_data['username'];

      header("Location: ./admin/index.php");
      exit(); // Always exit after header to prevent further code execution
    } else {
        // If admin login fails, check in the user_data table
        $user_query = "SELECT * FROM `user_data` WHERE (`username` = '$username' OR  `email` = '$username') AND `password` = '$password'";
        $result = mysqli_query($conn, $user_query);

        if (!$result) {
            // Display SQL error if the query fails
            echo "SQL Error: " . mysqli_error($conn);
            exit();
        }

          if (mysqli_num_rows($result) == 1) {
            $user_data = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $user_data['user_id'];
            $_SESSION['username'] = $user_data['username'];
            header("Location:index.php");
        } else {
            // Invalid credentials for both admin and user
            echo "Invalid login credentials!";
        }
    }
}
if (isset($_POST['signup'])) {
  // Sanitize form inputs
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $email = mysqli_real_escape_string($conn, $_POST['mail']);  // Use email input instead of username

  // Insert query with corrected closing quote
  if($username != NULL && $password != NULL && $email != NULL){
  $query_user = "INSERT INTO `user_data`(`username`, `password`, `email`) VALUES ('$username', '$password', '$email')";
  }
  else{
    echo "Enter Details...!";
  }
  // Execute query
  $signin = mysqli_query($conn, $query_user);

  if (!$signin) {
      // Output SQL error if insertion fails
      echo "Not Registered: " . mysqli_error($conn);
  } else {
    header("Location:login.php");
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="./bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="assets/css/login.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
    />
    <link
      rel="shortcut icon"
      type="image/x-icon"
      href="./admin/assets/img/favicon.jpg"
    />
    <title>Login | The Creative Hub</title>
  </head>

  <body>
    <!-- blue circle background -->
    <div
      class="d-none d-md-block ball login bg-primary bg-gradient position-absolute rounded-circle"
    ></div>

    <!-- logo name -->
    <div class="position-absolute top-0 start-0 p-3">
      <a
        href="index.php"
        class="text-decoration-none fw-bold fs-5"
      >
        <img src="./assets/img/logo1.png" height="75px" width="75px" alt="" />
      </a>
    </div>

    <!-- Login Section -->
    <div class="container login__form active" id="loginn">
      <div class="row vh-100 w-100 align-self-center">
        <div class="col-12 col-lg-6 col-xl-6 px-5">
          <div class="row vh-100">
            <div class="col align-self-center p-5 w-100">
              <h3 class="fw-bolder">WELCOME BACK!</h3>
              <p class="fw-lighter fs-6">
                Don't have an account,
                <span id="signUp" role="button" class="text-primary"
                  >Sign Up</span
                >
              </p>
              <!-- form login section -->
              <form
                id="loginForm"  
                method="post"
                class="mt-5"
                onsubmit="return validateLogin()"
              >
                <div class="mb-3">
                  <label for="loginEmail" class="form-label"> Username</label>
                  <input
                    type="text"
                    id="loginEmail"
                    name="username"
                    class="form-control text-indent shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3"
                    placeholder="username"
                  />
                </div>
                <div class="mb-3">
                  <label for="loginPassword" class="form-label">Password</label>
                  <div class="d-flex position-relative">
                    <input
                      type="password"
                      id="loginPassword"
                      name="password"
                      class="form-control text-indent auth__password shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3"
                      placeholder="password"
                    />
                    <span
                      class="password__icon text-primary fs-4 fw-bold bi bi-eye-slash"
                    ></span>
                  </div>
                </div>
                  <a id="signUp" style="text-decoration: none;" href="forgot.php" role="button" name="forgot" class="text-primary" >Forgot Password ? </a>
                <div class="col text-center mt-0">
                  <button
                    type="submit"
                    name="login"
                    class="btn btn-outline-dark btn-lg rounded-pill mt-4 w-100"
                  >
                    Login
                  </button>
                </div>
              </form>
              <p class="mt-2 text-center">Or Sign in with social platforms</p>
              <div class="row text-center">
                <div class="col mt-3">
                  <a
                    href=""
                    class="btn btn-outline-dark border-2 rounded-circle"
                    ><i class="bi bi-facebook fs-5"></i
                  ></a>
                </div>
                <div class="col mt-3">
                  <a
                    href=""
                    class="btn btn-outline-dark border-2 rounded-circle"
                    ><i class="bi bi-linkedin fs-5"></i
                  ></a>
                </div>
                <div class="col mt-3">
                  <a
                    href=""
                    class="btn btn-outline-dark border-2 rounded-circle"
                    ><i class="bi bi-twitter fs-5"></i
                  ></a>
                </div>
                <div class="col my-3">
                  <a
                    href=""
                    class="btn btn-outline-dark border-2 rounded-circle"
                    ><i class="bi bi-google fs-5"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="d-none d-lg-block col-lg-6 col-xl-6 p-5">
          <div class="row vh-100 p-5">
            <div class="col align-self-center p-5 text-center">
              <img src="assets/img/login.png" class="bounce" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Register Section -->
    <div class="container register__form">
      <div class="row vh-100 w-100 align-self-center">
        <div class="d-none d-lg-block col-lg-6 col-xl-6 p-5">
          <div class="row vh-100 p-5">
            <div class="col align-self-center p-5 text-center">
              <img src="assets/img/register.png" class="bounce" alt="" />
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-6 px-5">
          <div class="row vh-100">
            <div class="col align-self-center p-5 w-100">
              <h3 class="fw-bolder">REGISTER HERE!</h3>
              <p class="fw-lighter fs-6">
                Have an account,
                <span id="signIn" role="button" class="text-primary"
                  >Sign In</span
                >
              </p>
              <!-- form register section -->
              <form
                id="registerForm"
                method="POST"
                class="mt-5"
                onsubmit="return validateRegister()"
              >
                <div class="mb-3">
                  <label for="registerUsername" class="form-label"
                    >Username</label
                  >
                  <input
                    type="text"
                    id="registerUsername"
                    class="form-control text-indent shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3"
                    placeholder="username"
                    name ="username"
                  />
                </div>
                <div class="mb-3">
                  <label for="registerEmail" class="form-label">Email</label>
                  <input
                    type="email"
                    id="registerEmail"
                    class="form-control text-indent shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3"
                    placeholder="name@example.com"
                    name = "mail"
                  />
                </div>
                <div class="mb-3">
                  <label for="registerPassword" class="form-label"
                    >Password</label
                  >
                  <div class="d-flex position-relative">
                    <input
                      type="password"
                      id="registerPassword"
                      name = "password"
                      placeholder="password"
                      class="form-control text-indent auth__password shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3"
                    />
                    <span
                      class="password__icon text-primary fs-4 fw-bold bi bi-eye-slash"
                    ></span>
                  </div>
                </div>
                <div class="col text-center">
                  <button
                    type="submit"
                    name = "signup"
                    id="change"
                    class="btn btn-outline-dark btn-lg rounded-pill mt-4 w-100"
                  >
                    Sign Up
                  </button>
                </div>
              </form>
              <p class="mt-5 text-center">Or Sign in with social platforms</p>
              <div class="row text-center">
                <div class="col mt-3">
                  <a
                    href=""
                    class="btn btn-outline-dark border-2 rounded-circle"
                    ><i class="bi bi-facebook fs-5"></i
                  ></a>
                </div>
                <div class="col mt-3">
                  <a
                    href=""
                    class="btn btn-outline-dark border-2 rounded-circle"
                    ><i class="bi bi-linkedin fs-5"></i
                  ></a>
                </div>
                <div class="col mt-3">
                  <a
                    href=""
                    class="btn btn-outline-dark border-2 rounded-circle"
                    ><i class="bi bi-twitter fs-5"></i
                  ></a>
                </div>
                <div class="col my-3">
                  <a
                    href=""
                    class="btn btn-outline-dark border-2 rounded-circle"
                    ><i class="bi bi-google fs-5"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/login.js"></script>
  </body>
</html>
