<aside class="main-sidebar hidden-print">
  <section class="sidebar">
    <div class="user-panel">
        <?php
        if (empty($s_login_avatar)) {
          $manucha = "user.png";
        }else{
          $manucha = $s_login_avatar;
       }
        ?> 
      <div class="pull-left image"><img class="img-circle" src="assets/images/users/<?=$manucha?>" alt="User Image"></div>
      <div class="pull-left info">
        <p><?=$s_login_username?></p>
        <p class="designation"><?=$s_login_email?></p>
      </div>
    </div>
    <!-- Sidebar Menu-->
    <ul class="sidebar-menu">
      <li <?php if($page == 'dashboard'){ echo 'class="active"';} ?>><a href="admin.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
      <li <?php if($page == 'questions') {echo 'class="active"';} ?>><a href="questions.php"><i class="fa fa-dashboard"></i><span>Question Bank</span></span></a></li>
      <li <?php if($page == 'categories') {echo 'class="active"';} ?>><a href="categories.php"><i class="fa fa-dashboard"></i><span>categories</span></span></a></li>
      <li <?php if($page == 'user') {echo 'class="active"';} ?>><a href="user.php"><i class="fa fa-dashboard"></i><span>user</span></span></a></li>
    </ul>
  </section>
</aside>
