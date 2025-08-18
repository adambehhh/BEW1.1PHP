<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate the Average of an Array of Number</title>
</head>

<body>
    <?php
    function calculateAverage($array)
    {
        if (!is_array($array)) {
            return "Error: Please provide an array";
        }
        $sumOfArray = 0;
        foreach ($array as $value) {
            if (!is_numeric($value)) {
                return "Error; One of the values in the array is not a number";
            }
            $sumOfArray += $value;
        }
        return $sumOfArray / count($array);
    }
    $numbers = 10;
    $numbers = [10, 20, 30, 40, 50];

    echo "<h1>The average of the array is: " . calculateAverage($numbers) . "</h1>";
    ?>
</body>

</html>