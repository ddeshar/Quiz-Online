<?php include './include/_header.php'; ?>
  <section class="content-section bg-primary text-white text-center" id="services">
    <div class="container">
      <div class="content-section-heading">
        <h3 class="text-secondary mb-0">Almuni Quiz</h3>
        <h2 class="mb-5">Select Categories</h2>
      </div>
      <div class="row">
        <?php

          $getgroup = $_GET['id'];

          $group = "SELECT categories.category_id, categories.category_detail FROM categories";
          $result = mysqli_query($conn, $group);
            while ($row = mysqli_fetch_array($result)){
              $category_id = $row["category_id"];
              $category_detail = $row["category_detail"];
        ?>
        <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
        <a href="select.php?cat=<?=$category_id?>&group=<?=$getgroup?>">
          <span class="service-icon rounded-circle mx-auto mb-3">
            <i class="icon-pencil"></i>
          </span>
          </a>
          <h4>
            <strong><?=$category_detail?></strong>
          </h4>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>
<?php include './include/_footer.php'; ?>