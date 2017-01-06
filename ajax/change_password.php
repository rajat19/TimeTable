<?php 
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';
include '../include/session.php';

$queries = new Queries();
$functions = new Functions();

$old_pass = htmlentities($_POST['old_pass']);
$new_pass = htmlentities($_POST['new_pass']);
$re_pass = htmlentities($_POST['re_pass']);
$user_id = $g_userid;
$msg = "";
$arr = array();
if(!empty($old_pass) && !empty($new_pass) && !empty($re_pass)) {
	$checkPassword = $queries->getUserById($conn, $user_id)->fetch_assoc();
	$vnp = $functions->validatePassword($new_pass);
	$password = $checkPassword['password'];
	if($password != md5($old_pass)) $msg.= "Old Password is wrong\n";
	else if(!$vnp) $msg.="New Password should contain minimum 6 characters and either of !@#$%^&*\n";
	else if($new_pass != $re_pass) $msg.="Re-entered password do not match";
	if($msg == "") {
		$q = $queries->updateUserPassword($conn, $user_id, md5($new_pass));
		if($q == 1) {
			$arr[0] = "";
			$arr[1] = "Password Successfully Updated";
			$arr[2] = "success";
			echo json_encode($arr);	
		}
		else {
			$arr[0] = "Error";
			$arr[1] = "Error updating password";
			$arr[2] = "warning";
			echo json_encode($arr);	
		}
	}
	else {
		$arr[0] = "Error";
		$arr[1] = $msg;
		$arr[2] = "warning";
		echo json_encode($arr);	
	}
}
else {
	$arr[0] = "Error";
	$arr[1] = "Enter all values";
	$arr[2] = "warning";
	echo json_encode($arr);	
}
?>