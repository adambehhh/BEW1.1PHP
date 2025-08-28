<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];

    try {
        $db = new PDO("mysql:host=localhost;dbname=Xiangphp", "root");
        $query = "SELECT * FROM users WHERE username = :username";
        $statement = $db->prepare($query);
        $statement->execute(array(
            ':username' => $username
        ));

       $result = $statement->fetch(PDO::FETCH_ASSOC);
        print_r($result);

         if ($result === false) {
            echo "<h1>The username does not exist</h1>";
            exit;
        }

        if ($password == $result["password"]) {
            echo "<br><h1>The user is authenticated</h1>";
            $_SESSION["username"] = $username;
            $_SESSION["name"] = $result["name"];
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<br><h1>The user is not authenticated</h1>";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}