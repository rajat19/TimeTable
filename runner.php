<?php $access = array(5); ?>
<?php require 'queries.php'; ?>
<?php require 'functions.php'; ?>
<?php $queries = new Queries(); ?>
<?php $functions = new Functions(); ?>
<?php
// include 'include/header.inc.php';
$date = $functions->currentDateYmd();
$ifalreadycounted = $queries->getNotificationByDateType($conn, $date, 2);
if($ifalreadycounted->num_rows == 0) {
	$set = $functions->setNotificationA2($conn, $queries, 0);
}
else {
	$notification_id = $ifalreadycounted->fetch_assoc()['id'];
	$set = $functions->setNotificationA2($conn, $queries, $notification_id);
}
?>