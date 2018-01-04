<?php
    require_once('functions/functions.php');
	include_once('includes/form-validation.php');
	user_access();
	get_header();
	get_sidebar();
	get_bread_crumb();
	
	if($_SESSION['role'] > 1) {
		echo '<span style="margin-left: 30px;">You do not have permission to visit this page.</span>';
	}else{
	
    if(isset($_GET['success'])) {
		$sMess = $_GET['success'];
	}else {
		$sMess = '';
	}
?>
<span class="smess"><?= $sMess; ?></span>
            <div class="col-md-12">
                	<form enctype="multipart/form-data" class="form-horizontal" name="userReg" id="user_reg" action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" ng-app="npCheck" ng-controller="myCtrl">
                	<div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="col-md-9 heading_title">
                                Add user
                             </div>
                             <div class="col-md-3 text-right">
                             	<a href="all-users.php" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All users</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                      <div class="panel-body">
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">First Name</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Type first name" ng-model="fnpCheckM" value="<?= temp_value('firstname'); ?>" required check-np>
                              <span class="error" ng-show="userReg.firstname.$valid">Number and Punctuation are not allowed</span>
                              <span class="php_error"><?= $ferrMsg; ?></span>
                            </div>
                            
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Last Name</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Type last name" ng-model="lnpCheckM" value="<?= temp_value('lastname'); ?>" required check-np>
                              <span class="error" ng-show="userReg.lastname.$valid">Number and Punctuation are not allowed</span>
                              <span class="php_error"><?= $lerrMsg; ?></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Username</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="username" name="username" placeholder="Type username" value="<?= temp_value('username'); ?>" ng-model='userName'>       
                              <i class="state_icon fa"></i>
                              <span class="error" id="user_err"></span>
                              <span class="php_error"><?= $uerrMsg; ?></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-8">
                              <input type="password" class="form-control" id="password" name="password" placeholder="Password" ng-model="pnpaCheckM">
                              <span class="pweak" ng-show="passState() == 'Weak'">Password: <strong>Weak</strong></span>
                              <span class="pmedium" ng-show="passState() == 'Medium'">Password: <strong>Medium</strong></span>
                              <span class="pstrong" ng-show="passState() == 'Strong'">Password: <strong>Strong</strong></span>
                              <span class="php_error"><?= $perrMsg; ?></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Confirm Password</label>
                            <div class="col-sm-8">
                              <input type="password" class="form-control" name="cpassword" placeholder="Confirm password">
                              <span class="php_error"><?= $cperrMsg; ?></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-8">
                              <input type="email" class="form-control" id="email" name="email" value="<?= temp_value('email'); ?>" placeholder="example@exm.com">
                              <span class="php_error"><?= $eerrMsg; ?></span>
                              <span class="error" id="email_err"></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Website <span class="optional_text">(optional)</span></label>
                            <div class="col-sm-8">
                              <input type="url" class="form-control" name="website" value="<?= temp_value('website'); ?>" placeholder="http://www.example.com">
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
                                      <option value="<?= $row['role_id'];?>" <?php if(temp_value('role') == $row['role_id']) {echo 'selected';}?>><?= $row['role_name'];?></option>
                                  <?php }?>
                                  
                              </select>
                              <span class="php_error"><?= $rerrMsg; ?></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Gender</label>
                            <div class="col-sm-8">
                              <div class="radio">
                                  <label>
                                    <input type="radio" name="gender" id="" value="male" ng-model="genDer" <?php if(temp_value('gender') == 'male') {echo 'checked';}?>>
                                    Male
                                  </label>
                                  <label>
                                    <input type="radio" name="gender" id="" value="female" ng-model="genDer" <?php if(temp_value('gender')  == 'female') {echo 'checked';}?>>
                                    Female
                                  </label>
                                  <span class="php_error"><?= $gerrMsg; ?></span>
                                </div>
                                
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Profile Picture <span class="optional_text">(optional)</span></label>
                            <div class="col-sm-8">
                              <input type="file" name="profilepic" value="<?= temp_value('profilepic'); ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label"></label>
                            <div class="col-sm-8">
                               <div class="checkbox-inline">
                                  <label>
                                    <input type="checkbox" name="agree" id="blankCheckbox" value="option1">
                                    Agree with <a href='#'>terms and conditions</a>
                                  </label>
                                  <span class="php_error php_aerror"><?= $aerrMsg; ?></span>
                               </div>
                            </div>
                          </div>
                      </div>
                          <div class="form-group">
                            <div class="col-sm-8">
                              <input type="hidden" class="form-control" name="dandt" value="<?= date("d M Y h:i:sa")?>">
                            </div>
                          </div>
                      <div class="panel-footer text-center">
                        <button class="btn btn-sm btn-primary" id="ureg_btn">REGISTRATION</button>
                      </div>
                    </div>
                    </form>
                </div><!--col-md-12 end-->

<?php
	mysqli_close($con);
}
    get_footer();

	
?>