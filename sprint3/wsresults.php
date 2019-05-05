<?php
require_once("DB.class.php");

if (isset($_POST['data']))
	{

		$obj = json_decode($_POST['data'], true);
		$search = filter_var($obj['search'], FILTER_SANITIZE_STRING);
		
		$db = new DB();

		if (!$db->getConnStatus()) {
			print "An error has occurred with connection\n";
			exit;
		}

		$search = $db->dbEsc($search);

		$query = "SELECT * FROM album WHERE albumartist LIKE '%$search%' OR albumtitle LIKE '%$search%'";

		$result = $db->dbCall($query);

		if($result)
		{
			print json_encode($result, true);
		}
		else 
		{ //nothing was found in the database
			$results = array("error"=>"notfound");
			print json_encode($result, true);
		}
	}
	else
	{
		$results = array("error"=>"notset");
			print json_encode($result, true);
	}
?>
