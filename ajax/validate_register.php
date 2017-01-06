<?php
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';

$queries = new Queries();
$functions = new Functions();

$name = htmlentities($_POST['name']);
$username = htmlentities($_POST['username']);
$password = htmlentities($_POST['password']);
$email = htmlentities($_POST['email']);
$phone = htmlentities($_POST['phone']);
$gender = htmlentities($_POST['gender']);
$msg = "";
$arr = array();
if(empty($username) || empty($password) || empty($name) || empty($email) || empty($phone)) {
	$arr[0] = "Error";
	$arr[1] = "Enter all values";
	$arr[2] = "warning";
	$arr[3] = 0;
	echo json_encode($arr);
}
else {
	$cue = $functions->checkUserExists($conn, $queries, $username);
	$cee = $functions->checkUseremailExists($conn, $queries, $email);
	$cpe = $functions->checkUserphoneExists($conn, $queries, $phone);
	if(!$cue) $msg.="Username already exists, Try a new one";
	if(!$cee) $msg.="Email already exists";
	if(!$cpe) $msg.="Phone no. already exists";
	if($cue || $cee || $cpe) {
		$vn = $functions->validateName($name);
		$ve = $functions->validateEmail($email);
		$vp = $functions->validatePhone($phone);
		$vu = $functions->validateUsername($username);
		$vpw = $functions->validatePassword($password);
		if(!$vn) $msg.="Full Name should only contain alphabets\n";
		if(!$ve) $msg.="Not a valid email address\n";
		if(!$vp) $msg.="Not a valid phone no.\n";
		if(!$vu) $msg.="Username should contain only alphabets and digits\n";
		if(!$vpw) $msg.="Password should contain minimum 6 characters and either of !@#$%^&*";
		if(!$vn || !$vu || !$vp || !$ve || !$vpw) {
			$arr[0] = "Error";
			$arr[1] = $msg;
			$arr[2] = "warning";
			$arr[3] = 0;
			echo json_encode($arr);
		}
		else {
			$usertype = 2;
			$q = $queries->addUser($conn, $name, $gender, $email, $phone, $username, md5($password), $usertype);
			if($q == 1) {
				$arr[0] = "";
				$arr[1] = "Successfully registered, Continue to login";
				$arr[2] = "success";
				$arr[3] = 1;
				echo json_encode($arr);
			}
			else {
				$arr[0] = "Error";
				$arr[1] = "Problem adding user";
				$arr[2] = "warning";
				$arr[3] = 0;
				echo json_encode($arr);
			}
		}
	}
	else {
		$arr[0] = "Error";
		$arr[1] = $msg;
		$arr[2] = "warning";
		$arr[3] = 0;
		echo json_encode($arr);
	}
}
?>