<?php 
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';
include '../include/session.php';

$queries = new Queries();
$functions = new Functions();
$faculty_id = $g_id;
$type = htmlentities($_POST['type']);
$today = $functions->currentDateYmd();
$time = $functions->currentTime();
$day = $functions->calculateDayOfWeek($today);

$cm = $functions->checkAttendanceMarked($conn, $queries, $faculty_id, $today);
if($type == 1) {
	if($cm) {
		echo '<button class="btn waves-effect waves-light red lighten-1" id="markfaculty" name="action">Mark Today\'s Attendance</button>';
	}
	else {
		echo '<button class="btn waves-effect waves-light green lighten-1"><i class="fa fa-check"></i></span> Attendance Marked<span></button>';	
	}
}
	
else if($type == 2) {
	if($cm) {
		$q = $queries->addAttendanceFaculty($conn, $faculty_id, $today, $time, $day);
		if($q==1) {
			echo "<script>swal('Attendance Marked', '', 'success');</script>";
			echo '<button class="btn waves-effect waves-light green lighten-1"><i class="fa fa-check"></i></span> Attendance Marked<span></button>';
		}
	}
	else {
		echo "<script>swal('Error', 'Attendance already marked for today', 'warning');</script>";
		echo '<button class="btn waves-effect waves-light green lighten-1"><i class="fa fa-check"></i></span> Attendance Marked<span></button>';
	}
}
?>