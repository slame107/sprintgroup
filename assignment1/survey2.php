<?php
require_once("template.php");
$page = new Template("Survey Page");
$page->addHeadElement("<link rel='stylesheet' href='styles/pretty.css'>");
$page->addHeadElement("<script src='validate.js'></script>");
$page->finalizeTopSection();
$page->finalizeBottomSection();
print $page->getTopSection();

print "<form name='surveyForm' action='action.php' onsubmit='return validateForm()'>
	<h1>Please take the short survey below:</h1>\n
	<h2>What is your major?</h2>\n
	<input type='checkbox' name='major1' value='CIS-AppDev'> CIS - Application Development<br>
	<input type='checkbox' name='major2' value='CIS-Network'> CIS - Networking<br>
	<input type='checkbox' name='major3' value='wdmd'> WDMD<br>
	<input type='checkbox' name='major4' value='wd'> WD<br> 
	<input type='checkbox' name='major5' value='hti'> HTI<br>
	<input type='checkbox' name='major6' value='Other'> Other<br>
	<h2>What grade do you expect to recieve in CNMT 310?</h2>\n
	<input type='radio' name='grade' value='A'> A<br>
	<input type='radio' name='grade' value='B'> B<br>
	<input type='radio' name='grade' value='C'> C<br>
	<input type='radio' name='grade' value='D'> D<br> 
	<input type='radio' name='grade' value='F'> F<br>
	<h2>What is your favorite pizza topping?</h2>\n
	<input type='radio' name='pTopping' value='cheese'> Cheese<br>
	<input type='radio' name='pTopping' value='pepperoni'> Pepperoni<br>
	<input type='radio' name='pTopping' value='sausage'> Sausage<br>
	<input type='radio' name='pTopping' value='supreme'> Supreme<br> 
	<input type='radio' name='pTopping' value='hawaiian'> Hawaiian<br>
	<h2>To submit the survey, please enter your email address, and click 'Submit'</h2>\n
	Email: <input type='text' name='email' value=''><br><br>
	<input type='submit' value='Submit'>
</form>";
print $page->getBottomSection();
?>