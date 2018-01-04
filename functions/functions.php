<?php
require_once('config.php');

function get_header() {
    require_once('includes/header.php');	
}

function get_banner() {
	include_once('includes/banner.php');
}

function get_part($part_name) {
	include_once('includes/'.$part_name);
}

function get_bread_crumb() {
	include_once('includes/bread_crumb.php');
}

function get_footer() {
    require_once('includes/footer.php');
}

function get_page_name() {
	$link = $_SERVER["PHP_SELF"];
	$link_arr = explode('/', $link);
	$pagename = $link_arr[count($link_arr) - 1];
	return $pagename;
}
$page = get_page_name();