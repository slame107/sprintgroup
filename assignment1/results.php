<?php
require_once("template.php");
require_once("DB.class.php");

$page = new Template("Results");
$page->addHeadElement("<script src='hello.js'></script>");
$page->addHeadElement("<link href='page.css' rel='stylesheet'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();
print $page->getTopSection();
print "<ul>";
	print "<li><a href='index.php' title='Click here to see our home page'>Home Page</a></li>";
	print "<li><a href='survey.php' title='Click here to take our survey'>Survey</a></li>";
	print "<li><a href='privacy.php' title='Click here to see our privacy policy'>Privacy policy</a></li>";
	print "<li><a href='search.php' title='Click here to search for an album'>Search</a></li>";
print "</ul>";
print "<h1>Results Page</h1>";

$db = new DB();

$search = $_POST['search'];

$search = filter_var($search, FILTER_SANITIZE_STRING);

$search =  $db->dbEsc($search);

if (!$db->getConnStatus()) {
  print "An error has occurred with connection\n";
  exit;
}

$query = "SELECT * FROM album WHERE albumartist LIKE '%$search%' OR albumtitle LIKE '%$search%'";

$result = $db->dbCall($query);



if($result)
{
			

print "<table>";

	foreach($result as $album) {
			print "<tr><td>" . $album['inserttime'] . " " . $album['albumtitle'] . 
			" " . $album['albumartist'] . " "  . $album['albumlength'] .   " " . 
			$album['status']  ."</td></tr>";
		}
		

print "</table>";
} else
{
	print "Please enter valid album artist or title.";
}

print $page->getBottomSection();