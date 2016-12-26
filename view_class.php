<?php $access = array(0); ?>
<?php include 'include/header.inc.php' ?>
	<div class="container">
		<section>
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card z-depth-3">
						<div class="card-content">
							<span class="card-title">View Class Time Table</span>
							<form>
								<div class="row">
									<div class="input-field col s12">
										<select name="class_id" id="class_id">
										<option value="" disabled selected>Choose your option</option>
										<?php
										$res = $queries->getClassesAll($conn);
										if($res->num_rows > 0) {
											while($row = $res->fetch_assoc()) {
												echo "<option value='".$row['id']."'>".$row['branch']." ".$row['year']." year ".$row['section']."</option>";
											}
										}
										?>
									    </select>
								    	<label>Class Detail</label>
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
						    		<button class="btn waves-effect waves-light blue-grey lighten-1" id="viewclass" name="action">View
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
	$('#viewclass').click(function() {
		var class_id = $('#class_id').val();
		var day = $('#day').val();
		console.log(class_id+"/"+day);
		$.post("ajax/view_class.php",
		{
			class_id: class_id,
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