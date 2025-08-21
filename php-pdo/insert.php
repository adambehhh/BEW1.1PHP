<?php

$db = new PDO("mysql:host=localhost;dbname=intro_to_sql", "root");
// $query = "SELECT * FROM user;";


//$query = $db->query('SELECT * FROM user');
$insert = "INSERT INTO user (id, name, email) VALUES (:id, :name, :email)";
$statement = $db->prepare($insert);

$id = 4;
$name = "Ah Fai";
$email = "faige@gmail.com";

$statement->execute(array(
    ':id' => $id,
    ':name' => $name,
    ':email' => $email,
));
print_r($statement);

?>