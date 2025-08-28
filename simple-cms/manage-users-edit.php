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
  $name = $_REQUEST["name"];
  $email = $_REQUEST["email"];
  $role = $_REQUEST["role"];

  $update = "UPDATE users SET name = :name, email = :email , role = :role WHERE id = :id";
  $statement = $db->prepare($update);
  $statement->execute(array(
    ':name' => $name,
    ':email' => $email,
    ':id' => $id,
    ':role' => $role
  ));
  header("Location: manage-users.php");
}
?>
<div class="container mx-auto my-5" style="max-width: 700px;">
  <div class="d-flex justify-content-between align-items-center mb-2">
    <h1 class="h1">Edit User</h1>
  </div>
  <div class="card mb-2 p-4">
    <form method="POST">
      <input type="hidden" name="id" value=<?= $user['id'] ?>>
      <div class="mb-3">
        <div class="row">
          <div class="col">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $user['name'] ?>" />
          </div>
          <div class="col">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email'] ?>" />
          </div>
        </div>
      </div>
      <div class="mb-3">
        <label for="role" class="form-label">Role</label>
        <select class="form-control" id="role" name="role">
          <option value="">Select an option</option>
          <option value="user">User</option>
          <option value="editor">Editor</option>
          <option value="admin">Admin</option>
        </select>
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Update</button>
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
