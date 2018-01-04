<div class="page-title">
  <div>
    <h1>Question Bank</h1>
    <ul class="breadcrumb side">
      <li><i class="fa fa-home fa-lg"></i></li>
      <li class="active"><a href="#">Question Bank</a></li>
    </ul>
  </div>
  <div>
    <a class="btn btn-primary btn-flat" href="questions.php?source=add"><i class="fa fa-lg fa-plus"></i></a>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
      <?php

        if (isset($_GET["id"])) {
          $ques_id = $_GET["id"];
          $del = "DELETE FROM questions WHERE question_id='$ques_id'";
          $res = mysqli_query($conn, $del);
        }

        $sql = "SELECT * FROM questions
                INNER JOIN categories ON questions.category_question = categories.category_id";
        $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
      ?>
        <table class="table table-hover table-bordered" id="sampleTable">
          <thead>
            <tr>
              <th>ID</th>
							<th>question</th>
							<th>answer</th>
							<th>group</th>
							<th>status</th>
							<th>Category</th>
							<th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
                while ($row = mysqli_fetch_array($result)){
                  $qid                = $row["question_id"];
                  $question           = $row["question"];
                  $answer             = $row["answer"];
                  $status             = $row["status"];
                  $group              = $row["group"];
                  $file               = $row["file"];
                  $file_status        = $row["file_status"];
                  $category_question  = $row["category_question"];
                  $category_detail    = $row["category_detail"];

                  echo "<tr>
                      <td>";echo $i++; echo" </td>
                      <td>$question</td>
                      <td>$answer</td>
                      <td>$group</td>
                      <td>$status_array[$status]</td>
                      <td>$category_detail</td>
                      <td><a href='questions.php?source=edit&id=$qid'>EDIT</a> | <a href='questions.php?id=$qid' onclick='return confirm(\"Are you sure want to delete?\");'>DELETE</a></td>
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
