<?php
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';

$queries = new Queries();
$functions = new Functions();
$x = json_decode($_POST['data']);
$f = 0;
foreach($x as $a=>$b) {
	$q = $queries->updateFacultyPriority($conn, $b->id, $b->new);
	if(!$q) {
		echo "Error Saving";
		$f = 1;break;
	}
} 
if($f==0) echo "Saved";
// $user_id = htmlentities($_POST['user_id']);
// $new = htmlentities($_POST['value']);
// $q = $queries->updateFacultyPriority($conn, $user_id, $new);
// if($q == 1) echo "Saved";
// else echo "Error Saving";
?>