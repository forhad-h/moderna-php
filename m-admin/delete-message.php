<?php
require_once 'functions/functions.php';
user_access();
if($_SESSION['role'] > 1) {
	echo '<span style="margin-left: 30px;">You do not have permission to visit this page.</span>';
}else{
	if($_GET['cid'] != '') {
		$id = $_GET['cid'];
	}
	$delete = "DELETE FROM m_cmessage  WHERE c_id='$id'";
	if(!mysqli_query($con, $delete)) {
		echo 'Delete operation do not complete.';	
	}else {
		header('Location: inbox.php?suc=One+item+deleted');	
	}
}