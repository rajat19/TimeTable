<?php $access = array(0); ?>
<?php include 'include/header.inc.php' ?>
	<div class="container">
		<section>
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card z-depth-3">
						<div class="card-content">
							<span class="card-title">Set Time Limit for Attendance</span>
							<form>
								<div class="row">
									<div class="input-field col s12">
										<label for="timer">Time limit: </label>
										<input id="timer" class="timepicker" type="time">
										<span id="current_limit"><p>Current Time limit: <?php echo $queries->getSettingByType($conn, 'timelimit')->fetch_assoc()['value']; ?></p></span>
									</div>
								</div>
							</form>
							<div class="row">
						    	<div class="input-field col s12">
						    		<button class="btn waves-effect waves-light blue-grey lighten-1" id="set" name="action">Set
										<span><i class="fa fa-clock-o"></i></span>
									</button>
						    	</div>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
<?php include 'include/footer.inc.php'; ?>
<script type="text/javascript">
	$('#set').click(function() {
		var time = $('#timer').val();
		console.log(time);
		$.post("ajax/set_timelimit.php",
		{
			time: time
		},
		function(response, status) {
			console.log(response);
			var data = JSON.parse(response);
			swal(data[0], data[1], data[2]);
			if(data[3]==1) {
				$('#current_limit').html("<p>Current Time limit: "+data[4]+"</p>");
			}
		});
	});
</script>
</body>
</html>