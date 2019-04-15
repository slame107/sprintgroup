<?php
session_start();
require_once("template.php");
$page = new Template("Login");
$page->addHeadElement("<link href='page.css' rel='stylesheet'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();
print $page->getTopSection();

if(isset($_SESSION['roleName']))
{
	header("Location: index.php");
}

print "<div class='sidebar'>";
	print "<a href='index.php' title='Click here to see our home page'>Home Page</a>";
	print "<a href='survey.php' title='Click here to take our survey'>Survey</a></li>";
	print "<a href='privacy.php' title='Click here to see our privacy policy'>Privacy policy</a>";
	print "<a href='search.php' title='Click here to search for an album'>Search</a>";
	if(isset($_SESSION['roleName']))
	{
		print "<a href='logout.php' title='Click here to logout'>Logout</a>";
	}
	else
	{
		print "<a href='login.php' title='Click here to login'>Login</a>";
	}
	
print "</div>";

print "<div class='header'>";
  print "<h1>Login</h1>";
  
print "</div>";

print "<form id='frmChoice' method='post' action = 'loginVerify.php'>";

	if(isset($_SESSION['Error']))
	{
		if($_SESSION['Error'] == "notset")
		{
			print "<p class='error'>Please enter Username and Password</p> ";
			$_SESSION['Error'] = "";
		}
		if($_SESSION['Error'] == "notfound")
		{
			print "<p class = 'error'>Username or Password is incorrect!</p>";
			$_SESSION['Error'] = "";
		}
	}
			
	print "<p><b> Please enter the following information </b></p>";
			
	print "<fieldset id='group1'>";

	print "Enter email"; 
	print "<br>";
	print "<input type='email' name='email'>";

	print "</fieldset>";
	  
	print "<fieldset id='group2'>";

	print "Enter Password";
	print "<br>";
	print "<input type='password' name='password'>";
	print "<br>";
	print "<br>";
	print "<input type='submit' value='Submit'>";
	print "</fieldset>";
	 		
print "</form>";

print $page->getBottomSection();