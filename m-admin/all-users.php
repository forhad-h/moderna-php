<?php
    require_once('functions/functions.php');
	user_access();
	get_header();
	get_sidebar();
	get_bread_crumb();
	
	if($_SESSION['role'] > 1) {
		echo '<span style="margin-left: 30px;">You do not have permission to visit this page.</span>';
	}else{
	
	$smess = '';
	if(!empty($_GET['suc'])) {
		$smess = $_GET['suc'];
	}
?>
<span class="smess" style="color: #F66"><?= $smess;?></span>
<div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="col-md-9 heading_title">
                All users
             </div>
             <div class="col-md-3 text-right">
                <a href="add-user.php" class="btn btn-sm btn btn-primary"><i class="fa fa-plus-circle"></i> Add user</a>
            </div>
            <div class="clearfix"></div>
        </div>
      <div class="panel-body">
          <table class="table table-responsive table-striped table-hover table_cus">
                <thead class="table_head">
                    <tr>
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th class="manage_col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                <?php
				    
                    $select = 'SELECT * FROM m_users NATURAL JOIN m_roles ORDER BY user_id DESC';
					$query = mysqli_query($con, $select);
					while($row = mysqli_fetch_assoc($query)) :
						
					if(!empty($row['user_avatar'])) {
						$avatar = 'images/'.$row['user_avatar'];
				    }else {
						$avatar =  'images/avatar.png';
					}
				?>
                    <tr>
                        <td class="avatar"><img src="<?= $avatar; ?>" alt="<?= $avatar; ?>" /></td>
                        <td><?= $row['user_firstname'];?></td>
                        <td><?= $row['user_username'];?></td>
                        <td><?= $row['user_email'];?></td>
                        <td><?= $row['role_name'];?></td>
                        <td class="manage_col">
                            <a href="view-user.php?cid=<?= $row['user_id'];?>"><i class="fa fa-plus-square fa-lg"></i></a>
                            <a href="edit-user.php?cid=<?= $row['user_id'];?>"><i class="fa fa-pencil-square fa-lg"></i></a>
                            <a href="delete-user.php?cid=<?= $row['user_id'];?>"><i class="fa fa-trash fa-lg"></i></a>
                        </td>
                    </tr>
                 <?php endwhile; mysqli_close($con); ?>
                </tbody>
          </table>
      </div>
      <div class="panel-footer">
        <div class="col-md-4">
            <a href="#" class="btn btn-sm btn-warning">EXCEL</a>
            <a href="#" class="btn btn-sm btn-primary">PDF</a>
            <a href="#" class="btn btn-sm btn-danger">SVG</a>
            <a href="#" class="btn btn-sm btn-success" id="print_btn">PRINT</a>
        </div>
        <div class="col-md-4">
        </div>
        <div class="col-md-4 text-right">
            <nav aria-label="Page navigation">
              <ul class="pagination pagina_cus">
                <li>
                  <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                  <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
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