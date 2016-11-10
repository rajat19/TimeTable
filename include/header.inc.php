<!DOCTYPE html>
<html>
<head>
	<title>Time Table Handler</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="css/fonts.css">
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="fontawe/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
</head>
<body>
	<?php require 'include/connect.inc.php'; ?>
	<?php require 'queries.php'; ?>
	<?php require 'functions.php'; ?>
	<?php $queries = new Queries(); ?>
	<?php $functions = new Functions(); ?>
	<div class="navbar-fixed">
		<ul class="dropdown-content red lighten-4" id="dropdown_manage">
			<li><a href="mark_attendance.php">Mark Attendance</a></li>
			<li class="divider"></li>
			<li><a href="view_attendance.php">View Attendance</a></li>
			<li class="divider"></li>
			<li><a href="allot_class.php">Allot Class</a></li>
			<li class="divider"></li>
			<li><a href="temp_class.php">Temporary Classes</a></li>
		</ul>

		<ul id="dropdown_view" class="dropdown-content red lighten-4">
			<li><a href="view_class.php">Class</a></li>
			<li class="divider"></li>
			<li><a href="view_lab.php">Lab</a></li>
			<li class="divider"></li>
			<li><a href="view_faculty.php">Faculty</a></li>
		</ul>

		<ul id="dropdown_add" class="dropdown-content red lighten-4">
	        <li><a href="create_class.php">Class</a></li>
	        <li class="divider"></li>
	        <li><a href="create_lab.php">Lab</a></li>
	        <li class="divider"></li>
	        <li><a href="create_faculty.php">Faculty</a></li>
		</ul>
     	
     	<ul class="side-nav" id="mobile-demo">
			<ul class="dropdown-content red lighten-4" id="dropdown_manage">
				<li><a href="mark_attendance.php">Mark Attendance</a></li>
				<li class="divider"></li>
				<li><a href="view_attendance.php">View Attendance</a></li>
				<li class="divider"></li>
				<li><a href="allot_class.php">Allot Class</a></li>
				<li><a href="temp_class.php">Temporary Classes</a></li>
			</ul>
	     	<ul id="dropdown_view" class="dropdown-content red lighten-4">
				<li><a href="view_class.php">By Class</a></li>
				<li class="divider"></li>
				<li><a href="view_lab.php">By Lab</a></li>
				<li class="divider"></li>
				<li><a href="view_faculty.php">By Faculty</a></li>
			</ul>
			<ul id="dropdown_add" class="dropdown-content red lighten-4">
		        <li><a href="create_class.php">Class</a></li>
		        <li class="divider"></li>
		        <li><a href="create_lab.php">Lab</a></li>
		        <li class="divider"></li>
		        <li><a href="create_faculty.php">Faculty</a></li>
			</ul>
			
			<li><a href="login.php">Login</a></li>
			<li><a href="#!" class="dropdown-button" data-activates="dropdown_manage">Manage Timetable<span><i class="fa fa-angle-down"></i></span></a></li>
      		<!-- <li><a href="upload.php">Upload</a></li> -->
     		<li><a href="#!" class="dropdown-button" data-activates="dropdown_add">Add Timetable<span><i class="fa fa-angle-down"></i></span></a></li>
	        <li><a href="#!" class="dropdown-button" data-activates="dropdown_view">Timetable<span><i class="fa fa-angle-down"></i></span></a></li>
	    </ul>

		<nav class="red accent-1">
			<div class="nav-wrapper" style="padding-left:10px;">
		    	<a class="brand-logo">AKGEC Timetable</a>
				<a href="#" data-activates="mobile-demo" class="button-collapse"><span><i class="fa fa-reorder"></i></span></a>
		      	<ul id="nav-mobile" class="right hide-on-med-and-down" style="padding-right:10px">
		      		<li><a href="login.php">Login</a></li>
		      		<li><a href="files">Files</a></li>
		      		<li><a href="#!" class="dropdown-button" data-activates="dropdown_manage">Manage Timetable<i class="material-icons right">arrow_drop_down</i></a></li>
		      		<!-- <li><a href="upload.php">Upload</a></li> -->
			        <li><a href="#!" class="dropdown-button" data-activates="dropdown_add">Add Timetable
			        <i class="material-icons right">arrow_drop_down</i>
			        <!-- <span><i class="fa fa-angle-down"></i></span> -->
			        </a></li>
			        <li><a href="#!" class="dropdown-button" data-activates="dropdown_view">View Timetable
			        <i class="material-icons right">arrow_drop_down</i>
			        <!-- <span><i class="fa fa-angle-down"></i></span> -->
			        </a></li>
		      	</ul>
		    </div>
		</nav>
	</div>