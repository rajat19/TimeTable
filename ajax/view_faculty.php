<?php 
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';

$queries = new Queries();
$functions = new Functions();

$msg = "";
$faculty_id = htmlentities($_POST['faculty_id']);
$day = htmlentities($_POST['day']);
if($day != 'all') {
	$clsdata = array();
	$schedule = $queries->getTimetableByFacultyDay($conn, $faculty_id, $day);
	if($schedule->num_rows > 0) {
		echo "<section style='margin:10px;'><div class='col s12 m8 offset-m2'><div class='card z-depth-3'><div class='card-content'><span class='card-title'>Time Table</span>";
		echo "<table class='bordered responsive-table striped'>";
		echo "<thead><tr><th>Day</th><th>8:30 - 9:20</th><th>9:20 - 10:10</th><th>10:10 - 11:00</th><th>11:00 - 11:50</th><th>11:50 - 12:40</th><th>12:40 - 13:30</th><th>13:30 - 14:20</th><th>14:20 - 15:10</th><th>15:10 - 16:00</th></tr></thead>";
		$i = 1;
		echo "<tbody><tr>";
		echo "<th>$day</th>";
		$l = 1;
		$oldslot=0;
		while($row = $schedule->fetch_assoc()) {
			$slot_id = $row['slot_id'];
			$class_id = $row['class_id'];
			$cdetails = $queries->getClassById($conn, $class_id)->fetch_assoc();
			$sem = $cdetails['semester'];
			$sect = $cdetails['section'];
			$class_type = $row['class_type'];
			$subject_id = $row['subject_id'];
			$faculty_name = $queries->getFacultyById($conn, $faculty_id)->fetch_assoc()['name'];
			$cls;
			if($class_type == 0) {
				$lab_id = $row['lab_id'];
				$lab_name = $queries->getLabById($conn, $lab_id)->fetch_assoc()['name'];
				$batch = $row['batch'];
				$batch_name = $queries->getBatchById($batch);
				$cls = array($class_type, $subject_id, $sem, $sect, $lab_name, $batch_name);
			}
			else
				$cls = array($class_type, $subject_id, $sem, $sect);
			array_push($clsdata, $cls);
			while($slot_id != $i) {
				echo "<td></td>";
				$i++;
			}
			// if($oldslot != $slot_id) {
			// 	if($class_type==0) echo "<td>LAB</td>";
			// 	else {
			// 		echo "<td>$subject_id</td>";
			// 		$i++;
			// 	}
			// 	$oldslot = $slot_id;
			// }
			// else {
			// 	if($class_type == 0) $i++;
			// }
			if($class_type==0) echo "<td>$subject_id<br>$sect ($batch_name)</td>";
			else echo "<td>$subject_id<br>$class_name</td>";
			$i++;
		}	
		while($i<=9) {
			echo "<td></td>";
			$i++;
		}
		echo "</tr></tbody>";
		echo "</table>";
		echo "</div></div></div></section>";

		echo "<section class='container'><div class='col s12 m6 offset-m3'><div class='card z-depth-3'><div class='card-content'><span class='card-title'>Subject Details</span>";
		echo "<table class='bordered striped'>";
		echo "<thead><tr><th>Subject</th><th>Semester</th><th>Section</th><th>Venue</th></tr></thead>";
		echo "<tbody>";
		foreach($clsdata as $fac) {
			echo "<tr><td>$fac[1]</td><td>$fac[2]</td><td>$fac[3]</td><td>";
			if($fac[0]==0) echo "$fac[4]";
			else echo "";
			echo "</td></tr>";
		}
		echo "</tbody>";
		echo "</table>";
		echo "</div></div></div></section>";
	}
	else {
		echo "No data was found for the faculty $faculty_id";
	}
}

// day == all
else {
	echo "<section style='margin:10px;'><div class='col s12 m8 offset-m2'><div class='card z-depth-3'><div class='card-content'><span class='card-title'>Time Table</span>";
		echo "<table class='bordered responsive-table striped'>";
		echo "<thead><tr><th>Day</th><th>8:30 - 9:20</th><th>9:20 - 10:10</th><th>10:10 - 11:00</th><th>11:00 - 11:50</th><th>11:50 - 12:40</th><th>12:40 - 13:30</th><th>13:30 - 14:20</th><th>14:20 - 15:10</th><th>15:10 - 16:00</th></tr></thead>";
	$days = $queries->getDaysAll($conn);
	$clsdata = array();
	echo "<tbody>";
	foreach($days as $day) {
		echo "<tr>";
		echo "<th>$day</th>";
		$i = 1; $oldslot = 0;
		$schedule = $queries->getTimetableByFacultyDay($conn, $faculty_id, $day);
		if($schedule->num_rows > 0) {
			$l=1;
			while($row = $schedule->fetch_assoc()) {
				$slot_id = $row['slot_id'];
			$class_id = $row['class_id'];
			$cdetails = $queries->getClassById($conn, $class_id)->fetch_assoc();
			$sem = $cdetails['semester'];
			$sect = $cdetails['section'];
			$class_type = $row['class_type'];
			$subject_id = $row['subject_id'];
			$faculty_name = $queries->getFacultyById($conn, $faculty_id)->fetch_assoc()['name'];
			$cls;
			if($class_type == 0) {
				$lab_id = $row['lab_id'];
				$lab_name = $queries->getLabById($conn, $lab_id)->fetch_assoc()['name'];
				$batch = $row['batch'];
				$batch_name = $queries->getBatchById($batch);
				$cls = array($class_type, $subject_id, $sem, $sect, $lab_name);
			}
			else
				$cls = array($class_type, $subject_id, $sem, $sect);
			$cls = implode('$', $cls);
			array_push($clsdata, $cls);
			while($slot_id != $i) {
				echo "<td></td>";
				$i++;
			}
			if($class_type==0) echo "<td>$subject_id<br>$sect ($batch_name)</td>";
			else echo "<td>$subject_id<br>$class_name</td>";
			$i++;
			}
		}
		while($i<=9) {
			echo "<td></td>";
			$i++;
		}
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";
	echo "</div></div></div></section>";
	$clsdata = array_unique($clsdata);
	sort($clsdata);
	echo "<section class='container'><div class='col s12 m6 offset-m3'><div class='card z-depth-3'><div class='card-content'><span class='card-title'>Subject Details</span>";
	echo "<table class='bordered striped'>";
	echo "<thead><tr><th>Subject</th><th>Semester</th><th>Section</th><th>Venue</th></tr></thead>";
	echo "<tbody>";
	foreach($clsdata as $c) {
		$fac = explode('$', $c);
		echo "<tr><td>$fac[1]</td><td>$fac[2]</td><td>$fac[3]</td><td>";
		if($fac[0]==0) echo "$fac[4]";
		else echo "";
		echo "</td></tr>";
	}
	echo "</tbody>";
	echo "</table>";
	echo "</div></div></div></section>";
}
?>