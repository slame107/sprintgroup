<?php
$checkboxError = "";
$gradeError = "";
$toppingError = "";
$majorChecked1 = "";
$majorChecked2 = "";
$majorChecked3 = "";
$majorChecked4 = "";
$majorChecked5 = "";
$majorChecked6 = "";
$gradeCheckedA = "";
$gradeCheckedB = "";
$gradeCheckedC = "";
$gradeCheckedD = "";
$gradeCheckedF = "";
$topCheckedPep = "";
$topCheckedBac = "";
$topCheckedPin = "";
$topCheckedSau = "";
$topCheckedSpi = "";
if(isset($_POST["topping"])){ //will change to email when add email field
	$majorChk1=$_POST["majorChk1"];
	$majorChk2=$_POST["majorChk2"];
	$majorChk3=$_POST["majorChk3"];
	$majorChk4=$_POST["majorChk4"];
	$majorChk5=$_POST["majorChk5"];
	$majorChk6=$_POST["majorChk6"];
	$grade=$_POST["grade"];
	$topping=$_POST["topping"];
	$checkboxBool = ($majorChk1!=null || $majorChk2!=null || $majorChk3!=null || $majorChk4!=null || $majorChk5!=null || $majorChk6!=null);
	$gradeBool = ($grade=="A" || $grade=="B" || $grade=="C" || $grade=="D" || $grade=="F");
	$toppingBool = ($topping=="pep" || $topping=="bac" || $topping=="pin" || $topping=="sau" || $topping=="spi");
	
	//when adding email if not null
	if($checkboxBool && $gradeBool && $toppingBool ){
		//write to DB
		header ("Location: action.php");
		exit();
	}
	else{
		//generate errors
		if(!$checkboxBool){
			$checkboxError="<span class='error'>You must select a major</span>";
		}
		if(!$gradeBool){
			$gradeError="<span class='error'>You must select a grade</span>";
		}
		if(!$gradeBool){
			$toppingError="<span class='error'>You must select a topping</span>";
		}
		
		//generate form refill
		if($majorChk1 != null){
			$majorChecked1 = "checked";
		}
		if($majorChk2 != null){
			$majorChecked2 = "checked";
		}
		if($majorChk3 != null){
			$majorChecked3 = "checked";
		}
		if($majorChk4 != null){
			$majorChecked4 = "checked";
		}
		if($majorChk5 != null){
			$majorChecked5 = "checked";
		}
		if($majorChk6 != null){
			$majorChecked6 = "checked";
		}
		
		//grade form refill
		if($grade == "A"){
			$gradeCheckedA = "checked";
		}else if($grade == "B"){
			$gradeCheckedB = "checked";
		}else if($grade == "C"){
			$gradeCheckedC = "checked";
		}else if($grade == "D"){
			$gradeCheckedD = "checked";
		}else if($grade == "F"){
			$gradeCheckedF = "checked";
		}
		
		//topping form refill
		if($topping == "pep"){
			$topCheckedPep = "checked";
		}else if($topping == "bac"){
			$topCheckedBac = "checked";
		}else if($topping == "pin"){
			$topCheckedPin = "checked";
		}else if($topping == "sau"){
			$topCheckedSau = "checked";
		}else if($topping == "spi"){
			$topCheckedSpi = "checked";
		}
		
	}
}	

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

print "<form id='frmChoice' method='post' action = 'survey.php' onsubmit='return validate()'>";
			print "<h2> Student Survey </h2>";
			print "<fieldset id='group1'>";

				print "<label>What is your major? </label> $checkboxError <br/>";
				print "<input type='checkbox' name='majorChk1' value='AppDev' class='major-checkbox' $majorChecked1> CIS-AppDev <br>";
				print "<input type='checkbox' name='majorChk2' value='Networking' class='major-checkbox' $majorChecked2> CIS-Networking <br>";
				print "<input type='checkbox' name='majorChk3' value='WDMD' class='major-checkbox' $majorChecked3> WDMD <br>";
				print "<input type='checkbox' name='majorChk4' value='WD' class='major-checkbox' $majorChecked4> WD <br>";
				print "<input type='checkbox' name='majorChk5' value='HTI' class='major-checkbox' $majorChecked5> HTI <br>";
				print "<input type='checkbox' name='majorChk6' value='Other' class='major-checkbox' $majorChecked6> Other <br>";

			print "</fieldset>";
	  
			print "<fieldset id='group2'>";

				print "<label>What grade do you expect to receive in CNMT 310? </label> $gradeError<br/>";
				print "<input type='radio' name='grade' value='A' class='grade-radio' $gradeCheckedA> A <br/>";
				print "<input type='radio' name='grade' value='B' class='grade-radio' $gradeCheckedB> B <br/>";
				print "<input type='radio' name='grade' value='C' class='grade-radio' $gradeCheckedC> C <br/>";
				print "<input type='radio' name='grade' value='D' class='grade-radio' $gradeCheckedD> D <br/>";
				print "<input type='radio' name='grade' value='F' class='grade-radio' $gradeCheckedF> F <br/>";

			print "</fieldset>";
	  
			print "<fieldset id='group3'>";

				print "<label>What is your favorite pizza topping? </label> $toppingError<br/>";
				print "<input type='radio' name='topping' value='pep' class='pizza-radio' $topCheckedPep> Pepperoni <br/>";
				print "<input type='radio' name='topping' value='bac' class='pizza-radio' $topCheckedBac> Bacon <br/>";
				print "<input type='radio' name='topping' value='pin' class='pizza-radio' $topCheckedPin> Pineapple <br/>";
				print "<input type='radio' name='topping' value='sau' class='pizza-radio' $topCheckedSau> Italian Sausage <br/>";
				print "<input type='radio' name='topping' value='spi' class='pizza-radio' $topCheckedSpi> Roasted Spinach <br/>";			
				print "<br/>";
	  
				print "<input type='submit' value='Submit'>";
			print "</fieldset>";
		print "</form>";

print $page->getBottomSection();