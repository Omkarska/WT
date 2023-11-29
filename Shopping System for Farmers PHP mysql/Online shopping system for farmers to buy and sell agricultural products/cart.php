<!-- cart.php -->
<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Include database connection
include 'db.php';

// Retrieve products from the cart
$cartProducts = array();

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $cartProductIds = implode(',', $_SESSION['cart']);
    $sql = "SELECT * FROM products WHERE id IN ($cartProductIds)";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $cartProducts = $result->fetch_all(MYSQLI_ASSOC);
    }
}

// Handle buying products
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buy_products'])) {
    // Perform the buying process (you can update your database, send notifications, etc.)
    echo '<script>alert("Products bought successfully!");</script>';

    // Clear the cart after buying
    unset($_SESSION['cart']);

    // Refresh the page to display the bought products and an empty cart
    header('Location: cart.php');
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Online Shopping System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="list_products.php">List of Products</a>
        <a href="cart.php">Cart</a>
        <form action="logout.php" method="post">
            <button type="submit">Logout</button>
        </form>
    </div>

    <div class="container">
        <h1>Shopping Cart</h1>

        <?php
        if (!empty($cartProducts)) {
            echo '<ul>';
            $totalPrice = 0;

            foreach ($cartProducts as $cartProduct) {
                echo '<li>' . $cartProduct['name'] . ' - $' . $cartProduct['price'] . '</li>';
                $totalPrice += $cartProduct['price'];
            }

            echo '</ul>';

            // Display the total price and option to buy
            echo '<p>Total Price: $' . $totalPrice . '</p>';
            echo '<form action="cart.php" method="post">
                    <button type="submit" name="buy_products" onclick="return confirm(\'Are you sure you want to buy these products?\')">Buy Products</button>
                  </form>';
        } else {
            echo '<script>alert("Products bought successfully!");</script>';
            echo '<p>Your cart is empty.</p>';
        }
        ?>
    </div>
</body>
</html>
