<?php
  require_once 'include/permission/admin.php';
  // Form Submit
  if (isset($_POST["btnEdit"])) {
    $qid = $_POST["qid"];
    $question           = $_POST["question"];
    $answer             = $_POST["answer"];
    $status             = $_POST["status"];
    $group              = $_POST["group"];
    $file               = $_POST["file"];
    $file_status        = $_POST["file_status"];
    $category_question  = $_POST["category_question"];

    $sql = "UPDATE `php_quiz`.`questions` SET `question` = '$question', `answer` = '$answer', `status` = '$status ', `group` = '$group', `file` = '$file', `file_status` = '$file_status', `category_question` = '$category_question' WHERE `questions`.`question_id` = '$qid'";
    //echo $sql;exit;
    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo "<script type='text/javascript'>";
      echo "alert('Edited success');";
      echo "window.location='questions.php';";
      echo "</script>";
    }else{
      echo "<font color='red'>SQL Error</font><hr>";
    }
  }else{
    $ques_id = $_GET["id"];
    $sql = "SELECT * FROM questions
            INNER JOIN categories ON questions.category_question = categories.category_id
            WHERE questions.question_id = '$ques_id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);
      $qid                = $row["question_id"];
      $question           = $row["question"];
      $answer             = $row["answer"];
      $status             = $row["status"];
      $group              = $row["group"];
      $file               = $row["file"];
      $file_status        = $row["file_status"];
      $category_question  = $row["category_question"];
    }else{
      $qid                = "";
      $question           = "";
      $answer             = "";
      $status             = "";
      $group              = "";
      $file               = "";
      $file_status        = "";
      $category_question  = "";
    }
  }
?>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <h3 class="card-title">Edit Category</h3>
      <div class="card-body">
        
        <?php include '_form.php'; ?>

      </div>
    </div>
  </div>
</div>
