<!-- view_attendance.php -->
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="date"] {
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background: #4caf50;
            color: #fff;
            cursor: pointer;
            margin-top: 10px;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <?php
    include 'db_config.php';

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if 'attendance_date' key is set in the $_POST array
        $selectedDate = isset($_POST['attendance_date']) ? $_POST['attendance_date'] : '';

        // Validate and sanitize the date to prevent SQL injection
        $selectedDate = date('Y-m-d', strtotime($selectedDate));

        // Display table of present students for the selected date
        $result = $conn->query("SELECT students.name, attendance.attendance_date FROM students
                                INNER JOIN attendance ON students.id = attendance.student_id
                                WHERE attendance.attendance_date = '$selectedDate' AND attendance.is_present = 1");

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Name</th><th>Date</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['name']}</td><td>{$row['attendance_date']}</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No records found for the selected date.</p>";
        }
    }
    ?>

    <form action="" method="post">
        <label for="attendance_date">Select Date:</label>
        <input type="date" name="attendance_date" required>
        <input type="submit" value="View Attendance">
    </form>

    <?php
    $conn->close();
    ?>
</body>
</html>
