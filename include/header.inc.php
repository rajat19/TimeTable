<!DOCTYPE html>
<html>
<head>
	<title>Time Table Handler</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="css/fonts.css">
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="fontawe/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<?php require 'include/connect.inc.php'; ?>
	<?php 
		if($access[0] != 5) {
			require 'include/session.php';
			if(!in_array($g_usertype, $access)) {
				header('Location:error.php');
			}
		}
	?>
	<?php require 'queries.php'; ?>
	<?php require 'functions.php'; ?>
	<?php $queries = new Queries(); ?>
	<?php $functions = new Functions(); ?>
	<div class="navbar-fixed">
		<ul class="dropdown-content blue-grey darken-4" id="dropdown_manage">
			<li><a href="mark_attendance.php">Mark Attendance</a></li>
			<li class="divider"></li>
			<li><a href="view_attendance.php">View Attendance</a></li>
			<li class="divider"></li>
			<li><a href="allot_class.php">Allot Class</a></li>
			<li class="divider"></li>
			<li><a href="temp_class.php">Temporary Classes</a></li>
		</ul>

		<ul id="dropdown_leave" class="dropdown-content blue-grey darken-4">
			<li><a href="mark_leave.php">Mark Leave</a></li>
			<li class="divider"></li>
			<li><a href="view_leave.php">View Leave</a></li>
			<li class="divider"></li>
		</ul>

		<ul id="dropdown_view" class="dropdown-content blue-grey darken-4">
			<li><a href="view_class.php">Class</a></li>
			<li class="divider"></li>
			<li><a href="view_lab.php">Lab</a></li>
			<li class="divider"></li>
			<li><a href="view_faculty.php">Faculty</a></li>
		</ul>

		<ul id="dropdown_add" class="dropdown-content blue-grey darken-4">
	        <li><a href="create_class.php">Class</a></li>
	        <li class="divider"></li>
	        <li><a href="create_lab.php">Lab</a></li>
	        <li class="divider"></li>
	        <li><a href="create_faculty.php">Faculty</a></li>
		</ul>
     	
     	<ul class="side-nav" id="mobile-demo">
			<ul class="dropdown-content blue-grey darken-4" id="dropdown_manage">
				<li><a href="mark_attendance.php">Mark Attendance</a></li>
				<li class="divider"></li>
				<li><a href="view_attendance.php">View Attendance</a></li>
				<li class="divider"></li>
				<li><a href="allot_class.php">Allot Class</a></li>
				<li class="divider"></li>
				<li><a href="temp_class.php">Temporary Classes</a></li>
			</ul>
			<ul class="dropdown-content blue-grey darken-4" id="dropdown_leave">
				<li><a href="mark_leave.php">Mark Leave</a></li>
				<li class="divider"></li>
				<li><a href="view_leave.php">View Leave</a></li>
			</ul>
	     	<ul id="dropdown_view" class="dropdown-content blue-grey darken-4">
				<li><a href="view_class.php">By Class</a></li>
				<li class="divider"></li>
				<li><a href="view_lab.php">By Lab</a></li>
				<li class="divider"></li>
				<li><a href="view_faculty.php">By Faculty</a></li>
			</ul>
			<ul id="dropdown_add" class="dropdown-content blue-grey darken-4">
		        <li><a href="create_class.php">Class</a></li>
		        <li class="divider"></li>
		        <li><a href="create_lab.php">Lab</a></li>
		        <li class="divider"></li>
		        <li><a href="create_faculty.php">Faculty</a></li>
			</ul>
			
			<?php if($access[0] == 5) {
				echo '<li><a href="login.php">Login</a></li>';
				echo '<li><a href="view_timetable.php">View Timetable</a></li>';
			}
			else {
				if($g_usertype == 0) {
					// admin
					echo '<li><a href="#!" class="dropdown-button" data-activates="dropdown_manage">Manage Timetable<span><i class="fa fa-angle-down"></i></span></a></li>';
					echo '<li><a href="#!" class="dropdown-button" data-activates="dropdown_leave">Faculty Leave<span><i class="fa fa-angle-down"></i></span></a></li>';
					echo '<li><a href="#!" class="dropdown-button" data-activates="dropdown_add">Add Timetable<span><i class="fa fa-angle-down"></i></span></a></li>';
					echo '<li><a href="#!" class="dropdown-button" data-activates="dropdown_view">Timetable<span><i class="fa fa-angle-down"></i></span></a></li>';
				}
				if($g_usertype == 1) {
					// faculty
					
				}
				if($g_usertype == 2) {
					// cr
				}
				echo '<li><a href="logout.php">Logout</li>';
			}
	        ?>
	    </ul>

		<nav class="blue-grey darken-3">
			<div class="nav-wrapper" style="padding-left:10px;">
		    	<a class="brand-logo" href="index.php">AKGEC Timetable</a>
				<a href="#" data-activates="mobile-demo" class="button-collapse"><span><i class="fa fa-reorder"></i></span></a>
		      	<ul id="nav-mobile" class="right hide-on-med-and-down" style="padding-right:10px">
		      		<?php
		      			if($access[0] == 5) {
		      				echo '<li><a href="login.php">Login</a></li>';
		      				echo '<li><a href="view_timetable.php">View Timetable</a></li>';
		      			}
		      			else {
		      				echo '<li><a href="home.php">Home</a></li>';
		      				if($g_usertype == 0) {
		      					echo '<li><a href="#!" class="dropdown-button" data-activates="dropdown_manage">Manage Timetable<i class="material-icons right">arrow_drop_down</i></a></li>';
		      					echo '<li><a href="#!" class="dropdown-button" data-activates="dropdown_leave">Faculty Leave<i class="material-icons right">arrow_drop_down</i></a></li>';
		      					echo '<li><a href="#!" class="dropdown-button" data-activates="dropdown_add">Add Timetable<i class="material-icons right">arrow_drop_down</i></a></li>';
		      					echo '<li><a href="#!" class="dropdown-button" data-activates="dropdown_view">View Timetable<i class="material-icons right">arrow_drop_down</i></a></li>';
		      				}

		      				if($g_usertype == 1) {
		      					echo '<li><a href="mark_leave.php">Mark Leave</a></li>';
		      					echo '<li><a href="faculty_leave.php">View Leaves</a></li>';
		      					echo '<li><a href="faculty_timetable.php">View Timetable</a></li>';
		      				}

		      				if($g_usertype == 2) {

		      				}
		      				echo '<li><a href="notification.php">Notifications</a></li>';
		      				echo '<li><a href="logout.php">Logout</a></li>';
		      			}
		      		?>
		      	</ul>
		    </div>
		</nav>
	</div>