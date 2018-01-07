<?php
$page = 'questions';
$title = 'questions';
$css = <<<EOT
    <!--page level css -->

    <!--end of page level css-->
EOT;
  include 'include/_header.php';
  include 'include/_navbar.php';
  include 'include/_menuleft.php';
?>
      <div class="content-wrapper">
        <?php
          if (isset($_GET['source'])) {
            $source = $_GET['source'];
          } else {
            $source = '';
          }

          $status_array = array(
            '0' => 'Un-Published',
            '1' => 'Published'
          );

            if ($source == "add") {
              include "include/questions/add.php";

            } else if ($source == "edit"){
              include "include/questions/edit.php";

            } else if ($source == "pdf"){
              include "include/questions/pdf.php";
              
            }else{
              include "include/questions/view.php";
            }
        ?>
      </div>


<?php
  include 'include/_footer.php';
?>
<script type="text/javascript" src="assets/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>

</body>
</html>
