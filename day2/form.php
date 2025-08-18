<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>

<body>
    <form action="form_vaildation.php" method="POST">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="age" placeholder="Age">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <!--<label>Gender:</label>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label>
        <label for="newsletter">Subscribe to our newsletter:</label>
        <input type="checkbox" id="newsletter" name="newsletter">
        <label for="country">Country:</label>
        <select id="country" name="country">
            <option value="usa">United States</option>
            <option value="canada">Canada</option>
            <option value="uk">United Kingdom</option>
            <option value="MY">Malaysia</option>
            <option value="IN">Indonesia</option>
        </select>-->
        <input type="submit" value="Submit">
        <!--<button type="sumbit">Sumbit</button>-->
    </form>
</body>

</html>