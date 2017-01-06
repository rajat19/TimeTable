<?php
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';

$queries = new Queries();
$functions = new Functions();

$leave_id = htmlentities($_POST['leave_id']);
$a = $_POST['a'];
$today = $functions->currentDateYmd();

$q = $queries->getLeaveById($conn, $leave_id)->fetch_assoc();
$leave_date = $q['leave_date'];
if($leave_date > $today) {
	$q = $queries->updateLeaveGrant($conn, $leave_id, $today, $a);
	if($q == 1) {
		$functions->setNotificationB2($conn, $queries, $leave_id);
		if($a == 1) echo "Yes";
		else echo "No";
	}
	else echo "<script>swal('Error', 'Leave cannot be granted', 'warning')</script>";
}
?>