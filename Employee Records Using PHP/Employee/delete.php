<?php
include 'functions.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Check if the employee ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteEmployee($id);
}

// Redirect to the dashboard after deleting the employee record
header("Location: dashboard.php");
exit();
?>
