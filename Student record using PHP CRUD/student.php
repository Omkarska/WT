<!DOCTYPE html>
<html>
<head>
    <title>Student Database</title>
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

        input[type="submit"] {
            background-color: #2c65a1;
            color: #fff;
            cursor: pointer;
        }

        table {
            width: 80%;
            margin-top: 20px;
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #2b2e33;
            color: white;
        }

        a {
            color: #4285f4;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Student Database</h1>
    <form action="" method="post">
    <input type="hidden" name="update_id" id="update_id" value="">
    <label for="name">Name:</label>
    <input type="text" name="name" required><br>

    <label for="age">Age:</label>
    <input type="number" name="age" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" required><br>

    <input type="submit" value="Add Student" name="submit">
</form>


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

    // Function to insert student data into the database
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $email = $_POST['email'];

        $query = "INSERT INTO students (name, age, email) VALUES (:name, :age, :email)";
        $stmt = $pdo->prepare($query);

        try {
            $stmt->execute([
                'name' => $name,
                'age' => $age,
                'email' => $email
            ]);
            echo "Student added successfully!";
        } catch (PDOException $e) {
            die("Insertion failed: " . $e->getMessage());
        }
    }

    // Function to delete a student record from the database
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];

        $query = "DELETE FROM students WHERE id = :id";
        $stmt = $pdo->prepare($query);

        try {
            $stmt->execute(['id' => $id]);
            echo "Student deleted successfully!";
        } catch (PDOException $e) {
            die("Deletion failed: " . $e->getMessage());
        }
    }

    // Function to get all students from the database
    function getAllStudents()
    {
        global $pdo;
        $query = "SELECT * FROM students";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fetch all students from the database
    $students = getAllStudents();

    // Display student data table
    if (count($students) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Name</th><th>Age</th><th>Email</th><th>Delete</th><th>Update</th></tr>";

        foreach ($students as $student) {
            echo "<tr>";
            echo "<td>" . $student['id'] . "</td>";
            echo "<td>" . $student['name'] . "</td>";
            echo "<td>" . $student['age'] . "</td>";
            echo "<td>" . $student['email'] . "</td>";
            echo "<td><a href='?delete=" . $student['id'] . "'>Delete</a></td>";
            echo "<td><a href='update.php?update=" . $student['id'] . "'>Update</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No students found.";
    }
    
    ?>
</body>
</html>
