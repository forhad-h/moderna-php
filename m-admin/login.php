<?php
  require_once("functions/functions.php");
   if(!empty($_GET['lerr'])) {
	   $lerr = $_GET['lerr'];
   }else {
	  $lerr = ''; 
   }
   if(!empty($_GET['request_page'])) {
	   $request_page = $_GET['request_page'];
   }else {
	  $request_page = 'index.php'; 
   }
  if(!empty($_POST)) {
	if(!empty($_POST['username'])) {
		if(!empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
	$select = "SELECT * FROM m_users NATURAL JOIN m_roles WHERE user_username = '$username' AND user_password = '$password'";
    $query = mysqli_query($con, $select);
    $row = mysqli_fetch_assoc($query);
    
	if($row > 0) {
	  $_SESSION['id'] = $row['user_id'];
	  $_SESSION['username'] = $row['user_username'];
	  $_SESSION['password'] = $row['user_password'];
	  $_SESSION['name'] = $row['user_firstname'].' '.$row['user_lastname'];
	  $_SESSION['imageurl'] = $row['user_avatar'];
	  $_SESSION['role'] = $row['role_id'];
	  header('Location: '.$request_page);
    }else {
	  $lerr =  'Invalid username or password';
    }
		}else {
			$lerr =  'Invalid username or password';
		}
	}else {
		$lerr = 'Invalid username or password';
	}
  }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Panel :: Login </title>
        <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css"/>
        <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <div class="container">
           <span class="lerr"><?= $lerr;?></span>  
            <div id="loginbox" style="margin-top:40px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                    </div>     
                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                        <form id="loginform" class="form-horizontal" role="form" method="post">

                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email">                                        
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                            </div>
                            <div class="input-group">
                                <div class="checkbox">
                                    <label>
                                        <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                    </label>
                                </div>
                            </div>
                            <div style="margin-top:10px" class="form-group">
                                <!-- Button -->

                                <div class="col-sm-12 controls">
                                    <button id="btn-login" class="btn btn-success">Login  </button>
                                </div>
                            </div>   
                        </form>     
                    </div>                     
                </div>  
            </div> 
        </div>
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/custom.js"></script>
    </body>
</html>