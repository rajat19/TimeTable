<?php
include 'include/header.inc.php';

$today = date('Y-m-d', strtotime('+3 hours 30 minutes'));
$time = date('H:i:s', strtotime('+3 hours 30 minutes'));
$day = $functions->calculateDayOfWeek($today);
$Day = substr(strtoupper($day), 0, 1).substr($day, 1);

if(isset($_POST['facid'])) {
	$faculty_id = htmlentities($_POST['facid']);
	$faculty_name = $queries->getFacultyById($conn, $faculty_id)->fetch_assoc()['name'];
	$schedule = $queries->getTimetableByFacultyDay($conn, $faculty_id, $day);
	$slots = $queries->getSlotsAll($conn);
	while($r = $slots->fetch_assoc()) {
		$slot[(int)$r['id']] = $r['start']." to ".$r['end'];
	}
	echo "<div class='container'><section style='margin:10px;'><div class='col s12 m8 offset-m2'><div class='card z-depth-3 red lighten-4'><div class='card-content'><span class='card-title'>$faculty_name (Day: $Day $today)</span>";
	echo "<table class='bordered responsive-table'>";
	echo "<thead><tr><th>Slot</th><th>Semester</th><th>Class</th><th>Subject</th><th>Manage</th></tr></thead>";
	$i = 1;
	while($row = $schedule->fetch_assoc()) {
		$slot_id = $row['slot_id'];
		$class_id = $row['class_id'];
		$cdetails = $queries->getClassById($conn, $class_id)->fetch_assoc();
		$sem = $cdetails['semester'];
		$sect = $cdetails['section'];
		$class_type = $row['class_type'];
		$subject_id = $row['subject_id'];
		$ct = ($class_type==0)?" (LAB) ":"";
		while($slot_id > $i) $i++;
		echo "<tr><td>$slot[$i]</td><td>$sem</td><td>$sect</td><td>$subject_id$ct</td><td><form><input type='hidden' name='day' value='$day'><input type='hidden' name='slot_id' value='$slot_id'><input type='hidden' name='class_type' value='$class_type'>";
		if($class_type==1)
			echo "<input type='hidden' name='class_id' value='$class_id'>";
		echo"</form><button id='assignBtn' class='btn waves-effect waves-light red lighten-1'>Manage</button></td></tr>";
		$i++;
	}
	echo "</table>";
	echo "</div></div></div></section></div>";
}
else {
	header('Location:allot_class.php');
}
?>
<div id="myModal">

</div>
<?php include 'include/footer.inc.php'; ?>
<script type="text/javascript">
	$('#assignBtn').click(function() {
		
	});
</script>