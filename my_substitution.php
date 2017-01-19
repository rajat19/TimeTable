<?php $access = array(1); ?>
<?php
include 'include/header.inc.php';
$replacement_id = $queries->getFacultyByUserId($conn, $g_userid)->fetch_assoc()['id'];
$date = $functions->currentDateYmd();
$getSubstitution = $queries->getSubstitutionByReplacementAfterDate($conn, $replacement_id, $date);
if($getSubstitution->num_rows > 0){
	echo "<div class='row'><section style='margin:10px;'><div class='col s12 m10 offset-m1'><div class='card z-depth-3 blue-grey lighten-5'><div class='card-content'><span class='card-title'>Future Substitutions</span>";
	echo "<table class='bordered responsive-table'>";
	echo "<thead><tr><th>Class</th><th>Location</th><th>Date (Day)</th><th>Time Slot</th><th>Faculty Name</th><th>Accept/Reject</th></tr></thead>";
	while($row = $getSubstitution->fetch_assoc()) {
		$sub_id = $row['id'];
		$date = $functions->prettyDateFormat($row['date']);
		$day = $functions->capitalize($row['day']);
		$class_type = $row['class_type'];
		$lab_id = $row['lab_id'];
		$class_id = $row['class_id'];
		$slot_id = $row['slot_id'];
		$faculty_id = $row['faculty_id'];
		$accepted = $row['accepted'];
		$c = $functions->getClassName($conn, $queries, $class_id);
		$class = $c[0];
		if($lab_id!=0) {
			$location = $queries->getLabById($conn, $lab_id)->fetch_assoc()['name'];
		}
		else $location = $c[1];
		$fdetails = $queries->getFacultyById($conn, $faculty_id)->fetch_assoc();
		$facname = $fdetails['title']." ".$fdetails['name'];
		$s = $queries->getSlotById($conn, $slot_id)->fetch_assoc();
		$slot = $functions->prettyTimeFormat($s['start'])." to ".$functions->prettyTimeFormat($s['end']);
		echo "<tr><td>$class</td><td>$location</td><td>$date ($day) </td><td>$slot</td><td>$facname</td>";
		if($accepted==0) {
			echo "<td id='x-$sub_id'><button id='accept-$sub_id' onclick='accept($sub_id);' class='btn-floating waves-effect waves-light green lighten-1'><span><i class='fa fa-check'></i></span></button><button id='reject-$sub_id' onclick='reject($sub_id);' class='btn-floating waves-effect waves-light red lighten-1'><span><i class='fa fa-times'></i></span></button></td></tr>";
		}
		else {
			$granted = ($accepted==1)?'Accepted':'Rejected';
			echo "<td>$granted</td></tr>";	
		}
	}
	echo "</table>";
	echo "</div></div></div></section></div>";
}

$getSubstitution = $queries->getSubstitutionByReplacementBeforeDate($conn, $replacement_id, $date);
if($getSubstitution->num_rows > 0){
	echo "<div class='row'><section style='margin:10px;'><div class='col s12 m10 offset-m1'><div class='card z-depth-3 blue-grey lighten-5'><div class='card-content'><span class='card-title'>Past Substitutions</span>";
	echo "<table class='bordered responsive-table'>";
	echo "<thead><tr><th>Class</th><th>Location</th><th>Date (Day)</th><th>Time Slot</th><th>Faculty Name</th><th>Accepted/Rejected</th></tr></thead>";
	while($row = $getSubstitution->fetch_assoc()) {
		$sub_id = $row['id'];
		$date = $functions->prettyDateFormat($row['date']);
		$day = $functions->capitalize($row['day']);
		$class_type = $row['class_type'];
		$lab_id = $row['lab_id'];
		$class_id = $row['class_id'];
		$slot_id = $row['slot_id'];
		$faculty_id = $row['faculty_id'];
		$accepted = $row['accepted'];
		$c = $functions->getClassName($conn, $queries, $class_id);
		$class = $c[0];
		if($lab_id!=0) {
			$location = $queries->getLabById($conn, $lab_id)->fetch_assoc()['name'];
		}
		else $location = $c[1];
		$fdetails = $queries->getFacultyById($conn, $faculty_id)->fetch_assoc();
		$facname = $fdetails['title']." ".$fdetails['name'];
		$s = $queries->getSlotById($conn, $slot_id)->fetch_assoc();
		$slot = $functions->prettyTimeFormat($s['start'])." to ".$functions->prettyTimeFormat($s['end']);
		echo "<tr><td>$class</td><td>$location</td><td>$date ($day) </td><td>$slot</td><td>$facname</td>";
		$granted = ($accepted==1)?'Accepted':'Rejected';
		echo "<td>$granted</td></tr>";	
	}
	echo "</table>";
	echo "</div></div></div></section></div>";
}
include 'include/footer.inc.php';
?>
<script type="text/javascript">
	function accept(sid) {
		var a = 1;
		$.post("ajax/accept_sub.php", {
			sub_id: sid,
			a: a
		},
		function (response, status) {
			$('#x-'+sid).html(response);
		});
	}

	function reject(lid) {
		var a = -1;
		$.post("ajax/accept_sub.php", {
			sub_id: sid,
			a: a
		},
		function (response, status) {
			$('#x-'+sid).html(response);
		});
	}
</script>