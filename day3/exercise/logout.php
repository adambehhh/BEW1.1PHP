<?php
session_start();

if (isset($_GET["logout"])) {
    if ($_GET["logout"] === "true") {
        session_unset();
        session_destroy();
    }
    header("Location: login.html");
}

?>
