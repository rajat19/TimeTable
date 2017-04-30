<?php $access[] = 5; ?>
<?php include 'include/header.inc.php'; ?>
	<div class="container">
		<section>
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card z-depth-5">
						<div class="card-content">
							<span class="card-title">Please Enter Your Email</span>
							<form>
								<div class="row">
									<div class="input-field col s12">
										<input type="text" name="email" id="email">
										<label>Email</label>
									</div>
								</div>
							</form>
							<div class="row">
								<div class="col s12">
									<button class="btn waves-effect waves-light blue-grey lighten-1" id="btnsprl" name="btnsprl">Send Password Reset Link
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
<?php include 'include/footer.inc.php'; ?>
<script type="text/javascript">
	$('#btnsprl').click(function() {
		email = $('#email').val();
		console.log(email);
		$.post("ajax/send_password_link.php", {
			email: email
		}, function(response, status) {
			console.log(response);
		});
	});
</script>
</body>
</html>