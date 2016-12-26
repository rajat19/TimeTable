<?php
if(!isset($_SESSION))
	session_start();
if(empty($_SESSION['id'])) {
	session_destroy();
	header('location:index.php');
}
else{
	$g_id = $_SESSION['id'];
	$g_usertype = $_SESSION['usertype'];
	$g_name = $_SESSION['username'];
}
?>