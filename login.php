<?php $access[] = 5; ?>
<?php include 'include/header.inc.php'; ?>
	<div class="container">
		<section>
			<div class="row">
		        <div class="col s12 m6 offset-m3">
		        	<div class="card z-depth-3">
		        		<div class="card-header card-grey" >
		        			<h5 class="dark-text">Log in to TimeTable Management</h5>
		        		</div>
			            <div class="card-content">
			            	<form>
			            		<div class="row">
									<div class="input-field col s12">
										<input type="text" name="username" id="username">
										<label>Username</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<input type="password" name="password" id="password">
										<label>Password</label>
									</div>
								</div>
			            	</form>
			            </div>
			            <div class="card-content card-grey">
			            	<div class="row">
						    	<div class="col s12 m8">
									<a href="password.php" class="link-grey">Forgotten your password ?</a><br>
									<a href="register.php" class="link-grey">Don't have an Account? Sign up Now</a>
						    	</div>
						    	<div class="col s12 m4">
						    		<button class="btn waves-effect waves-light blue-grey lighten-1" id="login" name="btnlogin">Login
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
		var username = $('#username').val();
		var password = $('#password').val();
		// console.log(class_id+"/"+day);
		$.post("ajax/validate_login.php",
		{
			username: username,
			password: password
		},
		function(response, status) {
			var data = JSON.parse(response);
			console.log(data[0]+"\n"+data[1]+"\n"+data[2]+"\n"+status);
			if(data[3] == 1) {
				window.location = "home.php";
			}
			else swal(data[0], data[1], data[2]);
		});
	});
</script>