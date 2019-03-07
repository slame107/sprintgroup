<?php
$checkboxError = "";
$gradeError = "";
$toppingError = "";
$checkboxSet = false;
$surveyMessage = "<h1> Thank you for participating in our survey</h1>";
if(isset($_POST["majorChk1"])||isset($_POST["majorChk2"])||isset($_POST["majorChk3"])||isset($_POST["majorChk4"])||isset($_POST["majorChk5"])||isset($_POST["majorChk6"])){
	$checkboxSet = true;
}
if(isset($_POST["topping"])||isset($_POST["grade"])||$checkboxSet){ //will change to email when add email field
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
	
	$surveyOK = true;
	
	//generate errors
	if(!$checkboxBool){
		$checkboxError="<span class='error'>You must select a major</span><br>";
		$surveyOK = false;
	}
	if(!$gradeBool){
		$gradeError="<span class='error'>You must select a grade</span><br>";
		$surveyOK = false;
	}
	if(!$toppingBool){
		$toppingError="<span class='error'>You must select a topping</span><br>";
		$surveyOK = false;
	}
	if($surveyOK){
		//get current time
		$date = new DateTime();
		$time = $date->getTimeStamp();
		//get user ip
	$ip;
	if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
		//insert data into database
		//need a way to connect to DB ...dbHelper class?
		//Insert statement ...dbHelper class?
		
	}else{
		$surveyMessage = "<h1>There were some errors in your survey</h1><br>";
		$surveyMessage .= $checkboxError;
		$surveyMessage .= $gradeError;
		$surveyMessage .= $toppingError;
	}
	
	
}else{
	header ("Location: index.php");
	exit();
}	
require_once("template.php");
$page = new Template("Thank You");
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

print $surveyMessage;

print $page->getBottomSection();