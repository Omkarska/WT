<!-- register.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Online Shopping System</title>
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
        <h1>Register</h1>
        <form action="register_process.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="type">Register as:</label>
            <select id="type" name="type">
                <option value="seller">Seller</option>
                <option value="user">User</option>
            </select>

            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
