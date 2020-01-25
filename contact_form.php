<?php
if(isset($_POST['submit'])) {
	$name = $_POST['name'];
	$subject = $_POST['project_type'];
	$mailFrom = $_POST['email'];
	$country = $_POST['country'];
	$message = $_POST['message'];
	
	$mailTo = "chewy@ryanthen.com";
	$headers = "From: ".$mailFrom;
	$txt = "You have received an email from ".$mailFrom." which was sent from ".$country."\n\n".$message;
	
	mail($mailTo, $subject, $txt, $headers);
	header("Location: ");
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>R|T - form submit</title>
	
	<style>
		.form-submit-msg-wrap { width: 100%; text-align: center; }
		.form-submit-msg { margin-top: 75px; margin-bottom: 60px; }
		.form-submit-page-button { color: #00303F; text-decoration: none; border: 1px solid #00303F; border-radius: 5px; padding: 12px 18px; font-size: 18px; transition: 350ms; }
		.form-submit-page-button:hover { color: white; background-color: #CAE4DB; border-color: #CAE4DB; transition: 350ms; }
	</style>
	
</head>
<body>
	
	<div class="form-submit-msg-wrap">
		<h1 class="form-submit-msg">Your message has been sent successfully!</h1>
		<a class="form-submit-page-button" href="/">Back to ryanthen.com</a>
	</div>

</body>
</html>

