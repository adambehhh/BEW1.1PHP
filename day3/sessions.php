<?php
session_start();

if (isset($_GET['reset'])) {
    // $reset = filter_var($_GET)
    if ($_GET['reset']=== true){
        echo $_GET["reset"];
        unset($_SESSION['counter']);
    }
}

if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 1;
} else {
    $_SESSION['counter'] += 2;
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Session Counter with Reset</title>
</head>

<body>
    <h1>Welcome to our website!</h1>
    <p>You have visited this page <?php echo $_SESSION['counter']; ?> times.</p>
    <p><a href="?reset=true">Reset Counter</a></p>
</body>

</html>