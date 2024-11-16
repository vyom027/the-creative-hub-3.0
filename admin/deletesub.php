<?php
require_once 'db_connection.php';

if (isset($_GET['sub_category_id'])) {
    $sub_category_id = intval($_GET['sub_category_id']);
    $delete_query = "DELETE FROM sub_category WHERE sub_category_id = $sub_category_id";

    if ($conn->query($delete_query)) {
        header("Location:sub_category_list.php");
    } else {
        echo "Error deleting subcategory: " . $conn->error;
    }
}
?>
