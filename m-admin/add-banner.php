<?php
    require_once('functions/functions.php');
	user_access();
	get_header();
	get_sidebar();
	get_bread_crumb();
	
	$sMess = '';
	if(!empty($_POST)) {
		if(!empty($_POST['bheading'])) {
			if(!empty($_FILES['bannerimg']['name'])) {
				$bheading = $_POST['bheading'];
				$bdescription = $_POST['bdescription'];
				
				$file = $_FILES['bannerimg'];
		        $imgname = 'banner-'.time().'-'.rand(100, 1000000).'.'.pathinfo($file['name'], PATHINFO_EXTENSION);
		
				$bannercta = $_POST['bannercta'];
				$ctaurl = $_POST['ctaurl'];
				
				$insert = "INSERT INTO m_banners (b_heading, b_description, b_img, b_cta, b_url) VALUES('$bheading', '$bdescription', '$imgname', '$bannercta', '$ctaurl')";
				if(mysqli_query($con, $insert)) {
					$sMess = 'Banner upload successful';
					move_uploaded_file($file['tmp_name'], 'images/'.$imgname);
				}
			 
		    }else {
				echo 'Please upload a banner image';
			}
		}else {
			echo 'Please write a heading';
		}
	}
?>
<span class="smess"><?= $sMess;?></span>
<div class="col-md-12">
    <form enctype="multipart/form-data" class="form-horizontal" name="bannerUpl" id="banner_upl" action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        
        
		<div class="panel panel-primary">
		    <div class="panel-heading">
		        <div class="col-md-9 heading_title">
		            Add Banner
		         </div>
		         <div class="col-md-3 text-right">
		            <a href="all-banners.php" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All banners</a>
		        </div>
		        <div class="clearfix"></div>
		    </div>
		  <div class="panel-body">
          
		      <div class="form-group">
		        <label for="" class="col-sm-3 control-label">Heading</label>
		        <div class="col-sm-8">
		          <input type="text" class="form-control" id="bheading" name="bheading" placeholder="Type banner heading">
		        </div>
		      </div>
              
		      <div class="form-group">
		        <label for="" class="col-sm-3 control-label">Description</label>
		        <div class="col-sm-8">
		          <textarea rows="5" class="form-control" id="bdescription" name="bdescription" placeholder="Type banner description"></textarea>
		        </div>
		      </div>
              
		      <div class="form-group">
		        <label for="" class="col-sm-3 control-label">Banner image</label>
		        <div class="col-sm-8">
		          <input type="file"  name="bannerimg">
		        </div>
		      </div>
              
              <div class="form-group">
		        <label for="" class="col-sm-3 control-label">Banner CTA</label>
		        <div class="col-sm-8">
		          <input type="text" class="form-control" name="bannercta">
		        </div>
		      </div>
              
               <div class="form-group">
		        <label for="" class="col-sm-3 control-label">CTA URL</label>
		        <div class="col-sm-8">
		          <input type="text" class="form-control" name="ctaurl">
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