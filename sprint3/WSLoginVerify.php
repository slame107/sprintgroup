<?php
require_once("DB.class.php");
if (isset($_POST['data']))
{	
	$obj = json_decode($_POST['data'], true);
	
	$email = filter_var($obj['email'], FILTER_SANITIZE_EMAIL);
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
	
	if($result)
	{
		//For each authenticated user, create a session assigning the variables to the user
		foreach($result as $user)
		{
			if(password_verify($password, $user["userpass"]))
			{	
				$pass = true;	
			}
		}
		if($pass)
		{
			print json_encode($result, true);
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
}
else
{
	$results = array("error"=>"notset");
	print json_encode($results, true);
}
?>
