<?php
include 'config.php';

if (isset($_GET['id'])) {
    $complaintId = $_GET['id'];

    // Delete the complaint based on ID
    $deleteQuery = "DELETE FROM complaint WHERE id = $complaintId";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        header("Location: admin.php"); // Redirect to the view page after successful deletion
        exit();
    } else {
        echo "Error deleting complaint: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
    exit();
}
?>
