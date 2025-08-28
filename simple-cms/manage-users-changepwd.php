<?php require "simple_header.php";
$id = $_REQUEST['id'];

$db = new PDO("mysql:host=localhost;dbname=simple_cms", "root");
$Selectquery = "SELECT * FROM users WHERE id = :id";
$result = $db->prepare($Selectquery);
$result->execute(array(
  ':id' => $id
));
$user = $result->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $password = $_REQUEST["password"];
  $confirmPassword = $_REQUEST["confirm_password"];
  if ($password !== $confirmPassword) {
    echo "<h1>The password and confirm password does not match!</h1>";
    exit;
  } else {
    $update = "UPDATE users SET password = :password WHERE id = :id";
    $statement = $db->prepare($update);

    $result = $statement->execute(array(
      ':password' => $password,
      ':id' => $id
    ));
    header("Location: manage-users.php");
  }
}
?>
<div class="container mx-auto my-5" style="max-width: 700px;">
  <div class="d-flex justify-content-between align-items-center mb-2">
    <h1 class="h1">Change Password</h1>
  </div>
  <div class="card mb-2 p-4">
    <form method="POST">
      <input type="hidden" name="id" value="<?= $user['id'] ?>">
      <div class="mb-3">
        <div class="row">
          <div class="col">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" />
          </div>
          <div class="col">
            <label for="confirm-password" class="form-label">Confirm Password</label>
            <input
              type="password"
              class="form-control"
              id="confirm-password"
              name="confirm_password" />
          </div>
        </div>
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-primary">
          Change Password
        </button>
      </div>
    </form>
  </div>
  <div class="text-center">
    <a href="manage-users.php" class="btn btn-link btn-sm"><i class="bi bi-arrow-left"></i> Back to Users</a>
  </div>
</div>

<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
  crossorigin="anonymous"></script>
<?php require 'simple_footer.php';
