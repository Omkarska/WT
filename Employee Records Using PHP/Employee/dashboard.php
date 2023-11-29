<?php
include 'functions.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$employees = getAllEmployees();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>Welcome, <?php echo $_SESSION['user']['full_name']; ?>!</h1>
    </header>

    <main>
        <h2>Employee Records</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $employee) : ?>
                    <tr>
                        <td><?php echo $employee['id']; ?></td>
                        <td><?php echo $employee['username']; ?></td>
                        <td><?php echo $employee['full_name']; ?></td>
                        <td><?php echo $employee['email']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $employee['id']; ?>">Edit</a>
                            <a href="delete.php?id=<?php echo $employee['id']; ?>" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <a href="logout.php">Logout</a>
    </main>

    <footer>
        &copy; 2023 Your Website Name. All rights reserved.
    </footer>
</body>
</html>
