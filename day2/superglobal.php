<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superglobal variables</title>
</head>

<body>
    <?php

    echo "Server name: " . $_SERVER["SERVER_NAME"] . "<br>";
    echo "Server IP: " . $_SERVER["SERVER_ADDR"] . "<br>";
    echo "Request method: " . $_SERVER["REQUEST_METHOD"] . "<br>";
    echo "Current script URL: " . $_SERVER["PHP_SELF"] . "<br>";

    $name = $_POST["name"];
    echo $name . "<br>";
    $age = $_REQUEST["age"];
    echo $age . "<br>";
    ?>
</body>

</html>