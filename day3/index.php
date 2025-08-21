<?php
session_start();

if (isset($_GET["logout"])) {
    if ($_GET["logout"] === "true") {
        session_unset();
        session_destroy();
        // exit;
    }
}

if (isset($_SESSION["user"])) {
    header("Location: login_success.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
</head>

<body>
    <form action="login_success.php" method="post">
        <input type="text" name="username" placeholder="Username"><br>
        <input type="text" name="password" placeholder="Password"><br>
        <label for="rembemberme">Remember me?</label>
        <input type="checkbox" name="rememberme"><br>
        <input type="submit">
    </form>
</body>

</html>