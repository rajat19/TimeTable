<?php $access = array(0); ?>
<?php include 'include/header.inc.php'; ?>
	<div class="container">
		<section>
			<div class="row">
				<div class="col s12 m10 offset-m1">
					<div class="card z-depth-5">
						<div class="card-content" id="carding">
							
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<div class="tap-target-wrapper" style="right: -348px; bottom: -327px; position: fixed;"><div class="tap-target cyan" data-activates="menu">
		<div class="tap-target-content white-text" style="width: 456px; height: 400px; top: 0px; right: 0px; bottom: 0px; left: 0px; padding: 56px; vertical-align: bottom;">
			<h5 class="center">Select options</h5>
			<p class="white-text">Featuring the options for adding new faculties, deleting faculties, editing them and also redesigning their priorities</p>
			<a class="btn-floating red" id="af"><i class="material-icons">add</i></a>&nbsp;
			<a class="btn-floating blue" id="df"><i class="material-icons">delete</i></a>&nbsp;
			<a class="btn-floating amber darken-3" id="vf"><i class="material-icons">visibility</i></a>
			<a class="btn-floating green" id="ef"><i class="material-icons">mode_edit</i></a>&nbsp;
			<a class="btn-floating yellow darken-1" id="pf"><i class="material-icons">trending_up</i></a>
		</div>
	</div>
	<div class="tap-target-wave" style="top: 344px; left: 344px; width: 112px; height: 112px;"><a class="btn btn-floating btn-large cyan tap-target-origin"><i class="material-icons">menu</i></a></div></div>

	<div class="fixed-action-btn hide-on-small-only">
		<a id="menu" class="waves-effect waves-light red btn-large btn-floating" onclick="$('.tap-target').tapTarget('open')"><i class="material-icons">live_help</i></a>
  	</div>

  	<div class="fixed-action-btn hide-on-med-and-up">
		<a id="menu" class="waves-effect waves-light red btn-large btn-floating"><i class="material-icons">menu</i></a>
	    <ul>
	    	<li><a class="btn-floating purple" href="faculties.php"><i class="material-icons">visibility</i></a></li>
			<li><a class="btn-floating red" href="add_faculties.php"><i class="material-icons">add</i></a></li>
			<li><a class="btn-floating blue"><i class="material-icons">delete</i></a></li>
			<li><a class="btn-floating green"><i class="material-icons">mode_edit</i></a></li>
			<li><a class="btn-floating yellow darken-1"><i class="material-icons">trending_up</i></a></li>
	    </ul>
  	</div>
<?php include 'include/footer.inc.php'; ?>
<script type="text/javascript">
	$(document).ready(function() {
		$.get("ajax/faculties.php", function(response) {
			$('#carding').html(response);
		});
	});

	$('#vf').click(function() {
		$.get("ajax/faculties.php", function(response) {
			$('#carding').html(response);
		});
	});

	$('#df').click(function() {
		$.get("ajax/delete_faculty.php", function(response) {
			$('#carding').html(response);
		});
	});

	$('#pf').click(function() {
		$.get("ajax/assign_priority.php", function(response) {
			$('#carding').html(response);
			$('#save').click(function() {
				var ar = new Array();
				$("#formprior :input:checked").each(function(){
				    ar.push($(this));
				});
				var json = [];
				for (var i = 0; i < ar.length; i++) {
					var x = ar[i].attr('name');
					var y = ar[i].val();
					json.push({
						id: x,
						new: y
					});
				}
				result = JSON.stringify(json);
				$.post("ajax/prioritize.php", {
					data: result
				}, function(response) {
					Materialize.toast(response, 3000, 'rounded');
				});
			});
		});
	});

	$('#af').click(function() {
		$.get("ajax/add_faculty.php", function(response) {
			$('#carding').html(response);
			$('select').material_select();
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
		});
	});

	function del(userid) {
		swal({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete!',
			showLoaderOnConfirm: true,
			preConfirm: function() {
				return new Promise(function (resolve, reject) {
					$.get("ajax/confirm_del_fac.php", {
						userid: userid
					}).done(function(data) {
						if(data == 'success') resolve()
						else reject("Error deleting the faculty");
					})
				})
			}
		}).then(function (email) {
			swal({
				type: 'success',
				title: 'Successfully deleted faculty!'
			})
			$.get("ajax/delete_faculty.php", function(response) {
				$('#carding').html(response);
			});
		})
	}
</script>
</body>
</html>