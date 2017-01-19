<?php $access = array(0); ?>
<?php
include 'include/header.inc.php';

if(isset($_POST['facid']) && isset($_POST['date'])) {
	$faculty_id = htmlentities($_POST['facid']);
	$date = htmlentities($_POST['date']);
	$day = $functions->calculateDayOfWeek($date);
	$Day = $functions->capitalize($day);
	$fdate = $functions->prettyDateFormat($date);
	$details = $queries->getFacultyById($conn, $faculty_id)->fetch_assoc();
	$faculty_name = $details['name'];
	$department = $details['department'];
	$schedule = $queries->getTimetableByFacultyDay($conn, $faculty_id, $day);
	$slots = $queries->getSlotsAll($conn);
	while($r = $slots->fetch_assoc()) {
		$slot[(int)$r['id']] = $functions->prettyTimeFormat($r['start'])." to ".$functions->prettyTimeFormat($r['end']);
	}
	echo "<div class='container'><section style='margin:10px;'><div class='col s12 m8 offset-m2'><div class='card z-depth-3 blue-grey lighten-4'><div class='card-content'><span class='card-title'>$faculty_name (Day: $Day $fdate)</span>";
	$i = 1;
	echo "<table class='bordered responsive-table'>";
	echo "<thead><tr><th>Slot</th><th>Semester</th><th>Class</th><th>Subject</th><th>Manage</th></tr></thead>";
	if($schedule->num_rows > 0) {
		while($row = $schedule->fetch_assoc()) {
			$slot_id = $row['slot_id'];
			$class_type = $row['class_type'];
			$class_id = $row['class_id'];
			$lab_id = (!empty($row['lab_id']))?$row['lab_id']:0;
			$cdetails = $queries->getClassById($conn, $class_id)->fetch_assoc();
			$sem = $cdetails['semester'];
			$sect = $cdetails['section'];
			$subject_id = $row['subject_id'];
			$ct = ($class_type==0)?" (LAB) ":"";
			$alreadyassigned = $queries->getSubstitutionByFacultyDateSlot($conn, $faculty_id, $date, $slot_id);
			while($slot_id > $i) $i++;
			echo "<tr><td>$slot[$i]</td><td>$sem</td><td>$sect</td><td>$subject_id$ct</td>";
			echo "<td><form><input type='hidden' name='day' value='$day'><input type='hidden' name='slot_id' value='$slot_id'><input type='hidden' name='class_type' value='$class_type'>";
			if($class_type==1)
				echo "<input type='hidden' name='class_id' value='$class_id'>";
			if($alreadyassigned->num_rows > 0) {
				echo"</form><a class='btn waves-effect waves-light green lighten-1 modal-trigger' href='#modal$i'>Reassign</a></td></tr>";
			}
			else {
				echo"</form><a class='btn waves-effect waves-light blue-grey lighten-1 modal-trigger' href='#modal$i'>Manage</a></td></tr>";	
			}
			if($class_type==1) $facs = $functions->findFreeFacultiesClass($conn, $queries, $faculty_id, $class_id, $slot_id, $day, $date);
			if($class_type==0) $facs = $functions->findFreeFacultiesLab($conn, $queries, $faculty_id, $slot_id, $day, $date, $department);
			$facs = $functions->prioritizeFaculties($conn, $queries, $facs, $day, $slot_id);
			// $duration = "Day: $Day $today($slot[$i])";
			$final = array();
			foreach($facs as $v) {
				$lf = ($v[5]==0)?'-':$slot[$v[5]];
				$nf = ($v[6]==10)?'-':$slot[$v[6]];
				$final[] = array($v[1], $v[0], $v[2], $v[3], $v[4], $lf, $nf);
			}
			$w[$i] = array($final, $slot[$slot_id], $subject_id, $class_type, $slot_id, $class_id, $lab_id);
			$i++;
		}
		echo "</table>";
		echo "</div></div></div></section></div>";
		foreach($w as $i=>$v) {
			echo "<div id='modal$i' class='modal bottom-sheet' style='z-index: 1003; display: block; opacity: 1; min-height:70%'>
			    <div class='modal-content'>
			      <h4>Day: $Day $fdate ($v[1])</h4>
			      ";
			echo "<table class='bordered responsive-table striped'>";
			echo "<thead><tr><th>Faculty Id</th><th>Faculty Name</th><th>Total Classes</th><th>Last Class</th><th>Next Class</th><th>Points</th><th>Assign</th></tr></thead>";
			echo "<tbody>";
			foreach($v[0] as $j=>$x) {
				echo "<tr><td>$x[2]</td><td>$x[3]</td><td>$x[4]</td><td>$x[5]</td><td>$x[6]</td><td>$x[0]</td><td><button class='btn waves-effect waves-green' onclick='assignFaculty(\"$date\", \"$day\", $v[4], $v[5], $v[6], $faculty_id, \"$v[2]\", $v[3], $x[2], $i, $j);' id='asg-$i-$j'>Assign</button></td></tr>";
			}
			echo "</tbody>";
			echo "</table>";
			echo    "</div>
			  </div>";
		}
	}
}

else {
	header('Location:allot_class.php');
}
?>
<?php include 'include/footer.inc.php'; ?>
<script type="text/javascript">
	function assignFaculty(date, day, slot_id, class_id, lab_id, faculty_id, subject_id, class_type, replacement_id, btni, btnj) {
		console.log(date+" "+day+" "+slot_id+" "+class_id+" "+lab_id+" "+faculty_id+" "+subject_id+" "+class_type+" "+replacement_id);
		var btnid = 'asg-'+btni+'-'+btnj;
		$.post("ajax/assign_substitution.php", {
			date: date,
			day: day,
			slot_id: slot_id,
			class_id: class_id,
			lab_id: lab_id,
			faculty_id: faculty_id,
			subject_id: subject_id,
			class_type: class_type,
			replacement_id: replacement_id
		},
		function(response, status) {
			var data = JSON.parse(response);
			// console.log(response);
			// console.log(data[0]+"\n"+data[1]+"\n"+data[2]);
			swal(data[0], data[1], data[2]);
		});
	}
</script>