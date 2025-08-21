<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];
    $confirmPassword = $_REQUEST["confirm_password"];
    $name = $_REQUEST["name"];

    if ($password !== $confirmPassword) {
        echo "<h1>The password and confirm password does not match!</h1>";
        exit;
    }

    $db = new PDO("mysql:host=localhost;dbname=phppdo", "root");


    //$query = $db->query('SELECT * FROM user');
    $insert = "INSERT INTO users (username, password, name) VALUES (:username, :password, :name)";
    $statement = $db->prepare($insert);

    $result = $statement->execute(array(
        ':username' =>$username, 
        ':password' =>$password,
        ':name' =>$name,
    ));

    if ($result == true) {
        echo "<h1>User has been added to the DB!</h1>";
    }
}
?>