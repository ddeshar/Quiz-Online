        <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">

          <div class="form-group">
            <label class="control-label col-md-3">Firstname :</label>
            <div class="col-md-8">
              <input class="form-control" name="firstname" value="<?php echo "$firstname"; ?>" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Lastname :</label>
            <div class="col-md-8">
              <input class="form-control" name="lastname" value="<?php echo "$lastname"; ?>" type="text">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3">Username :</label>
            <div class="col-md-8">
              <input class="form-control" name="username" value="<?php echo "$username"; ?>" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Password :</label>
            <div class="col-md-8">
              <input class="form-control col-md-8" name="password" type="password">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">E-mail :</label>
            <div class="col-md-8">
              <input class="form-control" name="email" value="<?php echo "$email"; ?>" type="email">
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label" for="select">Status</label>
            <div class="col-lg-8">
              <select class="form-control" name="status" id="select">
                <option value="<?=$status?>" ><?php
                  if ($status == 500) {
                    echo "admin";
                  }else if ($status == 100) {
                    echo "member";
                  }else if ($status == 0) {
                    echo "user";
                  }
                ?></option>
                <option value="0" >user</option>
                <option value="100" >member</option>
                <option value="500" >admin</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3">Avatar :</label>
            <div class="col-md-8">
              <p>
                <img class="thumbnail img-preview" src="assets/images/users/<?php echo $avatar; ?>" height="auto" width="150" />
                <!-- <img class="thumbnail img-preview" src="#" title="" width="100%" height="auto"> -->
              </p>
              <input class="form-control" name="avatar" value="<?php echo "$avatar"; ?>" type="file" accept="image/*" id="logo-id">
            </div>
          </div>

          <div class="card-footer">
            <div class="row">
              <div class="col-md-8 col-md-offset-3">
                <input name="pid" type="hidden" value="<?php echo "$pid"; ?>" />
                <button class="btn btn-primary icon-btn" type="submit" name="btnEdit" value="แก้ไขสินค้า"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Product</button>
              </div>
            </div>
          </div>

        </form>