<?php $access = array(0); ?>
<?php include 'include/header.inc.php';?>
	<div class="container">
		<section>
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card z-depth-3">
						<div class="card-content">
							<span class="card-title">View Absent List:</span>
							<form>
								<div class="row">
									<div class="input-field col s12">
										<p class="likelabel">Enter date</p>
										<input type="date" name="date" id="date">
									</div>
								</div>
							</form>
							<div class="row">
						    	<div class="input-field col s12">
						    		<button class="btn waves-effect waves-light blue-grey lighten-1" id="allotclass" name="action">View
										<span><i class="fa fa-send"></i></span>
									</button>
						    	</div>
						    </div>							
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<div id="schedule" class="container">
		
	</div>
<?php include 'include/footer.inc.php'; ?>

<script type="text/javascript">
	$(document).ready(function(){
		$('#schedule').hide();
	});
	$('#allotclass').click(function() {
		var date = $('#date').val();
		date1 = new Date(date);
		console.log(date);
		$.post("ajax/view_absent.php", {
			date: date,
		},
		function(response, status) {
			$('#schedule').show();	
			$('#schedule').html(response);
		});
	});
</script>
</body>
</html>