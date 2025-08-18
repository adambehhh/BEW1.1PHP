<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate the Area of a Rectangle</title>
</head>

<body>
    <?php

    function calculateRectangleArea($length, $width)
    {
        return $length * $width;
    }
    ?>
    <h1>The area of the rectangle is: <?= calculateRectangleArea(5, 10) ?></h1>
</body>

</html>