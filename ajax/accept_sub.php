<?php
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';

$queries = new Queries();
$functions = new Functions();
$substitution_id = htmlentities($_POST['sub_id']);
$a = $_POST['a'];
$today = $functions->currentDateYmd();

$q = $queries->getSubstitutionById($conn, $substitution_id)->fetch_assoc();
$substitution_date = $q['date'];
if($substitution_date >= $today) {
	$q = $queries->updateSubstitution($conn, $substitution_id, $a);
	if($q == 1) {
		$functions->setNotificationA4($conn, $queries, $substitution_id);
		if($a == 1) echo "Accepted";
		else echo "Rejected";
	}
	else echo "<script>swal('Error', 'Problem accepting/rejecting substitution', 'warning')</script>";
}
?>