<?php
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';

$queries = new Queries();
$functions = new Functions();

$date = htmlentities($_POST['date']);
$today = $functions->currentDateYmd();
$day = $functions->calculateDayOfWeek($date);
$Day = $functions->capitalize($day);
$fdate = $functions->prettyDateFormat($date);
$facultiesonleave = $queries->getFacultiesOnLeaveByDate($conn, $date);
$leavefac = array();
echo "<div class='row'><section style='margin:10px;'><div class='col s12 m10 offset-m1'><div class='card z-depth-3 blue-grey lighten-5'><div class='card-content'><span class='card-title'>Faculties on Leave (Day: $Day $fdate)</span>";
if($facultiesonleave->num_rows > 0){
	echo "<table class='bordered responsive-table'>";
	echo "<thead><tr><th>Faculty Name</th><th>Department</th><th>Manage</th></tr></thead>";
	while($row = $facultiesonleave->fetch_assoc()) {
		$facid = $row['faculty_id'];
		$facname = $row['name'];
		$dept = $row['department'];
		$leavefac[] = $facid;
		$granted = $row['granted'];
		$ifclasstoday = $queries->getTimetableByFacultyDay($conn, $facid, $day)->num_rows;
		echo "<tr><td>$facname</td><td>$dept</td>";
		if($ifclasstoday > 0) {
			if($granted == 1) echo "<td><form action='manage_schedule.php' target='_blank' method='POST'><input type='hidden' name='facid' value='$facid'><input type='hidden' name='date' value='$date'><button type='submit' class='btn waves-effect waves-light blue-grey lighten-1'>Manage</button></form></td>";
			else if($granted == 0) echo "<td>Leave Pending</td>";
			else echo "<td></td>";
		}
		else {
			echo "<td>No class Today</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
}
else {
	echo "<h5 style='text-align:center; color:red;'>No faculties on leave</h5>";
}
echo "</div></div></div></section></div>";

if($today == $date) {
	$absentfaculties = $queries->getFacultiesByAttendanceNotMarked($conn, $date);
	echo "<div class='row'><section style='margin:10px;'><div class='col s12 m10 offset-m1'><div class='card z-depth-3 blue-grey lighten-5'><div class='card-content'><span class='card-title'>Faculties with Attendance Not Marked (Day: $Day $fdate)</span>";
	if($absentfaculties->num_rows > 0) {
		echo "<table class='bordered responsive-table'>";
		echo "<thead><tr><th>Faculty Name</th><th>Department</th><th>Manage</th></tr></thead>";
		while($row = $absentfaculties->fetch_assoc()) {
			$facid = $row['id'];
			$facname = $row['name'];
			$dept = $row['department'];
			$ifclasstoday = $queries->getTimetableByFacultyDay($conn, $facid, $day)->num_rows;
			if(!in_array($facid, $leavefac)) {
				echo "<tr><td>$facname</td><td>$dept</td>";
				if($ifclasstoday > 0) {
					echo "<td><form action='manage_schedule.php' target='_blank' method='POST'><input type='hidden' name='facid' value='$facid'><input type='hidden' name='date' value='$date'><button type='submit' class='btn waves-effect waves-light blue-grey lighten-1'>Manage</button></form></td></tr>";	
				}
				else {
					echo "<td>No class today</td>";
				}
			}
		}
		echo "</table>";
	}
	else {
		echo "<h5 style='text-align:center; color:red;'>No faculties is absent today</h5>";
	}
	echo "</div></div></div></section></div>";
}
?>