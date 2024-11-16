<?php
require_once 'db_connection.php';

if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
    $delete_query = "DELETE FROM category WHERE category_id = $category_id";

    if ($conn->query($delete_query)) {
        header("Location:categorylist.php");
    } else {
        echo "Error deleting category: " . $conn->error;
    }
}
?>
