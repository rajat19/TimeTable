<?php 
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';

$queries = new Queries();
$functions = new Functions();

$msg = "";
$class_id = htmlentities($_POST['class_id']);
$day = htmlentities($_POST['day']);
$slot_id = htmlentities($_POST['slot_id']);
$faculty_id = htmlentities($_POST['faculty_id']);
$subject_id = htmlentities($_POST['subject_id']);
$faculty_name = $queries->getFacultyById($conn, $faculty_id)->fetch_assoc()['name'];
$slot = $queries->getSlotById($conn, $slot_id)->fetch_assoc();
$slot_name = $slot['start']." to ".$slot1['end'];
$cf = $functions->checkClassFree($conn, $queries, $class_id, $day, $slot_id);
$ff = $functions->checkFacultyFree($conn, $queries, $faculty_id, $day, $slot_id);

if(!$cf) {
	$msg .= "Class not free for duration $slot_name\n";
}

if(!$ff) {
	$msg .= "$faculty_name is not available for duration $slot_name\n";
}

if($cf && $ff) {
	$q = $queries->addTimeTableClass($conn, $class_id, $day, $slot_id, $faculty_id, $subject_id);
	if($q==1) {
		$arr = array();
		$arr[0] = "Timetable updated";
		$arr[1] = "";
		$arr[2] = "success";
		echo json_encode($arr);	
	}		
}
else {
	$arr = array();
	$arr[0] = "Error";
	$arr[1] = $msg;
	$arr[2] = "warning";
	echo json_encode($arr);
}
?>