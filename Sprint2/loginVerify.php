<?php
//Creating a user session
session_start();
require_once("DB.class.php");
//checks if the variables 'email' and 'password' are set
if (isset($_POST['email']) && isset($_POST['password']))
{
	//Checks if email is a valid email address
	if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
		//Removes all illegal characters from an email address
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
			foreach($result as $user)
			{
				//For each authenticated user, create a session assigning the variables to the user
				if(password_verify($_POST['password'], $user["userpass"]))
				{
					$_SESSION['username'] = $user['username'];
					$_SESSION['email'] = $user['email'];
					$_SESSION['creationDate'] = $user['creationdate'];
					$_SESSION['realName'] = $user['realname'];
					$_SESSION['userStatus'] = $user['userstatus'];
					$_SESSION['roleName'] = $user['rolename'];	
				}
			}
			//Redirect authenticated users to the home page
			if($pass)
			{
				//header("Location: index.php");
				print json_encode($result, true);
			}
			//Else, redirect unauthenticated users back to the login page 
			else
			{
				//$_SESSION['Error'] = 'notfound';
				$result = array("error"=>"notfound");
				print json_encode($result, true);
				
				//header("Location: login.php");
			}	
		}
		else
		{
			$result = array("error"=>"notfound");
			print json_encode($result, true);
			//$_SESSION['Error'] = 'notfound';
			//header("Location: login.php");
		}
	}
	else
	{
		$result = array("error"=>"notfound");
		print json_encode($result, true);
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
