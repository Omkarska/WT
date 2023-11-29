<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

include("db.php");

// Handle adding items to the cart
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_to_cart"])) {
    $item_name = $_POST["item_name"];
    $item_price = $_POST["item_price"];

    if (!isset($_SESSION["cart"][$item_name])) {
        $_SESSION["cart"][$item_name] = [
            "quantity" => 1,
            "price" => $item_price
        ];
    } else {
        $_SESSION["cart"][$item_name]["quantity"]++;
    }
    echo "<script>alert('$item_name added to cart');</script>";
}

$query = "SELECT * FROM menu";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant - Menu</title>
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

        .add-to-cart-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .add-to-cart-btn:hover {
            background-color: #45a049;
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
        <h3>Menu</h3>
        <form method="post" action="">
            <table>
                <tr>
                    <th>Item Name</th>
                    <th>Price (INR)</th>
                    <th>Action</th>
                </tr>
                <?php
while ($row = mysqli_fetch_assoc($result)) {
    echo "<form method='post' action=''>"; // Move the form tag here
    echo "<tr>";
    echo "<td>" . $row["item_name"] . "</td>";
    echo "<td>" . $row["price"] . "</td>";
    echo "<td>
            <button class='add-to-cart-btn' name='add_to_cart' type='submit'>Add to Cart</button>
            <input type='hidden' name='item_name' value='" . htmlspecialchars($row["item_name"], ENT_QUOTES, 'UTF-8') . "'>
            <input type='hidden' name='item_price' value='" . $row["price"] . "'>
          </td>";
    echo "</tr>";
    echo "</form>"; // Move the closing form tag here
}
?>

            </table>
        </form>
    </div>
</body>
</html>
