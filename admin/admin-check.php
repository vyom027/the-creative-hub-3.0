<?php
session_start();
include_once 'db_connection.php';
// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // If not logged in, redirect to login page
    header("Location: ../login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['log_out'])) { 
    session_unset(); 
    session_destroy(); 
    header("Location: ../login.php");
    exit();
  }
?>