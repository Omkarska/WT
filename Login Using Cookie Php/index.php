<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p {
            margin-top: 20px;
            font-weight: bold;
            text-align: center;
            color: #4CAF50;
        }
    </style>
</head>
<body>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    setcookie('user', $username, time() + 3600);
    setcookie('pass', $password, time() + 3600);

    echo "<p>Registration successful! You can now <a href='login.php'>login</a>.</p>";
}
?>

<form method="post" action="">
    <h2>Register</h2>
    <label for="username">Username:</label>
    <input type="text" name="username" required>

    <label for="password">Password:</label>
    <input type="password" name="password" required>

    <input type="submit" value="Register">
</form>

</body>
</html>
