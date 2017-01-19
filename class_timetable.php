<?php $access = array(2); ?>
<?php include 'include/header.inc.php' ?>
<?php $class_id = $queries->getClassByUserId($conn, $g_userid)->fetch_assoc()['id']; ?>
	<div class="container">
		<section>
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card z-depth-3">
						<div class="card-content">
							<span class="card-title">View Time Table</span>
							<form>
								<div class="row">
			            			<div class="input-field col s12">
			            				<input type="hidden" name="class_id" id="class_id" value="<?php echo $class_id; ?>">
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