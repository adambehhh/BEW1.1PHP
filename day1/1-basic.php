<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My PHP Basics</title>
</head>

<body>
    <?php
    echo "<h1>Hello World</h1>";
    $age = 40;

    $Hello = "Hello";
    $world = "world";

    echo $Hello, $world;

    $name = "Adam";
    $age = "20";

    echo "My name is" . $name . " and I am " . $age . " years old";
    ?>

    <script>
        console.log(<?php echo "'I wrote this in PHP'"; ?>);
    </script>
</body>

</html>