<?php $access = array(5); ?>
<?php include 'include/header.inc.php'; ?>
	<div class="container">
		<section>
			<div class="row">
		        <div class="col s12 m6 offset-m3">
		        	<div class="card z-depth-3">
		        		<div class="card-header" style="padding: 10px; background-color: #dee1e3 !important">
		        			<h5 style="color: #6e7984 !important">Log in to TimeTable Management</h5>
		        		</div>
			            <div class="card-content">
			            	<form>
			            		<div class="row">
									<div class="input-field col s12">
										<input type="text" name="email">
										<label>Email</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<input type="password" name="password">
										<label>Password</label>
									</div>
								</div>
			            	</form>
			            </div>
			            <div class="card-content" style="background-color: #dee1e3 !important">
			            	<div class="row">
						    	<div class="col s12 m8">
									<a href="login.php" style="color:#777">Already Have an Account? Log in</a>
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
		var email = $('#email').val();
		var password = $('#password').val();
		// console.log(class_id+"/"+day);
		$.post("ajax/validate_register.php",
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