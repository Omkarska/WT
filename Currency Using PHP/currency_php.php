<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Converter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        select {
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

        .result {
            margin-top: 20px;
            font-weight: bold;
            padding: 10px;
            border: 1px solid #4CAF50;
            border-radius: 5px;
            background-color: #e7f3e4;
            color: #4CAF50;
        }
    </style>
</head>

<body>

    <?php
    // Define exchange rates (as of a certain date)
    $exchange_rates = [
        'USD' => 1.0,
        'EUR' => 0.91,
        'GBP' => 0.79,
        'INR' => 83.00,
        // Add more currencies as needed
    ];

    // Function to perform currency conversion
    function convertCurrency($amount, $from_currency, $to_currency, $exchange_rates)
    {
        if (isset($exchange_rates[$from_currency]) && isset($exchange_rates[$to_currency])) {
            $converted_amount = $amount * ($exchange_rates[$to_currency] / $exchange_rates[$from_currency]);
            return number_format($converted_amount, 2); // Format to 2 decimal places
        } else {
            return "Invalid currency code";
        }
    }

    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $amount = $_POST['amount'];
        $from_currency = strtoupper($_POST['from_currency']); // Convert to uppercase for consistency
        $to_currency = strtoupper($_POST['to_currency']); // Convert to uppercase for consistency
    
        // Perform conversion
        $converted_amount = convertCurrency($amount, $from_currency, $to_currency, $exchange_rates);

        // Display result
        echo "<div class='result'>{$amount} {$from_currency} is equal to {$converted_amount} {$to_currency}</div>";
    }
    ?>

    <form method="post" action="">
        <label for="amount">Amount:</label>
        <input type="text" name="amount" required>

        <label for="from_currency">From Currency:</label>
        <select name="from_currency" required>
            <?php foreach ($exchange_rates as $currency => $rate): ?>
                <option value="<?php echo $currency; ?>">
                    <?php echo $currency; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="to_currency">To Currency:</label>
        <select name="to_currency" required>
            <?php foreach ($exchange_rates as $currency => $rate): ?>
                <option value="<?php echo $currency; ?>">
                    <?php echo $currency; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <input type="submit" value="Convert">
    </form>

</body>

</html>