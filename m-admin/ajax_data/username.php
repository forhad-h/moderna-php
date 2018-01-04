<?php
header("Content-Type: application/json; charset=UTF-8");
require_once('../../config.php');

$select = 'SELECT '.$_GET['field'].' FROM m_users';
$qry = mysqli_query($con, $select);
if($qry) {
	$result = array();
  while($data = mysqli_fetch_assoc($qry)) {
	array_push($result, $data);
  }
  echo json_encode($result);
  
}else {
   echo 'A problem occured in mysql query syntax.';	
}
