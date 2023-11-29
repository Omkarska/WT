<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="teacher.css">
</head>
<body>
    <div class="container">
        <h1>Teacher - Enter Student Marks</h1>
        <form method="post" action="teacher.php">
            <div class="form-group">
                <label for="prn">PRN Number:</label>
                <input type="text" id="prn" name="prn" required>
            </div>

            <div class="subject">
                <label for="subject1">Subject 1:</label>
                <input type="text" id="subject1" name="subject1" required>
                <label for="mse_marks1">MSE Marks (30%):</label>
                <input type="number" id="mse_marks1" name="mse_marks1" required>
                <label for="ese_marks1">ESE Marks (70%):</label>
                <input type="number" id="ese_marks1" name="ese_marks1" required>
                <label for="max_marks_mse1">Max Marks for MSE:</label>
                <input type="number" id="max_marks_mse1" name="max_marks_mse1" required>
                <label for="max_marks_ese1">Max Marks for ESE:</label>
                <input type="number" id="max_marks_ese1" name="max_marks_ese1" required>
            </div>

            <div class="subject">
                <label for="subject2">Subject 2:</label>
                <input type="text" id="subject2" name="subject2" required>
                <label for="mse_marks2">MSE Marks (30%):</label>
                <input type="number" id="mse_marks2" name="mse_marks2" required>
                <label for="ese_marks2">ESE Marks (70%):</label>
                <input type="number" id="ese_marks2" name="ese_marks2" required>
                <label for="max_marks_mse2">Max Marks for MSE:</label>
                <input type="number" id="max_marks_mse2" name="max_marks_mse2" required>
                <label for="max_marks_ese2">Max Marks for ESE:</label>
                <input type="number" id="max_marks_ese2" name="max_marks_ese2" required>
            </div>

            <div class="subject">
                <label for="subject3">Subject 3:</label>
                <input type="text" id="subject3" name="subject3" required>
                <label for="mse_marks3">MSE Marks (30%):</label>
                <input type="number" id="mse_marks3" name="mse_marks3" required>
                <label for="ese_marks3">ESE Marks (70%):</label>
                <input type="number" id="ese_marks3" name="ese_marks3" required>
                <label for="max_marks_mse3">Max Marks for MSE:</label>
                <input type="number" id="max_marks_mse3" name="max_marks_mse3" required>
                <label for="max_marks_ese3">Max Marks for ESE:</label>
                <input type="number" id="max_marks_ese3" name="max_marks_ese3" required>
            </div>

            <div class="subject">
                <label for="subject4">Subject 4:</label>
                <input type="text" id="subject4" name="subject4" required>
                <label for="mse_marks4">MSE Marks (30%):</label>
                <input type="number" id="mse_marks4" name="mse_marks4" required>
                <label for="ese_marks4">ESE Marks (70%):</label>
                <input type="number" id="ese_marks4" name="ese_marks4" required>
                <label for="max_marks_mse4">Max Marks for MSE:</label>
                <input type="number" id="max_marks_mse4" name="max_marks_mse4" required>
                <label for="max_marks_ese4">Max Marks for ESE:</label>
                <input type="number" id="max_marks_ese4" name="max_marks_ese4" required>
            </div>

            <!-- Repeat the above block for Subject 3 and Subject 4 -->

            <button type="submit" class="btn submit-btn">Submit</button>
        </form>
    </div>
</body>
</html>


<!-- Your HTML form structure -->

<!-- PHP code to save the marks in the database -->
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'vit_results');
    $flag = 0;
    for ($i = 1; $i <= 4; $i++) {
        $prn = $_POST['prn'];
        $subject = $_POST["subject$i"];
        $mse_marks = $_POST["mse_marks$i"];
        $ese_marks = $_POST["ese_marks$i"];
        $max_marks_mse = $_POST["max_marks_mse$i"];
        $max_marks_ese = $_POST["max_marks_ese$i"];

        // Insert marks into the database
        $insert_query = "INSERT INTO results (prn_no, subject, mse_marks, ese_marks, max_marks_mse, max_marks_ese) VALUES (
            '$prn',
            '$subject',
            $mse_marks,
            $ese_marks,
            $max_marks_mse,
            $max_marks_ese
        )";

        if (mysqli_query($conn, $insert_query)) {
            $flag = $flag +1;
        } else {
            echo '<div class="message error">Error: ' . mysqli_error($conn) . '</div>';
        }
    }
    if($flag == 4)
    {
        echo '<div class="message success">Marks saved successfully!</div>';
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

