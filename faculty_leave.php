<?php $access = array(1); ?>
<?php include 'include/header.inc.php' ?>
	<form>
		<input type="hidden" name="date" id="date" value="<?php echo $functions->currentDateYmd();?>">
	</form>
	<div class="container">
		<section>
			<div class="row">
				<div class=" col s12 m10 offset-m1">
				<div class="card z-depth-3 blue-grey lighten-5">
					<div class="card-content center">
						<ul class="tabs blue-grey lighten-5">
					        <li class="tab col s6 blue-grey lighten-5"><a href="#test1" id="viewpst">Past Leaves</a></li>
					        <li class="tab col s6 blue-grey lighten-5"><a href="#test4" id="viewfut" class="active">Future Leaves</a></li>
					    </ul>
					</div>
				</div>
				</div>
			</div>
		</section>
	</div>
	<div id="schedule" class="container">
		
	</div>
<?php include 'include/footer.inc.php'; ?>
<script type="text/javascript">
	$(document).ready(function(){
		var date = $('#date').val();
		sendPostRequest(date, 1);
	});
	$('#viewpst').click(function() {
		var date = $('#date').val();
		sendPostRequest(date, 0);
	});

	$('#viewfut').click(function() {
		var date = $('#date').val();
		sendPostRequest(date, 1);
	});

	function sendPostRequest(date, timeperiod) {
		$.post("ajax/faculty_leave.php",
		{
			date: date,
			timeperiod: timeperiod
		},
		function(response, status) {
			$('#schedule').html(response);
		});
	}
</script>
</body>
</html>