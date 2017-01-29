<?php $access = array(2); ?>
<?php 
include 'include/header.inc.php';
$c = $queries->getClassByUserId($conn, $g_userid);
if($c->num_rows > 0) {
	$class = $class->fetch_assoc();
	$class_id = $class['id'];
	$date = $functions->currentDateYmd();
	$day = $functions->calculateDayOfWeek($date);
	$timetable = $queries->getTimetableByClassDay($conn, $class_id, $day)->fetch_assoc();
	$substitution = $queries->getSubstitutionByClassDate($conn, $class_id, $date)->fetch_assoc();
	print_r($timetable); print_r($substitution);
}
else {
	echo "No class found";
}
?>