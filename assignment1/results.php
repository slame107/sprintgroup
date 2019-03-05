<?php
require_once("template.php");
$page = new Template("Home");
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

//var_dump($db);

if (!$db->getConnStatus()) {
  print "An error has occurred with connection\n";
  exit;
}

$query = "select * from bookinfo;";

$result = $db->dbCall($query);
//var_dump($result);
print "<table>";

	foreach($result as $book) {
			print "<tr><td>" . $book['id'] . " " . $book['inserttime'] . " " . $book['booktitle'] . " "  . $book['isbn'] .   " " . $book['author']  . " " . $book['status'] . "</td></tr>";
		}
		

print "</table>";

print $page->getBottomSection();