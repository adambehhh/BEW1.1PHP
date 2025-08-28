<?php
require './db_conn.php';
require './todos/add_todo.php';

$db = new PDO("mysql:host=localhost;dbname=to_do_sql", "root");
$query = "SELECT * FROM todos;";
$statement = $db->prepare($query);
$statement->execute();

$result = $statement->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $action = $_REQUEST['action'];
  if ($action == "add") {
    $label = $_REQUEST['label'];

    $insertQuery = "INSERT INTO todos (label) VALUES (:label)";
    $insertStatement = $db->prepare($insertQuery);
    $insertStatement->execute(
      array(
        "label" => $label
      )
    );
    header('Location: ' . $_SERVER['PHP_SELF']);
  }

  if ($action == "update") {
    $id = $_REQUEST['id'];
    $completed = $_REQUEST["completed"];
    $flipCompleted = $completed ? 0 : 1;

    $updateQuery = "UPDATE todos SET completed = :completed WHERE id = :id";
    $updateStatement = $db->prepare($updateQuery);
    $updateStatement->execute(
      array(
        ":completed" => $flipCompleted,
        ":id" => $id
      )
    );
    header('Location: ' . $_SERVER['PHP_SELF']);
  }

  if ($action == "delete") {
    $id = $_REQUEST['id'];

    $deleteQuery = "DELETE FROM `todos` WHERE id = :id";
    $deleteStatement = $db->prepare($deleteQuery);
    $deleteStatement->execute(
      array(
        ":id" => $id
      )
    );
    header('Location: ' . $_SERVER['PHP_SELF']);
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TODO App</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
    crossorigin="anonymous" />
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />
  <style type="text/css">
    body {
      background: #f1f1f1;
    }
  </style>
</head>

<body>
  <div
    class="card rounded shadow-sm"
    style="max-width: 500px; margin: 60px auto;">
    <div class="card-body">
      <h3 class="card-title mb-3">My Todo List</h3>
      <ul class="list-group">
        <?php
        foreach ($result as $task) {
          if ($task['completed']) {
            echo "<li
          class='list-group-item d-flex justify-content-between align-items-center'>
          <div>
          <form method='post' style='display: inline;''>
          <input type = 'hidden' name = 'action' value = 'update'>
          <input type='hidden' name='id' value='" . $task['id'] . "'>
          <input type='hidden' name='completed' value='" . $task['completed'] . "'>
          <button class='btn btn-sm btn-success' type='submit'>
              <i class='bi bi-check-square'></i>
            </button>
          </form>
            <span class='ms-2 text-decoration-line-through'>" . $task['label'] . "</span>
          </div>
          <div>
          <form method='post' style='display: inline;''>
          <input type = 'hidden' name = 'action' value = 'delete'>
          <input type='hidden' name='id' value='" . $task['id'] . "'>
            <button class='btn btn-sm btn-danger'>
              <i class='bi bi-trash'></i>
            </button>
            </form>
          </div>
        </li>";
          } else {
            echo "<li
          class='list-group-item d-flex justify-content-between align-items-center'>
          <div>
           <form method='post' style='display: inline;'>
            <input type='hidden' name='action' value='update'>
            <input type='hidden' name='id' value='" . $task['id'] . "'>
            <input type='hidden' name='completed' value='" . $task['completed'] . "'>
            <button class='btn btn-sm' type='sumbit'>
              <i class='bi bi-square'></i>
            </button>
          </form>
            <span class='ms-2'>" . $task['label'] . "</span>
          </div>
          <div>
          <form method='post' style='display: inline;''>
          <input type = 'hidden' name = 'action' value = 'delete'>
          <input type='hidden' name='id' value='" . $task['id'] . "'>
            <button class='btn btn-sm btn-danger'>
              <i class='bi bi-trash'></i>
            </button>
            </form>
          </div>
        </li>";
          }
        }
        ?>

        <div class="mt-4">
          <form class="d-flex justify-content-between align-items-center" method="POST">
            <input type="hidden" name="action" value="add">
            <input
              type="text"
              class="form-control"
              placeholder="Add new item..."
              name="label"
              required />
            <button class="btn btn-primary btn-sm rounded ms-2">Add</button>
          </form>
        </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // const checkButtons = document.getElementsByClassName('btn-sm')
    // for (let i = 0; i < checkButtons.length; i++) {
    //   checkButtons[i].onclick = function(e) {
    //     // console.log("Clicked event: ", e.target)
    //     // console.log("Clicked event classes: ", e.target.className)
    //     // console.log("Clicked event class list: ", e.target.classList)
    //     // console.log("Clicked event class - to be changed: ", e.target.classList[1])

    //     if (e.target.classList[1] == "bi-square") {
    //       e.target.classList[1] = "bi-check-square";
    //     }
    //   }
    // }
  </script>
  <p class="text-center"><a href="user_logout.php?logout=true">Logout</a></p>
</body>

</html>
<?php
// session_start();

// if (!isset($_SESSION["username"])) {
// header("Location: user_login.html");
// }

// 
?>