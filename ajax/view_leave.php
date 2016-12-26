<?php
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';

$queries = new Queries();
$functions = new Functions();

$date = htmlentities($_POST['date']);
$timeperiod = htmlentities($_POST['timeperiod']);
$d = explode('-', $date);
krsort($d);
$fdate = implode('-', $d);
$facultiesonleave; $x;
if($timeperiod == 0) {
	$x = "Before";
	$facultiesonleave = $queries->getFacultiesOnLeaveBeforeDate($conn, $date);
}
else if($timeperiod == 1) {
	$x = "After";
	$facultiesonleave = $queries->getFacultiesOnLeaveAfterDate($conn, $date);
}
echo "<div class='row'><section style='margin:10px;'><div class='col s12 m10 offset-m1'><div class='card z-depth-3 blue-grey lighten-5'><div class='card-content'><span class='card-title'>Faculties on Leave ($x Date: $fdate)</span>";
$leavefac = array();
if($facultiesonleave->num_rows > 0){
	echo "<table class='bordered responsive-table'>";
	echo "<thead><tr><th>Faculty Name</th><th>Department</th><th>Date Leave Requested</th><th>Date of Leave</th><th>Granted</th></tr></thead>";
	while($row = $facultiesonleave->fetch_assoc()) {
		$facid = $row['id'];
		$facname = $row['name'];
		$dept = $row['department'];
		$leave_date = $functions->prettyDateFormat($row['leave_date']);
		$request_date = $functions->prettyDateFormat($row['request_date']);
		$granted = ($row['granted']==1)?'Yes':'No';
		$leavefac[] = $facid;
		echo "<tr><td>$facname</td><td>$dept</td><td>$request_date</td><td>$leave_date</td><td>$granted</td></tr>";
	}
	echo "</table>";
}
echo "</div></div></div></section></div>";
?>