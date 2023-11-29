<!-- list_products.php -->
<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Include database connection
include 'db.php';

// Handle deleting products (moved to the top of the file)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_product'])) {
    $productId = $_POST['delete_product'];

    // Delete the product from the database
    $deleteSql = "DELETE FROM products WHERE id = $productId";
    if ($conn->query($deleteSql) === TRUE) {
        echo "Product deleted successfully!";
        // Redirect to avoid resubmission on page refresh
        header('Location: list_products.php');
        exit();
    } else {
        echo "Error deleting product: " . $conn->error;
    }
}

// Retrieve products from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Check if there are products
if ($result->num_rows > 0) {
    $products = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $products = array(); // No products found
}

// Handle adding products to the cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $productId = $_POST['add_to_cart'];

    // Add the product to the cart
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Check if the product is already in the cart
    if (!in_array($productId, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $productId;
        echo "Product added to the cart!";
    } else {
        echo "Product is already in the cart!";
    }
}

$conn->close();
?>

<!-- The rest of your HTML content goes here -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Products - Online Shopping System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <?php
        $userType = isset($_SESSION['user_type']) ? $_SESSION['user_type'] : '';

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
        <h1>List of Products</h1>

        <?php
        if (!empty($products)) {
            echo '<ul class="product-list">';
            foreach ($products as $product) {
                echo '<li class="product">';
                echo '<div class="product-image"><img src="' . $product['image_url'] . '" alt="' . $product['name'] . '"></div>';
                echo '<div class="product-details">';
                echo '<h3>' . $product['name'] . '</h3>';
                echo '<p>Price: $' . $product['price'] . ' - Quantity: ' . $product['quantity'] . '</p>';

                // Display add to cart button for users
                if ($userType === 'user') {
                    echo '<form action="list_products.php" method="post">
                            <input type="hidden" name="add_to_cart" value="' . $product['id'] . '">
                            <button type="submit">Add to Cart</button>
                          </form>';
                }

                // Display delete button for sellers
                if ($userType === 'seller') {
                    echo '<form action="list_products.php" method="post">
                            <input type="hidden" name="delete_product" value="' . $product['id'] . '">
                            <button type="submit" onclick="return confirm(\'Are you sure you want to delete this product?\')">Delete</button>
                          </form>';
                }

                echo '</div>'; // Close product-details div
                echo '</li>'; // Close product li
            }
            echo '</ul>';
        } else {
            echo '<p>No products available.</p>';
        }
        ?>
    </div>
</body>
</html>
