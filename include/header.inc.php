<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Time Table Handler</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="css/roboto.min.css">
	<link rel="stylesheet" type="text/css" href="css/fonts.css">
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
</head>
<body>
	<?php require 'include/connect.inc.php'; ?>
	<?php require 'queries.php'; ?>
	<?php require 'functions.php'; ?>
	<?php $queries = new Queries(); ?>
	<?php $functions = new Functions(); ?>
	<div class="navbar-fixed">
		<ul id="dropdown_view" class="dropdown-content">
			<li><a href="#!">By Class</a></li>
			<li><a href="#!">By Lab</a></li>
			<li class="divider"></li>
			<li><a href="#!">By Faculty</a></li>
		</ul>
     	<ul class="side-nav" id="mobile-demo">
	        <li><a href="create_class.php">Class</a></li>
	        <li><a href="create_lab.php">Lab</a></li>
	        <li><a href="create_faculty.php">Faculty</a></li>
	        <li><a href="#!" class="dropdown-button" data-activates="dropdown_view">Timetable<i class="material-icons right">arrow_drop_down</i></a></li>
	    </ul>

		<nav class="cyan darken-1">
			<div class="nav-wrapper" style="padding-left:10px;">
		    	<a class="brand-logo"><i class="material-icons">schedule</i>AKGEC Timetable</a>
				<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
		      	<ul id="nav-mobile" class="right hide-on-med-and-down" style="padding-right:10px">
			        <li><a href="create_class.php">Class</a></li>
			        <li><a href="create_lab.php">Lab</a></li>
			        <li><a href="create_faculty.php">Faculty</a></li>
			        <li><a href="#!" class="dropdown-button" data-activates="dropdown_view">Timetable<i class="material-icons right">arrow_drop_down</i></a></li>
		      	</ul>
		    </div>
		</nav>
	</div>