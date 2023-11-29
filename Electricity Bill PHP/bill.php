<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Calculator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-3">
       <h2 class="text-center">Electricity Bills</h2>
        <form id="electricityForm" method="post" class="mt-3">
            <div class="form-group">  
                <label>Enter Name: </label>
                <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required>
                <br>
                <label>Bill No: </label>
                <input type="number" class="form-control" id="number" placeholder="Enter bill number" name="no" required>
                <br>
                <label>Enter Unit: </label>
                <input type="number" class="form-control" id="units" placeholder="Enter Units" name="units" required>
            </div>
            <center><input type="submit" class="btn btn-secondary" value="calculate"></center>
        </form>
        <div class="mt-4">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST["name"];
                $units = $_POST["units"];
                $no = $_POST["no"];
                $totalBillAmount = 0;

                if ($units <= 50) {
                    $totalBillAmount = $units * 3.5;
                } elseif ($units <= 150) {
                    $totalBillAmount = 50 * 3.5 + ($units - 50) * 4.0;
                } elseif ($units <= 250) {
                    $totalBillAmount = 50 * 3.5 + 100 * 4.0 + ($units - 150) * 5.2;
                } else {
                    $totalBillAmount = 50 * 3.5 + 100 * 4.0 + 100 * 5.2 + ($units - 250) * 6.5;
                }
            ?>
            <h3 class="text-center">Electricity Bill</h3>
            <p class="text-center">
                Name: <?php echo $name; ?><br>
                Bill Number: <?php echo $no; ?><br>
                Total Bill Amount: <?php echo number_format($totalBillAmount, 2)." Rs."; ?>
            </p>
            <?php } ?>
        </div>

    </div>
     
    </body>
</html>

