<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Favourite List</title>
</head>

<body>
        <?php $intro = ("Here is the list of my favourite books");
        $favourites = ["Devil May Cry", "Star Wars", "Demon Slayer", "Honkai Star Rail", "Three Kingdoms"];
        $highlight = true;
        echo "<h1>$intro</h1>";
        echo "<ol>";
        foreach ($favourites as $index => $item) {
                if ($highlight && $index === 0) {
                        echo "<li style=\"color: blue;\">$item</li>";
                } else {
                        echo "<li>$item</li>";
                }
        }

        echo "</ol>";
        ?>
</body>

</html>