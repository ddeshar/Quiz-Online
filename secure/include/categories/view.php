<div class="page-title">
  <div>
    <h1>Categories</h1>
    <ul class="breadcrumb side">
      <li><i class="fa fa-home fa-lg"></i></li>
      <li class="active"><a href="#">Categories</a></li>
    </ul>
  </div>
  <div>
    <a class="btn btn-primary btn-flat" href="categories.php?source=add"><i class="fa fa-lg fa-plus"></i></a>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
      <?php

        if (isset($_GET["id"])) {
          $cat_id = $_GET["id"];
          $del = "DELETE FROM categories WHERE category_id='$cat_id'";
          $res = mysqli_query($conn, $del);
        }

        $sql = "SELECT * FROM `categories`";
        $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
      ?>
        <table class="table table-hover table-bordered" id="sampleTable">
          <thead>
            <tr>
              <th>รหัสสินค้า</th>
							<th>ชื่อสินค้า</th>
							<th>แก้ไข</th>
							<th>ลบ</th>
            </tr>
          </thead>
          <tbody>
            <?php
                while ($row = mysqli_fetch_array($result)){
                  $category_id = $row["category_id"];
                  $category_detail = $row["category_detail"];

                  echo "<tr>
                      <td>$category_id</td>
                      <td>$category_detail</td>
                      <td><a href='categories.php?source=edit&id=$category_id'>EDIT</a></td>
                      <td><a href='categories.php?id=$category_id' onclick='return confirm(\"Are you sure want to delete?\");'>DELETE</a></td>
                    </tr>";
                }
						?>
          </tbody>
        </table>
        <?php 
          } else {
            echo "NO DATA YET";
          }

            mysqli_close($conn);
        ?>
      </div>
    </div>
  </div>
</div>
