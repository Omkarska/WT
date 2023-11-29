<?php
// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $username = $_POST["username"];

    // Store user input in the session variable
    $_SESSION["username"] = $username;

    // Set session expiration time to 5 minutes
    $_SESSION["expire_time"] = time() + (5 * 60); // 5 minutes

    // Redirect to a page where the session is being used
    header("Location: welcome.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <h2>Login</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <input type="submit" value="Login">
    </form>

</body>

</html>