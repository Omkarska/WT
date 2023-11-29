<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="Stylesheet.css">
</head>

<body>

    <form method="post">
        <label for="inputString">Enter a string:</label><br>
        <input type="text" id="inputString" name="inputString"><br>
        <input type="submit" name="toUpperCase" value="Transform to Uppercase">
        <input type="submit" name="toLowerCase" value="Transform to Lowercase">
        <input type="submit" name="capitalizeFirst" value="Capitalize First Character">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $inputString = $_POST['inputString'];

        if (isset($_POST['toUpperCase'])) {
            echo "<center>" . strtoupper($inputString) . "</center>";
        } elseif (isset($_POST['toLowerCase'])) {
            echo "<center>" . strtolower($inputString) . "</center>";
        } elseif (isset($_POST['capitalizeFirst'])) {
            echo "<center>" . ucfirst($inputString) . "</center>";
        }
    }
    ?>

</body>

</html>