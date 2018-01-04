<?php
    require_once('functions/functions.php');
	user_access();
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
                All features
             </div>
             <div class="col-md-3 text-right">
                <a href="add-feature.php" class="btn btn-sm btn btn-primary"><i class="fa fa-plus-circle"></i> Add feature</a>
            </div>
            <div class="clearfix"></div>
        </div>
      <div class="panel-body">
          <table class="table table-responsive table-striped table-hover table_cus">
                <thead class="table_head">
                    <tr>
                        <th>Feature icon</th>
                        <th>Heading</th>
                        <th>Description</th>
                        <th>URL</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody>
                <?php
				    
                    $select = 'SELECT * FROM m_features ORDER BY f_id DESC';
					$query = mysqli_query($con, $select);
					while($row = mysqli_fetch_assoc($query)) :
				?>
                    <tr>
                        <td class="featureicon"><i class="<?= $row['f_icon'];?>"></i></td>
                        <td><h4><?= $row['f_heading'];?></h4></td>
                        <td><?= substr($row['f_description'], 0, 30).'...';?></td>
                        <td><?= $row['f_url'];?></td>
                        <td>
                            <a href="edit-feature.php?cid=<?= $row['f_id'];?>"><i class="fa fa-pencil-square fa-lg"></i></a>
                            <a href="delete-feature.php?cid=<?= $row['f_id'];?>"><i class="fa fa-trash fa-lg"></i></a>
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