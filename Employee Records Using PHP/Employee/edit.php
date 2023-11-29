<?php
include 'functions.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle the form submission for updating the employee record
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];

    updateEmployee($id, $full_name, $email);

    header("Location: dashboard.php");
    exit();
}

// Fetch the employee details based on the provided ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $employee = getEmployeeById($id);

    if (!$employee) {
        // Redirect to the dashboard if the employee ID is not valid
        header("Location: dashboard.php");
        exit();
    }
} else {
    // Redirect to the dashboard if the ID is not provided
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee Record</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>Edit Employee Record</h1>
    </header>

    <main>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $employee['id']; ?>">
            <label>Full Name: <input type="text" name="full_name" value="<?php echo $employee['full_name']; ?>" required></label><br>
            <label>Email: <input type="email" name="email" value="<?php echo $employee['email']; ?>" required></label><br>
            <button type="submit">Update</button>
        </form>
    </main>

    <footer>
        &copy; 2023 Your Website Name. All rights reserved.
    </footer>
</body>
</html>
