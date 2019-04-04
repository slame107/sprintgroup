<?php
require_once("template.php");
$page = new Template("Survey Data");
$page->addHeadElement("<link href='page.css' rel='stylesheet'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();
print $page->getTopSection();
print "<ul>";
	print "<li><a href='index.php' title='Click here to see our home page'>Home Page</a></li>";
	print "<li><a href='survey.php' title='Click here to take our survey'>Survey</a></li>";
	print "<li><a href='privacy.php' title='Click here to see our privacy policy'>Privacy policy</a></li>";
	print "<li><a href='search.php' title='Click here to search for an data'>Search</a></li>";
	print "<li><a href='login.php' title='Click here to login'>Login</a></li>";
print "</ul>";
print "<h1>Survey Data</h1>";



$db = new DB();



	if (!$db->getConnStatus()) {
	  print "An error has occurred with connection\n";
	  exit;
	}

	$query = "SELECT * FROM survey";

	$result = $db->dbCall($query);



	if($result)
	{
				

	print "<table>";
	print "<tr><th>ID</th>
							<th>Submit Time</th>
							<th>Major</th>
							<th>Expected Grade</th>
							<th>Favorite Topping</th>
							<th>User IP</th>
							<th>Session ID</th>
						</tr>";

		foreach($result as $data) {
				print "<tr><td>" . $data['id'] . "</td>" . "<td>" . $data['submittime'] . 
					"<td>" . $data['major'] . "</td>"  . "<td>" . $data['expectedgrade'] . "</td>" . 
					"<td>" . $data['favetopping'] . $data['userip'] . "</td>" . $data['sessionip']  ."</td></tr>";
			}
			
	print "</table>";

	} else
	{
		print "<p id='error'> Query Error </p>";
	}


print $page->getBottomSection();