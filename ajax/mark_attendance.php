<?php 
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';

$queries = new Queries();
$functions = new Functions();

$msg = "";
$faculty_id = htmlentities($_POST['faculty_id']);
$today = date('Y-m-d', strtotime('+3 hours 30 minutes'));
$time = date('H:i:s', strtotime('+3 hours 30 minutes'));
$day = $functions->calculateDayOfWeek($today);
// echo "$today $time $day";
$cm = $functions->checkAttendanceMarked($conn, $queries, $faculty_id, $today);
if($cm) {
	$q = $queries->addAttendanceFaculty($conn, $faculty_id, $today, $time, $day);
	if($q==1) {
		$arr = array();
		$arr[0] = "Attendance Marked";
		$arr[1] = "";
		$arr[2] = "success";
		echo json_encode($arr);
	}
}
else {
	$arr = array();
	$arr[0] = "Error";
	$arr[1] = "Attendance already marked for today";
	$arr[2] = "warning";
	echo json_encode($arr);
}
?>