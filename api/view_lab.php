<?php
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';

$queries = new Queries();
$functions = new Functions();

$lab_id = htmlentities($_POST['lab_id']);
$day = htmlentities($_POST['day']);
if($day != 'all') {
	$facdata = array();
	$schedule = $queries->getTimetableByLabDay($conn, $lab_id, $day);
	$response = array();
	if($schedule->num_rows > 0) {
		$i = 1;
		$tt = array();
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
				$tt[$i] = array();
				$i++;
			}
			$tt[$i] = array($subject_id, $class_name, $batch_name);
			$i++;
		}
		while($i<=9) {
			$tt[$i] = array();
			$i++;
		}
		$ttarray[$day] = $tt;
		$facdata = array_unique($facdata);
		sort($facdata);
		foreach($facdata as $f) {
			$fac = explode('$', $f);
			$farray[] = $fac;
		}
		$response['timetable'] = $ttarray;
		$response['faculties'] = $farray;
	}
	$res = json_encode($response);
	echo $res;
}

else {
	$days = $queries->getDaysAll($conn);
	$facdata = array();
	$response = array();
	foreach($days as $day) {
		$i = 1;
		$tt = array();
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
					$tt[$i] = "";
					$i++;
				}
				$tt[$i] = array($subject_id, $class_name, $batch_name);
				$i++;
			}
		}
		while($i<=9) {
			$tt[$i] = "";
			$i++;
		}
		$ttarray[$day] = $tt;
	}
	$facdata = array_unique($facdata);
	sort($facdata);
	foreach($facdata as $f) {
		$fac = explode('$', $f);
		$farray[] = $fac;
	}
	$response['timetable'] = $ttarray;
	$response['faculties'] = $farray;

	$resp = json_encode($response);
	echo $resp;
}
?>