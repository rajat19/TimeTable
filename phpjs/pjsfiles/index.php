<?php
$app_name = "phpJobScheduler";
$phpJobScheduler_version = "3.9";
if(isset($_POST['password'])) {
	$p = $_POST['password'];
	$key = "f823bffcfc7e7d929d7087b92cd34154";
	//chocolate factory
	if(md5($p) == $key) {
		include_once("functions.php");
		update_db(); // check database is up-to-date, if not add required tables
		include("header.html");
		if (isset($_GET['add'])) include("add-modify.html");
		else include("main.html");
		include("footer.html");	
	}
	else {
		$x = isset($_GET['add'])?"add=".$_GET['add']:'';
		echo '<form action="index.php?'.$x.'" method="POST">';
		echo 'Enter passkey: <input type="password" name="password"><input type="submit" name="sub" value="Submit">';
		echo '</form>';	
	}
}
else {
	$x = isset($_GET['add'])?"add=".$_GET['add']:'';
	echo '<form action="index.php?'.$x.'" method="POST">';
	echo 'Enter passkey: <input type="password" name="password"><input type="submit" name="sub" value="Submit">';
	echo '</form>';
}

?>