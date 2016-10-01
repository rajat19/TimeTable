<?php 
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';

$queries = new Queries();
$functions = new Functions();

$msg = "";
// $class_id = htmlentities($_POST['class_id']);
// $day = htmlentities($_POST['day']);
$class_id = htmlentities($_POST['class_id']);
$day = htmlentities($_POST['day']);
if($day != 'all') {
	$facdata = array(); $labdata = array();
	$schedule = $queries->getTimetableByClassDay($conn, $class_id, $day);
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
			$faculty_id = $row['faculty_id'];
			$class_type = $row['class_type'];
			$subject_id = $row['subject_id'];
			$faculty_name1 = $queries->getFacultyById($conn, $faculty_id)->fetch_assoc()['name'];
			$lab_id; $faculty_id2; $faculty_name2; $batch_name; $batch; $fac;
			if($class_type == 0) {
				$lab_id = $row['lab_id'];
				$lab_name = $queries->getLabById($conn, $lab_id)->fetch_assoc()['name'];
				$faculty_id2 = $row['faculty_id2'];
				$faculty_name2 = $queries->getFacultyById($conn, $faculty_id2)->fetch_assoc()['name'];
				$batch = $row['batch'];
				$batch_name = $queries->getBatchById($batch);
				$lab = array($day, $batch_name, $subject_id, $lab_name);
				$lab = implode('$', $lab);
				array_push($labdata, $lab);
				$fac = array($subject_id, $class_type, $batch_name, $faculty_name1, $faculty_name2);
			}
			else
				$fac = array($subject_id, $class_type, $faculty_name1);
			$fac = implode('$', $fac); 
			array_push($facdata, $fac);
			while($slot_id != $i) {
				echo "<td>Break</td>";
				$i++;
			}
			// if($class_type==0 && $l%2==1) {
			// 	echo "<td>LAB</td>";
			// 	$l++;
			// }
			// else echo "<td>$subject_id</td>";
			// if($l%2==1) $i++;
			if($oldslot != $slot_id) {
				if($class_type==0) echo "<td>$subject_id<br>$batch_name</td>";
				else {
					echo "<td>$subject_id</td>";
					$i++;
				}
				$oldslot = $slot_id;
			}
			else {
				if($class_type == 0) $i++;
			}
		}	
		while($i<=9) {
			echo "<td></td>";
			$i++;
		}
		echo "</tr></tbody>";
		echo "</table>";
		$labdata = array_unique($labdata);
		sort($labdata);
		$facdata = array_unique($facdata);
		sort($facdata);
		echo "</div></div></div></section>";
		echo "<section class='container'><div class='col s12 m6 offset-m3'><div class='card z-depth-3'><div class='card-content'><span class='card-title'>Labs</span>";
		echo "<table class='bordered striped'>";
		echo "<thead><tr><th>Day</th><th>Batch</th><th>Subject</th><th>Lab</th></tr></thead>";
		echo "<tbody>";
		foreach($labdata as $l) {
			$lb = explode('$', $l);
			echo "<tr><td>$lb[0]</td><td>$lb[1]</td><td>$lb[2]</td><td>$lb[3]</td></tr>";
		}
		echo "</tbody>";
		echo "</table>";
		echo "</div></div></div></section>";

		echo "<section class='container'><div class='col s12 m6 offset-m3'><div class='card z-depth-3'><div class='card-content'><span class='card-title'>Faculty</span>";
		echo "<table class='bordered striped'>";
		echo "<thead><tr><th>Subject</th><th>Faculty</th></tr></thead>";
		echo "<tbody>";
		foreach($facdata as $f) {
			$fac = explode('$', $f);
			if($fac[1] == 0) echo "<tr><td>$fac[0]</td><td>($fac[2]) $fac[3] and $fac[4]</td></tr>";
			else echo "<tr><td>$fac[0]</td><td>$fac[2]</td></tr>";
		}
		echo "</tbody>";
		echo "</table>";
		echo "</div></div></div></section>";
	}
	else {
		echo "No data was found for the class $class_id";
	}
}

