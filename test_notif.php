<?php
include 'include/connect.inc.php';
include 'queries.php';
include 'functions.php';

$queries = new Queries();
$functions = new Functions();

$faculty_id = 1;
$leave_date = "2017-01-03";
$functions->setNotificationA1($conn, $queries, $faculty_id, $leave_date);
?>