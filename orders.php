<?php

include_once 'db_connection.php';
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id']; 
    $order_query = "
        SELECT 
            pending_orders.order_id,
            pending_orders.order_date,
            pending_orders.main_image,
            product.name,
            product.description,
            product.price
        FROM 
            pending_orders
        JOIN 
            product ON pending_orders.product_id = product.product_id
        WHERE 
            pending_orders.user_id = $user_id";

    $order_result = $conn->query($order_query);
    if (!$order_result) {
        die("Query failed: " . $conn->error);
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cancel'])){
        $cancel_id = $_POST['id'];
        // echo $cancel_id;
        $delete_query = "DELETE FROM pending_orders WHERE order_id = $cancel_id ";
        if (mysqli_query($conn, $delete_query)) {
            header("Location:orders.php");
        }
    }
} 
else {
    header("Location: login.php");
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
    <link rel="stylesheet" href="./assets/css/product.css">
    <title>The Creative Hub </title>

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="order/css/style.css">

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

      <?php


// Get the logged-in user's ID
$user_id = $_SESSION['user_id'];

// Fetch cart items for the logged-in user
$sql_cart = "SELECT shopping_cart.*, product.name, product.image_url 
              FROM shopping_cart 
              JOIN product ON shopping_cart.product_id = product.product_id 
              WHERE shopping_cart.user_id = '$user_id'";

$result_cart = mysqli_query($conn, $sql_cart);
?>
    <div class="cart-con" id="cart-con" style="background-color: white;
                                                position: absolute;
                                                width: 100%; 
                                                top: 100px; 
                                                padding: 20px;
                                                overflow-y: auto; 
                                                z-index: 1000; 
                                                display: none; 
                                                min-height: 90vh;
                                                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-8">
                                <div class="p-5">
                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                        <h1 class="fw-bold mb-0">Shopping Cart</h1>
                                        <h6 class="mb-0 text-muted">
                                            <?php echo mysqli_num_rows($result_cart); ?> items
                                        </h6>
                                    </div>
                                    <hr class="my-4">

                                    <!-- Loop through the cart items -->
                                    <?php if (mysqli_num_rows($result_cart) > 0): ?>
                                        <?php while ($cart_item = mysqli_fetch_assoc($result_cart)): ?>
                                            <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <img src="./admin/<?php echo $cart_item['image_url']; ?>" class="img-fluid rounded-3" alt="<?php echo $cart_item['name']; ?>">
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-3">
                                                    <h6 class="text-muted">Product</h6>
                                                    <h6 class="mb-0"><?php echo $cart_item['name']; ?></h6>
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                    <h6 class="mb-0">₹<?php echo $cart_item['price']; ?></h6>
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 text-end">
                                                <button type="submit" class="text-muted" name="delete_one" style="background:none; border:none; color:#007bff; text-decoration:none; cursor:pointer;">Delete</button>    

                                                </div>
                                            </div>
                                            <hr class="my-4">
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <p>Your cart is empty!</p>
                                    <?php endif; ?>

                                    <div class="pt-5">
                                        <h6 class="mb-0"><a onclick="closeCart()" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 bg-body-tertiary">
                                <div class="p-5">
                                    <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                    <hr class="my-4">
                                    <div class="d-flex justify-content-between mb-4">
                                        <h5 class="text-uppercase">Total Items</h5>
                                        <h5><?php echo mysqli_num_rows($result_cart); ?></h5>
                                    </div>
                                    <div class="d-flex justify-content-between mb-5">
                                        <h5 class="text-uppercase">Total Price</h5>
                                        <h5>₹<?php
                                            // Calculate total price
                                            $total_price = 0;
                                            mysqli_data_seek($result_cart, 0); // Reset pointer to the beginning
                                            while ($cart_item = mysqli_fetch_assoc($result_cart)) {
                                                $total_price += $cart_item['price'];
                                            }
                                            echo $total_price;
                                        ?></h5>
                                    </div>
                                    <form method="post"><button type="submit" class="btn btn-dark btn-block btn-lg" name="confirm_order">Confirm</button></form><br>

                                    <form method="post"><button type="submit" class="btn btn-danger btn-block btn-lg" name="clear_cart">Clear All</button></form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- ***** Header Area Start ***** -->
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
                            <li class="scroll-to-section"><a href="index.php" class="active">Home</a></li>
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
                                        <li><a href="profile.php">Profile</a></li>
                                        <li><a href="order.php">Orders</a></li>
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

    <section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="h5 text-center flex-grow-1 text-center mb-0">Pending Orders</h3>
                    <a href="order.php" class="btn btn-primary ms-3">Delivered Orders</a>
                </div>
                <div class="table-wrap">
                    <?php if (isset($order_result) && $order_result->num_rows > 0): ?>
                        <table class="table">
                            <thead class="thead-primary">
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Order Date</th>
                                    <th>Price</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($order = mysqli_fetch_assoc($order_result)): ?>
                                <?php
                                    $dateString = $order['order_date']; 
                                    $date = new DateTime($dateString);
                                    $formattedDate = $date->format('F j, Y');
                                ?>
                                    <tr class="alert" role="alert">
                                        <td>
                                            <img src="./admin/<?php echo $order['main_image']; ?>" alt="Product Image" style="width: 100px; height: auto;">  
                                        </td>
                                        <td><?php echo $order['name']; ?></td>
                                        <td><?php echo $order['description']; ?></td>
                                        <td><?php echo $formattedDate ?></td>
                                        <td><?php echo $order['price']; ?></td>
                                        <td class="border-bottom-0">
                                            <form method="post">
                                                <input type="hidden" name="id" value="<?php echo $order['order_id']; ?>">
                                                <button type="submit" class="close" name="cancel" aria-label="Close">
                                                    <span aria-hidden="true">Cancel</span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <h3>No delivered orders found.</h3>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

   <footer>
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
                        <li><a href="#">Mobile and Computing Devices</a></li>
                        <li><a href="#">Home Appliances</a></li>
                        <li><a href="#">Entertainment Devices</a></li>
                        <li><a href="#">All Accessories</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">Homepage</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Contact Us</a></li>
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
    <script src="assets/js/mobile.js"></script>
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
    <script>
function cart() {
  // Show the cart section
  document.getElementById("cart-con").style.display = "block";
}

function closeCart() {
  // Hide the cart section
  document.getElementById("cart-con").style.display = "none";
}
    </script>

</body>

</html>