<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>

<body>
    <?php
    include 'db.php';
    // Check if the delete button is clicked
    if (isset($_POST['delete'])) {
        $deleteId = $_POST['id'];

        // Delete the record from the database
        $deleteSql = "DELETE FROM students WHERE id = $deleteId";
        
        if ($conn->query($deleteSql) === TRUE) {
            // Redirect to the same page after deletion
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])) {
        $name = $_POST["name"];
        $grade = $_POST["grade"];
    
        $sql = "INSERT INTO students (name, grade) VALUES ('$name', $grade)";
    
        if ($conn->query($sql) === TRUE) {
            echo '<div class="success">Record added successfully</div>';
        } else {
            echo '<div class="error">Error: ' . $sql . '<br>' . $conn->error . '</div>';
        }
    }
    
    ?>
    <div class="container mt-4">
        <h2>Student Records</h2>

        <form name="studentForm" onsubmit="return validateForm(event)" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="grade" class="form-label">Grade:</label>
                <input type="text" class="form-control" id="grade" name="grade" required>
            </div>

            <button type="submit" name="add" class="btn btn-primary">Add Record</button>
        </form>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Grade</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM students";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row["id"]}</td>
                                <td>{$row["name"]}</td>
                                <td>{$row["grade"]}</td>
                                <td>
                                    <form method='post'>
                                        <input type='hidden' name='id' value='{$row["id"]}'>
                                        <button type='submit' name='delete' class='btn btn-danger'>Delete</button>
                                        <a href='edit.php?id={$row["id"]}' class='btn btn-warning'>Edit</a>
                                    </form>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No records found</td></tr>";
                }
                ?>
            </tbody>

        </table>
    </div>

    <!-- Add Bootstrap JavaScript and Popper.js from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
