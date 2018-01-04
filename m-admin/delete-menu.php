<?php
require_once 'functions/functions.php';
user_access();
if($_GET['cid'] != '') {
	$id = $_GET['cid'];
}

$delete = "DELETE FROM m_menus  WHERE menu_id='$id'";
if(!mysqli_query($con, $delete)) {
    echo 'Delete operation do not complete.';	
}else {
    header('Location: menus.php?suc=One+item+deleted');	
};
