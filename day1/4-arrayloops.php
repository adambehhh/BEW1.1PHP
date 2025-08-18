<?php
$fruits = array("apple", "banana", "cherry");
// They both mean the same thing.
$fruits = ["apple", "banana", "cherry"];

// foreach ($fruits as $fruits) {
// echo $fruits . " ";
// }

// echo $fruits[0];
// echo $fruits[1];
// echo $fruits[2];
// echo $fruits[3];
// echo $fruits[2];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array and loops</title>
</head>

<body>
    <h1>Fruits</h1>
    <ul>
        <?php
        foreach ($fruits as $fruits) {
            echo "<li>$fruits</li>";
        }
        ?>
    </ul>
</body>

</html>