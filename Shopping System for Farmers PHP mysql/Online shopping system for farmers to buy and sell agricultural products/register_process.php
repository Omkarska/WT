<!-- register_process.php -->
<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $type = $_POST['type'];

    $sql = "INSERT INTO users (username, password, type) VALUES ('$username', '$password', '$type')";

    if ($conn->query($sql) === TRUE) {
        // Registration successful, redirect to login page
        header('Location: login.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
