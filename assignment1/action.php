<?php
require_once("DB.class.php");
require_once("template.php");
$page = new Template("Thank You");
$page->addHeadElement("<script src='hello.js'></script>");
$page->addHeadElement("<link href='page.css' rel='stylesheet'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();
print $page->getTopSection();

$db = new DB();

if (!$db->getConnStatus()) {
	print "An error has occurred with connection\n";
	exit;
}

print "<ul>";
	print "<li><a href='index.php' title='Click here to see our home page'>Home Page</a></li>";
	print "<li><a href='survey.php' title='Click here to take our survey'>Survey</a></li>";
	print "<li><a href='privacy.php' title='Click here to see our privacy policy'>Privacy policy</a></li>";
	print "<li><a href='search.php' title='Click here to search for an album'>Search</a></li>";
print "</ul>";

$checkboxError = "";
$gradeError = "";
$toppingError = "";
$checkboxSet = false;
$majors = "";
$majorsInsert = "";
$ip = "";
$surveyMessage = "<h1> Thank you for participating in our survey</h1>";
if(isset($_POST["topping"]) && isset($_POST["grade"]) && isset($_POST['major'])){ //will change to email when add email field
	$grade=$_POST["grade"];
	$topping=$_POST["topping"];
	foreach($_POST['major'] as $major)
	{
		$majors[] = $db->dbEsc($major);
	}
	
	foreach($majors as $major)
	{
		$majorsInsert .= $major." ";
	}
	
	$grade=$_POST["grade"];
	$topping=$_POST["topping"];
	$gradeBool = ($grade=="A" || $grade=="B" || $grade=="C" || $grade=="D" || $grade=="F");
	$toppingBool = ($topping=="Pepperoni" || $topping=="Bacon" || $topping=="Pineapple" || $topping=="Italian Sausage" || $topping=="Roasted Spinach");
	
	if(!$gradeBool){
		$gradeError="<span class='error'>You must select a grade</span><br>";
		$surveyOK = false;
	}
	if(!$toppingBool){
		$toppingError="<span class='error'>You must select a topping</span><br>";
		$surveyOK = false;
	}
	
	//Sanitize Data
	//$grade = filter_var($grade, FILTER_SANITIZE_STRING);
	//$topping = filter_var($grade, FILTER_SANITIZE_STRING);
	
	if($surveyOK)
	{
		
	
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
		
		$time = $db->dbEsc($time);
		$grade = $db->dbEsc($grade);
		$topping = $db->dbEsc($topping);
		$ip = $db->dbEsc($ip);

		$query = "INSERT INTO survey (submittime, major, expectedgrade, favetopping, userip) VALUES 
		(now(), '$majorsInsert', '$grade', '$topping', '$ip')";
		
		$result = $db->dbCall($query);
	} else
	{
		$surveyMessage = "<h1>There were some errors in your survey</h1><br>";
		$surveyMessage .= $checkboxError;
		$surveyMessage .= $gradeError;
		$surveyMessage .= $toppingError;
	}
	
}else{
	$surveyMessage = "<h1>Please fill out all information in the survey<h1>";
}	

print $surveyMessage;

print $page->getBottomSection();