<?php

$dbhost = "localhost";
$dbname = "timetable";
$dbuser = "root";
$dbpass = "";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if($conn->connect_error) {
	die('connection failed'.$conn->connect_error);
}