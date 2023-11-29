<!DOCTYPE html>
<html>
<head>
    <title>Update Student</title>
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            background-color: #d2e8f3;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h1 {
            background: linear-gradient(to right, #4f80b7, #29293b); /* Gradient background */
            color: #fff;
            padding: 15px;
            margin-top: 0;
        }

        form {
            margin-top: 20px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"], input[type="button"] {
            background-color: #2c65a1;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Update Student</h1>

    <?php
    // Replace 'dbname', 'username', and 'password' with your actual database credentials
    $dsn = 'mysql:host=localhost;dbname=studenttutexmp';
    $username = 'root';
    $password = '';

    try {
        // Connect to the database using PDO
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }

    // Update functionality
    if (isset($_POST['submit'])) {
        $id = $_POST['update_id'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $email = $_POST['email'];

        $query = "UPDATE students SET name = :name, age = :age, email = :email WHERE id = :id";
        $stmt = $pdo->prepare($query);

        try {
            $stmt->execute([
                'name' => $name,
                'age' => $age,
                'email' => $email,
                'id' => $id
            ]);
            echo "Student updated successfully!";
        } catch (PDOException $e) {
            die("Update failed: " . $e->getMessage());
        }
    }

    // Fetch student data for the selected student
    if (isset($_GET['update'])) {
        $updateId = $_GET['update'];

        $query = "SELECT * FROM students WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['id' => $updateId]);
        $studentToUpdate = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    
    <form action="" method="post">
        <input type="hidden" name="update_id" value="<?php echo $studentToUpdate['id']; ?>">
        
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $studentToUpdate['name']; ?>" required><br>

        <label for="age">Age:</label>
        <input type="number" name="age" value="<?php echo $studentToUpdate['age']; ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $studentToUpdate['email']; ?>" required><br>

        <input type="submit" value="Update Student" name="submit">
    </form>

    <input type="button" value="Back" onclick="window.location.href='http://localhost/17_student/student.php'">

    <?php } ?>
</body>
</html>
