<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shopping System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="register.php">Register</a>
        <?php
        session_start();
        if (isset($_SESSION['user_id'])) {
            echo '<a href="dashboard.php">Dashboard</a>';
            echo '<a href="logout.php">Logout</a>';
        } else {
            echo '<a href="login.php">Login</a>';
        }
        ?>
    </div>

    <div class="container">
        <h1>Welcome to Online Shopping System</h1>
    </div>
</body>
</html>
