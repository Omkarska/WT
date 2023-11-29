<?php
include 'config.php';

if (isset($_GET['id'])) {
    $complaintId = $_GET['id'];

    // Fetch complaint details based on ID
    $query = "SELECT * FROM complaint WHERE id = $complaintId";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $complaint = mysqli_fetch_assoc($result);
    } else {
        echo "Complaint not found.";
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission for updating the complaint
    $updatedName = $_POST['name'];
    $updatedPhone = $_POST['phone'];
    $updatedEmail = $_POST['email'];
    $updatedComplaint = $_POST['complaint'];

    $updateQuery = "UPDATE complaint SET name = '$updatedName', phone = '$updatedPhone', email = '$updatedEmail', complaint = '$updatedComplaint' WHERE id = $complaintId";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        header("Location: admin.php"); // Redirect to the view page after successful update
        exit();
    } else {
        echo "Error updating complaint: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Complaint</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 800px;
            margin: auto;
            margin-top: 50px;
        }

        h2 {
            text-align: center;
        }

        form {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Complaint</h2>

    <form method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $complaint['name'] ?>" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?= $complaint['phone'] ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $complaint['email'] ?>" required>
        </div>

        <div class="form-group">
            <label for="complaint">Complaint:</label>
            <textarea class="form-control" id="complaint" name="complaint" rows="3" required><?= $complaint['complaint'] ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Complaint</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
