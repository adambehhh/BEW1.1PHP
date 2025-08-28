<?php require "simple_header.php"; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $name = $_REQUEST["name"];
  $email = $_REQUEST["email"];
  $password = $_REQUEST["password"];
  $role = $_REQUEST["role"];

  $insertQuery = "INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)";
  $insertStatement = $db->prepare($insertQuery);
  $insertStatement->execute(
    array(
      ':name' => $name,
      ':email' => $email,
      ':password' => $password,
      ':role' => $role
    )
  );
  header('Location: manage-users.php');
}
?>
<div class="container mx-auto my-5" style="max-width: 700px;">
  <div class="d-flex justify-content-between align-items-center mb-2">
    <h1 class="h1">Add New User</h1>
  </div>
  <div class="card mb-2 p-4">
    <form method="POST">
      <div class="mb-3">
        <div class="row">
          <div class="col">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" />
          </div>
          <div class="col">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" />
          </div>
        </div>
      </div>
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
              class="form-control" name="confirm_password"
              id="confirm-password" />
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
        <button type="submit" class="btn btn-primary">Add</button>
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
