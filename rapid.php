<?php include './include/_header.php';
  $cat = $_GET['cat'];
  $group = $_GET['group'];
  $rapid = $_GET['rapid'];
  $qid   = $_GET['qid'];

  if(isset($qid)){
    $update = "UPDATE `php_quiz`.`questions` SET `file` = '0' 
               WHERE `questions`.`category_question` = '$cat'
               AND `questions`.`question_id` in ($qid)";
    $results = mysqli_query($conn, $update);
  }

  $sql = "SELECT * FROM questions
          INNER JOIN categories ON questions.category_question = categories.category_id
          WHERE questions.`group` = '$group'
          AND questions.category_question = '$cat'
          AND questions.`status` = '1'
          ORDER BY question_id ASC";

  $questions = mysqli_query($conn, $sql);
?>

    <!-- Call to Action -->
    <section class="content-section bg-primary text-white">
      <div class="container text-center">
        <h2 class="mb-4">Select Question Number</h2>
          <?php if (mysqli_num_rows($questions) > 0) { 
            $a=1;
            $x = 1; 
            echo "<p>";
            while ($row_ques = mysqli_fetch_array($questions)) {
              $quesid = $row_ques['question_id'];

                  while($x <= 7) {
                  echo  "<a href=\"rquestion.php?question=$quesid&cat=$cat&group=$group\" class=\"btn btn-sq-lg btn-warning\">
                          <i class=\"fa fa-book fa-5x\"></i><br/>
                          Question No <br>$x
                        </a>";
                    $x++;
                  }

                }$a++;
                
                echo "</p>";
              } else {
            echo "<a href=\"#\" class=\"btn btn-xl btn-dark\">Sorry! No Question Left</a>";
          }
            mysqli_close($conn);
        ?>
      </div>
    </section>

<?php include './include/_footer.php'; ?>
