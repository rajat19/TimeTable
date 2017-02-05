<?php $access = array(0, 1, 2); ?>
<?php $global_bg = 1 ?>
<?php include 'include/header.inc.php'; ?>
	<div class="container">
		<section>
			<div class="row">
		        <div class="col s12 m8 offset-m2">
		        	<div class="card z-depth-3 blue-grey accent-1" style="opacity: 0.7">
			            <div class="card-content white-text center">
			            	<h1>Welcome </h1>
			            	<h4><?php echo $g_name; ?></h4>
			            </div>
			        </div>
			    </div>
			</div>

			<?php if($g_usertype == 1) { ?>
			<div class="row">
	        	<div class="card-content center" id="schedule">
				</div>
			</div>
			<?php } ?>
		</section>
	</div>
<?php include 'include/footer.inc.php'; ?>
<?php if($g_usertype == 1) { ?>
<script type="text/javascript">
	$(document).ready(function(){
		$.post("ajax/find_attendance.php", 
		{
			type: 1,
		},
		function(response, status) {
			$('#schedule').html(response);	
			$('#markfaculty').click(function() {
				$.post("ajax/find_attendance.php",
				{
					type: 2,
				},
				function(response, status) {
					$('#schedule').html(response);
				});
			});
		});
	});
</script>
<?php } ?>
</body>
</html>