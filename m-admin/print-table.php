<?php
    require_once('functions/functions.php');
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Print Table</title>
	<link type="text/css" rel="stylesheet" href="css/font-awesome.min.css"/>
	<link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="css/style.css"/>
	<link type="text/css" rel="stylesheet" href="css/print.css"/>
	<style type="text/css">
	    body {
			margin-top: 50px;
		}
	</style>
</head>
<body>
<div class="col-md-12">
<div class="panel panel-primary" style="border:0 none">

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
	  <button type="button" onclick="window.print()">print</button>
  </div>
</div>
</div><!--col-md-12 end-->
</div><!--admin-part end-->
</div><!--row end-->
</div><!--container-fluid end-->
</body>
</html>