<?php

$db = new PDO("mysql:host=localhost;dbname=intro_to_sql", "root");
// $query = "SELECT * FROM user;";


//$query = $db->query('SELECT * FROM user');
// $insert = "INSERT INTO user (id, name, email) VALUES (:id, :name, :email)";
// $update = "UPDATE user SET name = :name, email = :email WHERE id = :id";
$delete = "DELETE FROM user WHERE id=:id";
$statement = $db->prepare($delete);

$id = 4;

$statement->execute(array(
    ':id'=>$id,
));
print_r($statement);

?>