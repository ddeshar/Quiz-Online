<?php
  if (isset($_POST["btnsubmit"])) {

    $question_id        = $_POST["question_id"];
    $question           = $_POST["question"];
    $answer             = $_POST["answer"];
    $status             = $_POST["status"];
    $group              = $_POST["group"];
    $file               = $_POST["file"];
    $file_status        = $_POST["file_status"];
    $category_question  = $_POST["category_question"];

    $sql = "INSERT INTO `php_quiz`.`questions` (`question`, `answer`, `status`, `group`, `file`, `file_status`, `category_question`) VALUES ('$question', '$answer', '$status', '$group', '$file', '$file_status', '$category_question')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
      echo "<script type='text/javascript'>";
      echo "alert('Added to database');";
      echo "window.location='questions.php';";
      echo "</script>";
    }else{
      die("Query Failed" . mysqli_error($conn));
    }
  }
?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <h3 class="card-title">Add Category</h3>
      <div class="card-body">
        <?php include '_form.php'; ?>
      </div>
    </div>
  </div>
</div>
