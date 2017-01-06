<?php $access = array(0, 1, 2); ?>
<?php include 'include/header.inc.php';?>
	<div class="container">
		<section>
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card z-depth-3">
						<div class="card-content">
							<span class="card-title">Change Password</span>
							<form>
								<div class="row">
									<div class="input-field col s12">
										<input type="password" name="old_pass" id="old_pass" required>
										<label for="old_pass">Enter Old Password</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<input type="password" name="new_pass" id="new_pass" required>
										<label for="new_pass">Enter New Password</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<input type="password" name="re_pass" id="re_pass" required>
										<label for="re_pass">Re-enter New Password</label>
									</div>
								</div>								
							</form>
							<div class="row">
						    	<div class="input-field col s12">
						    		<button class="btn waves-effect waves-light blue-grey lighten-1" id="change_pass" name="action">Change Password
										<span><i class="fa fa-lock"></i></span>
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
	$('#change_pass').click(function(){
		var old_pass = $('#old_pass').val();
		var new_pass = $('#new_pass').val();
		var re_pass = $('#re_pass').val();
		$.post("ajax/change_password.php",
		{
			old_pass: old_pass,
			new_pass: new_pass,
			re_pass: re_pass
		},
		function(response, status) {
			// console.log(response);
			var data = JSON.parse(response);
			// console.log(data[0]+"\n"+data[1]+"\n"+data[2]+"\n"+status);
			swal(data[0], data[1], data[2]);
		});
	});
</script>
</body>
</html>