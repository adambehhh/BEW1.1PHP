<?php require "header.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $password = $_REQUEST["password"];
    $confirmPassword = $_REQUEST["confirm_password"];

    if ($password !== $confirmPassword) {
        echo "<h1>The password and confirm password does not match!</h1>";
        exit;
    }

    $db = new PDO("mysql:host=localhost;dbname=phppdo", "root");


    //$query = $db->query('SELECT * FROM user');
    $insert = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
    $statement = $db->prepare($insert);

    $result = $statement->execute(array(
        ':name' => $name,
        ':email' => $email,
        ':password' => $password,
    ));

    if ($result == true) {
        echo "<h1>User has been added to the DB!</h1>";
    }
}
?>
<form method="POST" action="user_signup.php">
    <div class="container_fluid bg-light d-flex justify-content-center align-content-center flex-column vh-100">
        <div class="container bg-white rounded shadow-sm">
            <h1 class="text-center">Sign Up A New Account</h1>
            <hr />
            <div class="mt-2 mb-2">
                <label for="name" class="visually-hidden">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required />
            </div>
            <div class="mb-2">
                <label for="email_address" class="visually-hidden">Email address</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email address" required />
            </div>
            <div class="mb-2">
                <label for="password" class="visually-hidden">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required />
            </div>
            <div class="mb-2">
                <label for="confirm_password" class="visually-hidden">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required />
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Sign up</button>
            </div>
        </div>
    </div>
</form>
<?php require 'footer.php';
