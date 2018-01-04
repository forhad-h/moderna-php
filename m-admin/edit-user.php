<?php
    require_once('functions/functions.php');
	
	user_access();
	if($_SESSION['role'] > 1) {
		echo '<span style="margin-left: 30px;">You do not have permission to visit this page.</span>';
	}else{
	
	$id = $_GET['cid'];
	include_once('includes/update-validation.php');
    if(isset($_GET['success'])) {
		$sMess = $_GET['success'];
	}else {
		$sMess = '';
	}
	$selectu = "SELECT * FROM m_users NATURAL JOIN m_roles WHERE user_id='$id'";
	$rowu = mysqli_fetch_assoc(mysqli_query($con, $selectu));
	if(!empty($rowu['user_avatar'])) {
		$avatar = 'images/'.$rowu['user_avatar'];
	}else {
		$avatar =  'images/avatar.png';
	}
	
	get_header();
	get_sidebar();
	get_bread_crumb();
?>
<span class="smess"><?= $sMess;?></span>
            <div class="col-md-12">
                	<form enctype="multipart/form-data" class="form-horizontal" name="userReg" id="user_reg" action="<?= htmlspecialchars($_SERVER['PHP_SELF'].'?cid='.$id);?>" method="post">
                	<div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="col-md-9 heading_title">
                                Update user
                             </div>
                             <div class="col-md-3 text-right">
                             	<a href="all-users.php" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All users</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="epic">
						    <img src="<?= $avatar; ?>" alt="<?= $avatar; ?>" id='tmpPreview' />
						</div>
                        <div class="upic">
                           <input type="file" name="profilepic" id="upPic">
                        </div>
                      <div class="panel-body">
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">First Name</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Type first name" ng-model="fnpCheckM" value="<?= $rowu['user_firstname'] ?>">
                              
                              <span class="php_error"><?= $ferrMsg; ?></span>
                            </div>
                            
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Last Name</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Type last name" ng-model="lnpCheckM" value="<?= $rowu['user_lastname'] ?>">
                              
                              <span class="php_error"><?= $lerrMsg; ?></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Username</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="username" name="username" placeholder="Type username" value="<?= $rowu['user_username'] ?>">
                              <span class="php_error"><?= $uerrMsg; ?></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-8">
                              <input type="email" class="form-control" id="email" name="email" value="<?= $rowu['user_email']; ?>" placeholder="example@exm.com">
                              <span class="php_error"><?= $eerrMsg; ?></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Website <span class="optional_text">(optional)</span></label>
                            <div class="col-sm-8">
                              <input type="url" class="form-control" name="website" value="<?= $rowu['user_website']; ?>" placeholder="http://www.example.com">
                              <span class="php_error"><?= $werrMsg; ?></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Role</label>
                            <div class="col-sm-4">
                              <select class="form-control select_cus" name="role">
                                  <option value="">Select role</option>
                                  <?php  
								      $select = "SELECT * FROM m_roles";
									  $query = mysqli_query($con, $select);
									  while($row = mysqli_fetch_assoc($query)) {
								  ?>
                                      <option value="<?= $row['role_id'];?>" <?php if($row['role_id'] == $rowu['role_id']) {echo 'selected';}?>><?= $row['role_name'];?></option>
                                  <?php }?>
                                  
                              </select>
                              <span class="php_error"><?= $rerrMsg; ?></span>
                            </div>
                          </div>
                          
                          
                          
                      </div>
                          <div class="form-group">
                            <div class="col-sm-8">
                              <input type="hidden" class="form-control" name="dandt" value="<?= date("d M Y h:i:sa")?>">
                            </div>
                          </div>
                      <div class="panel-footer text-center">
                        <button class="btn btn-sm btn-primary">UPDATE</button>
                      </div>
                    </div>
                    </form>
                </div><!--col-md-12 end-->

<?php
    mysqli_close($con);
	}
    get_footer();

?>