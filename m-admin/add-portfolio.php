<?php
    require_once('functions/functions.php');
	user_access();
	get_header();
	get_sidebar();
	get_bread_crumb();
	
	$sMess = '';
	if(!empty($_POST)) {
		
		if(!empty($_FILES['portfolioimg']['name'])) {
			
			$file = $_FILES['portfolioimg'];
			$imgname = 'portfolio-'.time().'-'.rand(100, 1000000).'.'.pathinfo($file['name'], PATHINFO_EXTENSION);
			
			$ctaurl = $_POST['portfoliourl'];
			
			$insert = "INSERT INTO m_portfolio (p_img, p_url) VALUES('$imgname', '$ctaurl')";
			if(mysqli_query($con, $insert)) {
				$sMess = 'Portfolio add successful';
				move_uploaded_file($file['tmp_name'], 'images/'.$imgname);
			}
		 
		}else {
			echo 'Please upload a portfolio image';
		}
	}
?>
<span class="smess"><?= $sMess;?></span>
<div class="col-md-12">
    <form enctype="multipart/form-data" class="form-horizontal" name="addportfolio" action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        
        
		<div class="panel panel-primary">
		    <div class="panel-heading">
		        <div class="col-md-9 heading_title">
		            Add Portfolio
		         </div>
		         <div class="col-md-3 text-right">
		            <a href="all-portfolio.php" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All portfolio</a>
		        </div>
		        <div class="clearfix"></div>
		    </div>
		  <div class="panel-body">
          
		      <div class="form-group">
		        <label for="" class="col-sm-3 control-label">Portfolio image</label>
		        <div class="col-sm-8">
		          <input type="file"  name="portfolioimg">
		        </div>
		      </div>
              
              
               <div class="form-group">
		        <label for="" class="col-sm-3 control-label">Portfolio URL</label>
		        <div class="col-sm-8">
		          <input type="text" class="form-control" name="portfoliourl">
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