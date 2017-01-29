<?php $access = array(0); ?>
<?php include 'include/header.inc.php' ?>
	<div class="container">
		<section>
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card z-depth-3">
						<div class="card-content">
							<span class="card-title">Mark Attendance</span>
							<form>
								<div class="row">
									<div class="input-field col s12">
										<select name="faculty_id" id="faculty_id">
										<option value="" disabled selected>Choose your option</option>
										<?php
										$today = date('Y-m-d', strtotime('+4 hours 30 minutes'));
										$res = $queries->getFacultiesByAttendanceNotMarked($conn, $today);
										if($res->num_rows > 0) {
											while($row = $res->fetch_assoc()) {
												// $val = explode('.', $row['name'])[1];
												$val = $row['name'];
												echo "<option value='".$row['id']."'>$val</option>";
											}
										}	
										?>
									    </select>
								    	<label>Faculty Id</label>
									</div>
								</div>
							</form>
							<div class="row">
						    	<div class="input-field col s12">
						    		<button class="btn waves-effect waves-light blue-grey lighten-1" id="markfaculty" name="action">Mark
										<span><i class="fa fa-check"></i></span>
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
	$(document).ready(function(){
		$('#schedule').hide();
	});
	$('#markfaculty').click(function() {
		var faculty_id = $('#faculty_id').val();
		console.log(faculty_id);
		$.post("ajax/mark_attendance.php",
		{
			faculty_id: faculty_id,
		},
		function(response, status) {
			console.log(response);
			var data = JSON.parse(response);
			console.log(data[0]+"\n"+data[1]+"\n"+data[2]+"\n"+status);
			swal(data[0], data[1], data[2]);
		});
	});
</script>
</body>
</html>