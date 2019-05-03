<?php
require_once("DB.class.php");


/* test post string
$_POST['search'] = 'oasis';
$search = $_POST['search'];
$data = array("search" => $_POST['search']);
$_POST['search'] = json_encode($data);
/*
//var_dump($_POST['search']);

//var_dump($data); */


if (isset($_POST['data']))
	{

		$obj = json_decode($_POST['data'], true);
		$search = filter_var($obj['search'], FILTER_SANITIZE_STRING);
 		//var_dump($search);
		$db = new DB();

		if (!$db->getConnStatus()) {
			print "An error has occurred with connection\n";
			exit;
		}

		$search = $db->dbEsc($search);

		$query = "SELECT * FROM album WHERE albumartist LIKE '%$search%' OR albumtitle LIKE '%$search%'";

//	var_dump($query);
		$result = $db->dbCall($query);

		if($result)
		{
				print json_encode($result, true);
			}
		else { //nothing was found in the database
			$results = array("error"=>"notfound");
			print json_encode($result, true);
			//print json_encode($result,true);
		}
		}

	else
	{
		$_SESSION['Error2']="notset";
		header("Location:search.php");
	}
//var_dump($result);
?>
