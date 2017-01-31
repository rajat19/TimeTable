<?php

class Functions {

/*Date and Time functions*/
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

	public function capitalize($string) {
		$capital = substr(strtoupper($string), 0, 1).substr($string, 1);
		return $capital;
	}

	public function currentDate() {
		return date('d-m-Y');
	}

	public function currentDateTime() {
		date_default_timezone_set('Asia/Kolkata');
		return date('Y-m-d H:i:s', time());
	}

	public function currentDateYmd() {
		date_default_timezone_set('Asia/Kolkata');
		return date('Y-m-d', time());
	}

	public function currentTime() {
		date_default_timezone_set('Asia/Kolkata');
		return date('H:i:s', time());
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
			case '01': $mon = "Jan"; break;
			case '02': $mon = "Feb"; break;
			case '03': $mon = "Mar"; break;
			case '04': $mon = "Apr"; break;
			case '05': $mon = "May"; break;
			case '06': $mon = "Jun"; break;
			case '07': $mon = "Jul"; break;
			case '08': $mon = "Aug"; break;
			case '09': $mon = "Sep"; break;
			case '10': $mon = "Oct"; break;
			case '11': $mon = "Nov"; break;
			case '12': $mon = "Dec"; break;
		}
		return "$d $mon, $y";
	}

	public function prettySlotFormat($conn, $queries, $slot_id) {
		$s = $queries->getSlotById($conn, $slot_id)->fetch_assoc();
		$slot = $this->prettyTimeFormat($s['start'])." to ".$this->prettyTimeFormat($s['end']);
		return $slot;
	}

	public function prettyTimeFormat($time) {
		$hms = explode(':', $time);
		$h = ""; $ap = ""; $ih = (int)$hms[0];
		if(0<=$ih && $ih<12) {
			$ap = "AM";
			if($ih==0) $h = "12";
			else $h = $hms[0];
		}
		else {
			if($ih==12) $h = "12";
			else $h = $ih - 12;
			$ap = "PM";
		}
		return "$h:$hms[1] $ap";
	}
/*.Date and Time functions*/

/*Check functions*/
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

	public function checkUseremailExists($conn, $queries, $email) {
		$q = $queries->getUserByEmail($conn, $email);
		$count = $q->num_rows;
		if($count > 0) return false;
		return true;	
	}

	public function checkUserphoneExists($conn, $queries, $phone) {
		$q = $queries->getUserByPhone($conn, $phone);
		$count = $q->num_rows;
		if($count > 0) return false;
		return true;	
	}

	public function getClassName($conn, $queries, $class_id) {
		$cdetails = $queries->getClassById($conn, $class_id)->fetch_assoc();
		$y = $cdetails['year'];
		$x = ($y==2)?"2nd":(($y==3)?"3rd":"4th");
		$class = $cdetails['branch']." ".$x." year ".$cdetails['section'];
		return array($class, $cdetails['location']);
	}
/*.Check functions*/

