<?php 
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';

$queries = new Queries();
$functions = new Functions();

$msg = "";
$lab_id = htmlentities($_POST['lab_id']);
$day = htmlentities($_POST['day']);
if($day != 'all') {
	$facdata = array();
	$schedule = $queries->getTimetableByLabDay($conn, $lab_id, $day);
	if($schedule->num_rows > 0) {
		echo "<section style='margin:10px;'><div class='col s12 m8 offset-m2'><div class='card z-depth-3'><div class='card-content'><span class='card-title'>Time Table</span>";
		echo "<table class='bordered responsive-table striped'>";
		echo "<thead><tr><th>Day</th><th>8:30 - 9:20</th><th>9:20 - 10:10</th><th>10:10 - 11:00</th><th>11:00 - 11:50</th><th>11:50 - 12:40</th><th>12:40 - 13:30</th><th>13:30 - 14:20</th><th>14:20 - 15:10</th><th>15:10 - 16:00</th></tr></thead>";
		$i = 1;
		echo "<tbody><tr>";
		echo "<th>$day</th>";
		while($row = $schedule->fetch_assoc()) {
			$slot_id = $row['slot_id'];
			$faculty_id = $row['faculty_id'];
			$faculty_id2 = $row['faculty_id2'];
			$subject_id = $row['subject_id'];
			$class_id = $row['class_id'];
			$batch = $row['batch'];
			$faculty_name1 = $queries->getFacultyById($conn, $faculty_id)->fetch_assoc()['name'];
			$faculty_name2 = $queries->getFacultyById($conn, $faculty_id2)->fetch_assoc()['name'];
			$cls = $queries->getClassById($conn, $class_id)->fetch_assoc();
			$class_name = $cls['section'];
			$batch_name = $queries->getBatchById($batch); 
			$fac = array($subject_id, $class_name, $batch_name, $faculty_name1, $faculty_name2);
			$fac = implode('$', $fac); 
			array_push($facdata, $fac);
			while($slot_id != $i) {
				echo "<td></td>";
				$i++;
			}
			echo "<td>$subject_id<br>$class_name ($batch_name)</td>";
			$i++;
		}
		while($i<=9) {
			echo "<td></td>";
			$i++;
		}
		echo "</tr></tbody>";
		echo "</table>";
		$facdata = array_unique($facdata);
		sort($facdata);
		echo "</div></div></div></section>";
		echo "<section class='container'><div class='col s12 m6 offset-m3'><div class='card z-depth-3'><div class='card-content'><span class='card-title'>Faculty</span>";
		echo "<table class='bordered striped'>";
		echo "<thead><tr><th>Subject</th><th>Class</th><th>Batch</th><th>Faculty</th></tr></thead>";
		echo "<tbody>";
		foreach($facdata as $f) {
			$fac = explode('$', $f);
			echo "<tr><td>$fac[0]</td><td>$fac[1]</td><td>$fac[2]</td><td>$fac[3] and $fac[4]</td></tr>";
		}
		echo "</tbody>";
		echo "</table>";
		echo "</div></div></div></section>";
	}
	else {
		echo "No data was found for the lab $lab_id";
	}
}

// day == all
else {
	echo "<section style='margin:10px;'><div class='col s12 m8 offset-m2'><div class='card z-depth-3'><div class='card-content'><span class='card-title'>Time Table</span>";
	echo "<table class='bordered responsive-table striped'>";
	echo "<thead><tr><th>Day</th><th>8:30 - 9:20</th><th>9:20 - 10:10</th><th>10:10 - 11:00</th><th>11:00 - 11:50</th><th>11:50 - 12:40</th><th>12:40 - 13:30</th><th>13:30 - 14:20</th><th>14:20 - 15:10</th><th>15:10 - 16:00</th></tr></thead>";
	$days = $queries->getDaysAll($conn);
	$facdata = array();
	echo "<tbody>";
	foreach($days as $day) {
		echo "<tr>";
		echo "<th>$day</th>";
		$i = 1;
		$schedule = $queries->getTimetableByLabDay($conn, $lab_id, $day);
		if($schedule->num_rows > 0) {
			while($row = $schedule->fetch_assoc()) {
				$slot_id = $row['slot_id'];
				$faculty_id = $row['faculty_id'];
				$faculty_id2 = $row['faculty_id2'];
				$subject_id = $row['subject_id'];
				$class_id = $row['class_id'];
				$batch = $row['batch'];
				$faculty_name1 = $queries->getFacultyById($conn, $faculty_id)->fetch_assoc()['name'];
				$faculty_name2 = $queries->getFacultyById($conn, $faculty_id2)->fetch_assoc()['name'];
				$cls = $queries->getClassById($conn, $class_id)->fetch_assoc();
				$class_name = $cls['section'];
				$batch_name = $queries->getBatchById($batch); 
				$fac = array($subject_id, $class_name, $batch_name, $faculty_name1, $faculty_name2);
				$fac = implode('$', $fac); 
				array_push($facdata, $fac);
				while($slot_id != $i) {
					echo "<td></td>";
					$i++;
				}
				echo "<td>$subject_id<br>$class_name ($batch_name)</td>";
				$i++;
			}
		}
		while($i<=9) {
			echo "<td></td>";
			$i++;
		}
		echo "</tr>";
	}
	$facdata = array_unique($facdata);
	sort($facdata);
	echo "</tbody>";
	echo "</table>";
	// echo "<hr><hr>";
	echo "</div></div></div></section>";
	echo "<section class='container'><div class='col s12 m6 offset-m3'><div class='card z-depth-3'><div class='card-content'><span class='card-title'>Faculty</span>";
	echo "<table class='bordered striped'>";
	echo "<thead><tr><th>Subject</th><th>Class</th><th>Batch</th><th>Faculty</th></tr></thead>";
	echo "<tbody>";
	foreach($facdata as $f) {
		$fac = explode('$', $f);
		echo "<tr><td>$fac[0]</td><td>$fac[1]</td><td>$fac[2]</td><td>$fac[3] and $fac[4]</td></tr>";
	}
	echo "</tbody>";
	echo "</table>";
	echo "</div></div></div></section>";
}
?>