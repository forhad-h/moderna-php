<?php
    require_once('functions/functions.php');
	user_access();
	get_header();
	get_sidebar();
	get_bread_crumb();
	
    get_part('dashboard-part.php');
	
    get_footer();
?>