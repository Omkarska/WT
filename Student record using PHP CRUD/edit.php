<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "students";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user ID is provided in the URL
if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Fetch user information from the database based on the provided ID
    $sql = "SELECT * FROM students WHERE id = $userId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $grade = $row['grade'];

        // Check if the form is submitted for updating the user information
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get updated values from the form
            $updatedName = $_POST['name'];
            $updatedGrade = $_POST['grade'];

            // Update the user information in the database
            $updateSql = "UPDATE students SET name = '$updatedName', grade = '$updatedGrade' WHERE id = $userId";
            if ($conn->query($updateSql) === TRUE) {
                echo "Record updated successfully";
                header("Location: index.php");
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    } else {
        echo "User not found";
    }
} else {
    echo "User ID not provided";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <!-- Add Bootstrap CSS link -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit User</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" required>
            </div>

            <div class="form-group">
                <label for="grade">Grade:</label>
                <input type="text" class="form-control" name="grade" value="<?php echo $grade; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <!-- Add Bootstrap JS and Popper.js scripts (if not already included) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
