<?php 
  include './include/_header.php';
  $question=$_GET['question'];
  $cat=$_GET['cat'];
  $group=$_GET['group'];
  $qid = '';

  $sql = "SELECT * FROM questions
          WHERE questions.`group` = '$group'
          AND questions.category_question = '$cat'
          AND questions.`status` = '1'
          AND questions.file = '1'
          ORDER BY rand()
          LIMIT 5 ";

  $result = mysqli_query($conn, $sql);
  $first = 0;
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $post[] = $row;
      if($first != 0) {
        $qid .= ',\'' . $row['question_id'] . '\'';
      } else {
        $qid .= "'" . $row['question_id'] . "'";
      }
      $first++;
    }
  } else {
    $question = "No question Availabel";
  }
?>

  <section class="callout">
    <div class="container text-center">
      <h3 class="mx-auto mb-5">
        <?php 
          if (mysqli_num_rows($result) > 0) {
            foreach ($post as $rowaa){ 
                echo $rowaa["question"] ."<hr>";
              $query = http_build_query(array('myArray' => $rowaa));
              $url=urlencode($query); 
            }
        ?>
      </h3>
    
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-xl" data-toggle="modal" data-target="#exampleModal">
      Answer
    </button>
    <?php } else {?>
      <h1 class="btn btn-danger btn-xl"> Sorry! All question has finished</h1>
    <?php }?>
    
    </div>
  </section>

<?php include './include/_footer.php'; ?>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

      <!-- Modal content-->
      <br>
      <br>
      <br>
      <br>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Correct Answer Is</h5>

      </div>
      <div class="modal-body">
        <h3>
          <?php 
            foreach ($post as $rowa){ 
              echo $rowa["answer"] ."<hr>";
            }
          ?>
        </h3>
      </div>
      <div class="modal-footer">
      <?php echo "<a href=\"rapid.php?cat=".$cat."&group=" . $group . "&qid=" . $qid ."\" class=\"btn btn-danger btn-lg\"> Send </a>"; ?>
      </div>
    </div>
  </div>
</div>