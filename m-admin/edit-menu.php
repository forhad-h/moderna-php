<?php
    require_once('functions/functions.php');
	user_access();
	get_header();
	get_sidebar();
	get_bread_crumb();
	
	/*temporary input value*/
	$sMess = '';
	$id = $_GET['cid'];
	if(!empty($_POST)) {
		if(!empty($_POST['menuname'])) {
			if(!empty($_POST['menuurl'])) {
				
				$menuname = $_POST['menuname'];
				$menuurl = $_POST['menuurl'];
				
				$update = "UPDATE m_menus SET menu_name = '$menuname', menu_url = '$menuurl' WHERE menu_id = '$id'";
				if(mysqli_query($con, $update)) {
					$sMess = 'Menu has been updated';
				}
			 
		    }else {
				echo 'Please enter a URL';
			}
		}else {
			echo 'Please enter a menu name';
		}
	}
	if(!empty($_GET['suc'])) {
		$dMess = $_GET['suc'];
	}
	
	$select = "SELECT * FROM m_menus WHERE menu_id = '$id'";
	$row = mysqli_fetch_assoc(mysqli_query($con, $select));
?>
<span class="smess"><?= $sMess;?></span>

<div class="col-md-12">
    <form enctype="multipart/form-data" class="form-horizontal" name="bannerUpl" id="banner_upl" action="<?= htmlspecialchars($_SERVER['PHP_SELF']).'?cid='.$id;?>" method="post">
        
        
		<div class="panel panel-primary">
		    <div class="panel-heading">
		        <div class="col-md-9 heading_title">
		            Update Menus
		         </div>
             <div class="col-md-3 text-right">
                <a href="menus.php" class="btn btn-sm btn btn-primary"><i class="fa fa-plus-circle"></i> Add menu</a>
            </div>
		    <div class="clearfix"></div>
		    </div>
		  <div class="panel-body">
            <div class="col-md-6 right_seperator">
		      <div class="form-group">
		        <label for="" class="col-sm-3 control-label">Name</label>
		        <div class="col-sm-8">
		          <input type="text" class="form-control" name="menuname" value="<?= $row['menu_name'];?>">
		        </div>
		      </div>
              
              <div class="form-group">
		        <label for="" class="col-sm-3 control-label">URL</label>
		        <div class="col-sm-8">
		          <input type="text" class="form-control" name="menuurl"  value="<?= $row['menu_url'];?>">
		        </div>
		      </div>
            </div>
            
            <div class="col-md-6">
              <table class="table table-responsive table-striped table-hover table_cus">
                <thead class="table_head">
                    <tr>
                        <th>Name</th>
                        <th>URL</th>
                        <th class="menu_m">Manage</th>
                    </tr>
                </thead>
                <tbody>
                <?php
				    
                    $select = 'SELECT * FROM m_menus';
					$query = mysqli_query($con, $select);
					
					while($row = mysqli_fetch_assoc($query)) :
				?>
                
                    <tr>
                        <td><?= $row['menu_name'];?></td>
                        <td><?= $row['menu_url'];?></td>
                        <td>
                        <a href="edit-menu.php?cid=<?= $row['menu_id'];?>"><i class="fa fa-pencil-square fa-lg"></i></a>
                        <a href="delete-menu.php?cid=<?= $row['menu_id'];?>"><i class="fa fa-trash fa-lg"></i></a>
                            
                        </td>
                    </tr>
                 <?php endwhile;  mysqli_close($con); ?>
                </tbody>
              </table>
            </div>
		  </div>

		  <div class="panel-footer text-center">
		    <button class="btn btn-sm btn-primary" id="">UPDATE</button>
		  </div>
		</div>
    
    </form>
</div><!--col-md-12 end-->



<?php
    get_footer();
?>