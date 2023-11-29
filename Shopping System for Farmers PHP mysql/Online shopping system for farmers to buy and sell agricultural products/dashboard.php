<!-- dashboard.php -->
<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Include database connection
include 'db.php';

// Retrieve user type
$userType = $_SESSION['user_type'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Online Shopping System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <?php
        if ($userType === 'seller') {
            echo '<a href="list_products.php">List of Products</a>';
            echo '<a href="add_product.php">Add Product</a>';
        } elseif ($userType === 'user') {
            echo '<a href="list_products.php">List of Products</a>';
            echo '<a href="cart.php">Cart</a>';
        }
        ?>
        <form action="logout.php" method="post">
            <button type="submit">Logout</button>
        </form>
    </div>

    <div class="container">
        <h1>Welcome to the Dashboard</h1>
        <p>Logged in as <?php echo ucfirst($userType); ?>.</p>
        
        <!-- Add content based on user type -->
    </div>
</body>
</html>