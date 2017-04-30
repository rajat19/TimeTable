<?php
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';

$queries = new Queries();
$functions = new Functions();

$email = htmlentities($_POST['email']);
$msg = "";
if(!empty($email)) {
	$ve = $functions->validateEmail($email);
	$cee = $functions->checkUseremailExists($conn, $queries, $email);
	if(!$ve) $msg = "Not a valid email address";
	else if($cee) $msg = "Email doesn't exist";
	else {
		$to = $email;
		$subject = "My subject";
		$txt = "Hello world!";
		$headers = "From: webmaster@example.com" . "\r\n" .
		"CC: somebodyelse@example.com";
		mail($to,$subject,$txt,$headers);
		$msg = "A password reset link has been mailed to the given email address";
	}
}
else {
	$msg = "Enter an email address";
}
echo $msg;
?>