// day == all
else {
	echo "<section style='margin:10px;'><div class='col s12 m8 offset-m2'><div class='card z-depth-3'><div class='card-content'><span class='card-title'>Time Table</span>";
		echo "<table class='bordered responsive-table striped'>";
		echo "<thead><tr><th>Day</th><th>8:30 - 9:20</th><th>9:20 - 10:10</th><th>10:10 - 11:00</th><th>11:00 - 11:50</th><th>11:50 - 12:40</th><th>12:40 - 13:30</th><th>13:30 - 14:20</th><th>14:20 - 15:10</th><th>15:10 - 16:00</th></tr></thead>";
	$days = $queries->getDaysAll($conn);
	$facdata = array();
	$labdata = array();
	echo "<tbody>";
	foreach($days as $day) {
		echo "<tr>";
		echo "<th>$day</th>";
		$i = 1; $oldslot = 0;
		$schedule = $queries->getTimetableByClassDay($conn, $class_id, $day);
		if($schedule->num_rows > 0) {
			$l=1;
			while($row = $schedule->fetch_assoc()) {
				$slot_id = $row['slot_id'];
				$faculty_id = $row['faculty_id'];
				$class_type = $row['class_type'];
				$subject_id = $row['subject_id'];
				$faculty_name1 = $queries->getFacultyById($conn, $faculty_id)->fetch_assoc()['name'];
				$lab_id; $faculty_id2; $faculty_name2; $batch_name; $batch; $fac;
				if($class_type == 0) {
					$lab_id = $row['lab_id'];
					$lab_name = $queries->getLabById($conn, $lab_id)->fetch_assoc()['name'];
					// $lab_name = $lab_id;
					$faculty_id2 = $row['faculty_id2'];
					$faculty_name2 = $queries->getFacultyById($conn, $faculty_id2)->fetch_assoc()['name'];
					$batch = $row['batch'];
					$batch_name = $queries->getBatchById($batch);
					$lab = array($day, $batch_name, $subject_id, $lab_name);
					$lab = implode('$', $lab);
					array_push($labdata, $lab);
					$fac = array($subject_id, $class_type, $batch_name, $faculty_name1, $faculty_name2);
				}
				else
					$fac = array($subject_id, $class_type, $faculty_name1);
				$fac = implode('$', $fac); 
				array_push($facdata, $fac);
				while($slot_id > $i) {
					echo "<td>Break</td>";
					$i++;
				}
				// if($class_type==0) echo "<td>LAB</td>";
				// else echo "<td>$subject_id</td>";
				// if($l%2==0) $i++;
				if($oldslot != $slot_id) {
					if($class_type==0) echo "<td>LAB</td>";
					else {
						echo "<td>$subject_id</td>";
						
					}
					$i++;
					$oldslot = $slot_id;
				}
				// else {
				// 	if($class_type == 0) $i++;
				// }
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
	$labdata = array_unique($labdata);
	sort($labdata);
	$facdata = array_unique($facdata);
	sort($facdata);
	echo "</div></div></div></section>";
	echo "<section class='container'><div class='col s12 m6 offset-m3'><div class='card z-depth-3'><div class='card-content'><span class='card-title'>Labs</span>";
	echo "<table class='bordered striped'>";
	echo "<thead><tr><th>Day</th><th>Batch</th><th>Subject</th><th>Lab</th></tr></thead>";
	echo "<tbody>";
	foreach($labdata as $l) {
		$lb = explode('$', $l);
		echo "<tr><td>$lb[0]</td><td>$lb[1]</td><td>$lb[2]</td><td>$lb[3]</td></tr>";
	}
	echo "</tbody>";
	echo "</table>";
	echo "</div></div></div></section>";
	// echo "<hr><hr>";
	echo "</div></div></div></section>";
	echo "<section class='container'><div class='col s12 m6 offset-m3'><div class='card z-depth-3'><div class='card-content'><span class='card-title'>Faculty</span>";
	echo "<table class='bordered striped'>";
	echo "<thead><tr><th>Subject</th><th>Faculty</th></tr></thead>";
	echo "<tbody>";
	foreach($facdata as $f) {
		$fac = explode('$', $f);
		if($fac[1] == 0) echo "<tr><td>$fac[0]</td><td>($fac[2]) $fac[3] and $fac[4]</td></tr>";
		else echo "<tr><td>$fac[0]</td><td>$fac[2]</td></tr>";
	}
	echo "</tbody>";
	echo "</table>";
	echo "</div></div></div></section>";
}
?>