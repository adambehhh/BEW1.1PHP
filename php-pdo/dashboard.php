<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.html");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <h1>User is authenticated and has been redicited to dashboard.</h1>
    <h1>Hello <?= $_SESSION["name"] ?></h1>
    <a href="logout.php?logout=true">Logout button</a>
</body>

</html>