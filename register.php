<?php $access = array(5); ?>
<?php include 'include/header.inc.php'; ?>
	<div class="container">
		<section>
			<div class="row">
		        <div class="col s12 m6 offset-m3">
		        	<div class="card z-depth-3">
		        		<div class="card-header card-grey">
		        			<h5 class="dark-text">Register New Account</h5>
		        		</div>
			            <div class="card-content">
			            	<form>
			            		<div class="row">
									<div class="input-field col s12">
										<input type="text" name="name" id="name" required>
										<label>Full Name</label>
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
			            </div>
			            <div class="card-content card-grey">
			            	<div class="row">
						    	<div class="col s12 m8">
									<a href="login.php" class="link-grey">Already Have an Account? Log in</a>
						    	</div>
						    	<div class="col s12 m4">
						    		<button class="btn waves-effect waves-light blue-grey lighten-1" id="login" name="btnlogin">Register
										<span><i class="fa fa-sign-in"></i></span>
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
	$('#login').click(function() {
		var name = $('#name').val();
		var email = $('#email').val();
		var gender = $('input[name=gender]').filter(':checked').val();
		var phone = $('#phone').val();
		var username = $('#username').val();
		var password = $('#password').val();
		console.log(name+" "+ email+" "+gender+" "+phone+" "+username+" "+password);
		$.post("ajax/validate_register.php",
		{
			name: name,
			gender: gender,
			email: email,
			phone: phone,
			username: username,
			password: password
		},
		function(response, status) {
			var data = JSON.parse(response);
			console.log(data[0]+"\n"+data[1]+"\n"+data[2]+"\n"+status);
			if(data[3] == 1) {
				window.location = "login.php";
			}
			else swal(data[0], data[1], data[2]);
		});
	});
</script>