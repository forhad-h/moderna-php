<?php
require_once 'functions/functions.php';
user_access();
if($_GET['cid'] != '') {
	$id = $_GET['cid'];
}
$select = "SELECT * FROM m_portfolio WHERE p_id='$id'";
$row = mysqli_fetch_assoc(mysqli_query($con, $select));
$curr_image = 'images/'.$row['p_img'];
if($curr_image) {
	unlink($curr_image);
}

$delete = "DELETE FROM m_portfolio  WHERE p_id='$id'";
if(!mysqli_query($con, $delete)) {
	echo 'Delete operation do not complete.';	
}else {
	header('Location: all-portfolio.php?suc=One+item+deleted');	
}

