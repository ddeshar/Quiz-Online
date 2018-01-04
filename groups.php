<?php include './include/_header.php'; ?>
  <section class="content-section bg-primary text-white text-center" id="services">
    <div class="container">
      <div class="content-section-heading">
        <h3 class="text-secondary mb-0">Almuni Quiz</h3>
        <h2 class="mb-5">Select Groups</h2>
      </div>
      <div class="row">
        <?php
          $group = "SELECT questions.`group` FROM questions GROUP BY questions.`group`";
          $result = mysqli_query($conn, $group);
            while ($row = mysqli_fetch_array($result)){
              $group = $row["group"];
        ?>
        <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
        <a href="categories.php?id=<?=$group?>">
          <span class="service-icon rounded-circle mx-auto mb-3">
            <i class="icon-pencil"></i>
          </span>
          </a>
          <h4>
            <strong>Group <?=$group?></strong>
          </h4>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>
<?php include './include/_footer.php'; ?>
