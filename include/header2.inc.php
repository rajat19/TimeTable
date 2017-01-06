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
		<nav class="blue">
			<ul class="dropdown-content blue-grey darken-4" id="dropdown_manage">
				<li><a href="mark_attendance.php">Mark Attendance</a></li>
				<li class="divider"></li>
				<li><a href="view_attendance.php">View Attendance</a></li>
				<li class="divider"></li>
				<li><a href="allot_class.php">Allot Class</a></li>
				<li class="divider"></li>
				<li><a href="temp_class.php">Temporary Classes</a></li>
			</ul>
			<div class="nav-wrapper" style="padding-left: 10px">
				<a class="brand-logo" href="index.php">AKGEC Timetable</a>
				<a href="#" data-activates="mobile-demo" class="button-collapse"><span><i class="fa fa-reorder"></i></span></a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li><a href="sass.html">Sass</a></li>
					<li><a href="badges.html">Components</a></li>
					<li><a href="collapsible.html">JavaScript</a></li>
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
					<li><a href="#!" class="dropdown-button" data-activates="dropdown_manage">Manage Timetable<span><i class="fa fa-angle-down"></i></span></a></li>
					<li><a href="#!" class="dropdown-button" data-activates="dropdown_leave">Faculty Leave<span><i class="fa fa-angle-down"></i></span></a></li>
				</ul>
			</div>
		</nav>
	</div>
</body>
</html>