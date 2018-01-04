<?php
/*
   Data validation
*/

/*initialize error message variable*/
$ferrMsg = $lerrMsg = $uerrMsg 
= $perrMsg = $cperrMsg = $eerrMsg = $werrMsg 
= $rerrMsg = $gerrMsg = $aerrMsg = '';

/*temporary input value*/
function temp_value($field_name) {
	if(!empty($_POST)) {
		if(!empty($_POST[$field_name])) {
			return $_POST[$field_name];
		}else {
			return '';
		}
	}else {
		return '';
	}
}

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

/*check whether username and email is unique*/
function is_ueunique($input_data, $column_name) {
	$select = 'SELECT '.$column_name.' FROM m_users';
	$query = mysqli_query($GLOBALS['con'], $select);
	if($query) {
		$unique = true;
	    while($data = mysqli_fetch_assoc($query)) {
			
			$umatch = $data[$column_name] == $input_data;
			
			if($umatch) {
				$unique = false;
			}
	    }
		return $unique;
	  
	}else {
	   echo 'A problem occured in mysql query syntax.';	
	}
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
				if(is_ueunique($username, 'user_username')) {
					return $username;
				}else {
					$uerrMsg = '<strong>'.$username.'</strong>'.' already exist. Try another one.';
				    return false;
				}
				
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
/*validate password*/

function validate_password($password) {
	global $perrMsg;
	if(!empty($password)){
		$password = htmlspecialchars($password);
		
		if(!min_l($password, 8)) {
		    return md5($password);
		}else {
	       $perrMsg = '# Enter at least 8 numbers';
		   return false;
        }
			
	}else {
  	 $perrMsg = '# Please enter Password';
	 return false;
    }
}

$password = validate_password($_POST['password']);
/*validate password*/


function validate_cpassword($cpassword, $password) {
	global $cperrMsg;
	if(!empty($cpassword)){
		$cpassword = htmlspecialchars($cpassword);
		if($cpassword === $password) {
			return $cpassword;
		}else {
			$cperrMsg = "Password doesn't match";
			return false;
		}
			
	}else {
  	 $cperrMsg = '# Please enter the Password again';
	 return false;
    }
}

$cpassword = validate_cpassword($_POST['cpassword'], $_POST['password']);
/*validate email*/


function validate_email($email) {
	global $eerrMsg;
	
		
	if(!empty($email)) {
		$email = sanitize_input($email);
		$email = trim_sinside($email);
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
			if(is_ueunique($email, 'user_email')) {
	  			return $email;
			}else {
				$eerrMsg = '<strong>'.$email.'</strong>'.' already exist. Try another one.';
				return false;
			}
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

/*Require gender*/


function  require_gender($gender) {
	global $gerrMsg;
	
	if(!empty($gender)) {
		return $gender;
	}else {
  	 $gerrMsg = '# Please specify Gender';
	 return false;
    }
}

$gender = require_gender(@$_POST['gender']);

/*Require agree*/

function  require_agree($agree) {
	global $aerrMsg;
	
	if(!empty($agree)) {
		return $agree;
	}else {
  	 $aerrMsg = '# Please agree with Terms and Condition';
	 return false;
    }
}

$agree = require_agree(@$_POST['agree']);

/*Upload profile picture*/
if(!empty($_FILES["profilepic"]["name"])) {
	$file = $_FILES['profilepic'];
	$imgname = 'user-'.time().'-'.rand(100, 1000000).'.'.pathinfo($file['name'], PATHINFO_EXTENSION);
	move_uploaded_file($file['tmp_name'], 'images/'.$imgname);
}else {
	$imgname = '';
}
/*all validation check and store data*/
if( validate_fname($_POST['firstname']) 
&& validate_lname($_POST['lastname']) 
&& validate_uname($_POST['username']) 
&& validate_password($_POST['password']) 
&& validate_cpassword($_POST['cpassword'], $_POST['password']) 
&& validate_email($_POST['email']) 
&& require_role($_POST['role']) 
&& require_gender(@$_POST['gender']) 
&& require_agree(@$_POST['agree'])
&& valid_url($_POST['website']))
{
	$reg_time = $_POST['dandt'];
	
	$insert = "INSERT INTO m_users (user_firstname, user_lastname, user_username, user_password, user_email, user_website, role_id, user_gender, user_avatar, reg_time) VALUES('$firstname', '$lastname', '$username', '$password', '$email', '$website', '$role', '$gender', '$imgname', '$reg_time')";
	if(!mysqli_query($con, $insert)) {
	  echo 'Something has wrong in query';
	}else {
		header('location: add-user.php?success=Registration+successful.');
	}
}
}

/*Data store and update		  

*/


