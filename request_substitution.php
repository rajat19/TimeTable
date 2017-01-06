<?php $access = array(1); ?>
<?php include 'include/header.inc.php' ?>
<?php $faculty_id = $queries->getFacultyByUserId($conn, $g_userid)->fetch_assoc()['id']; ?>
	<div class="container">
		<section>
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card z-depth-3">
						<div class="card-content">
							<span class="card-title">Request Substitution</span>
							<form>
		            			<input type="hidden" name="faculty_id" id="faculty_id" value="<?php echo $faculty_id; ?>">
								<div class="row">
									<div class="input-field col s12">
										<label>Enter date</label>
										<input type="date" name="date" id="date" class="datepicker">
									</div>
								</div>
							</form>
							<div class="row">
						    	<div class="input-field col s12">
						    		<button class="btn waves-effect waves-light blue-grey lighten-1" id="request" name="action">View
										<span><i class="fa fa-calendar"></i></span>
									</button>
						    	</div>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>	
	<div id="schedule">
		
	</div>
<?php include 'include/footer.inc.php'; ?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#schedule').hide();
	});
	$('#request').click(function() {
		var faculty_id = $('#faculty_id').val();
		var date = $('input[name=date]').val();
		console.log(faculty_id+"/"+date);
		$.post("ajax/request_substitution.php",
		{
			faculty_id: faculty_id,
			date: date
		},
		function(response, status) {
			console.log(response);
			$('#schedule').show();	
			$('#schedule').html(response);
		});
	});
</script>
</body>
</html>