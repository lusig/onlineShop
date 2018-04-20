<?php

$db=mysqli_connect('127.0.0.1','root','','perfume');
if(mysqli_connect_error()){
	echo 'database connection failed'.mysqli_connect_error();
	die();
}
//session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'\config.php';

//define('BASEURL','/perfume/');

$cart_id='';
if(isset($_COOKIE[CART_COOKIE]))
{
	$cart_id=sanitize($_COOKIE[CART_COOKIE]);
}

?>
