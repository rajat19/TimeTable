<?php
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';

$queries = new Queries();
$functions = new Functions();
echo "<span class='card-title'>Faculties</span>";
echo "<table class='bordered '>";
echo "<thead><tr><th>Faculty Name</th><th>Department</th><th>Designation</th><th>Username</th></tr></thead>";
$faculties = $queries->getFacultiesAllPriorityOrder($conn);
while($row = $faculties->fetch_assoc()) {
	$user_id = $row['user_id'];
	$username = $queries->getUserById($conn, $user_id)->fetch_assoc()['username'];
	$title = $row['title'];
	$name = $row['name'];
	$department = $row['department'];
	$designation_id = $row['designation_id'];
	$priority = $row['priority'];
	$designation = $queries->getDesignationById($conn, $designation_id)->fetch_assoc()['designation'];
	echo "<tr><td class='avatar collection-item'>";
	if(file_exists("../images/profile/$username.png"))
		echo "<img src='images/profile/$username.png' class='imgsqr'>";
	else echo '<img src="images/akgec.png" class="imgsqr">'; 
	echo "  $title $name</td><td>$department</td><td>$designation</td><td>$username</td></tr>";
}
echo "</table>";
?>