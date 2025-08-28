<?php require "simple_header.php";

$id = $_REQUEST['id'];

$db = new PDO("mysql:host=localhost;dbname=simple_cms", "root");
$Selectquery = "SELECT * FROM posts WHERE id = :id";
$result = $db->prepare($Selectquery);
$result->execute(array(
  ':id' => $id
));
$posts = $result->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_REQUEST["title"];
  $short_content = $_REQUEST["short_content"];
  $long_content = $_REQUEST["long_content"];
  $status = $_REQUEST["status"];

  $update = "UPDATE posts SET title = :title, short_content = :short_content , long_content = :long_content, status = :status WHERE id = :id";
  $statement = $db->prepare($update);
  $statement->execute(array(
    ':title' => $title,
    ':short_content' => $short_content,
    ':long_content' => $long_content,
    ':status' => $status,
    ':id' => $id
  ));
  header("Location: manage-posts.php");
}
?>
<div class="container mx-auto my-5" style="max-width: 700px;">
  <div class="d-flex justify-content-between align-items-center mb-2">
    <h1 class="h1">Edit Post</h1>
  </div>
  <div class="card mb-2 p-4">
    <form method="POST">
      <input type="hidden" name="id" value=<?= $posts['id'] ?>>
      <div class="mb-3">
        <label for="post-title" class="form-label">Title</label>
        <input
          type="text"
          class="form-control"
          id="post-title"
          name="title"
          value="<?= $posts['title'] ?>" />
      </div>
      <div class="mb-3">
        <label for="post-content" class="form-label">Short Content</label>
        <input class="form-control" id="post-content" name="short_content" value="<?= $posts['short_content'] ?>">
        </input>
      </div>
      <div class="mb-3">
        <label for="post-content" class="form-label">Content</label>
        <textarea class="form-control" id="post-content" rows="10" name="long_content" ><?= $posts['long_content']?></textarea>
      </div>
      <div class="mb-3">
        <label for="post-content" class="form-label">Status</label>
        <select class="form-control" id="post-status" name="status" value="<?= $posts['status'] ?>">
          <option value="0">Pending for Review</option>
          <option value="1">Publish</option>
        </select>
      </div>
      <div class="text-end">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
  </div>
  <div class="text-center">
    <a href="manage-posts.php" class="btn btn-link btn-sm"><i class="bi bi-arrow-left"></i> Back to Posts</a>
  </div>
</div>

<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
  crossorigin="anonymous"></script>
</body>

</html>
<?php require 'simple_footer.php';
