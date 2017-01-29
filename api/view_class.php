<?php 
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';

$queries = new Queries();
$functions = new Functions();

$msg = "";
$class_id = htmlentities($_POST['class_id']);
$day = htmlentities($_POST['day']);
if($day != 'all') {
	$facdata = array(); $labdata = array();
	$schedule = $queries->getTimetableByClassDay($conn, $class_id, $day);
	$response = array();
	if($schedule->num_rows > 0) {
		$i = 1;
		$l = 1;
		$oldslot=0;
		$tt = array();
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
				$tt[$i] = array();
				$i++;
			}
			if($oldslot != $slot_id) {
				if($class_type==0) $tt[$i] = array($subject_id, $batch_name);
				else {
					$tt[$i] = array($subject_id);
					$i++;
				}
				$oldslot = $slot_id;
			}
			else {
				if($class_type == 0) $i++;
			}
		}	
		while($i<=9) {
			$tt[$i] = array();
			$i++;
		}
		$labdata = array_unique($labdata);
		sort($labdata);
		$facdata = array_unique($facdata);
		sort($facdata);
		$larray = array();
		$farray = array();
		foreach($labdata as $l) {
			$lb = explode('$', $l);
			// echo "<tr><td>$lb[0]</td><td>$lb[1]</td><td>$lb[2]</td><td>$lb[3]</td></tr>";
			$larray[] = $lb;
		}
		foreach($facdata as $f) {
			$fac = explode('$', $f);
			$farray[] = $fac;
				// echo "<tr><td>$fac[0]</td><td>($fac[2]) $fac[3] and $fac[4]</td></tr>";
				// echo "<tr><td>$fac[0]</td><td>$fac[2]</td></tr>";
		}
		$ttarray[$day] = $tt;
		$response['timetables'] = $ttarray;
		$response['faculties'] = $farray;
		$response['labs'] = $larray;
	}
	$res = json_encode($response);
	echo $res;
}

// day == all
else {
	$days = $queries->getDaysAll($conn);
	$facdata = array();
	$labdata = array();
	$response = array();
	foreach($days as $day) {
		$tt = array();
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
					$tt[$i] = "Break";
					$i++;
				}
				if($oldslot != $slot_id) {
					if($class_type==0) $tt[$i] = "LAB";
					else {
						$tt[$i] = $subject_id;
					}
					$i++;
					$oldslot = $slot_id;
				}
			}
		}
		while($i<=9) {
			$tt[$i] = "";
			$i++;
		}
		$ttarray[$day] = $tt;
	}
	$labdata = array_unique($labdata);
	sort($labdata);
	$facdata = array_unique($facdata);
	sort($facdata);
	$larray = array();
	$farray = array();
	foreach($labdata as $l) {
		$lb = explode('$', $l);
		$larray[] = $lb;
	}
	foreach($facdata as $f) {
		$fac = explode('$', $f);
		$farray[] = $fac;
	}
	$response['timetable'] = $ttarray;
	$response['faculties'] = $farray;
	$response['labs'] = $larray;
	$res = json_encode($response);
	echo $res;
}
?>