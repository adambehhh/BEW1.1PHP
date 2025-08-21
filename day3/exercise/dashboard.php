<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: login.html");
}

$user = $_SESSION["user"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Login</title>
</head>
<body>
    <h1>Welcome <?= $user ?>!</h1>
    <p><a href="logout.php?logout=true">Log Out</a></p>
</body>
</html>