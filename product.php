
<?php
include_once './php/cart.php';
$all_product = NULL;
$sub_category_id = null;

if (isset($_GET['product_id'], $_GET['category_id'], $_GET['sub_category_id'])) {
    $product_id = intval($_GET['product_id']);
    $category_id = intval($_GET['category_id']);
    $sub_category_id = intval($_GET['sub_category_id']);
}

$hide_section = false;

// Check if the form is submitted and a sub_category_id is set
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sub_category_id'])) {
    $sub_category_id = intval($_POST['sub_category_id']); // Get the selected subcategory ID
    $hide_section = true; // Hide the section after submission
}

// Fetch subcategories
$sub_category_query = "SELECT * FROM sub_category WHERE category_id = $category_id";
$sub_category_result = mysqli_query($conn, $sub_category_query);

// Fetch products based on the selected subcategory
if ($sub_category_id !== null) {
    $product_detail_query = "SELECT * FROM product WHERE sub_category_id = $sub_category_id AND category_id = $category_id";
    $all_product = $conn->query($product_detail_query);

    if (!$all_product) {
        die('Query Failed: ' . mysqli_error($conn));
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

    <title> Product </title>

    <style>
        <?php if ($hide_section): ?>
        #pro-con {
            display: none;
        }
        <?php endif; ?>
        .nav button {
            background :none;
            position: relative;
            text-decoration: none;
            font-family: "Poppins", sans-serif;
            color: #000000;
            font-size: 18px;
            letter-spacing: 0.5px;
            padding: 0 10px;
            border :none;
        }
        .nav button:after {
            content: "";
            position: absolute;
            background-color: #ff3c78;
            height: 3px;
            width: 0;
            left: 0;
            bottom: -10px;
            transition: 0.3s;
        }
            .nav button:hover {
            color: #000;
        }
            .nav button:hover:after {
            width: 100%;
        }

    </style>
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/product.css">
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
// Check if the user is logged in

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
                                                <form method="POST">
                                                <input type="hidden" name="cart_id" value="<?php echo $cart_item['cart_id']; ?>">
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
    <!-- ***** Header Area End ***** -->
    <div class="container my-5 pro-con" id="pro-con" <?php if ($hide_section) echo 'style="display:none;"'; ?>>
        <!-- New Close Button -->
        <?php
            // Include your database connection
            include('db_connection.php');

            // Fetch product ID from the URL
            $product_id = $_GET['product_id'];

            // Query the database to get the product details
            $query = "SELECT * FROM product 
            WHERE product.product_id = " . $product_id;
  
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $product = mysqli_fetch_assoc($result);
            } else {
                echo "Product not found!";
                exit;
            }
        ?>

        <div class="row gy-4">
            <!-- Main Image and Sub Images -->
            <div class="col-lg-6">
                <div class="main-image mb-4">
                    <img src="./admin/<?php echo $product["image_url"]?>" class="img-fluid w-100" id="main-img" alt="Main Product Image">
                </div>
                <div class="sub-images d-flex flex-wrap sub-images-wrapper">
                    <img src="./admin/<?php echo $product["sub_image1"]?>" class="img-thumbnail img1" onclick="Imgchange('img1')" id="img1" alt="Sub Image 1">
                    <img src="./admin/<?php echo $product["sub_image2"]?>" class="img-thumbnail img2" onclick="Imgchange('img2')" id="img2" alt="Sub Image 2">
                    <img src="./admin/<?php echo $product["sub_image3"]?>" class="img-thumbnail img3" onclick="Imgchange('img3')" id="img3" alt="Sub Image 3">
                    <img src="./admin/<?php echo $product["sub_image4"]?>" class="img-thumbnail img4" onclick="Imgchange('img4')" id="img4" alt="Sub Image 4">
                </div>
            </div>
            <!-- Product Details -->
            <div class="col-lg-6">
                <div class="product-details"><br><br>
                    <h1 class="name" id="name"><?php echo $product["name"]?></h1><br>
                    <h4 class="text-success" id="price"><?php echo $product["price"]?></h4>
                    <p class="mt-4" id="pro-details"><?php echo $product["description"]?></p>
                    <div class="mt-4">
                    <form method="post" >
                    <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $product['price']; ?>">
                    <!-- <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>"> -->
                    <input type="hidden" name="main_image" value="<?php echo $product['image_url']; ?>">  <!-- Main Image -->
                    <button type="submit" class="btn btn-primary btn-custom me-2" name="add_to_cart">Add to Cart</button>
                    <button type="submit" class="btn btn-success btn-custom" name="buy_now">Buy Now</button></form>
                    </div>
                </div>
            </div>
        </div>
        <button class="close-btn" onclick="closeProduct()">&times;</button>

    </div>
    <!-- ***** Products Area Starts ***** -->
    <section class="section" id="products" style="margin-top: 30px ;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <!-- <h2>Our Latest Mobile & Computing Devices</h2> -->
                        <!-- <span>Check out all of our Mobile & Computing Devices</span> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="nav" style="width: 70vw;
                                min-width: 600px;
                                display: flex;
                                justify-content:center;
                                align-items: center;
                                color :black;
                                margin: 10px auto 20px;
                                z-index:10;">
                <?php if ($sub_category_result && mysqli_num_rows($sub_category_result) > 0): ?>
                <form method="post">
                    <?php while ($row = mysqli_fetch_assoc($sub_category_result)): ?>
                        <button type="submit" name="sub_category_id" value="<?php echo $row['sub_category_id']; ?>">
                            <?php echo htmlspecialchars($row['sub_category_name']); ?>
                        </button>
                    <?php endwhile; ?>
                </form>
            <?php endif;?>

          
       </div>
        

    
        
        <div class="container">
        <div class="row">
            <?php
                while($row = mysqli_fetch_assoc($all_product)){
            ?>
                <div class="col-lg-4">
                    <div class="item">
                        <div class="thumb">
                        <a href="product.php?product_id=<?php echo $row['product_id']; ?>&category_id=<?php echo $category_id; ?>&sub_category_id=<?php echo $sub_category_id; ?>">
                            <img src="./admin/<?php echo $row['image_url']; ?>" alt="" class="custom-image-size">
                        </div>
                        <div class="down-content">
                            <h4><?php echo $row["name"]?></h4>
                            <span><?php echo $row["price"]?></span>
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
                <?php
                    }
                ?>
                
            </div>
        </div>
    </section>
    <!-- ***** Products Area Ends ***** -->
    
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