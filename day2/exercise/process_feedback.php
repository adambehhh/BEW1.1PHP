<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST["name"];
    $email = $_REQUEST["email"];
    $comments = $_REQUEST["comments"];

    if (empty($comments)) {
        echo "<h1>Error: No comments is sent</h1>";
    } else {
        echo "<h1>Thank you for your feedback! Here is the submitted data:</h1>";
        echo "<h2>Name: $name</h2>";
        echo "<h2>Email: $email</h2>";
        echo "<h2>Comment: $comments</h2>";
    }
}

?>