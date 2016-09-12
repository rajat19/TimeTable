<?php include 'include/header.inc.php'; ?>
	<div class="container">
		<section>
			<div class="row">
		        <div class="col s12 m8 offset-m2">
		          <div class="card">
		            <div class="card-content">
		            <span class="card-title">Create Class Time Table</span>  
		            	<form>
		            		<div class="row">
		            			<div class="input-field col s12">
								    <select name="faculty_id" id="faculty_id">
										<option value="" disabled selected>Choose your option</option>
										<?php
										$res = $queries->getFacultiesAll($conn);
										if($res->num_rows > 0) {
											while($row = $res->fetch_assoc()) {
												// $val = explode('.', $row['name'])[1];
												$val = $row['name'];
												echo "<option value='".$row['id']."'>$val</option>";
											}
										}
										?>
								    </select>
							    	<label>Faculty</label>
							  	</div>
		            		</div>
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
		            		<div class="row">
		            			<div class="input-field col s12">
								    <select name="slot_id" id="slot_id">
										<option value="" disabled selected>Choose your option</option>
										<?php
										$res = $queries->getSlotsAll($conn);
										if($res->num_rows > 0) {
											while($row = $res->fetch_assoc()) {
												echo "<option value='".$row['id']."'>".$row['start']." to ".$row[end]."</option>";
											}
										}
										?>
								    </select>
							    	<label>Slot</label>
							  	</div>
		            		</div>
		            		<div class="row">
						        <div class="input-field col s12">
						          	<input id="subject_id" type="text" name="subject_id" placeholder="eg. NCS401">
						          	<label for="subject_id">Subject id</label>
						        </div>
						    </div>		
		            	</form>
		            		<div class="row">
						    	<div class="input-field col s12">
						    		<button class="btn waves-effect waves-light cyan darken-1" id="createfaculty" name="action">Submit
										<i class="material-icons right">send</i>
									</button>
						    	</div>
						    </div>
		          	</div>
		        </div>
		    </div>
		</section>
	</div>
<?php include 'include/footer.inc.php'; ?>
<script type="text/javascript">
	$('#createfaculty').click(function(){
		var class_id = $('#class_id').val();
		var day = $('#day').val();
		var slot_id = $('#slot_id').val();
		var faculty_id = $('#faculty_id').val();
		var subject_id = $('#subject_id').val();
		console.log(lab_id+"/"+class_id+"/"+day+"/"+slot_id+"/"+faculty_id+"/"+subject_id);
		$.post("ajax/create_class.php",
		{
			class_id: class_id,
			day: day,
			slot_id: slot_id,
			faculty_id: faculty_id,
			subject_id: subject_id,
		},
		function(response, status) {
			var data = JSON.parse(response);
			console.log(data[0]+"\n"+data[1]+"\n"+data[2]+"\n"+status);
			swal(data[0], data[1], data[2]);
		});
	});
</script>
</body>
</html>