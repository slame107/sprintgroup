<?php
session_start();
require_once("template.php");
$page = new Template("Input");
$page->addHeadElement("<link href='lab5.css' rel='stylesheet'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();
print $page->getTopSection();

print "<ul>";
	print "<li><a href='index.php' title='Click here to see our input page'>Input Page</a></li>";
print "</ul>";

print "<h1>Input Page</h1>";

print "<form id='frmChoice' method='post' action = 'confirmation.php'";
			print "<h2> Thank you for your order </h2>";
			
			echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
print "</form>";

print $page->getBottomSection();