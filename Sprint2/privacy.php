<?php
session_start();
require_once("template.php");
$page = new Template("Privacy Policy");
$page->addHeadElement("<link href='page.css' rel='stylesheet'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();
print $page->getTopSection();
require_once("sidebar.php");

print "<div class='header'>";
	print "<h1>Privacy Policy</h1>";
print "</div>";

print "<article id='content'>";
		
	print "<div class='entry'>";
		print "<p>The University of Wisconsin System Administration (UWSA) recognizes the importance of protecting the privacy of information provided to us.</p>";
	print "</div>";
	
	print "<div class='header'>Personal information</div>";
		print "<div class='entry'>";
			print "<p>We will use personal information that you provide via e-mail or through other online means only for purposes necessary to serve your needs, 
					such as responding to an inquiry or other request for information. This may involve redirecting your inquiry or comment to another person or 
					department better suited to meeting your needs. </p>";

			print "<p>Some webpages at UWSA may collect personal information about visitors and use that information for purposes other than those stated above. 
					Each webpage that collects information will have a separate privacy statement that will tell you how that information is used.</p>";
		print "</div>";
		
	print "<div class='header'> Collected Information</div>";
		print "<div class='entry'>";
			print "<p>UWSA monitors network traffic for the purposes of site management and security. We use this information to help diagnose problems and carry 
					out other administrative tasks. We also use statistic information to determine which information is of most interest to users, to identify system 
					problem areas, or to help determine technical requirements. The server log information does not include personal information.</p>";
		print "</div>";
		
	print "<div class='header'> External websites</div>";
		print "<div class='entry'>";
		print "<p>This site contains links to other sites outside of UWSA. UWSA is not responsible for the privacy practices or the content of such websites.</p>";
		print "</div>";
	print "<div class='header'> Questions</div>";
		print "<div class='entry'>";
			print "<p>If you have any questions about this privacy statement, the practices of this site, or your use of this website, please contact Webmaster.</p>";
		print "</div>";
print "</article>";
print $page->getBottomSection();