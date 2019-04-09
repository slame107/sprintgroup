<?php
require_once("template.php");
$page = new Template("Home");
$page->addHeadElement("<link href='page.css' rel='stylesheet'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();
print $page->getTopSection();
print "<div class='sidebar'>";
	print "<a class='active' href='index.php' title='Click here to see our home page'>Home Page</a>";
	print "<a href='survey.php' title='Click here to take our survey'>Survey</a></li>";
	print "<a href='privacy.php' title='Click here to see our privacy policy'>Privacy policy</a>";
	print "<a href='search.php' title='Click here to search for an album'>Search</a>";
	print "<a href='login.php' title='Click here to login'>Login</a>";
print "</div>";

print "<div class='header'>";
  print "<h1>Home Page</h1>";
print "</div>";

print $page->getBottomSection();