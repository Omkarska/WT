<!-- register.php -->
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

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background: #4caf50;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include 'db_config.php';

        $name = $_POST['name'];
        $roll_number = $_POST['roll_number'];

        $sql = "INSERT INTO students (name, roll_number) VALUES ('$name', '$roll_number')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Registration successful!</p>";
        } else {
            echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }

        $conn->close();
    }
    ?>

    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="roll_number">Roll Number:</label>
        <input type="text" name="roll_number" required>

        <input type="submit" value="Register">
    </form>
</body>
</html>
