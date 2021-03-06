<?php
session_start();
require_once("template.php");
$page = new Template("Survey");
$page->addHeadElement("<link href='page.css' rel='stylesheet'>");
$page->addHeadElement("<script src='survey.js'></script>");
$page->finalizeTopSection();
$page->finalizeBottomSection();
print $page->getTopSection();
require_once("sidebar.php");

print "<div class='header'>";
	print "<h1>Survey Page</h1>";
print "</div>";

print "<form id='frmChoice' method='post' action = 'action.php' onsubmit='return validateForm()'>";
			print "<h2> Student Survey </h2>";
			print "<fieldset id='group1'>";

				print "<label>What is your major? </label>  <br/>";
				print "<input type='checkbox' name='major[]' id='major[]' value='CIS-AppDev' class='major-checkbox' > CIS-AppDev <br>";
				print "<input type='checkbox' name='major[]' id='major[]' value='CIS-Networking' class='major-checkbox' > CIS-Networking <br>";
				print "<input type='checkbox' name='major[]' id='major[]' value='WDMD' class='major-checkbox' > WDMD <br>";
				print "<input type='checkbox' name='major[]' id='major[]' value='WD' class='major-checkbox' > WD <br>";
				print "<input type='checkbox' name='major[]' id='major[]' value='HTI' class='major-checkbox' > HTI <br>";
				print "<input type='checkbox' name='major[]' id='major[]' value='Other' class='major-checkbox' > Other <br>";

			print "</fieldset>";
	  
			print "<fieldset id='group2'>";

				print "<label>What grade do you expect to receive in CNMT 310? </label> <br/>";
				print "<input type='radio' name='grade' id='grade[]' value='A' class='grade-radio' > A <br/>";
				print "<input type='radio' name='grade' id='grade[]' value='B' class='grade-radio' > B <br/>";
				print "<input type='radio' name='grade' id='grade[]' value='C' class='grade-radio' > C <br/>";
				print "<input type='radio' name='grade' id='grade[]' value='D' class='grade-radio' > D <br/>";
				print "<input type='radio' name='grade' id='grade[]' value='F' class='grade-radio' > F <br/>";

			print "</fieldset>";
	  
			print "<fieldset id='group3'>";

				print "<label>What is your favorite pizza topping? </label> <br/>";
				print "<input type='radio' name='topping' id='topping[]' value='Pepperoni' class='pizza-radio' > Pepperoni <br/>";
				print "<input type='radio' name='topping' id='topping[]' value='Bacon' class='pizza-radio' > Bacon <br/>";
				print "<input type='radio' name='topping' id='topping[]' value='Pineapple' class='pizza-radio' > Pineapple <br/>";
				print "<input type='radio' name='topping' id='topping[]' value='Italian Sausage' class='pizza-radio' > Italian Sausage <br/>";
				print "<input type='radio' name='topping' id='topping[]' value='Roasted Spinach' class='pizza-radio' > Roasted Spinach <br/>";			
				print "<br/>";
	  
				print "<input type='submit' value='Submit'>";
			print "</fieldset>";
		print "</form>";

print $page->getBottomSection();