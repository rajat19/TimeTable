<?php $access = array(0, 1, 2); ?>
<?php require 'include/connect.inc.php'; ?>
<?php require 'queries.php'; ?>
<?php require 'functions.php'; ?>
<?php $queries = new Queries(); ?>
<?php $functions = new Functions(); ?>
<?php
$date = $functions->currentDateYmd();
$time = $functions->currentTime();
$maxtime = "15:10:00";
$mintime = "08:40:00";
if($time>=$mintime && $time<=$maxtime) {
	$ifalreadycounted = $queries->getNotificationByDateType($conn, $date, 2);
	if($ifalreadycounted->num_rows == 0) {
		$set = $functions->setNotificationA2($conn, $queries, 0);
	}
	else {
		$notification_id = $ifalreadycounted->fetch_assoc()['id'];
		$set = $functions->setNotificationA2($conn, $queries, $notification_id);
	}	
}

?>