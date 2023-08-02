<?php
  if (isset($_POST["btnsubmit"])) {
    $category_detail = $_POST["category_detail"];

    $sql = "INSERT INTO categories (category_detail) VALUES ('$category_detail')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
      echo "<script type='text/javascript'>";
      echo "alert('Added to databse');";
      echo "window.location='categories.php';";
      echo "</script>";
    }else{
      die("Query Failed" . mysqli_error($conn));
    }

  }
  $catname = "";

?>
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <h3 class="card-title">Add Category</h3>
      <div class="card-body">
        <?php include '_form.php'; ?>
      </div>
    </div>
  </div>
</div>
