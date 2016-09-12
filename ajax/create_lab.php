<?php
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';

$queries = new Queries();
$functions = new Functions();

$msg = "";$q1=0;$q2=0;$q3=0;$chk2="";$chk3="";
$lab_id = htmlentities($_POST['lab_id']);
$batch = htmlentities($_POST['batch']);
$class_id = htmlentities($_POST['class_id']);
$day = htmlentities($_POST['day']);
$chk1 = htmlentities($_POST['chk1']);
if(isset($_POST['chk2']))
	$chk2 = htmlentities($_POST['chk2']);
if(isset($_POST['chk3']))
	$chk3 = htmlentities($_POST['chk3']);
$faculty_id1 = htmlentities($_POST['faculty_id1']);
$faculty_id2 = htmlentities($_POST['faculty_id2']);
$faculty_name1 = $queries->getFacultyById($conn, $faculty_id1)->fetch_assoc()['name'];
$faculty_name2 = $queries->getFacultyById($conn, $faculty_id2)->fetch_assoc()['name'];
$subject_id = htmlentities($_POST['subject_id']);
$slot_id1 = htmlentities($_POST['slot_id1']);
$slot1 = $queries->getSlotById($conn, $slot_id1)->fetch_assoc();
$slot_name1 = $slot1['start']." to ".$slot1['end'];
$lf1 = $functions->checkLabFree($conn, $queries, $lab_id, $day, $slot_id1);
$cf1 = $functions->checkClassBatchFree($conn, $queries, $class_id, $batch, $day, $slot_id1);
$ff11 = $functions->checkFacultyFree($conn, $queries, $faculty_id1, $day, $slot_id1);
$ff21 = $functions->checkFacultyFree($conn, $queries, $faculty_id2, $day, $slot_id1);
if(!$lf1) $msg .= "Lab not free for duration $slot_name1\n";
if(!$cf1) $msg .= "Class not free for duration $slot_name1\n";
if(!$ff11) $msg .= "$faculty_name1 is not available for duration $slot_name1\n";
if(!$ff21) $msg .= "$faculty_name2 is not available for duration $slot_name1\n";
if($lf1 && $cf1 && $ff11 && $ff21)
	$q1 = $queries->addTimeTableLab($conn, $class_id, $batch, $lab_id, $day, $slot_id1, $faculty_id1, $faculty_id2, $subject_id);
if($chk2 && $q1==1) {
	$slot_id2 = htmlentities($_POST['slot_id2']);
	$slot2 = $queries->getSlotById($conn, $slot_id2)->fetch_assoc();
	$slot_name2 = $slot2['start']." to ".$slot2['end'];
	$lf2 = $functions->checkLabFree($conn, $queries, $lab_id, $day, $slot_id2);
	$cf2 = $functions->checkClassBatchFree($conn, $queries, $class_id, $batch, $day, $slot_id2);
	$ff12 = $functions->checkFacultyFree($conn, $queries, $faculty_id1, $day, $slot_id2);
	$ff22 = $functions->checkFacultyFree($conn, $queries, $faculty_id2, $day, $slot_id2);
	if(!$lf2) $msg .= "Lab not free for duration $slot_name2\n";
	if(!$cf2) $msg .= "Class not free for duration $slot_name2\n";
	if(!$ff12) $msg .= "$faculty_name1 is not available for duration $slot_name2\n";
	if(!$ff22) $msg .= "$faculty_name2 is not available for duration $slot_name2\n";
	if($lf2 && $cf2 && $ff12 && $ff22)
		$q2 = $queries->addTimeTableLab($conn, $class_id, $batch, $lab_id, $day, $slot_id2, $faculty_id1, $faculty_id2, $subject_id);
}
if($chk3 && $q1==1 && $q2==1) {
	$slot_id3 = htmlentities($_POST['slot_id3']);
	$slot3 = $queries->getSlotById($conn, $slot_id3)->fetch_assoc();
	$slot_name3 = $slot3['start']." to ".$slot3['end'];
	$lf3 = $functions->checkLabFree($conn, $queries, $lab_id, $day, $slot_id3);
	$cf3 = $functions->checkClassBatchFree($conn, $queries, $class_id, $batch, $day, $slot_id3);
	$ff13 = $functions->checkFacultyFree($conn, $queries, $faculty_id1, $day, $slot_id3);
	$ff23 = $functions->checkFacultyFree($conn, $queries, $faculty_id2, $day, $slot_id3);
	if(!$lf3) $msg .= "Lab not free for duration $slot_name3\n";
	if(!$cf3) $msg .= "Class not free for duration $slot_name3\n";
	if(!$ff13) $msg .= "$faculty_name1 is not available for duration $slot_name3\n";
	if(!$ff23) $msg .= "$faculty_name2 is not available for duration $slot_name3\n";
	if($lf3 && $cf3 && $ff13 && $ff23)
		$q3 = $queries->addTimeTableLab($conn, $class_id, $batch, $lab_id, $day, $slot_id3, $faculty_id1, $faculty_id2, $subject_id);
}
// echo $msg;
if($msg!="") {
	// echo 'Error, '.$msg.', warning';
	// echo '<script>swal("Error", "'.$msg.'", "warning")</script>';
	$arr = array();
	$arr[0] = "Error";
	$arr[1] = $msg;
	$arr[2] = "warning";
	echo json_encode($arr);
}
if($q1 || $q2 || $q3){
	// echo 'Timetable updated, , success';
	// echo '<script>swal("Timetable updated", "", "success")</script>';
	$arr = array();
	$arr[0] = "Timetable updated";
	$arr[1] = "";
	$arr[2] = "success";
	echo json_encode($arr);	
}
// echo "q=".$q1." /".$q2;

?>