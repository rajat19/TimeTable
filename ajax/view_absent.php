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
$d = explode('-', $date);
krsort($d);
$fdate = implode('-', $d);
$facultiesonleave = $queries->getFacultiesOnLeaveByDate($conn, $date);
echo "<div class='row'><section style='margin:10px;'><div class='col s12 m10 offset-m1'><div class='card z-depth-3 blue-grey lighten-5'><div class='card-content'><span class='card-title'>Faculties on Leave (Day: $Day $fdate)</span>";
$leavefac = array();
if($facultiesonleave->num_rows > 0){
	echo "<table class='bordered responsive-table'>";
	echo "<thead><tr><th>Faculty Name</th><th>Department</th><th>Manage</th></tr></thead>";
	while($row = $facultiesonleave->fetch_assoc()) {
		$facid = $row['id'];
		$facname = $row['name'];
		$dept = $row['department'];
		$leavefac[] = $facid;
		echo "<tr><td>$facname</td><td>$dept</td><td><form action='manage_schedule.php' method='POST'><input type='hidden' name='facid' value='$facid'><button type='submit' class='btn waves-effect waves-light blue-grey lighten-1'>Manage</button></form></td></tr>";
	}
	echo "</table>";
}
echo "</div></div></div></section></div>";

// echo "$today $date";
if($today == $date) {
	$absentfaculties = $queries->getFacultiesByAttendanceNotMarked($conn, $date);
	echo "<div class='row'><section style='margin:10px;'><div class='col s12 m10 offset-m1'><div class='card z-depth-3 blue-grey lighten-5'><div class='card-content'><span class='card-title'>Faculties with Attendance Not Marked(Day: $Day $fdate)</span>";
	if($absentfaculties->num_rows > 0) {
		echo "<table class='bordered responsive-table'>";
		echo "<thead><tr><th>Faculty Name</th><th>Department</th><th>Manage</th></tr></thead>";
		while($row = $absentfaculties->fetch_assoc()) {
			$facid = $row['id'];
			$facname = $row['name'];
			$dept = $row['department'];

			if(!in_array($facid, $leavefac)) {
				echo "<tr><td>$facname</td><td>$dept</td><td><form action='manage_schedule.php' method='POST'><input type='hidden' name='facid' value='$facid'><button type='submit' class='btn waves-effect waves-light blue-grey lighten-1'>Manage</button></form></td></tr>";
			}
		}
		echo "</table>";
	}
	else {
		echo "No Faculty is Absent on date";
	}
	echo "</div></div></div></section></div>";
}
?>