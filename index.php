<?php $access[] = 5; ?>
<?php session_start(); if(isset($_SESSION['id'])) header('Location:home.php'); ?>
<?php include 'include/header.inc.php'; ?>
	<div class="container">
		<section>
			<div class="row">
		        <div class="col s12 m8 offset-m2">
		        	<div class="card z-depth-3 blue-grey accent-1">
			            <div class="card-content white-text center">
			            	<h1>Welcome</h1>
			            	<h4>Time Table Management System</h4>
			            	
			            </div>

			        </div>
			        <div class="center blue-grey lighten-3">
			        	<img src="images/akgec.png" class="avatar">
			        </div>
			    </div>
			</div>
		</section>
	</div>
<?php include 'include/footer.inc.php'; ?>