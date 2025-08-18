<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
</head>

<body>
    <h1>Feedback Form</h1>
    <form action="process_feedback.php" method="post">
        <label for="name">Name (optional):</label>
        <input type="text" id="name" name="name"><br><br>

        <label for="email">Email (optional):</label>
        <input type="email" id="email" name="email"><br><br>

        <label for="comments">Comments (required):</label>
        <textarea id="comments" name="comments" rows="4" cols="50"></textarea><br><br>

        <input type="submit" value="Submit">
    </form>
</body>

</html>