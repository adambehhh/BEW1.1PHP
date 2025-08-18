<?php
$Adamuser = [
    'name' => 'Adam',
    'age' => 20,
    'is student' => false
    // Key => Value
];

// echo $user;

// echo $user['name'];
// var_dump($user)

$users = [
    "Adamuser" => $Adamuser,
    // [
    // 'name' => "Ben",
    // "age" => 29,
    // 'is_student' => false
    // ],
    [
        'name' => "BBYK",
        "age" => 15,
        'is_student' => true
    ]
];

// var_dump($users);

echo $users["Adamuser"]["name"];
echo $users["Adamuser"]["age"]
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Associative Array and Key Value Pairs</title>
</head>

<body>
    <ul>
        <?php foreach ($users as $user) : ?>
            <li><?= $user['name'] ?>, (<?= $user['age'] ?> years old)</li>
        <?php endforeach; ?>
    </ul>
</body>

</html>