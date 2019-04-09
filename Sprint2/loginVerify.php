<?php
session_start();

if (isset($POST['email']) && isset (_$POST['password']))
{
	$validateEmail = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);

	
	if($validateEmail){
		$sanitizedEmail = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
	}
	else
	{
		$_SESSION['error'] = "Invalid username or password";
	}
	//filter var for email
		//errors?
	
	//check database
		//errors if not found in DB
			//$_SESSION['error']="not found";
		//authentication good
			//$_SESSION['error']="none";
	
	//If OK, go to home
	if($_SESSION['error']=="none")
	{
		//Go to home
	}
	else
	{
		//redirect to login
	}
	
}
else
{
	$_SESSION['error']="not set";
	//Redirect back to login
	header('Location: login.php');
	//session_destroy(); needed?
	die();
}
?>
