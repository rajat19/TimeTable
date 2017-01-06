<?php
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';

$queries = new Queries();
$functions = new Functions();

$date = htmlentities($_POST['date']);
$timeperiod = htmlentities($_POST['timeperiod']);
$fdate = $functions->prettyDateFormat($date);
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
if($facultiesonleave->num_rows > 0){
	echo "<table class='bordered responsive-table'>";
	echo "<thead><tr><th>Faculty Name</th><th>Department</th><th>Date Leave Requested</th><th>Date of Leave</th><th>Granted</th></tr></thead>";
	while($row = $facultiesonleave->fetch_assoc()) {
		$leave_id = $row['id'];
		$facid = $row['faculty_id'];
		$facname = $row['name'];
		$dept = $row['department'];
		$leave_date = $functions->prettyDateFormat($row['leave_date']);
		$request_date = $functions->prettyDateFormat($row['request_date']);
		$g = $row['granted'];
		echo "<tr><td>$facname</td><td>$dept</td><td>$request_date</td><td>$leave_date</td>";
		if($g==0 && $timeperiod==1) {
			echo "<td id='x-$leave_id'><button id='accept-$leave_id' onclick='accept($leave_id);' class='btn-floating waves-effect waves-light green lighten-1'><span><i class='fa fa-check'></i></span></button><button id='reject-$leave_id' onclick='reject($leave_id);' class='btn-floating waves-effect waves-light red lighten-1'><span><i class='fa fa-times'></i></span></button></td></tr>";
		}
		else {
			$granted = ($g==1)?'Yes':'No';
			echo "<td>$granted</td></tr>";	
		}
	}
	echo "</table>";
}
echo "</div></div></div></section></div>";
?>