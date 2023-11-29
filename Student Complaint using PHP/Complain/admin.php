<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page - View Complaints</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .container {
      max-width: 800px;
      margin: auto;
      margin-top: 50px;
    }

    h2 {
      text-align: center;
    }

    table {
      width: 100%;
      margin-top: 20px;
    }

    table, th, td {
      border: 1px solid #dee2e6;
      border-collapse: collapse;
    }

    th, td {
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #007bff;
      color: #fff;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>Admin Page - View Complaints</h2>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Complaint</th>
        </tr>
      </thead>
      <tbody>
        <?php
          include 'config.php';

          $query = "SELECT * FROM complaint";
          $result = mysqli_query($conn, $query);

          if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
              echo "<tr>";
              echo "<td>".$row['id']."</td>";
              echo "<td>".$row['name']."</td>";
              echo "<td>".$row['phone']."</td>";
              echo "<td>".$row['email']."</td>";
              echo "<td>".$row['complaint']."</td>";
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='5'>No complaints found.</td></tr>";
          }
        ?>
      </tbody>
    </table>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
