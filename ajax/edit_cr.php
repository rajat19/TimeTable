<?php 
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';
include '../include/session.php';

$queries = new Queries();
$functions = new Functions();

$user_id = htmlentities($_POST['cr_id']);
$name = htmlentities($_POST['newname']);
$q = $queries->updateUserFullName($conn, $user_id, $name);
if($q==1) {
	$arr[0] = "";
	$arr[1] = "Class Representative Changed";
	$arr[2] = "success";
	$arr[3] = 1;
	echo json_encode($arr);
}
else {
	$arr[0] = "";
	$arr[1] = "Error changing Class Representative";
	$arr[2] = "warning";
	$arr[3] = 0;
	echo json_encode($arr);	
}
?>