<?php
    require_once('functions/functions.php');
	user_access();
	get_header();
	get_sidebar();
	get_bread_crumb();
	$id = $_GET['cid'];
	$sMess = '';
	if(!empty($_POST)) {
		if(!empty($_POST['bheading'])) {
				$bheading = $_POST['bheading'];
				$bdescription = $_POST['bdescription'];
				
				if(!empty($_FILES['bannerimg']['name'])) {
				    $file = $_FILES['bannerimg'];
		            $imgname = 'banner-'.time().'-'.rand(100, 1000000).'.'.pathinfo($file['name'], PATHINFO_EXTENSION);
					if($file['tmp_name'] != '') {
				        move_uploaded_file($file['tmp_name'], 'images/'.$imgname);	
				    }
					$update = "UPDATE m_banners SET b_img = '$imgname' WHERE b_id='$id'";
					mysqli_query($con, $update);
				}
		
				$bannercta = $_POST['bannercta'];
				$ctaurl = $_POST['ctaurl'];
				
				$update = "UPDATE m_banners SET b_heading = '$bheading', b_description = '$bdescription', b_cta = '$bannercta', b_url = '$ctaurl' WHERE b_id='$id'";
				if(mysqli_query($con, $update)) {
					$sMess = 'Banner update successful';
				}
			 
		    
		}else {
			echo 'Please write a heading';
		}
	}
	$select = "SELECT * FROM m_banners WHERE b_id = '$id'";
	$row = mysqli_fetch_assoc(mysqli_query($con, $select));
?>
<span class="smess"><?= $sMess;?></span>
<div class="col-md-12">
    <form enctype="multipart/form-data" class="form-horizontal" name="bannerUpl" id="banner_upl" action="<?= htmlspecialchars($_SERVER['PHP_SELF'].'?cid='.$id);?>" method="post">
        
        
		<div class="panel panel-primary">
		    <div class="panel-heading">
		        <div class="col-md-9 heading_title">
		            Add banner
		         </div>
		         <div class="col-md-3 text-right">
		            <a href="all-banners.php" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All banners</a>
		        </div>
		        <div class="clearfix"></div>
		    </div>
            <div class="epic bansh">
                <img src="<?= 'images/'.$row['b_img']; ?>" alt="<?= $row['b_img']; ?>" id='tmpPreview' />
            </div>
            <div class="upic">
                <input type="file"  name="bannerimg" id="upPic">
            </div>
		  <div class="panel-body">
          
		      <div class="form-group">
		        <label for="" class="col-sm-3 control-label">Heading</label>
		        <div class="col-sm-8">
		          <input type="text" class="form-control" id="bheading" name="bheading" placeholder="Type banner heading" value="<?= $row['b_heading']; ?>">
		        </div>
		      </div>
              
		      <div class="form-group">
		        <label for="" class="col-sm-3 control-label">Description</label>
		        <div class="col-sm-8">
		          <textarea rows="5" class="form-control" id="bdescription" name="bdescription" value=""><?= $row['b_description']; ?></textarea>
		        </div>
		      </div>
              
              <div class="form-group">
		        <label for="" class="col-sm-3 control-label">Banner CTA</label>
		        <div class="col-sm-8">
		          <input type="text" class="form-control" name="bannercta" value="<?= $row['b_cta']; ?>">
		        </div>
		      </div>
              
              <div class="form-group">
		        <label for="" class="col-sm-3 control-label">CTA URL</label>
		        <div class="col-sm-8">
		          <input type="text" class="form-control" name="ctaurl" value="<?= $row['b_url']; ?>">
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