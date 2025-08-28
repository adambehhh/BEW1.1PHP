<?php require "simple_header.php";

$id = $_REQUEST['id'];

$db = new PDO("mysql:host=localhost;dbname=simple_cms", "root");
$Selectquery = "SELECT * FROM posts WHERE id = :id";
$result = $db->prepare($Selectquery);
$result->execute(array(
  ':id' => $id
));
$posts = $result->fetch(PDO::FETCH_ASSOC);
?>
<div class="container mx-auto my-5" style="max-width: 500px;">
  <h1 class="h1 mb-4 text-center"><?= $posts['title'] ?></h1>
  <p>
    <?= $posts['long_content']?>
  </p>
  <div class="text-center mt-3">
    <a href="index.php" class="btn btn-link btn-sm"><i class="bi bi-arrow-left"></i> Back</a>
  </div>
</div>

<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
  crossorigin="anonymous"></script>
<?php require 'simple_footer.php';
