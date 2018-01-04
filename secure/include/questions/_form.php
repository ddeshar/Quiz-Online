<form action="" method="post" class="form-horizontal"  enctype="multipart/form-data">

  <div class="form-group">
    <label class="control-label col-md-1">Question</label>
    <div class="col-md-10">
      <input class="form-control" name="question" type="text" value="<?=$question?>">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-md-1">Answer</label>
    <div class="col-md-10">
      <input class="form-control" name="answer" type="text" value="<?=$answer?>">
    </div>
  </div>

  <div class="form-group">
    <label class="col-lg-1 control-label" for="select">category</label>
    <div class="col-lg-10">
      <select class="form-control" name="category_question" id="select">
        <?php
          $cat = "SELECT * FROM categories";
          $res_cat = mysqli_query($conn, $cat);
          while ($row = mysqli_fetch_assoc($res_cat)) { 
              if ($category_question == $row['category_id']) {
                echo '<option value="'.$row['category_id'].'" selected>'.$row['category_detail'].'</option>';
              }else {
                echo '<option value="'.$row['category_id'].'">'.$row['category_detail'].'</option>';
              }
          } ?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label class="col-lg-1 control-label" for="select">Group</label>
    <div class="col-lg-10">
      <select class="form-control" name="group" id="select">
        <option value="<?=$group?>" selected><?=$group?></option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
        <option value="E">E</option>
        <option value="F">F</option>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label class="col-lg-1 control-label" for="select">status</label>
    <div class="col-lg-10">
      <select class="form-control" name="status" id="select">
        <option value="<?=$status?>" selected><?=$status_array[$status]?></option>        
        <option value="0">Un-published</option>
        <option value="1">Published</option>
      </select>
    </div>
  </div>

  <?php if ( $source == "add") { ?>
    <div class="card-footer">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <button class="btn btn-primary icon-btn" type="submit" name="btnsubmit" value="send"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Category</button>
        </div>
      </div>
    </div>
  <?php } else { ?> 
    <div class="card-footer">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <input name="qid" type="hidden" value="<?=$qid?>" />
          <button class="btn btn-primary icon-btn" type="submit" name="btnEdit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Edit Category</button>
        </div>
      </div>
    </div>
  <?php } ?>
</form>