<?php require "simple_header.php";
$db = new PDO("mysql:host=localhost;dbname=simple_cms", "root");

$Selectquery = "SELECT * FROM posts;";
$result = $db->prepare($Selectquery);
$result->execute();
$posts = $result->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $id = $_REQUEST['id'];

  $deleteQuery = "DELETE FROM `posts` WHERE id = :id";
  $deleteStatement = $db->prepare($deleteQuery);
  $deleteStatement->execute(
    array(
      ":id" => $id
    )
  );
  header('Location: ' . $_SERVER['PHP_SELF']);
}

?>
<div class="container mx-auto my-5" style="max-width: 700px;">
  <div class="d-flex justify-content-between align-items-center mb-2">
    <h1 class="h1">Manage Posts</h1>
    <div class="text-end">
      <a href="manage-posts-add.php" class="btn btn-primary btn-sm">Add New Post</a>
    </div>
  </div>
  <div class="card mb-2 p-4">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col" style="width: 40%;">Title</th>
          <th scope="col">Status</th>
          <th scope="col" class="text-end">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($posts as $post): ?>
          <tr>
            <th scope="row"><?= $post['id']; ?></th>
            <td><?= $post['title']; ?></td>
            <td><?= $post['status'] == 0 ? '<span class="badge bg-warning">Pending Review</span>' : '<span class="badge bg-success">Publish</span>' ?></td>
            <td class="text-end">
              <div class="buttons">
                <a
                  href="post.php?id=<?php echo $post['id']; ?>"
                  target="_blank"
                  class="btn btn-primary btn-sm me-2 <?= $post['status'] == 0 ? 'disabled' : '' ?>"><i class="bi bi-eye"></i></a>
                <a
                  href="manage-posts-edit.php?id=<?php echo $post['id']; ?>"
                  class="btn btn-secondary btn-sm me-2"><i class="bi bi-pencil"></i></a>
                <form method='post' style='display: inline;'>
                  <input type='hidden' name='action' value='delete'>
                  <input type='hidden' name='id' value='<?= $post['id'] ?>'>
                  <button type='submit' class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                </form>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="text-center">
    <a href="dashboard.php" class="btn btn-link btn-sm"><i class="bi bi-arrow-left"></i> Back to Dashboard</a>
  </div>
</div>

<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
  crossorigin="anonymous"></script>
<?php require 'simple_footer.php';
