<?php require "simple_header.php"; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $title = $_REQUEST["title"];
  $short_content = $_REQUEST["short_content"];
  $long_content = $_REQUEST["long_content"];

  $insertQuery = "INSERT INTO posts (title, short_content, long_content) VALUES (:title, :short_content, :long_content)";
  $insertStatement = $db->prepare($insertQuery);
  $insertStatement->execute(
    array(
      ':title' => $title,
      ':short_content' => $short_content,
      ':long_content' => $long_content
    )
  );
  header('Location: manage-posts.php');
}
?>
<div class="container mx-auto my-5" style="max-width: 700px;">
  <div class="d-flex justify-content-between align-items-center mb-2">
    <h1 class="h1">Add New Post</h1>
  </div>
  <div class="card mb-2 p-4">
    <form method="POST">
      <div class="mb-3">
        <label for="post-title" class="form-label">Title</label>
        <input type="text" class="form-control" id="post-title" name="title" />
      </div>
      <div class="mb-3">
        <label for="post-content" class="form-label">Short Content</label>
        <input
          class="form-control"
          id="post-content"
          name="short_content"></input>
      </div>
      <div class="mb-3">
        <label for="post-content" class="form-label">Content</label>
        <textarea
          class="form-control"
          id="post-content"
          name="long_content"
          rows="10"></textarea>
      </div>
      <div class="text-end">
        <button type="submit" class="btn btn-primary">Add</button>
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
<?php require 'simple_footer.php';
