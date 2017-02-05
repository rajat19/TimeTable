<?php 
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';

$queries = new Queries();
$functions = new Functions();

$msg = "";
$faculty_id = htmlentities($_POST['faculty_id']);
$today = $functions->currentDateYmd();
$time = $functions->currentTime();
$day = $functions->calculateDayOfWeek($today);
$timelimit = $queries->getSettingByType($conn, 'timelimit')->fetch_assoc();
$mintime = "08:30:00";
$cm = $functions->checkAttendanceMarked($conn, $queries, $faculty_id, $today);
if($timelimit['value']<$time || $time<$mintime) {
		$arr = array();
		$arr[0] = "Attendance Not Marked";
		$arr[1] = "Cannot Mark Attendance at this time";
		$arr[2] = "warning";
		echo json_encode($arr);
}
else if($cm) {
	$q = $queries->addAttendanceFaculty($conn, $faculty_id, $today, $time, $day);
	if($q==1) {
		$ifalreadycounted = $queries->getNotificationByDateType($conn, $today, 2);
		if($ifalreadycounted->num_rows == 0) {
			$set = $functions->setNotificationA2($conn, $queries, 0);
		}
		else {
			$notification_id = $ifalreadycounted->fetch_assoc()['id'];
			$set = $functions->setNotificationA2($conn, $queries, $notification_id);
		}
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