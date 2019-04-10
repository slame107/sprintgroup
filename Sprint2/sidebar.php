<?php
print "<div class='sidebar'>";
	if(isset($_SESSION['realName'])) 
	{
		print "Welcome ".$_SESSION['realName'];// Maybe try to get this somewhere else or looking better
	}
	print "<a class='active' href='index.php' title='Click here to see our home page'>Home Page</a>";
	print "<a href='survey.php' title='Click here to take our survey'>Survey</a></li>";
	print "<a href='privacy.php' title='Click here to see our privacy policy'>Privacy policy</a>";
	print "<a href='search.php' title='Click here to search for an album'>Search</a>";
	if(isset($_SESSION['roleName']))
	{
		if($_SESSION['roleName'] == "admin")
		{
			print "<a class='active' href='surveydata.php' title='Click here to see Survey Data'>Search Data</a>";
		}
		print "<a class='active' href='logout.php' title='Click here to logout'>Logout</a>";
	}
	else
	{
		print "<a class='active' href='login.php' title='Click here to login'>Login</a>";
	}
	print "</div>";
	?>