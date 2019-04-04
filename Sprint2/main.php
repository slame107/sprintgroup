<?php
require_once("template.php");
$page = new Template("Home Page");
$page->addHeadElement("<link href='Sprint2.css' rel='stylesheet'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();
print $page->getTopSection();

print "<ul>";
	print "<li><a href='main.php' title='Click here to see our input page'>Input Page</a></li>";
print "</ul>";

print "<h1>Input Page</h1>";

print "<form id='frmChoice' method='post' action = 'displayPage.php'";
			print "<h2> Please enter the following input </h2>";
			print "<fieldset id='group1'>";

				print "Enter email: 
					<input type='text' name='email'>";

			print "</fieldset>";
	  
			print "<fieldset id='group2'>";

				print "Enter Password:
					<input type='text' name='password'>";
				

			print "</fieldset>";
	  
			
			print "<input type='submit' value='Submit'>";
print "</form>";

print $page->getBottomSection();