<?php
require_once("template.php");
$page = new Template("Search Page");
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
print "<h1>Search Page</h1>";
print "<form id='frmChoice' method='post' action = 'results.php' onsubmit='return validate()'>";
print "<h2> Album Search </h2>";
print "<input type='text' name='search' placeholder='Search..'>";
print "<button id='results' type='submit' >Submit</button>";
print "</form>";
print $page->getBottomSection();