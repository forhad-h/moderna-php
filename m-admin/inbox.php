<?php
    require_once('functions/functions.php');
	get_header();
	get_sidebar();
	get_bread_crumb();
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
                All message
             </div>
            <div class="clearfix"></div>
        </div>
      <div class="panel-body">
          <table class="table table-responsive table-striped table-hover table_cus">
                <thead class="table_head">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody>
                <?php
				    
                    $select = 'SELECT * FROM m_cmessage ORDER BY c_id DESC';
					$query = mysqli_query($con, $select);
					while($row = mysqli_fetch_assoc($query)) :
				?>
                    <tr>
                        <td><?= $row['c_name'];?></td>
                        <td><?= $row['c_email'];?></td>
                        <td><?= $row['c_subject'];?></td>
                        <td><?= substr($row['c_message'], 0, 30).'...';?></td>
                        <td>
                            <a href="view-message.php?cid=<?= $row['c_id'];?>"><i class="fa fa-plus-square fa-lg"></i></a>
                            <?php if($_SESSION['role'] == 1) {?>
                            <a href="delete-message.php?cid=<?= $row['c_id'];?>"><i class="fa fa-trash fa-lg"></i></a>
                            <?php }?>
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
            <a href="#" class="btn btn-sm btn-success">PRINT</a>
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
    get_footer();
?>