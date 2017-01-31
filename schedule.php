<?php $access = array(2); ?>
<?php 
include 'include/header.inc.php';
$c = $queries->getClassByUserId($conn, $g_userid);
$date = $functions->currentDateYmd();
$day = $functions->calculateDayOfWeek($date);
$fdate = $functions->prettyDateFormat($date);
$cday = $functions->capitalize($day);
echo "<div ><section style='margin:10px;'><div class='col s12 m12'><div class='card z-depth-3 blue accent-1'><div class='card-content'><span class='card-title'>Today's Schedule ($fdate $cday)</span>";
if($c->num_rows > 0) {
	$class = $c->fetch_assoc();
	$class_id = $class['id'];
	$class_location = $class['location'];
	$timetable = $queries->getTimetableByClassDay($conn, $class_id, $day);
	$substitution = $queries->getSubstitutionByClassDate($conn, $class_id, $date);
	$sub_array = array();
	$rep = array();
	while($row = $substitution->fetch_assoc()) {
		if($row['accepted']=='1')
			$sub_array[] = array($row['slot_id'], $row['faculty_id']);
		$rep[] = $row['replacement_id'];
	}
	echo "<table class='bordered'>";
	echo "<thead><tr><th>Slot</th><th>Subject</th><th>Location</th><th>Faculties</th></tr></thead>";
	while($row = $timetable->fetch_assoc()) {
		$slot_id = $row['slot_id'];
		$faculty_id = $row['faculty_id'];
		$faculty_id2 = $row['faculty_id2'];
		$class_type = $row['class_type'];
		$subject_id = $row['subject_id'];
		if(in_array(array($slot_id, $faculty_id), $sub_array)) {
			echo "<tr class='pink lighten-3'>";
			$pos = array_search(array($slot_id, $faculty_id), $sub_array);
			$faculty_id = $rep[$pos];
			if($class_type==1) {
				$subject_id = $queries->getSubjectByFacultyClass($conn, $faculty_id, $class_id)->fetch_assoc()['subject_id'];
			}
		}
		else if($class_type==0 && in_array(array($slot_id, $faculty_id2), $sub_array)) {
			echo "<tr class='pink lighten-3'>";
			$pos = array_search(array($slot_id, $faculty_id2), $sub_array);
			$faculty_id2 = $rep[$pos];
		}
		else {
			echo "<tr>";
		}
		$slot = $functions->prettySlotFormat($conn, $queries, $slot_id);
		$subject_name = $queries->getSubjectById($conn, $subject_id)->fetch_assoc()['subject_name'];
		echo "<td>$slot</td><td>$subject_name ($subject_id)</td>";
		$faculty = $queries->getFacultyById($conn, $faculty_id)->fetch_assoc();
		$faculty_name = $faculty['title']." ".$faculty['name'];
		if($class_type==0) {
			$lab_id = $row['lab_id'];
			$batch = $row['batch'];
			$b = ($batch=='A')?'1+2':'3+4';
			$faculty2 = $queries->getFacultyById($conn, $faculty_id2)->fetch_assoc();
			$faculty_name2 = $faculty2['title']." ".$faculty2['name'];
			$lab = $queries->getLabById($conn, $lab_id)->fetch_assoc()['name'];
			echo "<td>$lab (Batch: $b)</td><td>$faculty_name and $faculty_name2</td>";
		}
		else {
			echo "<td>$class_location</td><td>$faculty_name</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
}
else {
	echo "No class found";
}
echo "</div></div></div></section></div>";
?>
<?php include 'include/footer.inc.php'; ?>