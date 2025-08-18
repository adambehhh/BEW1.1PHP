<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $q1 = "You did not select an answer for this question";
    if (isset($_REQUEST["q1"])) {
        $q1 = $_REQUEST["q1"];
    }

    $q2 = "You did not select an answer for this question";
    if (isset($_REQUEST["q2"])) {
        $q2 = $_REQUEST["q2"];
    }
    $correct_answers = 0;
    if ($q1 == "Paris") {
        $correct_answers++;
    }
    if ($q2 == "4") {
        $correct_answers++;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Quiz Answers</title>
</head>

<body>
    <h1>Quiz Results:</h1>
    <h2>Correct answers: <?= $correct_answers ?> out of 2.</h2>
    <br>
    <p>1. What is the capital of France?</p>
    <p>Your answer: <?= $q1 ?></p>
    <p>Correct answer: Paris</p>
    <br>
    <p>1. What is 2 + 2</p>
    <p>Your answer: <?= $q2 ?></p>
    <p>Correct answer: 4</p>
</body>

</html>