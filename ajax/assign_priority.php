<?php
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';

$queries = new Queries();
$functions = new Functions();
echo "<span class='card-title'>Faculties</span>";
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
		if($i==$priority) echo "<input type='radio' class='with-gap' checked name='$user_id#$i' id='$user_id$i' value='$i'><label>$i</label>";
		else echo "<input type='radio' class='with-gap' name='$user_id#$i' id='$user_id#$i' value='$i'><label>$i</label>";
	}
	echo "</td></tr>";
}
echo "</table>";
?>