<?php
	$sMess = '';
	if(!empty($_POST)) {
		
		if(!empty($_POST['site_heading'])) {
			$siteheading = $_POST['site_heading'];
			$update = "UPDATE m_others SET o_value = '$siteheading' WHERE o_name = 'site-heading'";
			if(mysqli_query($GLOBALS['con'], $update)) {
				$sMess = 'Site heading has been updated.';
			}
		 
		}else {
			echo 'Please enter heading';
		}
	}
	
	$select = "SELECT * FROM m_others WHERE o_name = 'site-heading'";
	$row = mysqli_fetch_assoc(mysqli_query($GLOBALS['con'], $select));
?>

<span class="smess"><?= $sMess;?></span>
<div class="col-md-12">
    <form enctype="multipart/form-data" class="form-horizontal" name="addportfolio" action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        
        
		<div class="panel panel-primary">
		    <div class="panel-heading">
		        <div class="col-md-9 heading_title">
		            Site heading
		         </div>
		        <div class="clearfix"></div>
		    </div>
		  <div class="panel-body">
               <div class="form-group">
		        <label for="" class="col-sm-3 control-label">Site heading</label>
		        <div class="col-sm-8">
		          <input type="text" class="form-control" name="site_heading" value="<?= $row['o_value'];?>">
		        </div>
		      </div>
		  </div>
		  <div class="panel-footer text-center">
		    <button class="btn btn-sm btn-primary" id="">UPDATE</button>
		  </div>
		</div>
    
    </form>
</div><!--col-md-12 end-->