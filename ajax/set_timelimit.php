<?php 
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';
include '../include/session.php';

$queries = new Queries();
$functions = new Functions();

$timelimit = htmlentities($_POST['time']);
$timelimit = $timelimit.":00";
$update_timelimit = $queries->updateSetting($conn, 'timelimit', $timelimit);
$arr = array();
if($update_timelimit==1) {
	$arr = array();
	$arr[0] = "";
	$arr[1] = "Attendance Time Limit Updated";
	$arr[2] = "success";
	$arr[3] = 1;
	$arr[4] = $timelimit;
	echo json_encode($arr);
}
else {
	$arr = array();
	$arr[0] = "Error";
	$arr[1] = "Unable to update timelimit";
	$arr[2] = "warning";
	$arr[3] = 0;
	echo json_encode($arr);
}
?>