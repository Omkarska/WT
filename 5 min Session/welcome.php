<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"]) || time() > $_SESSION["expire_time"]) {
    // Redirect to the login page if not logged in or session has expired
    header("Location: login.php");
    exit();
}

// Retrieve the username from the session
$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>

<body>

    <h2>Welcome,
        <?php echo htmlspecialchars($username); ?>!
    </h2>

    <p>This is your welcome page.</p>

    <p><a href="logout.php">Logout</a></p>

</body>

</html>