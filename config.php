<?php
$host_name = 'localhost';
$db_name = 'moderna_db';
$hUsername = 'root';
$hPassword = '';
$con = mysqli_connect($host_name, $hUsername, $hPassword, $db_name);
if(!$con) {
    die('Server connection failed.');
}