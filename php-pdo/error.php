<?php
// Teaches you jow to handle errors in PHP PDD

try {
$db = new PDO("mysql:host=localhost;dbname=intro_to_sql", "root");
// $query = "SELECT * FROM user;";
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//$query = $db->query('SELECT * FROM user');
$insert = "INSERT INTO test (name, age) VALUES ('John', 25)";
$result = $db->exec($insert);
print_r($result);

}catch(PDOException $e){
    echo $e->getMessage();
}
?>