<?php
    require_once('functions/functions.php');
	user_access();
	get_header();
	get_sidebar();
	get_bread_crumb();
	
	$sMess = '';
	$id = $_GET['cid'];
	if(!empty($_POST)) {
		if(!empty($_POST['fheading'])) {
				$fheading = $_POST['fheading'];
				$fdescription = $_POST['fdescription'];
		
				$btnurl = $_POST['btnurl'];
				$featureicon = $_POST['featureicon'];
				
				$update = "UPDATE m_features SET f_heading = '$fheading', f_description = '$fdescription', f_icon = '$featureicon', f_url = '$btnurl' WHERE f_id='$id'";
				if(mysqli_query($con, $update)) {
					$sMess = 'Feature update successful';
				}
		}else {
			echo 'Please write a heading';
		}
	}
	
	$select = "SELECT * FROM m_features WHERE f_id = '$id'";
	$row = mysqli_fetch_assoc(mysqli_query($con, $select));
?>
<span class="smess"><?= $sMess;?></span>
<div class="col-md-12">
    <form enctype="multipart/form-data" class="form-horizontal" name="addfeatures" action="<?= htmlspecialchars($_SERVER['PHP_SELF']).'?cid='.$id;?>" method="post">
        
        
		<div class="panel panel-primary">
		    <div class="panel-heading">
		        <div class="col-md-9 heading_title">
		            Add Feature
		         </div>
		         <div class="col-md-3 text-right">
		            <a href="all-features.php" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All features</a>
		        </div>
		        <div class="clearfix"></div>
		    </div>
		  <div class="panel-body">
          
		      <div class="form-group">
		        <label for="" class="col-sm-3 control-label">Heading</label>
		        <div class="col-sm-8">
		          <input type="text" class="form-control" name="fheading" value="<?= $row['f_heading'];?>">
		        </div>
		      </div>
              
		      <div class="form-group">
		        <label for="" class="col-sm-3 control-label">Description</label>
		        <div class="col-sm-8">
		          <textarea rows="5" class="form-control" name="fdescription" placeholder="Type feature description"><?= $row['f_description'];?></textarea>
		        </div>
		      </div>
              
              <div class="form-group">
		        <label for="" class="col-sm-3 control-label">Feature icon</label>
		        <div class="col-sm-8">
		          <input type="text"  class="form-control"  name="featureicon" value="<?= $row['f_icon'];?>">
		        </div>
		      </div>
              
              <div class="form-group">
		        <label for="" class="col-sm-3 control-label">Button URL</label>
		        <div class="col-sm-8">
		          <input type="text" class="form-control" name="btnurl"  value="<?= $row['f_url'];?>">
		        </div>
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