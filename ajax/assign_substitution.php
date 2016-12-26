<?php 
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';

$queries = new Queries();
$functions = new Functions();

$msg = "";
$time = htmlentities($_POST['date']);
$date = date('Y-m-d', strtotime($time));
$day = htmlentities($_POST['day']);
$slot_id = htmlentities($_POST['slot_id']);
$faculty_id = htmlentities($_POST['faculty_id']);
$faculty_title = $queries->getFacultyById($conn, $faculty_id)->fetch_assoc()['title'];
$faculty_name = $queries->getFacultyById($conn, $faculty_id)->fetch_assoc()['name'];
$subject_id = htmlentities($_POST['subject_id']);
$class_type = htmlentities($_POST['class_type']);
$replacement_id = htmlentities($_POST['replacement_id']);

$sf = $functions->checkSubstitutionFree($conn, $queries, $faculty_id, $date, $slot_id);
if(!$sf) {
	$sub = $queries->getSubstitutionByFacultyDateSlot($conn, $faculty_id, $date, $slot_id)->fetch_assoc();
	$replaced = $queries->getFacultyById($conn, $sub['replacement_id'])->fetch_assoc();
	$msg.= "Already assigned substitution for $faculty_title $faculty_name to \n".$replaced['title']." ".$replaced['name']."";
	$arr[] = "Error";
	$arr[] = $msg;
	$arr[] = "warning";
	echo json_encode($arr);
}
else {
	$q = $queries->addSubstitution($conn, $date, $day, $slot_id, $faculty_id, $subject_id, $class_type, $replacement_id);
	if($q==1) {
		$arr = array();
		$arr[0] = "Substitution assigned";
		$arr[1] = "";
		$arr[2] = "success";
		echo json_encode($arr);	
	}
}
?>