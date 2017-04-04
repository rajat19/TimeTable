<?php
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';

$queries = new Queries();
$functions = new Functions();
echo "<span class='card-title'>Delete Faculty</span>";
echo "<table class='bordered '>";
echo "<thead><tr><th>Faculty Name</th><th>Department</th><th>Designation</th><th>Username</th><th>Delete</th></tr></thead>";
$faculties = $queries->getFacultiesAll($conn);
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
	echo "  $title $name</td><td>$department</td><td>$designation</td><td>$username</td>
			<td><button class='red btn-floating' onclick='del($user_id)'><i class='material-icons'>clear</i></button></td></tr>";
}
echo "</table>";
?>