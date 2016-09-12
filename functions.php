<?php

class Functions {

	public function checkClassFree($conn, $queries, $class_id, $day, $slot_id) {
		$q = $queries->getTimetableByClassSlot($conn, $class_id, $day, $slot_id);
		$count = $q->num_rows;
		if($count > 0) return false;
		return true;
	}

	public function checkClassBatchFree($conn, $queries, $class_id, $batch, $day, $slot_id) {
		$q = $queries->getTimetableByClassBatchSlot($conn, $class_id, $batch, $day, $slot_id);
		$count = $q->num_rows;
		if($count > 0) return false;
		return true;
	}

	public function checkFacultyFree($conn, $queries, $faculty_id, $day, $slot_id) {
		$q = $queries->getTimetableByFacultySlot($conn, $faculty_id, $day, $slot_id);
		$count = $q->num_rows;
		if($count > 0) return false;
		return true;
	}

	public function checkLabFree($conn, $queries, $lab_id, $day, $slot_id) {
		$q = $queries->getTimetableByLabSlot($conn, $lab_id, $day, $slot_id);
		$count = $q->num_rows;
		if($count > 0) return false;
		return true;
	}
}
?>