<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="student.css">
</head>
<body>
    <div class="container">
        <h1>Student - Fetch Result</h1>
        <form method="post" action="student.php">
            <div class="form-group">
                <label for="prn">PRN Number:</label>
                <input type="text" id="prn" name="prn" required>
                <button type="submit" class="btn fetch-btn">Fetch Result</button>
            </div>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Connect to the database
            $conn = mysqli_connect('localhost', 'root', '', 'vit_results');

            $prn = $_POST['prn'];

            // Query to fetch results for the given PRN number
            $query = "SELECT subject, mse_marks, ese_marks FROM results WHERE prn_no = '$prn'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
        ?>
                <table class="result-table">
                    <thead>
                        <tr>
                            <th>Subject Name</th>
                            <th>Obtained Marks (MSE)</th>
                            <th>Obtained Marks (ESE)</th>
                            <th>Total Marks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total_mse = 0;
                        $total_ese = 0;
                        $ftotal = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $subject = $row['subject'];
                            $mse_marks = $row['mse_marks'];
                            $ese_marks = $row['ese_marks'];
                            $total_marks = $mse_marks + $ese_marks;
                            $total_mse += $mse_marks;
                            $total_ese += $ese_marks;
                            $ftotal += $total_marks;
                        ?>
                            <tr>
                                <td><?= $subject ?></td>
                                <td><?= $mse_marks ?></td>
                                <td><?= $ese_marks ?></td>
                                <td><?= $total_marks ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <div class="total">
                    <!-- <p>Total Obtained Marks (MSE): <?= $total_mse ?></p>
                    <p>Total Obtained Marks (ESE): <?= $total_ese ?></p> -->
                    <p>Total Obtained Marks : <?= $ftotal?></p>
                    <p>Combined Percentage: <?= ($ftotal / 400) * 100 ?>%</p>
                </div>
            <?php
            } else {
                echo '<div class="message error">No results found for the given PRN number.</div>';
            }
            // Close the database connection
            mysqli_close($conn);
        }
        ?>
    </div>
</body>
</html>
