<?php
    require_once('functions/functions.php');
	user_access();
	get_header();
	get_sidebar();
	get_bread_crumb();
?>
                <div class="col-md-12">
                	<div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="col-md-9 heading_title">
                                User details
                             </div>
                             <div class="col-md-3 text-right">
                             	<a href="inbox.php" class="btn btn-sm btn btn-primary"><i class="fa fa-plus-circle"></i> All message</a>
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
						      $select = "SELECT * FROM m_cmessage WHERE c_id = '$id'";
							  $query = mysqli_query($con, $select);
							  while($row = mysqli_fetch_assoc($query)) :
							  if(!empty($row['c_name'])) {
								  $name = $row['c_name'];
							  }else {
								$name = 'N/A'; 
							  }
							  if(!empty($row['c_subject'])) {
								  $subject = $row['c_subject'];
							  }else {
								$subject = 'N/A'; 
							  }
						  ?>
                          	<table class="table table-hover table-striped table-responsive view_table_cus">
                            	<tr>
                                	<td>Name</td>
                                    <td>:</td>
                                    <td><?= $name;?></td>
                                </tr>
                                <tr>
                                	<td>Email</td>
                                    <td>:</td>
                                    <td><?= $row['c_email'];?></td>
                                </tr>
                                <tr>
                                	<td>Subject</td>
                                    <td>:</td>
                                    <td><?= $subject;?></td>
                                </tr>
                                <tr>
                                	<td>Message</td>
                                    <td>:</td>
                                    <td><?= $row['c_message'];?></td>
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
    get_footer();
?>