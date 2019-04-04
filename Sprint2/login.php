<?php
require_once("template.php");
$page = new Template("Home Page");
$page->addHeadElement("<link href='page.css' rel='stylesheet'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();
print $page->getTopSection();

print "<ul>";
	print "<li><a href='index.php' title='Click here to see our home page'>Home Page</a></li>";
	print "<li><a href='survey.php' title='Click here to take our survey'>Survey</a></li>";
	print "<li><a href='privacy.php' title='Click here to see our privacy policy'>Privacy policy</a></li>";
	print "<li><a href='search.php' title='Click here to search for an album'>Search</a></li>";
	print "<li><a href='login.php' title='Click here to login'>Login</a></li>";
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