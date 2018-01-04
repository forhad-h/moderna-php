<?php
require_once 'functions/functions.php';
user_access();
if($_GET['cid'] != '') {
	$id = $_GET['cid'];
}

$delete = "DELETE FROM m_features  WHERE f_id='$id'";
if(!mysqli_query($con, $delete)) {
    echo 'Delete operation do not complete.';	
}else {
    header('Location: all-features.php?suc=One+item+deleted');	
};
