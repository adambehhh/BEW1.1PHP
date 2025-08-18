<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Process Form</title>
</head>

<body>
    <?php 
    $newsletter = null;
    if (isset($_POST["newsletter"])) {
        $newsletter = $_POST["newsletter"];
    }
    ?>
    <h1>The user's name is <?= $_POST['name']; ?></h1>
    <h1>The user's age is <?= $_POST['age']; ?></h1>
    <h1>The user's email is <?= $_POST['email']; ?></h1>
    <h1>The user's gender is <?= $_POST['gender']; ?></h1>
    <h1>The user's subscribed our newsletter <?= $newsletter; ?></h1>
    <h1>The user's country is <?= $_POST['country']; ?></h1>
</body>

</html>