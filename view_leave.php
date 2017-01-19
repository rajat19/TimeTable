<?php $access = array(0); ?>
<?php include 'include/header.inc.php' ?>
	<form>
		<input type="hidden" name="date" id="date" value="<?php echo date('Y-m-d', strtotime('+5 hours 30 minutes'));?>">
	</form>
	<div class="container">
		<section>
			<div class="row">
				<div class=" col s12 m8 offset-m2">
				<div class="card z-depth-3">
					<div class="card-content center">
						<button class="btn waves-effect waves-light blue-grey lighten-1" id="viewpst" name="action"><span><i class="fa fa-rotate-left"></i></span> View Past Leaves</button>
						
						<button class="btn waves-effect waves-light blue-grey lighten-1" id="viewfut" name="action">View Future Leaves <span><i class="fa fa-rotate-right"></i></span></button>
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
		$('#schedule').hide();
	});
	$('#viewpst').click(function() {
		var date = $('#date').val();
		var timeperiod = 0;
		$.post("ajax/view_leave.php",
		{
			date: date,
			timeperiod: timeperiod
		},
		function(response, status) {
			$('#schedule').show();	
			$('#schedule').html(response);
		});
	});

	$('#viewfut').click(function() {
		var date = $('#date').val();
		var timeperiod = 1;
		$.post("ajax/view_leave.php",
		{
			date: date,
			timeperiod: timeperiod
		},
		function(response, status) {
			$('#schedule').show();	
			$('#schedule').html(response);
		});
	});
	
	function accept(lid) {
		var a = 1;
		$.post("ajax/grant_leave.php", {
			leave_id: lid,
			a: a
		},
		function (response, status) {
			$('#x-'+lid).html(response);
		});
	}

	function reject(lid) {
		var a = -1;
		$.post("ajax/grant_leave.php", {
			leave_id: lid,
			a: a
		},
		function (response, status) {
			$('#x-'+lid).html(response);
		});
	}
</script>
</body>
</html>