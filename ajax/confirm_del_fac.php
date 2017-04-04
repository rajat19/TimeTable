<?php
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';

$queries = new Queries();
$functions = new Functions();
$user_id = htmlentities($_GET['userid']);
$q1 = $queries->deleteUser($conn, $user_id);
$q2 = $queries->deleteFaculty($conn, $user_id);
if($q1 && $q2) echo "success";
else echo "failure";
?>