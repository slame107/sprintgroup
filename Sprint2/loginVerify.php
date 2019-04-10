<?php
session_start();
require_once("DB.class.php");
if (isset($_POST['email']) && isset($_POST['password']))
{
	if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
		$sanitizedEmail = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
		
		$db = new DB();

		$email = $db->dbEsc($sanitizedEmail);

		if (!$db->getConnStatus()) {
			print "An error has occurred with connection\n";
			exit;
		}

		$query = "SELECT username, userpass, email, creationdate, realname, userstatus, rolename 
		FROM user, role, user2role 
		WHERE user.id=user2role.userid AND role.id=user2role.roleid AND username='$email'";

		$result = $db->dbCall($query);
		
		$pass = false;
		
		if($result)
		{
			$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
			foreach($result as $user)
			{
				if(password_verify($password, $user["userpass"]))
				{
					$_SESSION['username'] = $user['username'];
					$_SESSION['email'] = $user['email'];
					$_SESSION['creationDate'] = $user['creationdate'];
					$_SESSION['realName'] = $user['realname'];
					$_SESSION['userStatus'] = $user['userstatus'];
					$_SESSION['roleName'] = $user['rolename'];	
					$pass = true;
				}
			}
			if($pass)
			{
				header("Location: index.php");
			}
			else
			{
				$_SESSION['Error'] = 'notfound';
				header("Location: login.php");
			}	
		}
		else
		{
			$_SESSION['Error'] = 'notfound';
			header("Location: login.php");
		}
	}
	else
	{
		$_SESSION['Error'] = "notfound";
		$_SESSION['email'] = $_POST['email'];
		header('Location:login.php');
	}
	//filter var for email
		//errors?
	
	//check database
		//errors if not found in DB
			//$_SESSION['error']="not found";
		//authentication good
			//$_SESSION['error']="none";
	
}
else
{
	$_SESSION['Error']="notset";
	//Redirect back to login
	header('Location: login.php');
}
?>
