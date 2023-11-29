<!-- add_product.php -->
<?php
session_start();

// Check if the user is logged in as a seller
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'seller') {
    header('Location: login.php');
    exit();
}

// Include database connection
include 'db.php';

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];
    $productQuantity = $_POST['product_quantity'];
    $sellerId = $_SESSION['user_id'];

    // File upload handling
    $imageUploadPath = 'uploads/';
    $imageName = $_FILES['product_image']['name'];
    $imageTmpName = $_FILES['product_image']['tmp_name'];
    $imageUploadPath .= $imageName;

    // Check if the 'uploads' directory exists, if not, create it
    if (!file_exists('uploads')) {
        mkdir('uploads');
    }

    // Move the uploaded image to the 'uploads' directory
    if (move_uploaded_file($imageTmpName, $imageUploadPath)) {
        // Insert the product into the database
        $sql = "INSERT INTO products (seller_id, name, price, quantity, image_url) 
                VALUES ('$sellerId', '$productName', '$productPrice', '$productQuantity', '$imageUploadPath')";

        if ($conn->query($sql) === TRUE) {
            echo "Product added successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Failed to move the uploaded file.";
    }
}

$conn->close();
?>

<!-- The rest of your HTML form goes here -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product - Online Shopping System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="list_products.php">List of Products</a>
        <a href="add_product.php">Add Product</a>
        <form action="logout.php" method="post">
            <button type="submit">Logout</button>
        </form>
    </div>

    <div class="container">
        <h1>Add Product</h1>
        <form action="add_product.php" method="post" enctype="multipart/form-data">
            <label for="product_name">Product Name:</label>
            <input type="text" id="product_name" name="product_name" required>

            <label for="product_price">Product Price:</label>
            <input type="number" id="product_price" name="product_price" min="0" step="0.01" required>

            <label for="product_quantity">Product Quantity:</label>
            <input type="number" id="product_quantity" name="product_quantity" min="1" required>

            <label for="product_image">Product Image:</label>
            <input type="file" id="product_image" name="product_image" accept="image/*" required>

            <button type="submit">Add Product</button>
        </form>
    </div>
</body>
</html>
