<?php
require_once 'db_connection.php';
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Fetch user data
    $user_login_query = "SELECT * FROM user_data WHERE user_id = '$user_id'";
    $user_details_query = "SELECT * FROM customer WHERE user_id = '$user_id'";
    
    $user_result = mysqli_query($conn, $user_details_query);
    $user_login_result = mysqli_query($conn, $user_login_query);

    if ($user_result && mysqli_num_rows($user_result) > 0 && $user_login_result && mysqli_num_rows($user_login_result) > 0) {
        $user_data = mysqli_fetch_assoc($user_result);
        $user_login_data = mysqli_fetch_assoc($user_login_result);
        $email = $user_login_data['email'];
    }
}

// Handle form submission to update details
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
    $mobile_number = mysqli_real_escape_string($conn, $_POST['mobile_number']);
    $card_name = mysqli_real_escape_string($conn, $_POST['card_name']);
    $card_number = mysqli_real_escape_string($conn, $_POST['card_number']);
    $exp_month = mysqli_real_escape_string($conn, $_POST['exp_month']);
    $exp_year = mysqli_real_escape_string($conn, $_POST['exp_year']);
    $cvv = mysqli_real_escape_string($conn, $_POST['cvv']);


    // Update session with new username
    $_SESSION['username'] = $username;

    // Update customer and user data
    $update_customer_query = "UPDATE customer 
                     SET name = '$name', address = '$address', city = '$city', state = '$state', pincode = '$pincode', 
                         mobile_number = '$mobile_number', card_name = '$card_name', card_number = '$card_number', 
                         exp_month = '$exp_month', exp_year = '$exp_year', cvv = '$cvv' 
                     WHERE user_id = '$user_id'";
    $update_user_data_query = "UPDATE user_data SET
                    username = '$username', password='$password', email='$email' WHERE user_id = '$user_id'";

    if (mysqli_query($conn, $update_customer_query) && mysqli_query($conn, $update_user_data_query)) {
        header("Location: profile.php");
        exit();
    }
}
?>



<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>User Profile</title>

    <link rel="stylesheet" href="./assets/css/order.css">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
<link
      rel="shortcut icon"
      type="image/x-icon"
      href="./admin/assets/img/favicon.jpg"
    />

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
       <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo">
                            <img src="assets/images/logo.png" height="90px">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="index.php" class="active">Home</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Products</a>
                                <ul>
                                    <li><a href="">Mobile & Computers</a></li>
                                    <li><a href="home-appliances.php">Home Appliances</a></li>
                                    <li><a href="entertainment-devices.php">Entertainment Devices</a></li>
                                    <li><a href="accessories.php">Accessories</a></li>
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="contact.php">Contact Us</a></li>
                            <li class="scroll-to-section"><a href="about.php">About Us</a></li>
                            <?php if (isset($_SESSION['username'])): ?>
                                 <li class="submenu"><a href=""><?php echo $_SESSION['username'] ?></a>
                                    <ul>
                                        <li><a href="profile.php">Profile</a></li>
                                        <li><a href="order.php">Orders</a></li>
                                        <li><a href="logout.php">Log out</a></li>
                                    </ul>
                                </li>
                            <?php else: ?>
                                <li class="scroll-to-section"><a href="login.php">Login/ SignUp</a></li>
                            <?php endif; ?>
                            <li><a href="javascript:void(0)"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="order-container">

    <form action="" method="post">

        <div class="row">

            <div class="col">

                <h3 class="title">billing address</h3>

                <div class="inputBox">
                    <span>User name :</span>
                    <input type="text" name="username" placeholder="UserName" value="<?php echo $user_login_data['username'];?>">
                </div> 
                <div class="inputBox">
                    <span>full name :</span>
                    <input type="text" name="name" placeholder="Name" value="<?php echo $user_data['name'];?>">
                </div>
                <div class="inputBox">
                    <span>email :</span>
                    <input type="email" name="email" value="<?php echo $email ?>">
                </div>
                
                <div class="inputBox">
                    <span>address :</span>
                    <input type="text" name="address" placeholder="room - street - locality" value="<?php echo $user_data['address'];?>">
                </div>
                <div class="inputBox">
                    <span>city :</span>
                    <input type="text" name="city"placeholder="City" value="<?php echo $user_data['city'];?>">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>state :</span>
                        <input type="text" name="state" placeholder="State" value="<?php echo $user_data['state'];?>">
                    </div>
                    <div class="inputBox">
                        <span>Pin Code :</span>
                        <input type="text" name="pincode" placeholder="Pincode" value="<?php echo $user_data['pincode'];?>">
                    </div>
                </div>

            </div>

            <div class="col">

                <h3 class="title">payment</h3>

                <div class="inputBox">
                    <span>Password :</span>
                    <input type="password" name="password" placeholder="Password" value="<?php echo $user_login_data['password'];?>">
                </div> 
                <div class="inputBox">
                    <span>Mobile Number:</span>
                    <input type="text" name="mobile_number"placeholder="+91 9988776655" value="<?php echo $user_data['mobile_number'];?>">
                </div>
                <div class="inputBox">
                    <span>name on card :</span>
                    <input type="text" name="card_name" placeholder="Name On Card" value="<?php echo $user_data['card_name'];?>">
                </div>
                <div class="inputBox">
                    <span>credit card number :</span>
                    <input type="number" name="card_number"placeholder="1111-2222-3333-4444" value="<?php echo $user_data['card_number'];?>">
                </div>
                <div class="inputBox">
                    <span>exp month :</span>
                    <input type="text" name="exp_month"placeholder="january" value="<?php echo $user_data['exp_month'];?>">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>exp year :</span>
                        <input type="number" name="exp_year"placeholder="2028" value="<?php echo $user_data['exp_year'];?>">
                    </div>
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text" name="cvv"placeholder="1234" value="<?php echo $user_data['cvv'];?>">
                    </div>
                </div>

            </div>
    
        </div>

        <input type="submit" name="update" value="proceed to checkout" class="submit-btn">

    </form>

</div>    
    <!-- ***** Footer Start ***** -->
    <footer style="margin-top:130px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="first-item">
                        <div class="logo">
                            <img src="assets/images/bottom.png" height="50px" alt="The Creative Hub ecommerce templatemo">
                        </div>
                        <ul>
                            <li><a href="#">LJ Campus, LJ College Road,
                                Off. S.G. Road
                                Ahmedabad-382210</a></li>
                            <li><a href="mailto:thecreativehub.03@gmail.com ">thecreativehub.03@gmail.com</a></li>
                            <li><a href="tel:+918469407881">+91 84694 07881</a><br>
                            <a href="tel:+918849721477">+91 88497 21477 </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h4>Shopping &amp; Categories</h4>
                    <ul>
                        <li><a href="mobile-computer.php">Mobile and Computing Devices</a></li>
                        <li><a href="home-appliances.php">Home Appliances</a></li>
                        <li><a href="entertainment-devices.php">Entertainment Devices</a></li>
                        <li><a href="accessories.php">All Accessories</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="index.php">Homepage</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="under-footer">
                        <p>Copyright © 2024 The Creative Hub Ltd. All Rights Reserved. </p>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>

  </body>

</html>
