<?php $access = array(0); ?>
<?php include 'include/header.inc.php' ?>
	<div class="container">
		<section>
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card z-depth-3">
						<div class="card-content">
							<span class="card-title">View Lab Time Table</span>
							<form>
								<div class="row">
									<div class="input-field col s12">
										<select name="lab_id" id="lab_id">
										<option value="" disabled selected>Choose your option</option>
										<?php
										$res = $queries->getLabsAll($conn);
										if($res->num_rows > 0) {
											while($row = $res->fetch_assoc()) {
												echo "<option value='".$row['id']."'>".$row['name']."</option>";
											}
										}
										?>
									    </select>
								    	<label>Lab Detail</label>
									</div>
								</div>
								<div class="row">
			            			<div class="input-field col s12">
									    <select name="day" id="day">
											<option value="" disabled selected>Choose your option</option>
											<option value="all">All</option>
											<?php
											$res = $queries->getDaysAll($conn);
											foreach($res as $day) {
												echo "<option value='$day'>$day</option>";
											}
											?>
									    </select>
								    	<label>Day</label>
								  	</div>
		            			</div>
							</form>
							<div class="row">
						    	<div class="input-field col s12">
						    		<button class="btn waves-effect waves-light blue-grey lighten-1" id="viewlab" name="action">View
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
	<div id="schedule">
		
	</div>
		
<?php include 'include/footer.inc.php'; ?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#schedule').hide();
	});
	$('#viewlab').click(function() {
		var lab_id = $('#lab_id').val();
		var day = $('#day').val();
		console.log(lab_id+"/"+day);
		$.post("ajax/view_lab.php",
		{
			lab_id: lab_id,
			day: day
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