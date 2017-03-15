<?php $access[] = 5; ?>
<?php $global_bg = 1; ?>
<?php session_start(); if(isset($_SESSION['id'])) header('Location:home.php'); ?>
<?php include 'include/header.inc.php'; ?>
<!-- preloader -->
<div class="spinner-wrapper">
    <div class="spinner2"></div>
</div>
	<div class="container" >
		<section>
			<div class="row">
		        <div class="col s12 m8 offset-m2">
		        	<div class="card z-depth-5 blue-grey accent-1" style="opacity: 0.7">
			            <div class="card-content white-text center">
			            	<h1>Welcome</h1>
			            	<h4>Time Table Management System</h4>
			            </div>
			        </div>
			    </div>
			</div>
		</section>
	</div>
<?php include 'include/footer.inc.php'; ?>
<script type="text/javascript">
	$(document).ready(function() {
    	$(window).load(function() {
            preloaderFade = 3000;
            function hidepreloader() {
                var p2 = $('.spinner-wrapper');
                p2.delay(200).fadeOut(preloaderFade);
            }
            hidepreloader();
        });
    });
</script>