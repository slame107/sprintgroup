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

		$url = "http://cnmtsrv2.uwsp.edu/~nverh524/Sprint2/WSLoginVerify.php";

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
		
		if(true)
		{
			//For each authenticated user, create a session assigning the variables to the user
			$_SESSION['username'] = $result['username'];
			$_SESSION['email'] = $result['email'];
			$_SESSION['creationDate'] = $result['creationDate'];
			$_SESSION['realName'] = $result['realName'];
			$_SESSION['userStatus'] = $result['userStatus'];
			$_SESSION['roleName'] = $result['roleName'];	
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
			
			//$_SESSION['Error'] = 'notfound';
			//header("Location: login.php");
		}
	}
	else
	{
		//$_SESSION['Error'] = "notfound";
		//$_SESSION['email'] = $_POST['email'];
		//header('Location:login.php');
	}
	
}
else
{
	$result = array("error"=>"notset");
	print json_encode($result, true);
	//$_SESSION['Error']="notset";
	//header('Location: login.php');
}
?>
