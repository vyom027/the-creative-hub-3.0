<?php
require_once 'db_connection.php'; // Include your database connection
require_once 'admin-check.php';
if (isset($_GET['product_id'])) {
    $product_id = intval($_GET['product_id']);

    // Delete product from the database
    $delete_query = "DELETE FROM product WHERE product_id = $product_id";
    
    if (mysqli_query($conn, $delete_query)) {
        // Redirect back to the product list with a success message
        echo "<script>
                alert('Product deleted successfully!');
                window.location.href = 'productlist.php';
              </script>";
    } else {
        echo "Error deleting product: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
} else {
    echo "Invalid product ID.";
}
?>
