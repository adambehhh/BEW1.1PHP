<?php require "simple_header.php"; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_REQUEST["email"];
    $password = $_REQUEST["password"];
    
    try {
        $db = new PDO("mysql:host=localhost;dbname=simple_cms", "root");
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
            header("Location: dashboard.php");
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
<div class="container my-5 mx-auto" style="max-width: 500px;">
  <h1 class="h1 mb-4 text-center">Login</h1>

  <div class="card p-4">
    <form method="POST" >
      <div class="mb-2">
        <label for="email" class="visually-hidden">Email</label>
        <input
          type="text"
          class="form-control"
          id="email"
          placeholder="email@example.com" 
          name="email"/>

      </div>
      <div class="mb-2">
        <label for="password" class="visually-hidden">Password</label>
        <input
          type="password"
          class="form-control"
          id="password"
          placeholder="Password" 
          name="password"/>
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
    </form>
  </div>

  <!-- links -->
  <div
    class="d-flex justify-content-between align-items-center gap-3 mx-auto pt-3">
    <a href="index.php" class="text-decoration-none small"><i class="bi bi-arrow-left-circle"></i> Go back</a>
    <a href="signup.php" class="text-decoration-none small">Don't have an account? Sign up here
      <i class="bi bi-arrow-right-circle"></i></a>
  </div>
</div>

<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
  crossorigin="anonymous"></script>
<?php require 'simple_footer.php';
