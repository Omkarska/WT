<?php
include 'config.php';
include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];

    registerEmployee($username, $password, $full_name, $email);
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    <h1>Employee Registration</h1>
    <form method="post">
        <label>Username: <input type="text" name="username" required></label><br>
        <label>Password: <input type="password" name="password" required></label><br>
        <label>Full Name: <input type="text" name="full_name" required></label><br>
        <label>Email: <input type="email" name="email" required></label><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>
