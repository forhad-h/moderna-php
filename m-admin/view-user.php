<?php
    require_once('functions/functions.php');
	user_access();
	get_header();
	get_sidebar();
	get_bread_crumb();
	if($_SESSION['role'] > 1) {
		echo '<span style="margin-left: 30px;">You do not have permission to visit this page.</span>';
	}else{
?>
                <div class="col-md-12">
                	<div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="col-md-9 heading_title">
                                User details
                             </div>
                             <div class="col-md-3 text-right">
                             	<a href="all-users.php" class="btn btn-sm btn btn-primary"><i class="fa fa-plus-circle"></i> All user</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                      <div class="panel-body">
                          <div class="col-md-1">
                          </div>
                          <div class="col-md-9">
                          <?php
						      if(!empty($_GET['cid'])) {
								  $id = $_GET['cid'];
							  }
						      $select = "SELECT * FROM m_users NATURAL JOIN m_roles WHERE user_id = '$id'";
							  $query = mysqli_query($con, $select);
							  while($row = mysqli_fetch_assoc($query)) :
							  if(!empty($row['user_website'])) {
								  $website = $row['user_website'];
							  }else {
								$website = 'N/A'; 
							  }
						  ?>
                          	<table class="table table-hover table-striped table-responsive view_table_cus">
                            	<tr>
                                	<td>Name</td>
                                    <td>:</td>
                                    <td><?= $row['user_firstname'].' '.$row['user_lastname'];?></td>
                                </tr>
                                <tr>
                                	<td>Username</td>
                                    <td>:</td>
                                    <td><?= $row['user_username'];?></td>
                                </tr>
                                <tr>
                                	<td>Email</td>
                                    <td>:</td>
                                    <td><?= $row['user_email'];?></td>
                                </tr>
                                <tr>
                                	<td>Website</td>
                                    <td>:</td>
                                    <td><?= $website;?></td>
                                </tr>
                                <tr>
                                	<td>Role</td>
                                    <td>:</td>
                                    <td><?= $row['role_name'];?></td>
                                </tr>
                                <tr>
                                	<td>Registration Time</td>
                                    <td>:</td>
                                    <td><?= $row['reg_time'];?></td>
                                </tr>
                            </table>
                            <?php endwhile; mysqli_close($con);?>
                          </div>
                          <div class="col-md-2">
                          </div>
                      </div>
                      <div class="panel-footer">
                        <div class="col-md-4">
                            <a href="#" class="btn btn-sm btn-primary">PDF</a>
                            <a href="#" class="btn btn-sm btn-success">PRINT</a>
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4 text-right">
                        	
                        </div>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                </div><!--col-md-12 end-->
            </div><!--admin-part end-->
         </div><!--row end-->
    </div><!--container-fluid end-->
<?php
	}
    get_footer();
?>