<?php
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';

$queries = new Queries();
$functions = new Functions();
echo "<span class='card-title'>Prioritize Faculties (1 being the top priority) </span>";
// echo "<button class='btn green' style='position: fixed !important; bottom:12px; left:35%; width:25%; z-index: 999;'>Save</button>";
echo "<form id='formprior'>";
echo "<table class='bordered '>";
echo "<thead><tr><th>Faculty Name</th><th>Priority</th></tr></thead>";
$faculties = $queries->getFacultiesAllPriorityOrder($conn);
while($row = $faculties->fetch_assoc()) {
	$user_id = $row['user_id'];
	$username = $queries->getUserById($conn, $user_id)->fetch_assoc()['username'];
	$title = $row['title'];
	$name = $row['name'];
	$priority = $row['priority'];
	echo "<tr><td class='avatar collection-item'>";
	if(file_exists("../images/profile/$username.png"))
		echo "<img src='images/profile/$username.png' class='imgsqr'>";
	else echo '<img src="images/akgec.png" class="imgsqr">'; 
	echo "  $title $name</td><td>";
	for($i=1; $i<=10; $i++) {
		if($i==$priority) echo "<input type='radio' class='with-gap' checked  name='$user_id' id='#$user_id#$i' value='$i'><label for='#$user_id#$i'>$i</label>";
		else echo "<input type='radio' class='with-gap' name='$user_id' id='#$user_id#$i' value='$i'><label for='#$user_id#$i'>$i</label>";
	}
	// echo "</td><td><button class='btn-floating green' onclick='savePriority($user_id)'><i class='material-icons'>save</i></button>";
	echo "</td></tr>";
}
echo "</table>";
echo "</form>";
?>
<div class="fixed-action-btn" style="right: 100px;">
	<a id="save" class="waves-effect waves-light green btn-large"><i class="material-icons left">save</i>Save</a>
</div>
<!-- <div class="hoverable blue-grey lighten-1" style="position: fixed; bottom:0; left:0; font-size: 20px; opacity: 0.5; color:#fff; z-index: 994; text-align: center; width: 100%; height: 60px; line-height: 60px;"> -->
<!-- </div> -->