<?php
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';

$queries = new Queries();
$functions = new Functions();
$substitution_id = htmlentities($_POST['sub_id']);
$a = $_POST['a'];
$reason = '';
if($a==-1) {
	$reason = htmlentities($_POST['reason']);
}
$today = $functions->currentDateYmd();

$q = $queries->getSubstitutionById($conn, $substitution_id)->fetch_assoc();
$substitution_date = $q['date'];
if($substitution_date >= $today) {
	$q = $queries->updateSubstitution($conn, $substitution_id, $a, $reason);
	if($q == 1) {
		$functions->setNotificationA4($conn, $queries, $substitution_id);
		if($a == 1) {
			$functions->setNotificationC1($conn, $queries, $substitution_id);
			echo "Accepted";
		}
		else echo "Rejected";
	}
	else echo "<script>swal('Error', 'Problem accepting/rejecting substitution', 'warning')</script>";
}
?>