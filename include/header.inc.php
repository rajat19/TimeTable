<!DOCTYPE html>
<html>
<head>
	<title>Time Table Handler</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description" content="Timetable Management System for College">
    <meta name="author" content="Rajat Srivastava">
    <link rel="icon" type="image/png" href="images/akgec.png" />
	<link rel="stylesheet" type="text/css" href="css/fonts.css">
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="fontawe/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="css/materialize.clockpicker.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<link rel="stylesheet" type="text/css" href="css/preloader.css">
	<link rel="stylesheet" type="text/css" href="css/scroller.css">
	<link rel="manifest" href="manifest.json">

</head>
<?php 
	if(isset($global_bg) && $global_bg==1) {
		echo "<body class='backcover'>";
	}
	else {
		echo "<body class='scrollbar' id='style-13'>";		
	}
?>
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
		<?php if($access[0]!=5 && $g_usertype==0) { ?>
		<ul class="dropdown-content blue-grey darken-3" id="dropdown_manage">
			<li><a href="mark_attendance.php">Mark Attendance</a></li>
			<li class="divider"></li>
			<li><a href="view_attendance.php">View Attendance</a></li>
			<li class="divider"></li>
			<li><a href="allot_class.php">Allot Class</a></li>
			<li class="divider"></li>
			<li><a href="temp_class.php">Temporary Classes</a></li>
		</ul>

		<ul id="dropdown_leave" class="dropdown-content blue-grey darken-3">
			<li><a href="mark_leave.php">Mark Leave</a></li>
			<li class="divider"></li>
			<li><a href="view_leave.php">View Leave</a></li>
		</ul>
		<!-- <ul id="dropdown_view" class="dropdown-content blue-grey darken-3"></ul> -->
		<ul id="dropdown_addview" class="dropdown-content blue-grey darken-3">
			<li><a href="create_class.php">Add Class Timetable</a></li>
	        <li class="divider"></li>
	        <li><a href="create_lab.php">Add Lab Timetable</a></li>
	        <li class="divider"></li>
	        <li><a href="create_faculty.php">Add Faculty Timetable</a></li>
	        <li class="divider"></li>
			<li><a href="view_class.php">View Class Timetable</a></li>
			<li class="divider"></li>
			<li><a href="view_lab.php">View Lab Timetable</a></li>
			<li class="divider"></li>
			<li><a href="view_faculty.php">View Faculty Timetable</a></li>
		</ul>
		<ul class="dropdown-content blue-grey darken-3" id="dropdown_user">
			<li><a href="change_password.php">Change Password</a></li>
			<li class="divider"></li>
			<li><a href="add_faculties.php">Add Faculties</a></li>
			<li class="divider"></li>
			<li><a href="edit_cr.php">Change Class Representatives</a></li>
			<li class="divider"></li>
			<li><a href="set_timelimit.php">Set Time Limit</a></li>
			<li class="divider"></li>
			<!-- <li><a href="edit_faculties.php">Edit Faculties</a></li>
			<li class="divider"></li>
			<li><a href="delete_faculties.php">Delete Faculties</a></li>
			<li class="divider"></li> -->
			<!-- <li><a href="send_message.php">Send Messages</a></li>
			<li class="divider"></li> -->
			<li><a href="ip_track.php">Track Visitors</a></li>
		</ul>
     	<?php } ?>

     	<ul class="side-nav blue-grey darken-3" id="mobile-demo">
     		<?php if($access[0]!=5 && $g_usertype==0) { ?>
			<ul class="dropdown-content blue-grey darken-3" id="dropdown_manage">
				<li><a href="mark_attendance.php">Mark Attendance</a></li>
				<li class="divider"></li>
				<li><a href="view_attendance.php">View Attendance</a></li>
				<li class="divider"></li>
				<li><a href="allot_class.php">Allot Class</a></li>
				<li class="divider"></li>
				<li><a href="temp_class.php">Temporary Classes</a></li>
			</ul>
			<ul class="dropdown-content blue-grey darken-3" id="dropdown_leave">
				<li><a href="mark_leave.php">Mark Leave</a></li>
				<li class="divider"></li>
				<li><a href="view_leave.php">View Leave</a></li>
			</ul>
	     	<ul id="dropdown_addview" class="dropdown-content blue-grey darken-3">
				<li><a href="create_class.php">Add Class Timetable</a></li>
		        <li class="divider"></li>
		        <li><a href="create_lab.php">Add Lab Timetable</a></li>
		        <li class="divider"></li>
		        <li><a href="create_faculty.php">Add Faculty Timetable</a></li>
		        <li class="divider"></li>
				<li><a href="view_class.php">View Class Timetable</a></li>
				<li class="divider"></li>
				<li><a href="view_lab.php">View Lab Timetable</a></li>
				<li class="divider"></li>
				<li><a href="view_faculty.php">View Faculty Timetable</a></li>
			</ul>
			<ul class="dropdown-content blue-grey darken-3" id="dropdown_user">
				<li><a href="change_password.php">Change Password</a></li>
				<li class="divider"></li>
				<li><a href="add_faculties.php">Add Faculties</a></li>
				<li class="divider"></li>
				<li><a href="edit_cr.php">Change Class Representatives</a></li>
				<li class="divider"></li>
				<li><a href="set_timelimit.php">Set Time Limit</a></li>
				<li class="divider"></li>
				<!-- <li><a href="edit_faculties.php">Edit Faculties</a></li>
				<li class="divider"></li>
				<li><a href="delete_faculties.php">Delete Faculties</a></li>
				<li class="divider"></li> -->
				<!-- <li><a href="send_message.php">Send Messages</a></li>
				<li class="divider"></li> -->
				<li><a href="ip_track.php">Track Visitors</a></li>
			</ul>
			<?php } ?>
			<?php if($access[0] == 5) {
				echo '<li><a href="login.php">Login</a></li>';
				echo '<li><a href="view_timetable.php">View Timetable</a></li>';
			}
			else {
				if($g_usertype == 0) {
					// admin
					echo '<li><a href="#!" class="dropdown-button" data-activates="dropdown_manage">Manage Timetable <span><i class="fa fa-angle-down"></i></span></a></li>';
					echo '<li><a href="#!" class="dropdown-button" data-activates="dropdown_leave">Faculty Leave <span><i class="fa fa-angle-down"></i></span></a></li>';
					echo '<li><a href="#!" class="dropdown-button" data-activates="dropdown_addview">Timetable <span><i class="fa fa-angle-down"></i></span></a></li>';
					echo '<li><a href="#!" class="dropdown-button" data-activates="dropdown_user">Manage Settings <span><i class="fa fa-angle-down"></i></span></a></li>';
				}
				if($g_usertype == 1) {
					// faculty
  					echo '<li><a href="mark_leave.php">Mark Leave</a></li>';
  					echo '<li><a href="faculty_leave.php">View Leaves</a></li>';
  					// echo '<li><a href="request_substitution.php">Request Substitution</a></li>';
  					echo '<li><a href="change_password.php">Change Password</a></li>';
  					echo '<li><a href="faculty_timetable.php">View Timetable</a></li>';					
				}
				if($g_usertype == 2) {
					// cr
					echo '<li><a href="schedule.php">Today\'s Schedule</a></li>';
  					echo '<li><a href="report.php">Notify Admin</a></li>';
  					echo '<li><a href="class_timetable.php">View Timetable</a></li>';
				}
				$q = $queries->getNotificationsUnreadByUser($conn, $g_userid)->num_rows;
  				echo '<li><a href="notification.php">Notifications';
  				if($q>0) echo "<span class='new badge red'>$q</span>";
  				echo'</a></li>';
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
		      					echo '<li><a href="#!" class="dropdown-button" data-activates="dropdown_addview">Add/View Timetable<i class="material-icons right">arrow_drop_down</i></a></li>';
		      					echo '<li><a href="#!" class="dropdown-button" data-activates="dropdown_user">Manage Settings<i class="material-icons right">arrow_drop_down</i></a></li>';
		      				}

		      				if($g_usertype == 1) {
		      					echo '<li><a href="mark_leave.php">Mark Leave</a></li>';
		      					echo '<li><a href="faculty_leave.php">View Leaves</a></li>';
		      					// echo '<li><a href="request_substitution.php">Request Substitution</a></li>';
		      					echo '<li><a href="change_password.php">Change Password</a></li>';
		      					echo '<li><a href="faculty_timetable.php">View Timetable</a></li>';
		      				}

		      				if($g_usertype == 2) {
		      					echo '<li><a href="schedule.php">Today\'s Schedule</a></li>';
		      					echo '<li><a href="report.php">Notify Admin</a></li>';
		      					echo '<li><a href="class_timetable.php">View Timetable</a></li>';
		      				}
		      				$q = $queries->getNotificationsUnreadByUser($conn, $g_userid)->num_rows;
		      				
		      				echo '<li><a href="notification.php">Notifications';
		      				if($q>0) echo "<span class='new badge red'>$q</span>";
		      				echo'</a></li>';
		      				echo '<li><a href="logout.php">Logout</a></li>';
		      			}
		      		?>
		      	</ul>
		    </div>
		</nav>
	</div>