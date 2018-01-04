<?php
$page = 'dashboard';
$title = 'Dashboard';
$css = <<<EOT
    <!--page level css -->
    <!--end of page level css-->
EOT;
  include 'include/_header.php';
  include 'include/_navbar.php';
  include 'include/_menuleft.php';
?>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
            <p>Wame On Code production</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Blank Page</a></li>
            </ul>
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            <div class="widget-small primary"><i class="icon fa fa-users fa-3x"></i>
              <div class="info">
                <?php
                  $tb_login = "SELECT COUNT(*) FROM tbl_users";
                  $res_tb_login = mysqli_query($conn,$tb_login);
                  $row_tb_login = mysqli_fetch_row($res_tb_login);
                ?>
                <h4>Users</h4>
                <p><b><?php echo $row_tb_login[0]; ?></b></p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="widget-small info"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
              <div class="info">
                <?php
                  $tbnewstype = "SELECT COUNT(*) FROM categories";
                  $res_tbnewstype = mysqli_query($conn,$tbnewstype);
                  $row_tbnewstype = mysqli_fetch_row($res_tbnewstype);
                ?>
                <h4>Category</h4>
                <p><b><?php echo $row_tbnewstype[0]; ?></b></p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="widget-small warning"><i class="icon fa fa-files-o fa-3x"></i>
              <div class="info">
                <?php
                  $member = "SELECT COUNT(*) FROM questions";
                  $res_mem = mysqli_query($conn,$member);
                  $row_mem = mysqli_fetch_row($res_mem);

                ?>
                <h4>Questions</h4>
                <p><b><?php echo $row_mem[0]; ?></b></p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
              <div class="widget-small danger"><i class="icon fa fa-star fa-3x"></i>
                <div class="info">
                    <?php
                      $tbnews = "SELECT COUNT(*) FROM questions WHERE status='1'";
                      $res_tbnews = mysqli_query($conn,$tbnews);
                      $row_tbnews = mysqli_fetch_row($res_tbnews);
                    ?>
                  <h4>Published Question</h4>
                  <p><b><?php echo $row_tbnews[0]; ?></b></p>
                </div>
              </div>
          </div>
        </div>
      </div>
<?php
  include 'include/_footer.php';
?>
</body>
</html>
