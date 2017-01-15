<?php
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';

$queries = new Queries();
$functions = new Functions();

$username = htmlentities($_POST['username']);
$password = md5(htmlentities($_POST['password']));

if(empty($username) || empty($password)) {
	echo "<script>swal('Enter some values first')</script>";
}
else {
	$cue = $functions->checkUserExists($conn, $queries, $username);
	if(!$cue) {
		$checkPassword = $queries->getUserByUsernamePassword($conn, $username, $password);
		if($checkPassword->num_rows > 0) {
			session_start();
			$row = $checkPassword->fetch_assoc();
			$name = $row['name'];
			$id = $row['id'];
			$usertype = $row['usertype'];
			$dt = $functions->currentDateTime();
			$q = $queries->updateUserLastVisit($conn, $id, $dt);
			$_SESSION['id'] = $id;
			$_SESSION['usertype'] = $usertype;
			$_SESSION['name'] = $name;
			$arr = array();
			$arr[0] = "Welcome";
			$arr[1] = "$name";
			$arr[2] = "";
			$arr[3] = 1;
			echo json_encode($arr);
		}
		else {
			$arr = array();
			$arr[0] = "";
			$arr[1] = "Password do not match";
			$arr[2] = "";
			$arr[3] = 0;
			echo json_encode($arr);		
		}
	}
	else {
		$arr = array();
			$arr[0] = "";
			$arr[1] = "User do not exist";
			$arr[2] = "";
			$arr[3] = 0;
			echo json_encode($arr);
			// echo "<script>swal('')</script>";
	}
}
?>