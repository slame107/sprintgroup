<?php
session_start();
require_once("template.php");
require_once("DB.class.php");

$page = new Template("Results");
$page->addHeadElement("<link href='page.css' rel='stylesheet'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();
print $page->getTopSection();
require_once("sidebar.php");

print "<div class='header'>";
	print "<h1>Results Page</h1>";
print "</div>";

print "<article id='content'>";

	if(isset($_POST['search']))
	{
		

		$search = $_POST['search'];

		$search = filter_var($search, FILTER_SANITIZE_STRING);
		
		$db = new DB();

		$search = $db->dbEsc($search);

		if (!$db->getConnStatus()) {
		  print "An error has occurred with connection\n";
		  exit;
		}

		$query = "SELECT * FROM album WHERE albumartist LIKE '%$search%' OR albumtitle LIKE '%$search%'";

		$result = $db->dbCall($query);



		if($result)
		{
					

		print "<table>";
		print "<tr><th>Insert Time</th>
								<th>Album Title</th>
								<th>Album Artist</th>
								<th>Album Length</th>
								<th>Status</th>
							</tr>";

			foreach($result as $album) {
					print "<tr><td>" . $album['inserttime'] . "</td>" . "<td>" . $album['albumtitle'] . 
						"<td>" . $album['albumartist'] . "</td>"  . "<td>" . $album['albumlength'] . "</td>" . 
						"<td>" . $album['status']  ."</td></tr>";
				}
				
		print "</table>";

		} else
		{
			print "<h2 id='error'> Please enter valid album artist or title. </h2>";
		}
	}
	else
	{
		print "Search field is required";
	}
print "</article>";
print $page->getBottomSection();