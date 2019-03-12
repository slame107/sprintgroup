<?php
$checkboxError = "";
$gradeError = "";
$toppingError = "";
$checkboxSet = false;
$surveyMessage = "<h1> Thank you for participating in our survey</h1>";
$surveyOK = true;
$selected = "";

$selected = $_POST['check_list'];

 if(empty($selected))
 {
	 $checkboxError="<span class='error'>You must select a major</span><br>";
	 $surveyOK = false;
 }
 else
 {
	 $check_list = implode(" ",$_POST['check_list']);
 }

//var_dump ($check_list);
/*
if(!empty($_POST['check_list'])) {
// Loop to store and display values of individual checked checkbox.
foreach($_POST['check_list'] as $selected) {
	$list implode(',', $_POST['check_list']); // change the comma to whatever separator you want
	$checkboxSet = true;
}

}
else{
	$checkboxError="<span class='error'>You must select a major</span><br>";
	$surveyOK = false;

}
/*
if(isset($_POST["majorChk1"])||isset($_POST["majorChk2"])||isset($_POST["majorChk3"])||isset($_POST["majorChk4"])||isset($_POST["majorChk5"])||isset($_POST["majorChk6"]))
	{
		$checkboxSet = true;
	}
	*/



//	var_dump($selected);

if(isset($_POST["topping"])||isset($_POST["grade"]))
	{ //will change to email when add email field

/*
	$majorChk1=$_POST["AppDev"];
	$majorChk2=$_POST["Networking"];
	$majorChk3=$_POST["WDMD"];
	$majorChk4=$_POST["WD"];
	$majorChk5=$_POST["HTI"];
	$majorChk6=$_POST["Other"];
*/
	$grade=$_POST["grade"];
	$topping=$_POST["topping"];
//	$checkboxBool = ($selected != null);
	$gradeBool = ($grade=="A" || $grade=="B" || $grade=="C" || $grade=="D" || $grade=="F");
	$toppingBool = ($topping=="pep" || $topping=="bac" || $topping=="pin" || $topping=="sau" || $topping=="spi");




	//generate errors


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
		//var_dump($time);

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

		$valid_ip = filter_var($ip, FILTER_VALIDATE_IP);
		//validate ip

		//var_dump($ip);









//		var_dump($check_list,$grade, $topping, $ip);





		//insert data into database
		//need a way to connect to DB ...dbHelper class?
		//Insert statement ...dbHelper class?

//		INSERT INTO survey
//		VALUES
//		(0, now(), 'CIS', 'A', 'pepporoni', 'ip', 'sessionid');




//connecting to db


/*
		require_once("DB.class.php");
		$db = new DB();

	//	var_dump($db);


		if (!$db->getConnStatus()) {
		  print "An error has occurred with connection\n";
		  exit;
		}


		/*
		//INSERT example
		//Pretend this is unsanitized
		//user data from a form:
		$user = "bob";
		$safeUser = $db->dbEsc($user);
		$query = "INSERT INTO testschema (username,pass,active) " .
		          "VALUES ('{$safeUser}','l33t',1)";
		$result = $db->dbCall($query);
		//This will contain the insert id
		print "Insert statement executed, insert id was: " . $result . "\n";
		*/

		//If using unsanitized data, be sure
		//to call the dbEsc() method on any individual values!
		// Must do that prior to building the statement here
/*
		$safecheck_list = $db->dbEsc($check_list);
		$safegrade = $db->dbEsc($grade);
		$safetopping = $db->dbEsc($topping);
		$safeip = $db->dbEsc($ip);
*/
		 $sql = "INSERT INTO survey VALUES "."('0','now()','$check_list','$grade','$topping','$ip')";
		 var_dump($sql);


	//	$query = "INSERT INTO `survey` VALUES ('0', 'now()', 'CIS', 'C', 'sausage', '127', '0')";
	//	$result = $db->dbCall($query);





//		$query = "SELECT username FROM testschema WHERE active = 1";
//		$result = $db->dbCall($query);
//	var_dump($result);

		/*
		//UPDATE example
		//If using unsanitized data, be sure
		//to call the dbEsc() method on any individual values!
		// Must do that prior to building the statement here
		$query = "UPDATE testschema SET pass = 'testpass' WHERE id = 1";
		$result = $db->dbCall($query);
		print "Update statement executed, affected rows: " . $result . "\n";


		*/


//end database connection


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
