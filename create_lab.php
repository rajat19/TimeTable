<?php $access = array(0); ?>
<?php include 'include/header.inc.php'; ?>
	<div class="container">
		<section>
			<div class="row">
		        <div class="col s12 m8 offset-m2">
		          <div class="card z-depth-3">
		            <div class="card-content">
		            <span class="card-title">Create Lab Time Table</span>  
		            	<form id="forml">
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
								    <select name="batch" id="batch">
										<option value="" disabled selected>Choose your option</option>
										<?php
										$res = $queries->getBatchesAll($conn);
										foreach($res as $batch=>$name) {
											echo "<option value='$batch'>$name</option>";
										}
										?>
								    </select>
							    	<label>Batch</label>
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
		            			<div class="input-field col s3">
		            				<input type="checkbox" name="chk1" id="chk1">
		            				<label for="chk1">Slot 1</label>
		            			</div>
		            			<div class="input-field col s9" id="divslot1">
								    <select name="slot_id1" id="slot_id1">
										<option value="" disabled selected>Choose your option</option>
										<?php
										$res = $queries->getSlotsAll($conn);
										if($res->num_rows > 0) {
											while($row = $res->fetch_assoc()) {
												echo "<option value='".$row['id']."'>".$row['start']." to ".$row['end']."</option>";
											}
										}
										?>
								    </select>
							    	<label>Slot 1</label>
							  	</div>
		            		</div>
		            		<div class="row">
		            			<div class="input-field col s3">
		            				<input type="checkbox" name="chk2" id="chk2">
		            				<label for="chk2">Slot 2</label>
		            			</div>
		            			<div class="input-field col s9" id="divslot2">
								    <select name="slot_id2" id="slot_id2">
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
							    	<label>Slot 2</label>
							  	</div>
		            		</div>
		            		<div class="row">
		            			<div class="input-field col s3">
		            				<input type="checkbox" name="chk3" id="chk3">
		            				<label for="chk3">Slot 3</label>
		            			</div>
		            			<div class="input-field col s9" id="divslot3">
								    <select name="slot_id3" id="slot_id3">
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
							    	<label>Slot 3</label>
							  	</div>
		            		</div>
		            		<div class="row">
		            			<div class="input-field col s12">
								    <select name="faculty_id1" id="faculty_id1">
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
							    	<label>Faculty 1</label>
							  	</div>
		            		</div>
		            		<div class="row">
		            			<div class="input-field col s12">
								    <select name="faculty_id2" id="faculty_id2">
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
							    	<label>Faculty 2</label>
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
						    		<button class="btn waves-effect waves-light blue-grey lighten-1" id="createlab" name="action">Submit
										<span><i class="fa fa-send"></i></span>
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
	$('#createlab').click(function(){
		var lab_id = $('#lab_id').val();
		var class_id = $('#class_id').val();
		var day = $('#day').val();
		var batch = $('#batch').val();
		var slot_id1 = $('#slot_id1').val();
		var slot_id2 = $('#slot_id2').val();
		var slot_id3 = $('#slot_id3').val();
		var chk1 = $('#chk1').is(':checked');
		var chk2 = $('#chk2').is(':checked');
		var chk3 = $('#chk3').is(':checked');
		var faculty_id1 = $('#faculty_id1').val();
		var faculty_id2 = $('#faculty_id2').val();
		var subject_id = $('#subject_id').val();
		console.log(lab_id+"/"+class_id+"/"+day+"/"+batch+"/"+slot_id1+"/"+slot_id2+"/"+slot_id3+"/"+faculty_id1+"/"+faculty_id2+"/"+subject_id+"/"+chk1+"/"+chk2+"/"+chk3);
		$.post("ajax/create_lab.php",
		{
			lab_id: lab_id,
			class_id: class_id,
			day: day,
			batch: batch,
			slot_id1: slot_id1,
			slot_id2: slot_id2,
			slot_id3: slot_id3,
			chk1: chk1,
			chk2: chk2,
			chk3: chk3,			
			faculty_id1: faculty_id1,
			faculty_id2: faculty_id2,
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