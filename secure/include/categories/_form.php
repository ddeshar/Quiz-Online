<form action="" method="post" class="form-horizontal">
  <div class="form-group">
    <label class="control-label col-md-3">Category Name</label>
    <div class="col-md-8">
      <input class="form-control" name="category_detail" type="text" value="<?=$catname?>">
    </div>
  </div>


  <?php if ( $source == "add") { ?>
    <div class="card-footer">
      <div class="row">
        <div class="col-md-8 col-md-offset-3">
          <button class="btn btn-primary icon-btn" type="submit" name="btnsubmit" value="send"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Category</button>
        </div>
      </div>
    </div>
  <?php } else { ?> 
    <div class="card-footer">
      <div class="row">
        <div class="col-md-8 col-md-offset-3">
          <input name="cid" type="hidden" value="<?=$pid?>" />
          <button class="btn btn-primary icon-btn" type="submit" name="btnEdit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Edit Category</button>
        </div>
      </div>
    </div>
  <?php } ?>
</form>