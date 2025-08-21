<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];

    if ($username == "admin" && $password == "password123") {
        $_SESSION["user"] = "admin";
        if ($_REQUEST["rememberme"] == "true") {
            setcookie("username", $username, time() +(24*60*60*7));
        }
    }
}

if (isset($_SESSION["user"])) {
    header("Location: dashboard.php");
}else {
    header("Location: login.html");
}