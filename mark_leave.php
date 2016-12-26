<?php $access = array(0, 1); ?>
<?php include 'include/header.inc.php' ?>
	<div class="container">
		<section>
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card z-depth-3">
						<div class="card-content">
							<span class="card-title">Mark Leave</span>
							<form>
								<?php if($g_usertype == 0) { ?>
								<div class="row">
									<div class="input-field col s12">
										<select name="faculty_id" id="faculty_id">
										<option value="" disabled selected>Choose Faculty id</option>
										<?php
										$res = $queries->getFacultiesByAttendanceNotMarked($conn, $today);
										if($res->num_rows > 0) {
											while($row = $res->fetch_assoc()) {
												$val = $row['name'];
												echo "<option value='".$row['id']."'>$val</option>";
											}
										}	
										?>
									    </select>
								    	<label>Faculty Id</label>
									</div>
								</div>
								<?php }
								else if($g_usertype == 1)
									echo "<input type='hidden' name='faculty_id' id='faculty_id' value='$g_id'>"; 
								 ?>
								<div class="row">
									<div class="input-field col s12">
										<p class="likelabel">Enter date of leave</p>
										<input type="date" name="leave_date" id="leave_date">
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
		var leave_date = $('#leave_date').val();
		// console.log(faculty_id+" & "+leave_date);
		$.post("ajax/mark_leave.php",
		{
			faculty_id: faculty_id,
			leave_date: leave_date,
		},
		function(response, status) {
			var data = JSON.parse(response);
			swal(data[0], data[1], data[2]);
		});
	});
</script>
</body>
</html>