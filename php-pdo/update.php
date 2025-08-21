<?php

$db = new PDO("mysql:host=localhost;dbname=intro_to_sql", "root");
// $query = "SELECT * FROM user;";


//$query = $db->query('SELECT * FROM user');
$update = "UPDATE user SET name = :name, email = :email WHERE id = :id";
$statement = $db->prepare($update);

$id = 4;
$name = "Ah Yang";
$email = "Yangge@gmail.com";

$statement->execute(array(
    ':name'=>$name,
    ':email'=>$email,
    ':id'=>$id,
));
print_r($statement);

?>