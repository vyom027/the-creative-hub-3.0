<?php
require_once 'db_connection.php';
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id']; // Get the user_id from the session

    // Query to get the email from the user_data table
    $user_email_check = "SELECT email FROM user_data WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $user_email_check);

    // Initialize variables
    $customer_status = 'new';
    $customer_data = [];
    
    // Check if the query was successful and if there is a result
    if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        $email = $user_data['email']; // Fetch the email from the result

        // Check if the user is already in the customer table
        $check_customer_query = "SELECT * FROM customer WHERE user_id = '$user_id'";
        $check_customer_result = mysqli_query($conn, $check_customer_query);

        // Check if the customer exists
        if ($check_customer_result && mysqli_num_rows($check_customer_result) > 0) {
            $customer_status = 'existing';
            $customer_data = mysqli_fetch_assoc($check_customer_result); // Fetch customer details
            moveOrderToPending($conn, $user_id);

        }

        // Handle the form submission
        else {if ($_SERVER['REQUEST_METHOD'] == 'POST' && $customer_status === 'new') {
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $address = mysqli_real_escape_string($conn, $_POST['address']);
            $city = mysqli_real_escape_string($conn, $_POST['city']);
            $state = mysqli_real_escape_string($conn, $_POST['state']);
            $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
            $card_name = mysqli_real_escape_string($conn, $_POST['card_name']);
            $card_number = mysqli_real_escape_string($conn, $_POST['card_number']);
            $exp_month = mysqli_real_escape_string($conn, $_POST['exp_month']);
            $exp_year = mysqli_real_escape_string($conn, $_POST['exp_year']);
            $cvv = mysqli_real_escape_string($conn, $_POST['cvv']);
            $mobile_number = mysqli_real_escape_string($conn, $_POST['mobile_number']);
            // Insert customer details
            $insert_customer_query = "
                INSERT INTO `customer` (`user_id`, `name`, `address`, `city`, `state`, `pincode`, `card_name`, `card_number`, `exp_month`, `exp_year`, `cvv`, `email`,`mobile_number`) 
                VALUES ('$user_id', '$name', '$address', '$city', '$state', '$pincode', '$card_name', '$card_number', '$exp_month', '$exp_year', '$cvv', '$email', '$mobile_number')";

            if (mysqli_query($conn, $insert_customer_query)) {
                moveOrderToPending($conn, $user_id);
                header("Location:add-details.php");
            } else {
                echo "Error inserting customer details: " . mysqli_error($conn);
            }
        }
    }
    } else {
        echo "User not found in user_data table!";
    }
} else {
    echo "No user logged in!";
}

