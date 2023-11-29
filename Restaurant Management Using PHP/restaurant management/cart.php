<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

// Handle removing items from the cart
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["remove_from_cart"])) {
    $item_name = $_POST["item_name"];
    
    if (isset($_SESSION["cart"][$item_name])) {
        $_SESSION["cart"][$item_name]["quantity"]--;
        
        if ($_SESSION["cart"][$item_name]["quantity"] <= 0) {
            unset($_SESSION["cart"][$item_name]);
        }
        
        echo "<script>alert('1 $item_name removed from cart');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant - Cart</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: white;
        }

        .order-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .order-btn:hover {
            background-color: #45a049;
        }

        .remove-from-cart-btn {
            background-color: #f44336;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .remove-from-cart-btn:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <div class="content">
        <h2>Welcome, <?php echo $_SESSION["username"]; ?>!</h2>
        <h3>Cart</h3>
        <?php
        if (isset($_SESSION["cart"]) && count($_SESSION["cart"]) > 0) {
            echo "<table>";
            echo "<tr><th>Item Name</th><th>Quantity</th><th>Price (INR)</th><th>Action</th></tr>";
            foreach ($_SESSION["cart"] as $item_name => $item_data) {
                echo "<tr>";
                echo "<td>$item_name</td>";
                echo "<td>{$item_data['quantity']}</td>";
                echo "<td>{$item_data['price']}</td>";
                echo "<td>
                        <form method='post' action=''>
                            <button class='remove-from-cart-btn' name='remove_from_cart' type='submit'>Remove 1 from Cart</button>
                            <input type='hidden' name='item_name' value='" . htmlspecialchars($item_name, ENT_QUOTES, 'UTF-8') . "'>
                        </form>
                      </td>";
                echo "</tr>";
            }
            echo "</table>";
            $total_price = calculateTotalPrice($_SESSION["cart"]);
            echo "<p>Total Price: ₹" . number_format($total_price, 2) . "</p>";
            echo "<button class='order-btn' onclick='orderFood()'>Order Food</button>";
        } else {
            echo "<p>Your cart is empty.</p>";
        }

        function calculateTotalPrice($cart) {
            $total_price = 0;

            foreach ($cart as $item_name => $item_data) {
                $total_price += ($item_data["price"] * $item_data["quantity"]);
            }

            return $total_price;
        }
        ?>
    </div>

    <script>
        function orderFood() {
            alert("Food ordered!");
            // Additional logic for order processing can be added here
        }
    </script>
</body>
</html>
