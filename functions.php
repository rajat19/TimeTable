<?php

class Functions {

/*Special functions*/
	public function capitalize($string) {
		$capital = substr(strtoupper($string), 0, 1).substr($string, 1);
		return $capital;
	}

	public function currentDate() {
		return date('d-m-Y');
	}

	public function currentDateYmd() {
		return date('Y-m-d', strtotime('+4 hours 30 minutes'));
	}

	public function currentTime() {
		return date('H:i:s', strtotime('+4 hours 30 minutes'));
	}

	public function prettyDateFormat($date) {
		$x = explode('-', $date);
		$a = $x[0]; $m = $x[1]; $c = $x[2];
		if(strlen($c)>2) {
			$y = $c; $d = $a;
		}
		else if(strlen($a)>2) {
			$y = $a; $d = $c;
		}
		else return $date;
		$mon = "";
		switch($m) {
			case '01': $mon = "JAN"; break;
			case '02': $mon = "FEB"; break;
			case '03': $mon = "MAR"; break;
			case '04': $mon = "APR"; break;
			case '05': $mon = "MAY"; break;
			case '06': $mon = "JUN"; break;
			case '07': $mon = "JUL"; break;
			case '08': $mon = "AUG"; break;
			case '09': $mon = "SEP"; break;
			case '10': $mon = "OCT"; break;
			case '11': $mon = "NOV"; break;
			case '12': $mon = "DEC"; break;
		}
		return "$d $mon, $y";
	}

/*General functions*/

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

	public function checkFacultyFreeFromDuty($conn, $queries, $replacement_id, $date, $slot_id) {
		$q = $queries->getSubstitutionByReplacementDateSlot($conn, $replacement_id, $date, $slot_id);
		$count = $q->num_rows;
		if($count > 0) return false;
		return true;	
	}

	public function checkSubstitutionFree($conn, $queries, $replacement_id, $date, $slot_id) {
		$q = $queries->getSubstitutionByFacultyDateSlot($conn, $replacement_id, $date, $slot_id);
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

	public function checkLeaveMarked($conn, $queries, $faculty_id, $leave_date) {
		$q = $queries->getLeaveByFacultyDate($conn, $faculty_id, $leave_date);
		$count = $q->num_rows;
		if($count > 0) return false;
		return true;
	}

	public function checkUserExists($conn, $queries, $username) {
		$q = $queries->getUserByUsername($conn, $username);
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

	public function findFreeFacultiesClass($conn, $queries, $main, $class_id, $slot_id, $day, $date) {
		$classFaculties = $queries->getFacultiesByClass($conn, $class_id);
		$c = 0;
		$list = array(); $inLab = array();
		/*Check free-> check if in lab -> switch schedules*/
		while($fac = $classFaculties->fetch_assoc()) {
			$facid = $fac['id'];
			$facname = $fac['name'];
			// echo $class_id."=".$facname."$facid\n";
			if($facid != $main) {
				/*Check if faculty is free from any schedule*/
				if($this->checkFacultyFree($conn, $queries, $facid, $day, $slot_id) && $this->checkFacultyFreeFromDuty($conn, $queries, $facid, $date, $slot_id)) {
					$c++;
					/*0 stands for faculty already being free*/
					$list[] = $facid;
				}
				else {
					/*Check if the schedule was of lab*/
					$sch = $queries->getTimetableByFacultySlot($conn, $facid, $day, $slot_id)->fetch_assoc();
					$class_type = $sch['class_type'];
					if($class_type==0) $inLab[] = $facid;
				}
				// $list[] = $facid;
			}
		}
		if($c==0) {
			if(count($inLab) > 0) {
				/*Faculty is having a schedule for the slot in lab(can be reassigned in case of emergency)*/
				foreach($inlab as $v) {
					/*1 stands for faculty having class but schedule switched*/
					$list[] = $v;
				}
			}
		}
		// print_r($list); echo "\n";
		return $list;
	}

	public function findFreeFacultiesLab($conn, $queries, $main, $slot_id, $day, $date, $department) {
		$allFreeFaculties = $queries->getFacultiesFreeByDaySlotDepartment($conn, $slot_id, $day, $department);
		$list = array();
		foreach($allFreeFaculties as $faculty) {
			$facid = $faculty['id'];
			if($this->checkFacultyFreeFromDuty($conn, $queries, $facid, $date, $slot_id)) {
				$list[] = $facid;
			}
		}
		return $list;
	}

	public function prioritizeFaculties($conn, $queries, $facs, $day, $slot_id) {
		$pts = array();
		$final = array();
		for($i=0; $i<count($facs); $i++) {
			$faculty_id = $facs[$i];
			$schedule = $queries->getTimetableByFacultyDay($conn, $faculty_id, $day);
			$details = $queries->getFacultyById($conn, $faculty_id)->fetch_assoc();
			$name = $details['title']." ".$details['name'];
			$designation = $details['designation_id'];
			$pri = 10 - $details['priority'];
			$count = $schedule->num_rows; $lastFree = 0; $nextFree = 10;
			while($row = $schedule->fetch_assoc()) {
				$faculty_slot = (int)$row['slot_id'];
				if($faculty_slot < $slot_id && $faculty_slot > $lastFree) $lastFree = $faculty_slot;
				if($faculty_slot > $slot_id && $faculty_slot < $nextFree) $nextFree = $faculty_slot;
			}
			/*
				The points tally
				More the points, less the chances that faculty would be assigned
			*/
			$points = ($count*2 + ($lastFree) + (10 - $nextFree) + (5 - $designation));
			$faculty_detail = array($pri, $points, $faculty_id, $name, $count, $lastFree, $nextFree);
			$final[] = $faculty_detail;
		}
		sort($final);
		return $final;
	}
}
?>