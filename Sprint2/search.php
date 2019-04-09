<?php
require_once("template.php");
$page = new Template("Search Page");
$page->addHeadElement("<link href='page.css' rel='stylesheet'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();
print $page->getTopSection();
print "<div class='sidebar'>";
	print "<a href='index.php' title='Click here to see our home page'>Home Page</a>";
	print "<a href='survey.php' title='Click here to take our survey'>Survey</a></li>";
	print "<a href='privacy.php' title='Click here to see our privacy policy'>Privacy policy</a>";
	print "<a class='active' href='search.php' title='Click here to search for an album'>Search</a>";
	print "<a href='login.php' title='Click here to login'>Login</a>";
print "</div>";

print "<div class='header'>";
	print "<h1>Search Page</h1>";
print "</div>";

print "<form id='frmChoice' method='post' action = 'results.php' onsubmit='return validate()'>";
print "<h2> Album Search </h2>";
print "<input type='text' name='search' placeholder='Search..'>";
print "<br>";
print "<br>";
print "<button id='results' type='submit' >Submit</button>";
print "</form>";
print $page->getBottomSection();