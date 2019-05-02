<?php
require_once("DB.class.php");
//checks if the variables 'email' and 'password' are set
if (isset($_POST['data']))
{	
	$obj = json_decode($_POST['data'], true);
	
	$email = $obj['email'];
	$password = $obj['password'];
		
	$db = new DB();

	if (!$db->getConnStatus()) {
		print "An error has occurred with connection\n";
		exit;
	}

	$query = "SELECT username, userpass, email, creationdate, realname, userstatus, rolename 
	FROM user, role, user2role 
	WHERE user.id=user2role.userid AND role.id=user2role.roleid AND username='$email'";

	$result = $db->dbCall($query);
	
	$pass = false;
	
	if(true)
	{
		foreach($result as $user)
		{
			//For each authenticated user, create a session assigning the variables to the user
			if(password_verify($password, $user["userpass"]))
			{	
				$results = array("username"=>$user['username'], "email"=>$user['email'], "creationDate"=>$user['creationdate'], 
				"realName"=>$user['realname'], "userStatus"=>$user['userstatus'], "roleName"=>$user['rolename'], "roleName2"=>$user['rolename']);
				$pass = true;
			}
		}
		//Redirect authenticated users to the home page
		if($pass)
		{
			//header("Location: index.php");
			print json_encode($results, true);
		}
		//Else, redirect unauthenticated users back to the login page 
		else
		{
			$results = array("error"=>"notfound");
			print json_encode($results, true);
		}	
	}
	else
	{
		$results = array("error"=>"notfound");
		print json_encode($results, true);
	}
}
else
{
	$results = array("error"=>"notfound");
	print json_encode($results, true);
}
?>
