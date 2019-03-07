<?php


require_once("template.php");
$page = new Template("Survey");
$page->addHeadElement("<script src='hello.js'></script>");
$page->addHeadElement("<link href='page.css' rel='stylesheet'>");
$page->addHeadElement("<script src='validate.js'></script>");
$page->finalizeTopSection();
$page->finalizeBottomSection();
print $page->getTopSection();

print "<ul>";
	print "<li><a href='index.php' title='Click here to see our home page'>Home Page</a></li>";
	print "<li><a href='survey.php' title='Click here to take our survey'>Survey</a></li>";
	print "<li><a href='privacy.php' title='Click here to see our privacy policy'>Privacy policy</a></li>";
	print "<li><a href='search.php' title='Click here to search for an album'>Search</a></li>";
	
print "</ul>";

print "<h1>Survey Page</h1>";

print "<form id='frmChoice' method='post' action = 'action.php' onsubmit='return validate()'>";
			print "<h2> Student Survey </h2>";
			print "<fieldset id='group1'>";

				print "<label>What is your major? </label>  <br/>";
				print "<input type='checkbox' name='majorChk1' value='AppDev' class='major-checkbox' > CIS-AppDev <br>";
				print "<input type='checkbox' name='majorChk2' value='Networking' class='major-checkbox' > CIS-Networking <br>";
				print "<input type='checkbox' name='majorChk3' value='WDMD' class='major-checkbox' > WDMD <br>";
				print "<input type='checkbox' name='majorChk4' value='WD' class='major-checkbox' > WD <br>";
				print "<input type='checkbox' name='majorChk5' value='HTI' class='major-checkbox' > HTI <br>";
				print "<input type='checkbox' name='majorChk6' value='Other' class='major-checkbox' > Other <br>";

			print "</fieldset>";
	  
			print "<fieldset id='group2'>";

				print "<label>What grade do you expect to receive in CNMT 310? </label> <br/>";
				print "<input type='radio' name='grade' value='A' class='grade-radio' > A <br/>";
				print "<input type='radio' name='grade' value='B' class='grade-radio' > B <br/>";
				print "<input type='radio' name='grade' value='C' class='grade-radio' > C <br/>";
				print "<input type='radio' name='grade' value='D' class='grade-radio' > D <br/>";
				print "<input type='radio' name='grade' value='F' class='grade-radio' > F <br/>";

			print "</fieldset>";
	  
			print "<fieldset id='group3'>";

				print "<label>What is your favorite pizza topping? </label> <br/>";
				print "<input type='radio' name='topping' value='pep' class='pizza-radio' > Pepperoni <br/>";
				print "<input type='radio' name='topping' value='bac' class='pizza-radio' > Bacon <br/>";
				print "<input type='radio' name='topping' value='pin' class='pizza-radio' > Pineapple <br/>";
				print "<input type='radio' name='topping' value='sau' class='pizza-radio' > Italian Sausage <br/>";
				print "<input type='radio' name='topping' value='spi' class='pizza-radio' > Roasted Spinach <br/>";			
				print "<br/>";
	  
				print "<input type='submit' value='Submit'>";
			print "</fieldset>";
		print "</form>";

print $page->getBottomSection();