<?php

class Queries {

	/*Select queries*/
	public function getClassesAll($conn) {
		$q = $conn->query("SELECT * FROM classes");
		return $q;
	}

	public function getDaysAll($conn) {
		$q = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday'];
		return $q;
	}

	public function getBatchesAll($conn) {
		$q = ["A"=>"1+2", "B"=>"3+4"];
		return $q;
	}

	public function getSlotsAll($conn) {
		$q = $conn->query("SELECT * FROM slots");
		return $q;
	}

	public function getFacultiesAll($conn) {
		$q = $conn->query("SELECT * FROM faculties");
		return $q;
	}

	public function getLabsAll($conn) {
		$q = $conn->query("SELECT * FROM labs");
		return $q;
	}

	public function getTimetableByClassDay($conn, $class_id, $day) {
		$q = $conn->query("SELECT * FROM timetables WHERE class_id='".mysqli_escape_string($conn, $class_id)."' AND day='".mysqli_escape_string($conn, $day)."'");
	}

	public function getTimetableByLabDay($conn, $class_id, $day) {

	}

	public function getTimetableByClassSlot($conn, $class_id, $day, $slot_id) {
		$q = $conn->query("SELECT * FROM timetables WHERE class_id='".mysqli_escape_string($conn, $class_id)."' AND day='".mysqli_escape_string($conn, $day)."' AND slot_id='".mysqli_escape_string($conn, $slot_id)."'");
		return $q;
	}

	public function getTimetableByClassBatchSlot($conn, $class_id, $batch, $day, $slot_id) {
		$q = $conn->query("SELECT * FROM timetables WHERE class_id='".mysqli_escape_string($conn, $class_id)."' AND batch='".mysqli_escape_string($conn, $batch)."' AND day='".mysqli_escape_string($conn, $day)."' AND slot_id='".mysqli_escape_string($conn, $slot_id)."'");
		return $q;
	}

	public function getTimetableByFacultySlot($conn, $faculty_id, $day, $slot_id) {
		$q = $conn->query("SELECT * FROM timetables WHERE faculty_id='".mysqli_escape_string($conn, $faculty_id)."' AND day='".mysqli_escape_string($conn, $day)."' AND slot_id='".mysqli_escape_string($conn, $slot_id)."'");
		return $q;
	}

	public function getTimetableByLabSlot($conn, $lab_id, $day, $slot_id) {
		$q = $conn->query("SELECT * FROM timetables WHERE lab_id='".mysqli_escape_string($conn, $lab_id)."' AND day='".mysqli_escape_string($conn, $day)."' AND slot_id='".mysqli_escape_string($conn, $slot_id)."'");
		return $q;
	}

	public function getFacultyById($conn, $faculty_id) {
		$q = $conn->query("SELECT * FROM faculties WHERE faculty_id='".mysqli_escape_string($conn, $faculty_id)."'");
		return $q;
	}

	public function getSlotById($conn, $slot_id) {
		$q = $conn->query("SELECT * FROM slots WHERE id='".mysqli_escape_string($conn, $slot_id)."'");
		return $q;
	}

	/*Insert queries*/
	public function addTimeTableClass($conn, $class_id, $day, $slot_id, $faculty_id, $subject_id) {
		$class_type = 1;
		$q = $conn->query("INSERT INTO timetables (class_id, day, slot_id, class_type, faculty_id, subject_id) VALUES ('".mysqli_escape_string($conn, $class_id)."', '".mysqli_escape_string($conn, $day)."', '".mysqli_escape_string($conn, $slot_id)."', '$class_type', '".mysqli_escape_string($conn, $faculty_id)."', '".mysqli_escape_string($conn, $subject_id)."')");
		return $q;
	}

	public function addTimeTableLab($conn, $class_id, $batch, $lab_id, $day, $slot_id, $faculty_id1, $faculty_id2, $subject_id) {
		$class_type = 0;
		$q = $conn->query("INSERT INTO timetables (class_id, batch, lab_id, day, slot_id, class_type, faculty_id, subject_id) VALUES ('".mysqli_escape_string($conn, $class_id)."', '".mysqli_escape_string($conn, $batch)."', '".mysqli_escape_string($conn, $lab_id)."', '".mysqli_escape_string($conn, $day)."', '".mysqli_escape_string($conn, $slot_id)."', '$class_type', '".mysqli_escape_string($conn, $faculty_id1)."', '".mysqli_escape_string($conn, $subject_id)."')");
		$q = $conn->query("INSERT INTO timetables (class_id, batch, lab_id, day, slot_id, class_type, faculty_id, subject_id) VALUES ('".mysqli_escape_string($conn, $class_id)."','".mysqli_escape_string($conn, $batch)."', '".mysqli_escape_string($conn, $lab_id)."', '".mysqli_escape_string($conn, $day)."', '".mysqli_escape_string($conn, $slot_id)."', '$class_type', '".mysqli_escape_string($conn, $faculty_id2)."', '".mysqli_escape_string($conn, $subject_id)."')");
		return $q;
	}
}