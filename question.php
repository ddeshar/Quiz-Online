<?php include './include/_header.php';
$question=$_GET['question'];
$cat=$_GET['cat'];
$group=$_GET['group'];

  $sql = "SELECT questions.question, questions.answer FROM questions WHERE questions.question_id = '$question'";
  $res_news = mysqli_query($conn, $sql);
  $row_news = mysqli_fetch_assoc($res_news);
?>

  <section class="callout">
    <div class="container text-center">
      <h1 class="mx-auto mb-5"><?=$row_news['question']?></h1>
    
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-xl" data-toggle="modal" data-target="#exampleModal">
      Answer
    </button>
    
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
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
        <h1><?=$row_news['answer']?></h1>      
      </div>
      <div class="modal-footer">
        <button  onclick="location.href='select.php?cat=<?=$cat?>&group=<?=$group?>'" type="button" class="btn btn-danger btn-lg" data-dismiss="modal">NEXT</button>
      </div>
    </div>
  </div>
</div>