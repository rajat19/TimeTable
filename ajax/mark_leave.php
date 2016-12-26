<?php 
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';
include '../include/session.php';
$queries = new Queries();
$functions = new Functions();

$msg = "";
$faculty_id = htmlentities($_POST['faculty_id']);
$leave_date = htmlentities($_POST['leave_date']);
if($g_usertype == 1 && $faculty_id!=$g_id) {
	$arr = array();
	$arr[0] = "Error";
	$arr[1] = "Leave cannot be marked";
	$arr[2] = "warning";
	echo json_encode($arr);
}
else {
	$today = $functions->currentDateYmd();
	$time = $functions->currentTime();
	$day = $functions->calculateDayOfWeek($today);
	$clm = $functions->checkLeaveMarked($conn, $queries, $faculty_id, $leave_date);
	if($clm) {
		if($leave_date>=$today) {
			$q = $queries->addLeave($conn, $faculty_id, $leave_date, $today, $today, 1);
			if($q==1) {
				$arr = array();
				$arr[0] = "Leave Marked";
				$arr[1] = "";
				$arr[2] = "success";
				echo json_encode($arr);
			}
		}
		else {
			$arr = array();
			$arr[0] = "Error";
			$arr[1] = "Leave cannot be granted for already passed date";
			$arr[2] = "warning";
			echo json_encode($arr);	
		}
	}
	else {
		$arr = array();
		$arr[0] = "Error";
		$arr[1] = "Leave already requested for $leave_date";
		$arr[2] = "warning";
		echo json_encode($arr);
	}
}
?>