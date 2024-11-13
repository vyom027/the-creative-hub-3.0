<?php
   require_once 'db_connection.php';
   session_start();


// Check if a button has been clicked
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the user is logged in
 
   
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
            // Ensure the user_id is available in session
            if (isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id']; 
               // echo $user_id; // This should now output the user ID
            } else {
                header("Location: login.php");
                // echo "User ID not found in session.";
            }
            $product_id = $_POST['product_id'];
            $product_price = $_POST['product_price'];
            $main_image = $_POST['main_image'];
          // Get the main image from the form

            // Insert the product into the shopping_cart table
            $cart = "INSERT INTO shopping_cart (user_id, product_id, price, main_image) VALUES ('$user_id', '$product_id', '$product_price', '$main_image')";

            // Execute the query
            if (mysqli_query($conn, $cart)) {
                // Successfully added to cart, redirect to the cart page or any success page
                header("Location: mobile-computer.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['buy_now'])) {
            if (isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id']; 
               // echo $user_id; // This should now output the user ID
            } else {
               header("Location: login.php");
                // echo "User ID not found in session.";
            }
            $product_id = $_POST['product_id'];
            $product_price = $_POST['product_price'];
            $main_image = $_POST['main_image'];
          // Get the main image from the form

            // Insert the product into the shopping_cart table
            $cart = "INSERT INTO shopping_cart (user_id, product_id, price, main_image) VALUES ('$user_id', '$product_id', '$product_price', '$main_image')";
            if (mysqli_query($conn, $cart)) {
                $cart_query = "SELECT * FROM shopping_cart WHERE user_id = '$user_id'";
                $cart_result = mysqli_query($conn, $cart_query);

                if (mysqli_num_rows($cart_result) > 0) {
                    // Initialize a flag to track successful insertion
                    $order_success = true;

                    // Loop through each cart item
                    while ($cart_item = mysqli_fetch_assoc($cart_result)) {
                        $product_id = $cart_item['product_id'];
                        $product_price = $cart_item['price'];
                        $main_image = $cart_item['main_image'];

                        // Insert the item from the cart into the order_product table
                        $order_insert_query = "INSERT INTO order_product (user_id, product_id, price, main_image) 
                                            VALUES ('$user_id', '$product_id', '$product_price', '$main_image')";

                        if (!mysqli_query($conn, $order_insert_query)) {
                            $order_success = false;
                            echo "Error: " . mysqli_error($conn);
                            break; // Stop if there's an error
                        }
                    }

                    // If all items are inserted into order_product, delete them from the cart
                    if ($order_success) {
                        $delete_cart_query = "DELETE FROM shopping_cart WHERE user_id = '$user_id'";
                        if (mysqli_query($conn, $delete_cart_query)) {
                            header("Location: add-details.php");
                        } else {
                            echo "Error clearing cart: " . mysqli_error($conn);
                        }
                    } else {
                        echo "Failed to place order.";
                    }
                }
                
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
        if (isset($_POST['clear_cart'])) {
            // Check if the user is logged in
            if (isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id']; // Get the user ID from the session

                // Query to delete all items from the shopping cart for this user
                $clear_cart_query = "DELETE FROM shopping_cart WHERE user_id = '$user_id'";

                if (mysqli_query($conn, $clear_cart_query)) {
                    // Success message or redirect after clearing the cart
                    header("Location: mobile-computer.php");
                } else {
                    echo '<p>Error clearing the cart: ' . mysqli_error($conn) . '</p>';
                }
            } else {
                header("Location: login.php");
                // echo '<p>Error: No user logged in!</p>';
            }
        }
        if (isset($_POST['delete_one'])) {
            // Check if the user is logged in
            if (isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id']; // Get the user ID from the session
                $cart_id = $_POST['cart_id']; // Get the cart item ID to be deleted
        
                // Query to delete the specific product from the shopping cart
                $delete_query = "DELETE FROM shopping_cart WHERE cart_id = '$cart_id' AND user_id = '$user_id'";
        
                if (mysqli_query($conn, $delete_query)) {
                    header("Location: mobile-computer.php");
                    exit();
                } 
            } 
            else{
                header("Location: login.php");
            }
        }
        if (isset($_POST['confirm_order'])) {
            // Check if the user is logged in
            if (isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id']; // Get the user ID from the session

                $cart_query = "SELECT * FROM shopping_cart WHERE user_id = '$user_id'";
                $cart_result = mysqli_query($conn, $cart_query);

                if (mysqli_num_rows($cart_result) > 0) {
                    // Initialize a flag to track successful insertion
                    $order_success = true;

                    // Loop through each cart item
                    while ($cart_item = mysqli_fetch_assoc($cart_result)) {
                        $product_id = $cart_item['product_id'];
                        $product_price = $cart_item['price'];
                        $main_image = $cart_item['main_image'];

                        // Insert the item from the cart into the order_product table
                        $order_insert_query = "INSERT INTO order_product (user_id, product_id, price, main_image) 
                                            VALUES ('$user_id', '$product_id', '$product_price', '$main_image')";

                        if (!mysqli_query($conn, $order_insert_query)) {
                            $order_success = false;
                            echo "Error: " . mysqli_error($conn);
                            break; // Stop if there's an error
                        }
                    }

                    if ($order_success) {
                        $delete_cart_query = "DELETE FROM shopping_cart WHERE user_id = '$user_id'";
                        if (mysqli_query($conn, $delete_cart_query)) {
                            header("Location: add-details.php");
                        } else {
                            echo "Error clearing cart: " . mysqli_error($conn);
                        }
                    } else {
                        echo "Failed to place order.";
                    }
                } else {
                    echo "Your cart is empty!";
                }
            } 
            else{
                header("Location: login.php");
            }
        }
    }
?>