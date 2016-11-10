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

	public function checkAttendanceMarked($conn, $queries, $faculty_id, $date) {
		$q = $queries->getAttendanceByFacultyDate($conn, $faculty_id, $date);
		$count = $q->num_rows;
		if($count > 0) return false;
		return true;
	}

	public function calculateDayOfWeek($date) {
		$arr = explode('-', $date);
		$d = $arr[2]; $m = $arr[1]; $y = $arr[0];
		$tot; $feb; $sum = 0;
		if($y%4==0) {
			$tot = 366;
			$feb = 29;
		}
		else {
			$tot = 365;
			$feb = 28;
		}

		$mon = array(31, $feb, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
		for($i=0; $i<$m-1; $i++) {
			$sum += $mon[$i];
		}
		$dd = $d - 1;
		$sum += $dd;
		if($y>1) $dy = $y - 1;
		$ly = $dy/4;
		$nly = $dy - $ly;
		$ly *= 366;
		$nly *= 365;
		$sum += $ly + $nly;
		$res = $sum%7;

		switch($res) {
			case 0: return "sunday";
			case 1: return "monday";
			case 2: return "tuesday";
			case 3: return "wednesday";
			case 4: return "thursday";
			case 5: return "friday";
			case 6: return "saturday";
		}
	}

	public function findFreeFacultiesClass($conn, $queries, $class_id, $slot_id, $day) {
		$facultiesFree = $queries->getFacultiesFreeByClassDaySlot($conn, $class_id, $slot_id, $day);
	}

	public function findFreeFacultiesLab($conn, $queries, $slot_id, $day) {
		
	}
}
?>