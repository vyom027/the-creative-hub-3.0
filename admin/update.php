<?php

include_once 'db_connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form inputs
    $admin_id = $_POST['admin_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password']; // Consider hashing the password before storing

    // Sanitize inputs to prevent SQL injection
    $admin_id = mysqli_real_escape_string($conn, $admin_id);
    $first_name = mysqli_real_escape_string($conn, $first_name);
    $last_name = mysqli_real_escape_string($conn, $last_name);
    $email = mysqli_real_escape_string($conn, $email);
    $phone = mysqli_real_escape_string($conn, $phone);
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password); // Hash before storing


    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    session_destroy(); 
    session_start();
    $_SESSION['admin_username'] = $username;
    // Construct the SQL query
    $admin_update = "UPDATE admin SET 
                username = '$username', 
                password = '$password' 
            WHERE admin_id = $admin_id";

    $admin_data_update = "UPDATE admin_data SET
                first_name = '$first_name', 
                last_name = '$last_name', 
                email = '$email', 
                mobile_num = '$phone' ";

    // Execute the query
    if (mysqli_query($conn, $admin_update) && mysqli_query($conn, $admin_data_update)) {
        header("Location:profile.php");
    } else {
        echo "Error updating admin details: " . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
}
?>
