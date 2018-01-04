<div class="container-fluid content_full">
    <div class="row">
        <div class="col-md-2 sidebar pd0">
            <div class="side_user">
                <div class="profile_pic">
                <?php
                    if(!empty($_SESSION['imageurl'])) {
						$ppic = 'images/'.$_SESSION['imageurl'];
				    }else {
						$ppic =  'images/avatar.png';
					}
				?>
	                <img class="img-responsive" src="<?= $ppic;?>"/>
	                <a href="edit-profile.php?cid=<?= $_SESSION['id']; ?>" class="upload_btn"><i class="fa fa-edit"></i></a>
                </div>
                <h4><?= $_SESSION['name'];?></h4>
                <span><i class="fa fa-circle"></i> Online</span>
            </div>
            <a href="../index.php" target="_new"><h2>VISIT SITE</h2></a>
            <ul>
                <li class="<?php if($GLOBALS['page'] == 'dashboard.php' || $GLOBALS['page'] == 'index.php'){ echo 'clicked_m';}?>">
                  <a href="dashboard.php"><i class="fa fa-inbox"></i> Dashboard <span class="a_circle"></span></a>
                </li>
                
                <?php
				    if($_SESSION['role'] == 1) {
		        ?>
                <li id="userm" class="<?php if($GLOBALS['page'] == 'all-users.php' ||  $GLOBALS['page'] == 'add-user.php' || $GLOBALS['page'] == 'edit-user.php'){ echo 'clicked_m';}else {echo 'hover_m';} ?>">
                  <a href="all-users.php"><i class="fa fa-user-circle"></i> Users <span class="a_circle"></span></a>
                  <ul class="sub_menu" aria-labelledby="userdmenu">
                     <li <?php if($GLOBALS['page'] == 'add-user.php'){ echo 'class = "active"';}?>><a href="add-user.php">Add user <span class="at_circle"></span></a></li>
                     <li <?php if($GLOBALS['page'] == 'all-users.php' || $GLOBALS['page'] == 'edit-user.php'){ echo 'class = "active"';}?>><a href="all-users.php">All users <span class="at_circle"></span></a></li>
                  </ul>
                </li>
                <?php }?>
                
                <li id="bannerm" class="<?php if($GLOBALS['page'] == 'all-banners.php' ||  $GLOBALS['page'] == 'add-banner.php' || $GLOBALS['page'] == 'edit-banner.php'){ echo 'clicked_m';}else {echo 'hover_m';} ?>">
                  <a href="all-banners.php"><i class="fa fa-gamepad"></i> Banners <span class="a_circle"></span></a>
                  <ul class="sub_menu" aria-labelledby="bannerdmenu">
                     <li <?php if($GLOBALS['page'] == 'add-banner.php'){ echo 'class = "active"';}?>><a href="add-banner.php">Add banner <span class="at_circle"></span></a></li>
                     <li <?php if($GLOBALS['page'] == 'all-banners.php' || $GLOBALS['page'] == 'edit-banner.php'){ echo 'class = "active"';}?>><a href="all-banners.php">All banners <span class="at_circle"></span></a></li>
                  </ul>
                </li>
                
                <li class="<?php if($GLOBALS['page'] == 'menus.php' || $GLOBALS['page'] == 'edit-menu.php'){ echo 'clicked_m';}?>">
                  <a href="menus.php"><i class="fa fa-bar-chart-o"></i> Menus <span class="a_circle"></span></a>
                </li>
                
                
                <li class="<?php if($GLOBALS['page'] == 'all-features.php' || $GLOBALS['page'] == 'add-feature.php' || $GLOBALS['page'] == 'edit-feature.php'){ echo 'clicked_m';}?>">
                  <a href="all-features.php"><i class="fa fa-life-bouy"></i> Features <span class="a_circle"></span></a>
                </li>
                
                
                <li id="portm" class="<?php if($GLOBALS['page'] == 'all-portfolio.php' ||  $GLOBALS['page'] == 'add-portfolio.php' || $GLOBALS['page'] == 'edit-portfolio.php'){ echo 'clicked_m';}else {echo 'hover_m';} ?>">
                  <a href="all-portfolio.php"><i class="fa fa-image"></i> Portfolio <span class="a_circle"></span></a>
                  <ul class="sub_menu" aria-labelledby="portdmenu">
                     <li <?php if($GLOBALS['page'] == 'add-portfolio.php'){ echo 'class = "active"';}?>><a href="add-portfolio.php">Add portfolio <span class="at_circle"></span></a></li>
                     <li <?php if($GLOBALS['page'] == 'all-portfolio.php' || $GLOBALS['page'] == 'edit-portfolio.php'){ echo 'class = "active"';}?>><a href="all-portfolio.php">All portfolio <span class="at_circle"></span></a></li>
                  </ul>
                </li>
                
                
                <li class="<?php if($GLOBALS['page'] == 'inbox.php' || $GLOBALS['page'] == 'view-message.php'){ echo 'clicked_m';}?>">
                  <a href="inbox.php"><i class="fa fa-inbox"></i> Inbox <span class="a_circle"></span></a>
                </li>
                
                <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
            </ul>
        </div><!--sidebar end-->