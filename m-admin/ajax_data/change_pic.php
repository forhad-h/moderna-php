<?php

/*Upload profile picture*/
if(!empty($_FILES['profilepic']['name'])) {
	$file = $_FILES['profilepic'];
	$imgname = 'user-'.time().'-'.rand(100, 1000000).'.'.pathinfo($file['name'], PATHINFO_EXTENSION);
	if($file['tmp_name'] != '') {
		move_uploaded_file($file['tmp_name'], 'images/'.$imgname);	
	}
	$update = "UPDATE m_users SET user_avatar = '$imgname' WHERE user_id='$id'";
	mysqli_query($con, $update);
	$_SESSION['imageurl'] = $imgname;
	echo 'what';
}