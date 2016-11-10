<?php include 'include/header.inc.php'; ?>
	<div class="container">
		<section>
			<div class="row">
		        <div class="col s12 m8 offset-m2">
		        	<div class="card z-depth-3">
			            <div class="card-content">
			            	<!-- <h2>Time Table</h2> -->
			            	<span class="card-title">Login</span>
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
			            	<div class="row">
						    	<div class="input-field col s12">
						    		<button class="btn waves-effect waves-light red lighten-1" id="login" name="action">Login
										<span><i class="fa fa-sign-in"></i></span>
									</button>

									<button class="btn waves-effect waves-light purple lighten-1" id="forgot" name="action">Forgot Password ?
									</button>
						    	</div>
						    	<div class="input-field col s12">
						    		<button class="btn waves-effect waves-light teal lighten-1" id="login" name="action">Don't have an account? Register here 
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
	<!-- Modal Trigger -->
  <a class="waves-effect waves-light btn" href="#modal1">Modal</a>

  <!-- Modal Structure -->
  <div id="modal1" class="modal bottom-sheet">
    <div class="modal-content">
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
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