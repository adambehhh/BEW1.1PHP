<?php require "header.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_REQUEST["email"];
    $password = $_REQUEST["password"];


    try {
        $db = new PDO("mysql:host=localhost;dbname=phppdo", "root");
        $query = "SELECT * FROM users WHERE email = :email";
        $statement = $db->prepare($query);
        $statement->execute(array(
            ':email' => $email
        ));

        $result = $statement->fetch(PDO::FETCH_ASSOC);
        print_r($result);
        // This is the code for retrieving from DB

        // This is to check if username has many matches
        if ($result === false) {
            echo "<h1>The username does not exist</h1>";
            exit;
        }

        // This is to check if password matches the user's password
        if ($password == $result["password"]) {
            echo "<br><h1>The user is authenticated</h1>";
            $_SESSION["email"] = $email;
            $_SESSION["name"] = $result["name"];
            header("Location: todo.php");
            exit();
        } else {
            echo "<br><h1>The user is not authenticated</h1>";
            exit;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    // if ($username == "admin" && $password == "password123") {
    // $_SESSION["username"] = $username;
    // setcookie("username", $username, time() + (24 * 60 * 60 * 7));
    // }
    // header("Location: dashboard.php");
    // exit();
    // }
    // header("Location: login.html");
    // }
}
?>
<form action="user_login.php" method="post">
    <div class="container-fluid bg-light d-flex justify-content-center align-content-center flex-column vh-100">
        <div class="container bg-white rounded shadow-sm w-50 ">
            <div class="row d-flex justify-content-center">
                <h1 class="card-title mb-3 text-center">Login To Your Account</h1>
                <hr />
                <div class="mt-2 mb-2">Email address <br /><input type="text" name="email" /></div>
                <div class="mt-2 mb-2">Password <br /><input type="password" name="password" /></div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <i class="bi bi-arrow-left-circle"><a href="user.html">Go Back</a></i>
            </div>
        </div>
    </div>
</form>
<?php require 'footer.php';
