<?php
  require_once 'include/permission/admin.php';
  // Form Submit
  if (isset($_POST["btnEdit"])) {
    $cid = $_POST["cid"];
    $catname = $_POST["category_detail"];

    $sql = "UPDATE categories SET category_detail='$catname' WHERE category_id='$cid'";
    //echo $sql;exit;
    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo "<script type='text/javascript'>";
      echo "alert('Edited success');";
      echo "window.location='categories.php';";
      echo "</script>";
    }else{
      echo "<font color='red'>SQL Error</font><hr>";
    }
  }else{
    $cat_id = $_GET["id"];
    $sql = "SELECT * FROM categories WHERE category_id='$cat_id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);
      $pid = $row["category_id"];
      $catname = $row["category_detail"];
    }else{
      $pid = "";
      $catname = "";
    }
  }
?>

<div class="row">
  <div class="col-md-8">
    <div class="card">
      <h3 class="card-title">Edit Category</h3>
      <div class="card-body">
        
        <?php include '_form.php'; ?>

      </div>
    </div>
  </div>
</div>
