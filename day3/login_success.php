<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];

    if ($username == "admin" && $password == "admin") {
        $_SESSION["user"] = "admin";
        setcookie("username", $username, time() + 10);
    }

    echo $_SESSION["user"];
}

$cookieUsername = isset($_COOKIE['username']) ? $_COOKIE['username']  : "Guest";

// For you to kill or delete the cookie XD
//setcookie("username", "", time() -3600);
echo(time());

echo $cookieUsername;

if (!isset($_SESSION["user"])) {
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Success Page</title>
</head>

<body>
    <h1>User has logged in!</h1>
    <p><a href="index.php?logout=true">Click here to logout</a></p>
</body>

</html>