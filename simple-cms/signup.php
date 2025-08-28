<?php require "simple_header.php"; ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $password = $_REQUEST["password"];
    $confirmPassword = $_REQUEST["confirm_password"];

    if ($password !== $confirmPassword) {
        echo "<h1>The password and confirm password does not match!</h1>";
        exit;
    } else {
        $insert = "INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)";
        $statement = $db->prepare($insert);

        $result = $statement->execute(array(
            ':name' => $name,
            ':email' => $email,
            ':password' => $password,
        ));
    }



    //$query = $db->query('SELECT * FROM user');


    if ($result == true) {
        echo "<h1>User has been added to the DB!</h1>";
    }
}
?>
<div class="container my-5 mx-auto" style="max-width: 500px;">
    <h1 class="h1 mb-4 text-center">Sign Up a New Account</h1>

    <div class="card p-4">
        <form method="POST" action="dashboard.php">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required/>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required/>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input
                    type="password"
                    class="form-control"
                    id="password"
                    name="password" />
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input
                    type="password"
                    class="form-control"
                    id="confirm_password"
                    name="confirm_password" />
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-fu">
                    Sign Up
                </button>
            </div>
        </form>
    </div>

    <!-- links -->
    <div
        class="d-flex justify-content-between align-items-center gap-3 mx-auto pt-3">
        <a href="index.php" class="text-decoration-none small"><i class="bi bi-arrow-left-circle"></i> Go back</a>
        <a href="login.php" class="text-decoration-none small">Already have an account? Login here
            <i class="bi bi-arrow-right-circle"></i></a>
    </div>
</div>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
<?php require 'simple_footer.php';
