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
			
			<div class="row phonecover center">
				<img src="images/bg.jpg" width="100%">
			</div>
		</section>
	</div>
	<!-- Element Showed -->
  <a id="menu" class="waves-effect waves-light btn btn-floating" onclick="$('.tap-target').tapTarget('open')"><i class="material-icons">menu</i></a>
  <div class="tap-target-wrapper" style="right: -348px; bottom: -327px; position: fixed;"><div class="tap-target cyan" data-activates="menu">
  <div class="tap-target-content white-text" style="width: 456px; height: 400px; top: 0px; right: 0px; bottom: 0px; left: 0px; padding: 56px; vertical-align: bottom;">
    <h5>I am here</h5>
    <p class="white-text">Provide value and encourage return visits by introducing users to new features and functionality at contextually relevant moments.</p>
  </div>
</div><div class="tap-target-wave" style="top: 344px; left: 344px; width: 112px; height: 112px;"><a class="btn btn-floating btn-large cyan tap-target-origin"><i class="material-icons">menu</i></a></div></div>

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