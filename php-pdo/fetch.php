<?php
$db = new PDO("mysql:host=localhost;dbname=intro_to_sql", "root");
$statement = $db->prepare($query);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
//$result = $statement->fetch(PDO::FETCH_BOTH);
//$result = $statement->fetch(PDO::FETCH_ASSOC);
//$result = $statement->fetchALL();

//$query = $db->query('SELECT * FROM user');
print_r($result);
echo "<br><h1>The user's name is ";
echo $result[0]["name"];
echo "<h1>";