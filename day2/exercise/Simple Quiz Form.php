<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Quiz Form</title>
</head>

<body>
    <h1>Simple Quiz</h1>
    <form action="process_quiz.php" method="post">
        <p>1. What is the capital of France?</p>
        <input type="radio" name="q1" value="London">
        <label>London</label><br>
        <input type="radio" name="q1" value="Paris">
        <label>Paris</label><br>
        <input type="radio" name="q1" value="Rome">
        <label>Rome</label><br>

        <p>2. What is 2 + 2?</p>
        <input type="radio" name="q2" value="3">
        <label>3</label><br>
        <input type="radio" name="q2" value="4">
        <label>4</label><br>
        <input type="radio" name="q2" value="5">
        <label>5</label><br>

        <input type="submit" value="Submit">
    </form>
</body>

</html>