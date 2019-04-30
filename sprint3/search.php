<?php
session_start();
require_once("template.php");
$page = new Template("Search Page");
$page->addHeadElement("<link href='page.css' rel='stylesheet'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();
print $page->getTopSection();
require_once("sidebar.php");

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