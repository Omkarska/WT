<!-- mark_attendance.php -->
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

        input[type="checkbox"] {
            margin-bottom: 5px;
        }

        input[type="submit"] {
            background: #4caf50;
            color: #fff;
            cursor: pointer;
            margin-top: 10px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
    <?php
    include 'db_config.php';

    // Initialize $selectedDate to avoid undefined variable error
    $selectedDate = '';

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if 'attendance' key is set in the $_POST array
        $attendance = isset($_POST['attendance']) ? $_POST['attendance'] : null;

        // Get the current date
        $selectedDate = date('Y-m-d');

        // Check if 'attendance' is an array before processing
        if (!is_null($attendance) && is_array($attendance)) {
            foreach ($attendance as $student_id) {
                // Check if attendance record already exists for the student and date
                $checkStmt = $conn->prepare("SELECT * FROM attendance WHERE student_id = ? AND attendance_date = ?");
                $checkStmt->bind_param("is", $student_id, $selectedDate);
                $checkStmt->execute();
                $checkResult = $checkStmt->get_result();

                if ($checkResult->num_rows === 0) {
                    // If no attendance record exists, insert a new record
                    $insertStmt = $conn->prepare("INSERT INTO attendance (student_id, attendance_date, is_present) VALUES (?, ?, 1)");
                    $insertStmt->bind_param("is", $student_id, $selectedDate);

                    if ($insertStmt->execute() !== TRUE) {
                        echo "<p>Error: " . $insertStmt->error . "</p>";
                    }

                    $insertStmt->close();
                }

                $checkStmt->close();
            }

            echo "<p>Attendance marked successfully!</p>";
        } else {
            echo "<p>No students selected for attendance.</p>";
        }
    }

    // Retrieve the list of students not marked present for the current date
    $result = $conn->query("SELECT id, name FROM students WHERE id NOT IN (
                            SELECT student_id FROM attendance WHERE attendance_date = '$selectedDate' AND is_present = 1)");

    ?>

    <form action="" method="post">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<input type='checkbox' name='attendance[]' value='{$row['id']}'> {$row['name']}<br>";
            }
        } else {
            echo "<p>All students have been marked present for today's date.</p>";
        }
        ?>

        <input type="submit" value="Mark Attendance">
    </form>

    <?php
    $conn->close();
    ?>
</body>
</html>
