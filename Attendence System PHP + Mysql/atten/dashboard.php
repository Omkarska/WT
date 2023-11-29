<!-- dashboard.php -->
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        .dashboard {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        .links {
            margin-top: 20px;
            text-align: center;
        }

        .links a {
            display: block;
            margin-bottom: 10px;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .links a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <h2>Dashboard</h2>

        <div class="links">
            <a href="register.php">Register Student</a>
            <a href="mark_attendance.php">Mark Attendance</a>
            <a href="view_attendance.php">View Attendance</a> <!-- New link added -->
        </div>
    </div>
</body>
</html>
