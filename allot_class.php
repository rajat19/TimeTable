<?php
include 'include/header.inc.php';

$today = date('Y-m-d', strtotime('+3 hours 30 minutes'));
$time = date('H:i:s', strtotime('+3 hours 30 minutes'));
$day = $functions->calculateDayOfWeek($today);
$Day = substr(strtoupper($day), 0, 1).substr($day, 1);
$absentfaculties = $queries->getFacultiesByAttendanceNotMarked($conn, $today);
echo "<div class='container'><section style='margin:10px;'><div class='col s12 m8 offset-m2'><div class='card z-depth-3 red lighten-4'><div class='card-content'><span class='card-title'>Absent Faculties (Day: $Day $today)</span>";
if($absentfaculties->num_rows > 0) {
	echo "<table class='bordered responsive-table'>";
	echo "<thead><tr><th>Faculty Name</th><th>Department</th><th>Manage</th></tr></thead>";
	while($row = $absentfaculties->fetch_assoc()) {
		$facid = $row['id'];
		$facname = $row['name'];
		$dept = $row['department'];

		echo "<tr><td>$facname</td><td>$dept</td><td><form action='manage_schedule.php' method='POST'><input type='hidden' name='facid' value='$facid'><button type='submit' class='btn waves-effect waves-light red lighten-1'>Manage</button></form></td></tr>";
	}
	echo "</table>";
}
else {
	echo "No Faculty is Absent today";
}
echo "</div></div></div></section></div>";

include 'include/footer.inc.php'; ?>

<script type="text/javascript">
	// $(document).ready(function(){
	// 	$('#schedule').hide();
	// });
	// $('#viewattn').click(function() {
	// 	var date = $('#date').val();
	// 	console.log(date);
	// 	$.post("ajax/view_attendance.php", {
	// 		date: date,
	// 	},
	// 	function(response, status) {
	// 		$('#schedule').show();	
	// 		$('#schedule').html(response);
	// 	});
	// });
</script>
</body>
</html>