function moveOrderToPending($conn, $user_id) {
    $insert_order_query = "INSERT INTO pending_orders (user_id, product_id, price, main_image)
            SELECT user_id, product_id, price, main_image FROM order_product WHERE user_id = '$user_id'";

    if (mysqli_query($conn, $insert_order_query)) {
        // Now delete from order_product
        $delete_order_query = "DELETE FROM order_product WHERE user_id = '$user_id'";
        if (mysqli_query($conn, $delete_order_query)) {
            //echo "Order successfully moved to pending.";
        } else {
            echo "Error deleting order: " . mysqli_error($conn);
        }
    } else {
        echo "Error inserting into pending_orders: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title> Address & Payment Details  </title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/product.css">
    <link rel="stylesheet" href="./assets/css/order.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
</head>
<body>
    

    <!-- ***** Preloader Start ***** -->
    <!-- <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>   -->
    <!-- ***** Preloader End ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo" style="margin-top: -20px;">
                            <img src="assets/images/logo.png" height="130px">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="index.php">Home</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Products</a>
                                <ul>
                                    <li><a href="mobile-computer.php">Mobile & Computers</a></li>
                                    <li><a href="home-appliances.php">Home Appliances</a></li>
                                    <li><a href="entertainment-devices.php">Entertainment Devices</a></li>
                                    <li><a href="accessories.php">Accessories</a></li>
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="contact.php">Contact Us</a></li>
                            <li class="scroll-to-section"><a href="about.php">Explore</a></li>
                            <?php if (isset($_SESSION['username'])): ?>
                                <li class="scroll-to-section" onclick="cart()"><a>Shopping Cart</a></li>
                                <li class="submenu"><a href=""><?php echo $_SESSION['username'] ?></a>
                                    <ul>
                                        <li><a href="logout.php">Log out</a></li>
                                    </ul>
                                </li>
                            <?php else: ?>
                                <li class="scroll-to-section"><a href="login.php">Login/ SignUp</a></li>
                            <?php endif; ?>
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
    <?php if (isset($customer_status) && $customer_status === 'existing'): ?>
    <div class="container mt-5 d-flex justify-content-center">
       <div class="card p-4 mt-3">
          <div class="first d-flex justify-content-between align-items-center mb-3">
            <div class="info">
                <span class="d-block name">Thank you, <?php echo $customer_data['name'] ?></span>
                 
            </div>
           
             <img src="https://i.imgur.com/NiAVkEw.png" width="40"/>
              

          </div>
              <div class="detail">
          <span class="d-block summery">Your order has been dispatched. we are delivering you order.</span>
              </div>
          <hr>
          <div class="text">
        <span class="d-block new mb-1" ><?php echo $customer_data['name'] ?></span>
         </div>
        <span class="d-block address mb-3"><?php echo $customer_data['address'] ?></span>
          <div class="  money d-flex flex-row mt-2 align-items-center">
            <img src="https://i.imgur.com/ppwgjMU.png" width="20" />
        
            <span class="ml-2">Online Payment</span> 

               </div>
               <div class="last d-flex align-items-center mt-3">
                <span class="address-line">CHANGE MY DELIVERY ADDRESS</span>
               </div>
        </div>
    </div>
  
    <?php else: ?>
    <div class="order-container">

    <form action="" method="post">

        <div class="row">

            <div class="col">

                <h3 class="title">billing address</h3>

                <div class="inputBox">
                    <span>full name :</span>
                    <input type="text" name="name" placeholder="Name">
                </div>
                <div class="inputBox">
                    <span>email :</span>
                    <input type="email" name="email" value="<?php echo $email ?>">
                </div>
                
                <div class="inputBox">
                    <span>address :</span>
                    <input type="text" name="address" placeholder="room - street - locality">
                </div>
                <div class="inputBox">
                    <span>city :</span>
                    <input type="text" name="city"placeholder="City">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>state :</span>
                        <input type="text" name="state" placeholder="State">
                    </div>
                    <div class="inputBox">
                        <span>Pin Code :</span>
                        <input type="text" name="pincode" placeholder="Pincode">
                    </div>
                </div>

            </div>

            <div class="col">

                <h3 class="title">payment</h3>

                <div class="inputBox">
                    <span>Mobile Number:</span>
                    <input type="number" name="card_number"placeholder="+91 9988776655">
                </div>
                <div class="inputBox">
                    <span>name on card :</span>
                    <input type="text" name="card_name" placeholder="Name On Card">
                </div>
                <div class="inputBox">
                    <span>credit card number :</span>
                    <input type="number" name="card_number"placeholder="1111-2222-3333-4444">
                </div>
                <div class="inputBox">
                    <span>exp month :</span>
                    <input type="text" name="exp_month"placeholder="january">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>exp year :</span>
                        <input type="number" name="exp_year"placeholder="2028">
                    </div>
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text" name="cvv"placeholder="1234">
                    </div>
                </div>

            </div>
    
        </div>

        <input type="submit" value="proceed to checkout" class="submit-btn">

    </form>

</div>    
<?php endif; ?>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
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
                <div class="col-lg-3">
                    <h4>Shopping &amp; Categories</h4>
                    <ul>
                        <li><a href="#">Mobile and Computing Devices</a></li>
                        <li><a href="#">Home Appliances</a></li>
                        <li><a href="#">Entertainment Devices</a></li>
                        <li><a href="#">All Accessories</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">Homepage</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Help &amp; Information</h4>
                    <ul>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">FAQ's</a></li>
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">Tracking ID</a></li>
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

    <script src="assets/js/jquery-2.1.0.min.js"></scr>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
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
    // <script src="assets/js/mobile.js"></script>
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
         