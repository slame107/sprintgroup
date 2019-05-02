<?php

$searchdata = 0;
if(isset($_POST['search']))
	{
		
		$dataJson = json_decode($_POST['search']);
		$postString ="";

		$dataJson = filter_var($search, FILTER_SANITIZE_STRING);
		
		$db = new DB();

		$dataJson = $db->dbEsc($search);

		if (!$db->getConnStatus()) {
		  print "An error has occurred with connection\n";
		  exit;
		}

		$query = "SELECT * FROM album WHERE albumartist LIKE '%$search%' OR albumtitle LIKE '%$search%'";

		$result = $db->dbCall($query);



		if($result)
		{
			$result = array("result"=>$searchdata);
			print json_encode($result,true);
		} else
		{
			$error ="no data found";
			$result = array("result"=>$error);
			print json_encode($result,true);
		}
	}