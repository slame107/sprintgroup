<?php
//Creating a user session
session_start();
require_once("DB.class.php");
//checks if the variables 'email' and 'password' are set
if (isset($_POST['email']) && isset($_POST['password']))
{
	//Checks if email is a valid email address
	if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){

		$data = array("email"=>$_POST['email'], "password"=>$_POST['password']);
		$dataJson = json_encode($data);// YOUR CODE HERE TO ENCODE AS JSON

		$postString = "data=" . urlencode($dataJson);

		$contentLength = strlen($postString);

		$header = array(
		  'Content-Type: application/x-www-form-urlencoded',
		  'Content-Length: ' . $contentLength
		);

		$url = "http://cnmtsrv2.uwsp.edu/~nverh524/sprint3/WSLoginVerify.php";

		$ch = curl_init($url);// YOUR CODE HERE TO INITIALIZE A CURL RESOURCE

		curl_setopt($ch,
			CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch,
			CURLOPT_POSTFIELDS, $postString);
		curl_setopt($ch,
			CURLOPT_HTTPHEADER, $header);

		// USE curl_setopt to set the following options:
		// CURLOPT_RETURNTRANSFER
		// CURLOPT_URL

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		curl_setopt($ch, CURLOPT_URL, $url);

		$return = curl_exec($ch);// YOUR CODE HERE TO EXECUTE THE CURL CALL

		//print $return;

		$result = json_decode($return, true);

		curl_close($ch);
		
		if(!isset($result['error']))
		{
			$_SESSION['roleName'] = array();
			foreach($result as $user)
			{
				//For each authenticated user, create a session assigning the variables to the user
				$_SESSION['username'] = $user['username'];
				$_SESSION['email'] = $user['email'];
				$_SESSION['creationDate'] = $user['creationdate'];
				$_SESSION['realName'] = $user['realname'];
				$_SESSION['userStatus'] = $user['userstatus'];
				array_push($_SESSION['roleName'], $user['rolename']);	
			}
			$pass = true;
			//Redirect authenticated users to the home page
			if($pass)
			{
				header("Location: index.php");
			}
			//Else, redirect unauthenticated users back to the login page 
			else
			{
				//$_SESSION['Error'] = 'notfound';
				
				
				//header("Location: login.php");
			}	
		}
		else
		{	
			$_SESSION['Error'] = $result['error'];
			header("Location: login.php");
		}
	}
	else
	{
		$_SESSION['Error'] = "notfound";
		header('Location:login.php');
	}	
}
else
{
	$_SESSION['Error']="notset";
	header('Location: login.php');
}
?>
