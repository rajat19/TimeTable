<?php 
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';

$queries = new Queries();
$functions = new Functions();

$ar = array();
$date = htmlentities($_POST['date']);$d = explode('-', $date);
krsort($d);
$fdate = implode('-', $d);
$marked = $queries->getAttendanceByDate($conn, $date);
if($marked->num_rows > 0) {
	echo "<section style='margin:10px;'><div class='col s8 m6 offset-m2'><div class='card z-depth-3 green lighten-4'><div class='card-content'><span class='card-title'>Attendance Marked (Date: $fdate)</span>";
	echo "<table class='bordered responsive-table'>";
	echo "<thead><tr><th>Faculty Name</th><th>Time</th></tr></thead>";
	while($row = $marked->fetch_assoc()) {
		$facid = $row['faculty_id'];
		$time = $row['time'];
		$day = $row['day'];
		$ar[] = $facid;
		$faculty_name = $queries->getFacultyById($conn, $facid)->fetch_assoc()['name'];
		echo "<tr><td>$faculty_name</td><td>$time</td></tr>";
	}
	echo "</table>";
	echo "</div></div></div></section>";
}

$allfaculties = $queries->getFacultiesAll($conn);
echo "<section style='margin:10px;'><div class='col s12 m8 offset-m2'><div class='card z-depth-3 red lighten-4'><div class='card-content'><span class='card-title'>Attendance Not Marked (Date: $fdate)</span>";
echo "<table class='bordered responsive-table'>";
echo "<thead><tr><th>Faculty Name</th><th>Faculty Name</th></tr></thead>";
$i = 0;
while($row = $allfaculties->fetch_assoc()) {
	$facid = $row['id'];
	if(!in_array($facid, $ar)) {
		$faculty_name = $row['name'];
		if($i%2==0) echo "<tr><td>$faculty_name</td>";
		else echo "<td>$faculty_name</td></tr>";
		$i++;
	}
}
echo "</table>";
echo "</div></div></div></section>";
?>