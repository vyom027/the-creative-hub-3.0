<?php

include_once 'db_connection.php';
session_start();

if (isset($_POST['clear_cart'])) {
    // Check if the user is logged in
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id']; // Get the user ID from the session

        // Query to delete all items from the shopping cart for this user
        $clear_cart_query = "DELETE FROM shopping_cart WHERE user_id = '$user_id'";

        if (mysqli_query($conn, $clear_cart_query)) {
            // Success message or redirect after clearing the cart
            echo '<p>Your cart has been cleared!</p>';
        } else {
            echo '<p>Error clearing the cart: ' . mysqli_error($conn) . '</p>';
        }
    } else {
        echo '<p>Error: No user logged in!</p>';
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
    <link rel="stylesheet" href="./assets/css/product.css">
    <title>The Creative Hub </title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
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
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <div class="thumb">
                            <div class="inner-content">
                                <h4>We Are <b>The Creative Hub</b></h4>
                                <span>Discover top electronics: mobiles, laptops, TVs, appliances<br> accessories, and more!</span>
                                <div class="main-border-button">
                                    <a href="#">Purchase Now!</a>
                                </div>
                            </div>
                            <img src="assets/images/left-banner-image.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                         <div class="inner-content">
                                            <h4>Mobile & Computers</h4>
                                            <span>Best Mobile & Computers</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Mobile & Computers</h4>
                                                <p>Mobiles, smart watches, tablets, laptops, and desktops offer versatile computing and communication solutions.</p>
                                                <div class="main-border-button">
                                                    <a href="mobile-computer.php">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/mobile.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <!-- <h4>Home Appliances</h4>
                                            <span>Best Home Appliances Only For You</span> -->
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Home Appliances</h4>
                                                <p>Refrigerators, washing machines, ACs, microwaves, dishwashers, vacuum cleaners, water purifiers, and air purifiers enhance home comfort and convenience.</p>
                                                <div class="main-border-button">
                                                    <a href="home-appliances.php">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/home.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Entertainment Devices</h4>
                                            <!-- <span>Best Entertainment Devices For Your Kids</span> -->
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Entertainment Devices</h4>
                                                <p> Televisions, projectors, speakers, soundbars, gaming consoles, streaming devices, and VR headsets enhance home entertainment experiences.</p>
                                                <div class="main-border-button">
                                                    <a href="entertainment-devices.php">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/enter.jpeg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <!-- <h4>Accessories</h4>
                                            <span>Best Trend Accessories</span> -->
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Accessories</h4>
                                                <p>Enhance your devices with top-quality accessories like phone cases, chargers, and laptop peripherals. Find everything you need to boost performance and protection.</p>
                                                <div class="main-border-button">
                                                    <a href="#">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/acc.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->
    
    <!-- ***** Mobile and Computing Devices Starts ***** -->
    <section class="section" id="men">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Mobile and Computing Devices</h2>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="men-item-carousel">
                        <div class="owl-men-item owl-carousel">
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="mobile-computer.php"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/sfold6.png" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Samsung Fold 6</h4>
                                    <span>₹ 1,64,990</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="mobile-computer.php"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/amacbook15.png" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Macbook Air 15</h4>
                                    <span>₹ 1,45,999</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="mobile-computer.php"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/x14ultra.png" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Xiaomi 14 Ultra</h4>
                                    <span>₹ 99,999</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="mobile-computer.php"><i class="fa fa-eye"></i></a></li>
                                            
                                            <li><a href="javascript:void(0)"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/asus-rog.png" alt="">
                                </div>
                                <div class="down-content">
                                    <h4> Zephyrus Duo 16 </h4>
                                    <span>₹ 3,19,999</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Mobile and Computing Devices Ends ***** -->

    <!-- ***** Home Appliances Starts ***** -->
    <section class="section" id="women">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Home Appliances</h2>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="women-item-carousel">
                        <div class="owl-women-item owl-carousel">
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href=""><i class="fa fa-eye"></i></a></li>                                            
                                            <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/main-freeze.png" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Refrigerators</h4>
                                    <span> ₹ 25,000 - ₹ 1,50,000 </span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href=""><i class="fa fa-eye"></i></a></li>
                                            
                                            <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/main-ac.png" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Air Conditioner </h4>
                                    <span>₹ 35,000 - ₹ 1,00,000</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href=""><i class="fa fa-eye"></i></a></li>
                                            
                                            <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/main-washing.png" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Washing Machine</h4>
                                    <span> ₹ 15,000 - ₹ 70,000</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href=""><i class="fa fa-eye"></i></a></li>
                                            
                                            <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/main-oven.png" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>MicroWave Oven</h4>
                                    <span> ₹ 7,000 - ₹ 50,000</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Home Appliances Ends ***** -->

    <!-- ***** Entertainment Devices Starts ***** -->
    <section class="section" id="kids">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Entertainment Devices</h2>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="kid-item-carousel">
                        <div class="owl-kid-item owl-carousel">
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href=""><i class="fa fa-eye"></i></a></li>
                                            
                                            <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/main-tv.png" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>LED Television</h4>
                                    <span> ₹ 25,000- ₹ 1,50,000 </span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href=""><i class="fa fa-eye"></i></a></li>
                                            
                                            <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/main-projector.png" alt="">
                                </div>
                                <div class="down-content">
                                    <h4> Projectors </h4>
                                    <span> ₹ 25,000 - ₹ 10,00,000</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href=""><i class="fa fa-eye"></i></a></li>
                                            
                                            <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/main-speaker.png" alt="">
                                </div>
                                <div class="down-content">
                                    <h4> Speakers</h4>
                                    <span> ₹ 30,000 - ₹ 3,00,000 </span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href=""><i class="fa fa-eye"></i></a></li>
                                            
                                            <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/main-headphone.png" alt="">
                                </div>
                                <div class="down-content">
                                    <h4> Head Phones </h4>
                                    <span> ₹ 1,500 - ₹ 1,00,000</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Entertainment Devices Starts ***** -->
    <section class="section" id="kids">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Other Accessories</h2>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="kid-item-carousel">
                        <div class="owl-kid-item owl-carousel">
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href=""><i class="fa fa-eye"></i></a></li>
                                            
                                            <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/main-charge.png" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Wireless Chargers</h4>
                                    <span> ₹ 1,500 - ₹ 20,000 </span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href=""><i class="fa fa-eye"></i></a></li>
                                            
                                            <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/main-mouse.png" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Mouse</h4>
                                    <span> ₹ 500 - ₹ 10,000</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href=""><i class="fa fa-eye"></i></a></li>
                                            
                                            <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/main-battery.png" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Power Banks</h4>
                                    <span> ₹ 500 - ₹ 5,000 </span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href=""><i class="fa fa-eye"></i></a></li>
                                            
                                            <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/main-cooler.png" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Laptop Coolers </h4>
                                    <span> ₹ 1,000 - ₹ 30,000</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Entertainment Devices Ends ***** -->

    <!-- ***** Explore Area Starts ***** -->
    <section class="section" id="explore">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <h2>Explore Our Products</h2>
                        <span>Discover the latest smartphones and smart watches, perfect for staying connected and tracking fitness goals. Our range includes top brands with advanced features for seamless communication and convenience.</span>
                        <span>
                            Enhance your productivity with high-performance laptops and desktops, ideal for work, study, and gaming. Complement your setup with essential accessories like printers, external hard drives, and monitors for an optimized experience.</span>

                        <p>
                            Transform your home with modern appliances and entertainment systems. Choose from refrigerators, washing machines, and microwaves for daily convenience, and enjoy superior entertainment with our selection of TVs, gaming consoles, and soundbars. Secure your home with advanced CCTV cameras and smart locks for peace of mind.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="leather">
                                    <h4>Earphones</h4>
                                    <span>Latest Collection</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="first-image">
                                    <img src="assets/images/explore-image-01.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="second-image">
                                    <img src="assets/images/explore-image-02.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="types">
                                    <h4>LuXurious Watches</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Explore Area Ends ***** -->

    <!-- ***** Subscribe Area Starts ***** -->
    <div class="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-heading">
                        <h2>By Subscribing To Our Newsletter You Can Get 30% Off</h2>
                        <span>Details to details is what makes <b>The Creative Hub</b> different from the other themes.</span>
                    </div>
                    <form id="subscribe" action="" method="get">
                        <div class="row">
                          <div class="col-lg-5">
                            <fieldset>
                              <input name="name" type="text" id="name" placeholder="Your Name" required="">
                            </fieldset>
                          </div>
                          <div class="col-lg-5">
                            <fieldset>
                              <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email Address" required="">
                            </fieldset>
                          </div>
                          <div class="col-lg-2">
                            <fieldset>
                              <button type="submit" id="form-submit" class="main-dark-button"><i class="fa fa-paper-plane"></i></button>
                            </fieldset>
                          </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-6">
                            <ul>
                                <li>Store Location:<br><span>LJ Campus, LJ College Road,
                                    Off. S.G. Road
                                    Ahmedabad-382210</span></li>
                                <li>Phone:<br><span>+91 84694 07881</span><br><span>+91 88497 21477</span></li>
                                <li>Office Location:<br><span>Ahmedabad , Gujarat</span></li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul>
                                <li>Work Hours:<br><span>07:30 AM - 9:30 PM Daily</span></li>
                                <li>Email:<br><span>thecreativehub.03@gmail.com</span></li>
                                <li>Social Media:<br><span><a href="#">Twitter</a>, <a href="https://www.instagram.com/the_creative_hub_24/">Instagram</a></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Subscribe Area Ends ***** -->
    
    <!-- ***** Footer Start ***** -->
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
                        <li><a href="help.php">Help</a></li>
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