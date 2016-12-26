<?php
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';
include '../include/session.php';

$queries = new Queries();
$functions = new Functions();

$date = htmlentities($_POST['date']);
$timeperiod = htmlentities($_POST['timeperiod']);
$faculty_id = $g_id;
$d = explode('-', $date);
krsort($d);
$fdate = implode('-', $d);
$facultiesonleave; $x;
if($timeperiod == 0) {
	$x = "Before";
	$leave = $queries->getLeaveByFacultyBeforeDate($conn, $faculty_id, $date);
}
else if($timeperiod == 1) {
	$x = "After";
	$leave = $queries->getLeaveByFacultyAfterDate($conn, $faculty_id, $date);
}
echo "<div class='row'><section style='margin:10px;'><div class='col s12 m10 offset-m1'><div class='card z-depth-3 blue-grey lighten-5'><div class='card-content'><span class='card-title'>My Leaves ($x Date: $fdate)</span>";
if($leave->num_rows > 0){
	echo "<table class='bordered responsive-table'>";
	echo "<thead><tr><th>Date Leave Requested</th><th>Date of Leave</th><th>Granted</th></tr></thead>";
	while($row = $leave->fetch_assoc()) {
		$leave_date = $functions->prettyDateFormat($row['leave_date']);
		$request_date = $functions->prettyDateFormat($row['request_date']);
		$granted = ($row['granted']==1)?'Yes':'No';
		echo "<tr><td>$request_date</td><td>$leave_date</td><td>$granted</td></tr>";
	}
	echo "</table>";
}
echo "</div></div></div></section></div>";
?>