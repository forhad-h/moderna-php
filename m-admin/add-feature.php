<?php
    require_once('functions/functions.php');
	user_access();
	get_header();
	get_sidebar();
	get_bread_crumb();
	
	$sMess = '';
	if(!empty($_POST)) {
		if(!empty($_POST['fheading'])) {
				$fheading = $_POST['fheading'];
				$fdescription = $_POST['fdescription'];
		
				$btnurl = $_POST['btnurl'];
				$featureicon = $_POST['featureicon'];
				
				$insert = "INSERT INTO m_features (f_heading, f_description, f_icon, f_url) VALUES('$fheading', '$fdescription', '$featureicon', '$btnurl')";
				if(mysqli_query($con, $insert)) {
					$sMess = 'Feature upload successful';
				}
		}else {
			echo 'Please write a heading';
		}
	}
?>
<span class="smess"><?= $sMess;?></span>
<div class="col-md-12">
    <form enctype="multipart/form-data" class="form-horizontal" name="addfeatures" action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        
        
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
		          <input type="text" class="form-control" name="fheading" placeholder="Type feature heading">
		        </div>
		      </div>
              
		      <div class="form-group">
		        <label for="" class="col-sm-3 control-label">Description</label>
		        <div class="col-sm-8">
		          <textarea rows="5" class="form-control" name="fdescription" placeholder="Type feature description"></textarea>
		        </div>
		      </div>
              
              <div class="form-group">
		        <label for="" class="col-sm-3 control-label">Feature icon</label>
		        <div class="col-sm-8">
		          <input type="text"  class="form-control"  name="featureicon" placeholder="fa fa-icon-name">
		        </div>
		      </div>
              
              <div class="form-group">
		        <label for="" class="col-sm-3 control-label">Button URL</label>
		        <div class="col-sm-8">
		          <input type="text" class="form-control" name="btnurl">
		        </div>
		      </div>

		  </div>
		  <div class="panel-footer text-center">
		    <button class="btn btn-sm btn-primary" id="">SAVE</button>
		  </div>
		</div>
    
    </form>
</div><!--col-md-12 end-->



<?php
    get_footer();
?>