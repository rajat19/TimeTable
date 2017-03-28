<?php

$dbhost = "localhost";
$dbname = "timetable";
$dbuser = "root";
$dbpass = "";

// $dbhost = "localhost";
// $dbname = "1034060";
// $dbuser = "1034060";
// $dbpass = "rajatking19";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if($conn->connect_error) {
	die('connection failed'.$conn->connect_error);
}