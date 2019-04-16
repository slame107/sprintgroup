<?php
session_start();
require_once("template.php");
require_once("DB.class.php");
$page = new Template("Survey Data");
$page->addHeadElement("<link href='page.css' rel='stylesheet'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();
print $page->getTopSection();
require_once("sidebar.php");

print "<div class='header'>";
  print "<h1>Survey Data</h1>";
print "</div>";
print "<article id='content'>";
if(isset($_SESSION['roleName']))
{
	if($_SESSION['roleName'] == "admin")
	{

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
						"<td>" . $data['favetopping'] . "</td>"  . "<td>" . $data['userip'] . "</td>"  . "<td>" . $data['sessionid']  ."</td></tr>";
				}
				
		print "</table>";

		} else
		{
			print "<p id='error'> Query Error </p>";
		}

		
	}
	else
	{
		print "<h2 id='error'>You do not have authorization to be here. Please Leave!</h2>";
	}
}
else
{
	print "<h2 id='error'>You are not an authenticated user. Please Leave!</h2>";
}
print "</article>";
print $page->getBottomSection();
