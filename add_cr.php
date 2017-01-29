<?php $access = array(0); ?>
<?php include 'include/header.inc.php';?>
	<div class="container">
		<section>
			<div class="row">
		        <div class="col s12 m8 offset-m2">
		        	<div class="card z-depth-3">
			            <div class="card-content">
			            	<span class="card-title">Add New Class Representative</span>
			            	<form>
			            		<div class="row">
			            			<div class="input-field col s12 m3">
				            			<select name="title" id="title">
				            			<option value="" disabled selected>Choose title</option>
				            			<?php
				            			$titles = $queries->getTitlesAll();
										foreach($titles as $title) {
											echo "<option value='$title'>$title</option>";
										}
										?>
				            			</select>
				            			<label>Title</label>
			            			</div>
									<div class="input-field col s12 m9">
										<input type="text" name="name" id="name" required>
										<label>Full Name</label>
									</div>
								</div>
								<div class="row">
			            			<div class="input-field col s12">
				            			<select name="department" id="department">
					            			<option value="" disabled selected>Choose your option</option>
											<?php
											$res = $queries->getDepartmentsAll($conn);
											if($res->num_rows > 0) {
												while($row = $res->fetch_assoc()) {
													echo "<option value='".$row['dept']."'>".$row['department']."</option>";
												}
											}
											?>
				            			</select>
				            			<label>Department</label>
			            			</div>
			            		</div>
								<div class="row">
			            			<div class="input-field col s12">
				            			<select name="designation_id" id="designation_id">
					            			<option value="" disabled selected>Choose your option</option>
											<?php
											$res = $queries->getDesignationsAll($conn);
											if($res->num_rows > 0) {
												while($row = $res->fetch_assoc()) {
													echo "<option value='".$row['id']."'>".$row['designation']."</option>";
												}
											}
											?>
				            			</select>
				            			<label>Designation</label>
			            			</div>
			            		</div>
								<p class="light-text">
									Gender:
									<input type="radio" class="with-gap" name="gender" id="male" value="m">
									<label for="male">Male</label>
									<input type="radio" class="with-gap" name="gender" id="female" value="f">
									<label for="female">Female</label>
								</p>
								<div class="row">
									<div class="input-field col s12">
										<input type="email" name="email" id="email" required>
										<label>Email</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<input type="text" name="phone" id="phone" required>
										<label>Phone No.</label>
									</div>
								</div>
			            		<div class="row">
									<div class="input-field col s12">
										<input type="text" name="username" id="username" required>
										<label>Username</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<input type="password" name="password" id="password" required>
										<label>Password</label>
									</div>
								</div>
			            	</form>
			            	<div class="row">
						    	<div class="input-field col s12">
						    		<button class="btn waves-effect waves-light blue-grey lighten-1" id="addfaculty" name="action">Add Faculty
										<span><i class="fa fa-plus-circle"></i></span>
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
	$('#addfaculty').click(function(){
		var title = $('#title').val();
		var designation_id = $('#designation_id').val();
		var department = $('#department').val();
		var name = $('#name').val();
		var email = $('#email').val();
		var gender = $('input[name=gender]').filter(':checked').val();
		var phone = $('#phone').val();
		var username = $('#username').val();
		var password = $('#password').val();
		console.log(name+" "+ email+" "+gender+" "+phone+" "+username+" "+password);
		$.post("ajax/validate_faculty.php",
		{
			name: name,
			gender: gender,
			email: email,
			phone: phone,
			username: username,
			password: password,
			title: title,
			designation_id: designation_id,
			department: department
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