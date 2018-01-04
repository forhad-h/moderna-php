<?php
/*
   Data validation
*/

/*initialize error message variable*/
$ferrMsg = $lerrMsg = $uerrMsg 
= $perrMsg = $cperrMsg = $eerrMsg = $werrMsg 
= $rerrMsg = $gerrMsg = $aerrMsg = '';

if(!empty($_POST) && !isset($_POST['ureg_btn']) && $_SERVER['REQUEST_METHOD'] == 'POST') {


/*check alphabet, number and punctuation*/
function check_aw($input_data) {
	$pattern = '/^[a-zA-Z\s\.]*$/';
	return preg_match($pattern, $input_data);
}

/*check minimum length*/
function min_l($input_data, $require_length) {
	if(strlen($input_data) >= $require_length){
	   return false;	
	}else {
		return true;
	}
}

/*check maximum length*/
function max_l($input_data, $require_length) {
	if(strlen($input_data) > $require_length){
	   return true;	
	}else {
		return false;
	}
}
function trim_minside($input_data) {
	
   if(preg_match('/\s{2,}/', $input_data)) {
	  $input_data = preg_replace('/\s{2,}/', ' ', $input_data);
   }
   return $input_data;
}

function trim_sinside($input_data) {
   
   if(preg_match('/\s{1,}/', $input_data)) {
	  $input_data = preg_replace('/\s{1,}/', '', $input_data);
   }
   return $input_data;
}

function sanitize_input($input_data) {
	$input_data = trim($input_data);
	$input_data = htmlspecialchars($input_data);
	return $input_data;
}


/*check validation of URL */
function valid_url($website) {
	if($website == '') {
		$is_url = true;
	}else {
		$pattern = "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";
	    $is_url = preg_match($pattern, $website);
	}
	return $is_url;
}
/*validate first name*/

function validate_fname($firstname) {
  global $ferrMsg;
  if(!empty($firstname)){
		$firstname = sanitize_input($firstname);
		$firstname = trim_minside($firstname);
		if(check_aw($firstname)) {
			if(!max_l($firstname, 50)) {

				return $firstname;
			}else {
			    $ferrMsg = '# It is too long as a First Name';
				return false;
		    }
			
		}else {
	       $ferrMsg = '# Number and Punctuation are not allowed';
		   return false;
        }
  }else {
	 $ferrMsg = '# Please enter First Name';
	 return false;
  }
}
$firstname = validate_fname($_POST['firstname']);

/*validate last name*/

function validate_lname($lastname) {
  global $lerrMsg;
  if(!empty($lastname)){
		$lastname = sanitize_input($lastname);
		$lastname = trim_minside($lastname);
		if(check_aw($lastname)) {
			if(!max_l($lastname, 50)) {
				return $lastname;
			}else {
			    $lerrMsg = '# It is too long as a Last Name';
				return false;
		    }
			
		}else {
	       $lerrMsg = '# Number and Punctuation are not allowed';
		   return false;
        }
  }else {
  	 $lerrMsg = '# Please enter Last Name';
	 return false;
  }
}
$lastname = validate_lname($_POST['lastname']);

/*validate username*/



function validate_uname($username) {
  global $uerrMsg;
  if(!empty($username)){
		$username = sanitize_input($username);
		$username = trim_sinside($username);
		if(!min_l($username, 3)) {
			
			if(!max_l($username, 50)) {
					return $username;
				
			}else {
			    $uerrMsg = '# It is too long as a Username';
				return false;
		    }
			
		}else {
	       $uerrMsg = '# It is too short as a Username';
		   return false;
        }
  }else {
  	 $uerrMsg = '# Please enter Username';
	 return false;
  }
}

$username = validate_uname($_POST['username']);


/*validate email*/


function validate_email($email) {
	global $eerrMsg;
	
		
	if(!empty($email)) {
		$email = sanitize_input($email);
		$email = trim_sinside($email);
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  			return $email;
		}else {
			$eerrMsg = '# Please enter a valid Email address';
	        return false;
		}
		
	}else {
  	 $eerrMsg = '# Please enter Email address';
	 return false;
    }
}

$email = validate_email($_POST['email']);

/*validate website*/


function validate_website($website) {
	global $werrMsg;
	
		
	if(!empty($website)) {
		$website = sanitize_input($website);
		$website = trim_sinside($website);
		if(valid_url($website)) {
			return $website;
		}else {
			$werrMsg = '# Please enter a valid URL';
	        return false;
		}
		
	}
}

$website = validate_website($_POST['website']);

/*Require role*/


function  require_role($role) {
	global $rerrMsg;
	
	if(!empty($role)) {
		return $role;
	}else {
  	 $rerrMsg = '# Please select a Role';
	 return false;
    }
}

$role = require_role($_POST['role']);

/*Upload profile picture*/
if(!empty($_FILES['profilepic']['name'])) {
	$file = $_FILES['profilepic'];
	$imgname = 'user-'.time().'-'.rand(100, 1000000).'.'.pathinfo($file['name'], PATHINFO_EXTENSION);
	if($file['tmp_name'] != '') {
		move_uploaded_file($file['tmp_name'], 'images/'.$imgname);	
	}
	$update = "UPDATE m_users SET user_avatar = '$imgname' WHERE user_id='$id'";
	mysqli_query($con, $update);
	
}

/*all validation check and store data*/
if( validate_fname($_POST['firstname']) 
&& validate_lname($_POST['lastname']) 
&& validate_uname($_POST['username'])
&& validate_email($_POST['email'])
&& require_role($_POST['role'])
&& valid_url($_POST['website']))
{
	$reg_time = $_POST['dandt'];
	
	$update = "UPDATE m_users SET user_firstname = '$firstname', user_lastname = '$lastname', user_username = '$username', user_email = '$email', user_website = '$website', role_id = '$role', reg_time = '$reg_time' WHERE user_id='$id'";
	if(!mysqli_query($con, $update)) {
	  echo 'Something has wrong in query';
	}else {
		header("location: edit-user.php?success=Update+successful&cid=".$_GET['cid']);
	}
}
}

