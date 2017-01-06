<?php
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';

$queries = new Queries();
$functions = new Functions();

$date = htmlentities($_POST['date']);
$today = date('Y-m-d', strtotime('+4 hours 30 minutes'));
$temp = $queries->getSubstitutionByDate($conn, $date);
$fdate = $functions->prettyDateFormat($date);
echo "<div><section style='margin:10px;'><div class='col s12 m10 offset-m1'><div class='card z-depth-3 blue-grey lighten-5'><div class='card-content'><span class='card-title'>Temporary Classes (Date: $fdate)</span>";
if($temp->num_rows > 0) {
	echo "<table class='bordered responsive-table'>";
	echo "<thead><tr><th>Faculty Name</th><th>Replacement Faculty</th><th>Slot</th><th>Class Type</th><th>Subject</th></tr></thead>";
	while($row = $temp->fetch_assoc()) {
		$facid = $row['faculty_id'];
		$facname = $queries->getFacultyById($conn, $facid)->fetch_assoc()['name'];
		$replacementid = $row['replacement_id'];
		$replacementname = $queries->getFacultyById($conn, $replacementid)->fetch_assoc()['name'];
		$slot_id = $row['slot_id'];
		$slot = $queries->getSlotById($conn, $slot_id)->fetch_assoc();
		$slotname = $slot['start']." to ".$slot['end'];
		$subject_id = $row['subject_id'];
		$class_type = ($row['class_type'])?'Class':'Lab';
		$subject_name = $queries->getSubjectById($conn, $subject_id)->fetch_assoc()['subject_name'];
		echo "<tr><td>$facname</td><td>$replacementname</td><td>$slotname</td><td>$class_type</td><td>$subject_name ($subject_id)</td></tr>";
	}
	echo "</table>";
}
echo "</div></div></div></section></div>";
?>