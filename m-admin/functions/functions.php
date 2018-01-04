<?php session_start();
require_once('../config.php');

function get_header() {
    require_once('includes/header.php');	
}
function get_sidebar() {
	require_once('includes/sidebar.php');
}
function get_bread_crumb() {
	include_once('includes/bread_crumb.php');
}
function get_part($partname) {
	include_once('includes/'.$partname);
}
function get_footer() {
    require_once('includes/footer.php');
}

function user_exist() {
	return !empty($_SESSION['username']) ? true : false;
}
function user_access() {
	$userexist = user_exist();
	if(!$userexist) {
		$_SESSION['request_page'] = htmlspecialchars($_SERVER['PHP_SELF']);
		$request_page = pathinfo($_SESSION['request_page'], PATHINFO_BASENAME);
		header("Location: login.php?request_page=".$request_page."&lerr=Sign+in");
	}
}


function get_page_name() {
	$link = $_SERVER["PHP_SELF"];
	$link_arr = explode('/', $link);
	$pagename = $link_arr[count($link_arr) - 1];
	return $pagename;
}
$page = get_page_name();