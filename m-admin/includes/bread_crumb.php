<div class="col-md-offset-2 col-md-10 admin-part pd0">
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
      <?php  if($GLOBALS["page"] == 'add-user.php') :?>
      <li><a href="all-users.php">Users</a></li>
      <li><a href="add-user.php">Add user</a></li>
      <?php endif;?>
      
      <?php  if($GLOBALS["page"] == 'all-users.php') :?>
      <li><a href="all-users.php">Users</a></li>
      <li><a href="all-users.php">All users</a></li>
      <?php endif;?>
      
      <?php  if($GLOBALS["page"] == 'view-user.php') :?>
      <li><a href="all-users.php">Users</a></li>
      <li><a href="#">View details</a></li>
      <?php endif;?>
      
      <?php if($GLOBALS["page"] == 'edit-user.php') :?>
      <li><a href="all-users.php">Users</a></li>
      <li><a href="#">Update information</a></li>
      <?php endif;?>
      
      <?php  if($GLOBALS["page"] == 'add-banner.php') :?>
      <li><a href="all-banners.php">Banners</a></li>
      <li><a href="add-banner.php">Add banner</a></li>
      <?php endif;?>
      
      <?php  if($GLOBALS["page"] == 'all-banners.php') :?>
      <li><a href="all-banners.php">Banners</a></li>
      <li><a href="all-banners.php">All banner</a></li>
      <?php endif;?>
      
      <?php  if($GLOBALS["page"] == 'edit-banner.php') :?>
      <li><a href="all-banners.php">Banners</a></li>
      <li><a href="#">Edit banner</a></li>
      <?php endif;?>
      
      
      <?php  if($GLOBALS["page"] == 'add-feature.php') :?>
      <li><a href="all-features.php">Feature</a></li>
      <li><a href="add-feature.php">Add feature</a></li>
      <?php endif;?>
      
      <?php  if($GLOBALS["page"] == 'edit-feature.php') :?>
      <li><a href="all-features.php">Feature</a></li>
      <li><a href="#">Edit feature</a></li>
      <?php endif;?>

      
      <?php  if($GLOBALS["page"] == 'all-features.php') :?>
      <li><a href="all-features.php">Features</a></li>
      <?php endif;?>
      
      
      <?php  if($GLOBALS["page"] == 'add-portfolio.php') :?>
      <li><a href="all-portfolio.php">Portfolio</a></li>
      <li><a href="add-portfolio.php">Add portfolio</a></li>
      <?php endif;?>
      
      <?php  if($GLOBALS["page"] == 'edit-portfolio.php') :?>
      <li><a href="all-portfolio.php">Portfolio</a></li>
      <li><a href="#">Edit portfolio</a></li>
      <?php endif;?>

      
      <?php  if($GLOBALS["page"] == 'all-portfolio.php') :?>
      <li><a href="all-portfolio.php">Portfolio</a></li>
      <?php endif;?>
      
      <?php  if($GLOBALS["page"] == 'inbox.php') :?>
      <li><a href="inbox.php">Inbox</a></li>
      <?php endif;?>
      
      <?php  if($GLOBALS["page"] == 'view-message.php') :?>
      <li><a href="inbox.php">Inbox</a></li>
      <li><a href="#">View message</a></li>
      <?php endif;?>
      
      
      <?php  if($GLOBALS["page"] == 'menus.php') :?>
      <li><a href="menus.php">Menus</a></li>
      <li><a href="menus.php">Add menu</a></li>
      <?php endif;?>
      
      <?php  if($GLOBALS["page"] == 'edit-menu.php') :?>
      <li><a href="menus.php">Menus</a></li>
      <li><a href="#">Edit menu</a></li>
      <?php endif;?>
      
      
      <?php  if($GLOBALS["page"] == 'dashboard.php') :?>
      <li><a href="dashboard.php">Dashboard</a></li>
      <?php endif;?>
      
    </ol>