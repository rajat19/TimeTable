<?php
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';

$queries = new Queries();
$functions = new Functions();
$user_id = htmlentities($_GET['userid']);
$faculty_id = $queries->getFacultyByUserId($conn, $user_id)->fetch_assoc()['id'];
$q1 = $queries->deleteUser($conn, $user_id);
$q2 = $queries->deleteFaculty($conn, $user_id);
$q3 = $queries->deleteUserNotifications($conn, $user_id);
$q4 = $queries->deleteFacultySubstitutions($conn, $faculty_id);
if($q1 && $q2 && $q3 && $q4) echo "success";
else {
	$err = "Error deleting ";
	if(!$q1) $err.="User";
	else if(!$q2) $err.="Faculty";
	else if(!$q3) $err.="Notifications";
	else if(!$q4) $err.="Substitutions";
	echo $err;
}
?>