/*Allotment Algorithm functions*/
	public function findFreeFacultiesClass($conn, $queries, $main, $class_id, $slot_id, $day, $date) {
		$classFaculties = $queries->getFacultiesByClass($conn, $class_id);
		$c = 0;
		$list = array(); $inLab = array();
		/*Check free-> check if in lab -> switch schedules*/
		while($fac = $classFaculties->fetch_assoc()) {
			$facid = $fac['id'];
			$facname = $fac['name'];
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
		return $list;
	}

	public function findFreeFacultiesLab($conn, $queries, $main, $slot_id, $day, $date, $department) {
		$allFreeFaculties = $queries->getFacultiesFreeByDaySlotDepartment($conn, $slot_id, $day, $department);
		$list = array();
		foreach($allFreeFaculties as $faculty) {
			$facid = $faculty['id'];
			if($facid != $main) {
				if($this->checkFacultyFreeFromDuty($conn, $queries, $facid, $date, $slot_id)) {
					$list[] = $facid;
				}
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
/*.Allotment Algorithm functions*/

/*Validation functions*/
	public function validateEmail($email) {
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) return 1;
		return 0;
	}

	public function validateName($name) {
		$regex='/^[a-zA-Z ]*$/';
		if(preg_match($regex, $name)) return 1;
		return 0;
	}

	public function validatePassword($password) {
		$regex = '/^[a-zA-Z0-9!@#$%^&*]{6,50}$/';
		if(preg_match($regex, $password)) {
			$x = str_split($password);
			$ar = array('!', '@', '#', '$', '%', '^', '&', '*');
			$flag = 0;
			foreach($x as $v) {
				if(in_array($v, $ar)) {
					$flag = 1;
					break;
				}
			}
			if($flag == 1) return 1;
			return 0;
		}
		return 0;
	}

	public function validatePhone($phone) {
		$regex='/^[0-9]{10}$/';
		if(preg_match($regex, $phone)) return 1;
		return 0;
	}

	public function validateUsername($username) {
		$regex = '/^[a-zA-Z0-9]{5,20}$/';
		if (preg_match($regex, $username)) return 1;
		return 0;
	}
/*.Validation functions*/

/*Notification functions*/
/*
1 = A1            5 = B1 
2 = A2            6 = B2
3 = A3            7 = C1
4 = A4 			  8 = B3
*/
	public function checkNotification($conn, $queries, $user_id) {
		$q = $queries->getNotificationsByUser($conn, $user_id);
		$count = $q->num_rows;
		return $count;
	}

	public function createNotification($conn, $queries, $notif_type, $usertype, $user_id, $notified_by, $string) {
		$date = $this->currentDateYmd();
		$time = $this->currentTime();
		$q = $queries->addNotification($conn, $notif_type, $usertype, $user_id, $notified_by, $date,$time,$string);
	}

	public function displayNotifications($conn, $queries, $user_id) {
		$q = $queries->getNotificationsByUser($conn, $user_id);
		$all = array();
		if($q->num_rows > 0) {
			while($row = $q->fetch_assoc()) {
				$details = $row['details'];
				$notif_type = $row['notification_type'];
				$notif_date = $this->prettyDateFormat($row['date']);
				$notif_time = $this->prettyTimeFormat($row['time']);
				$notified_by = $queries->getUserById($conn, $row['notified_by'])->fetch_assoc()['name'];
				$string = $this->getNotification($notif_type, $details);
				$arr = array($notified_by, $notif_date, $notif_time, $string);
				$all[] = $arr;
			}
		}
		return $all;
	}

	public function getNotification($notif_type, $details) {
		$arr = explode('$$', $details);
		$s = "";
		switch($notif_type) {
			case 1:
				$date = $this->prettyDateFormat($arr[1]);
				$s = "$arr[0] requested a leave for $date";
				break;
			case 2:
				$s = "$arr[0] faculties have still not marked their attendance. <a href='view_attendance.php'>View here</a>";
				break;
			case 3:
				$s = "$arr[0] had still not reached class $arr[1]";
				break;
			case 4:
				$x = ($arr[1]==1)?"accepted":"rejected";
				$s = "$arr[0] had $x substitution given for $arr[2] during $arr[3] for replacing $arr[4]";
				break;
			case 5:
				$today = $this->currentDateYmd();
				$date = $arr[2];
				$fdate = $this->prettyDateFormat($date);
				$x = "";
				if($today == $date) $x = "<b>today</b>";
				else $x = "on <b>$fdate</b>";
				$s = "You have been assigned a substitution for $arr[0] $x during <b>$arr[1]</b> in replacement to $arr[3]. <a href='my_substitution.php'>View Substitution here</a>";
				break;
			case 6:
				$x = ($arr[0]==1)?"granted":"rejected";
				$date = $this->prettyDateFormat($arr[1]);
				$s = "Your leave had been $x for $date ";
				break;
			case 7:
				$s = "$arr[0] had been substitued with $arr[1] for duration $arr[2] ";
				break;
		}
		return $s;
	}

	public function setNotificationA1($conn, $queries, $faculty_id, $date) {
		$fdetails = $queries->getFacultyById($conn, $faculty_id)->fetch_assoc();
		$name = $fdetails['title']." ".$fdetails['name'];
		$faculty_userid = $fdetails['user_id'];
		$admin = $queries->getAdmin($conn)->fetch_assoc()['id'];
		$string = implode('$$', array($name, $date));
		$this->createNotification($conn, $queries, 1, 0, $admin, $faculty_userid, $string);
	}

	public function setNotificationA2($conn, $queries, $addOrUpdate) {
		$date = $this->currentDateYmd();
		$q = $queries->getFacultiesByAttendanceNotMarked($conn, $date);
		$count = $q->num_rows;
		$admin = $queries->getAdmin($conn)->fetch_assoc()['id'];
		$string = implode('$$', array($count));
		if($addOrUpdate == 0) {
			$this->createNotification($conn, $queries, 2, 0, $admin, '', $string);
		}
		else {
			$this->updateNotification($conn, $queries, $addOrUpdate, $string);	
		}
	}

	public function setNotificationA3($conn, $queries, $faculty_id, $cr_id, $class_id) {
		$fdetails = $queries->getFacultyById($conn, $faculty_id)->fetch_assoc();
		$facname = $fdetails['title']." ".$fdetails['name'];
		$c = $this->getClassName($conn, $queries, $class_id);
		$class = $c[0]." in ".$c[1];
		$admin = $queries->getAdmin($conn)->fetch_assoc()['id'];
		$string = implode('$$', array($facname, $class));
		$this->createNotification($conn, $queries, 3, 0, $admin, $cr_id, $string);
	}

	public function setNotificationA4($conn, $queries, $substitution_id) {
		$sub = $queries->getSubstitutionById($conn, $substitution_id)->fetch_assoc();
		$replacement_id = $sub['replacement_id'];
		$rdetails = $queries->getFacultyById($conn, $replacement_id)->fetch_assoc();
		$repname = $rdetails['title']." ".$rdetails['name'];
		$faculty_id = $sub['faculty_id'];
		$fdetails = $queries->getFacultyById($conn, $faculty_id)->fetch_assoc();
		$facname = $fdetails['title']." ".$fdetails['name'];
		$lab_id = $sub['lab_id'];
		$class_id = $sub['class_id'];
		$c = $this->getClassName($conn, $queries, $class_id);
		if($lab_id!=0) {
			$location = $queries->getLabById($conn, $lab_id)->fetch_assoc()['name'];
		}
		else $location = $c[1];
		$class = $c[0]." in ".$location;
		$admin = $queries->getAdmin($conn)->fetch_assoc()['id'];
		$accepted = $sub['accepted'];
		$s = $queries->getSlotById($conn, $sub['slot_id'])->fetch_assoc();
		$slot = $this->prettyTimeFormat($s['start'])." to ".$this->prettyTimeFormat($s['end']);
		$string = implode('$$', array($repname, $accepted, $class, $slot, $facname));
		$this->createNotification($conn, $queries, 4, 0, $admin, $faculty_id, $string);
	}

	public function setNotificationB1($conn, $queries, $faculty_id, $replacement_id, $class_id, $lab_id, $slot_id, $date) {
		$rdetails = $queries->getFacultyById($conn, $replacement_id)->fetch_assoc();
		$repname = $rdetails['title']." ".$rdetails['name'];
		$repuserid = $rdetails['user_id'];
		$fdetails = $queries->getFacultyById($conn, $faculty_id)->fetch_assoc();
		$facname = $fdetails['title']." ".$fdetails['name'];
		$facuserid = $fdetails['user_id'];
		$c = $this->getClassName($conn, $queries, $class_id);
		if($lab_id!=0) {
			$location = $queries->getLabById($conn, $lab_id)->fetch_assoc()['name'];
		}
		else $location = $c[1];
		$class = $c[0]." in ".$location;
		$admin = $queries->getAdmin($conn)->fetch_assoc()['id'];
		$s = $queries->getSlotById($conn, $slot_id)->fetch_assoc();
		$slot = $this->prettyTimeFormat($s['start'])." to ".$this->prettyTimeFormat($s['end']);
		$string = implode('$$', array($class, $slot, $date, $facname));
		$this->createNotification($conn, $queries, 5, 1, $repuserid, $admin, $string);
	}

	public function setNotificationB2($conn, $queries, $leave_id) {
		$leave = $queries->getLeaveById($conn, $leave_id)->fetch_assoc();
		$granted = $leave['granted'];
		$leave_date = $leave['leave_date'];
		$faculty_userid = $queries->getFacultyById($conn, $leave['faculty_id'])->fetch_assoc()['user_id'];
		$admin = $queries->getAdmin($conn)->fetch_assoc()['id'];
		$string = implode('$$', array($granted, $leave_date));
		$this->createNotification($conn, $queries, 6, 1, $faculty_userid, $admin, $string);	
	}

	public function setNotificationC1($conn, $queries, $substitution_id) {
		$sub = $queries->getSubstitutionById($conn, $substitution_id)->fetch_assoc();
		$replacement_id = $sub['replacement_id'];
		$rdetails = $queries->getFacultyById($conn, $replacement_id)->fetch_assoc();
		$repname = $rdetails['title']." ".$rdetails['name'];
		$faculty_id = $sub['faculty_id'];
		$fdetails = $queries->getFacultyById($conn, $faculty_id)->fetch_assoc();
		$facname = $fdetails['title']." ".$fdetails['name'];
		$s = $queries->getSlotById($conn, $sub['slot_id'])->fetch_assoc();
		$slot = $this->prettyTimeFormat($s['start'])." to ".$this->prettyTimeFormat($s['end']);
		$admin = $queries->getAdmin($conn)->fetch_assoc()['id'];
		$class_id = $sub['class_id'];
		$cr_id = $queries->getClassById($conn, $class_id)->fetch_assoc()['cr_id'];
		$string = implode('$$', array($facname, $repname, $slot));
		$this->createNotification($conn, $queries, 7, 2, $cr_id, $admin, $string);
	}

	public function updateNotification($conn, $queries, $notification_id, $string) {
		$date = $this->currentDateYmd();
		$time = $this->currentTime();
		$q = $queries->updateNotification($conn, $notification_id, $date, $time, $string);
	}
/*.Notification functions*/

/*Pagination functions*/
	function paginate($reload, $page, $tpages) {
		$adjacents = 2;
		$prevlabel = "&lsaquo; Prev";
		$nextlabel = "Next &rsaquo;";
		$out = "";
		// previous
		if ($page == 1) {
			$out.= "<span>".$prevlabel."</span>\n";
		} elseif ($page == 2) {
			$out.="<li><a href=\"".$reload."\">".$prevlabel."</a>\n</li>";
		} else {
			if($page<1) $page=1;
			$out.="<li><a href=\"".$reload."&page=".($page - 1)."\">".$prevlabel."</a>\n</li>";
		}
		$pmin=($page>$adjacents)?($page - $adjacents):1;
		$pmax=($page<($tpages - $adjacents))?($page + $adjacents):$tpages;
		for ($i = $pmin; $i <= $pmax; $i++) {
			if ($i == $page) {
				$out.= "<li class=\"active\"><a href=''>".$i."</a></li>\n";
			} elseif ($i == 1) {
				$out.= "<li><a href=\"".$reload."\">".$i."</a>\n</li>";
			} else {
				$out.= "<li><a href=\"".$reload. "&page=".$i."\">".$i. "</a>\n</li>";
			}
		}

		if ($page<($tpages - $adjacents)) {
			$out.= "<a href=\"" . $reload."&page=".$tpages."\">" .$tpages."</a>\n";
		}
		// next
		if ($page <= $tpages) {
			if($page==$tpages) $page = $page-1;
			$out.= "<li><a href=\"".$reload."&page=".($page + 1)."\">".$nextlabel."</a>\n</li>";
		} else {
			$out.= "<span>".$nextlabel."</span>\n";
		}
		$out.= "";
		return $out;
	}
/*.Pagination functions*/

}
?>