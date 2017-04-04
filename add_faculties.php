<?php $access = array(0); ?>
<?php include 'include/header.inc.php';?>
	<div class="container">
		<section>
			<div class="row">
		        <div class="col s12 m8 offset-m2">
		        	<div class="card z-depth-3">
			            <div class="card-content">
			            	
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