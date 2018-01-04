<?php
    require_once('functions/functions.php');
	user_access();
	get_header();
	get_sidebar();
	get_bread_crumb();
	$id = $_GET['cid'];
	$sMess = '';
	if(!empty($_POST)) {
		
		if(!empty($_FILES['portfolioimg']['name'])) {
			$file = $_FILES['portfolioimg'];
			$imgname = 'portfolio-'.time().'-'.rand(100, 1000000).'.'.pathinfo($file['name'], PATHINFO_EXTENSION);
			if($file['tmp_name'] != '') {
				move_uploaded_file($file['tmp_name'], 'images/'.$imgname);	
			}
			$update = "UPDATE m_portfolio SET p_img = '$imgname' WHERE p_id='$id'";
			mysqli_query($con, $update);
		}
		
		$portfoliourl = $_POST['portfoliourl'];
		
		$update = "UPDATE m_portfolio SET p_url = '$portfoliourl' WHERE p_id='$id'";
		if(mysqli_query($con, $update)) {
			$sMess = 'Portfolio update successful';
		}
			 
		 
	}
	$select = "SELECT * FROM m_portfolio WHERE p_id = '$id'";
	$row = mysqli_fetch_assoc(mysqli_query($con, $select));
?>
<span class="smess"><?= $sMess;?></span>
<div class="col-md-12">
    <form enctype="multipart/form-data" class="form-horizontal" name="editportfolio" action="<?= htmlspecialchars($_SERVER['PHP_SELF'].'?cid='.$id);?>" method="post">
        
        
		<div class="panel panel-primary">
		    <div class="panel-heading">
		        <div class="col-md-9 heading_title">
		            Add portfolio
		         </div>
		         <div class="col-md-3 text-right">
		            <a href="all-portfolio.php" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All portfolio</a>
		        </div>
		        <div class="clearfix"></div>
		    </div>
            <div class="epic bansh">
                <img src="<?= 'images/'.$row['p_img']; ?>" alt="<?= $row['p_img']; ?>"  id='tmpPreview' />
            </div>
            <div class="upic">
                <input type="file"  name="portfolioimg" id="upPic">
            </div>
		  <div class="panel-body">

              
              <div class="form-group">
		        <label for="" class="col-sm-3 control-label">Portfolio URL</label>
		        <div class="col-sm-8">
		          <input type="text" class="form-control" name="portfoliourl" value="<?= $row['p_url']; ?>">
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