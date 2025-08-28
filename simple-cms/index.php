<?php require "simple_header.php";

$db = new PDO("mysql:host=localhost;dbname=simple_cms", "root");

$Selectquery = "SELECT * FROM posts;";
$result = $db->prepare($Selectquery);
$result->execute();
$posts = $result->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="container mx-auto my-5" style="max-width: 500px;">
  <h1 class="h1 mb-4 text-center">My Blog</h1>
  <?php foreach ($posts as $post): ?>
    <div class="card mb-2">
      <div class="card-body">
        <h5 class="card-title"><?= $post['title'] ?></h5>
        <p class="card-text"><?= $post['short_content'] ?></p>
        <div class="text-end">
          <a href="post.php?id=<?php echo $post['id']; ?>" class="btn btn-primary btn-sm">Read More</a>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  <div class="mt-4 d-flex justify-content-center gap-3">
    <a href="login.php" class="btn btn-link btn-sm">Login</a>
    <a href="signup.php" class="btn btn-link btn-sm">Sign Up</a>
  </div>
</div>

<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
  crossorigin="anonymous"></script>
<?php require 'simple_footer.php';
