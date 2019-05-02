<?php
require_once("template.php");
$page = new Template("Results");
$page->addHeadElement("<link href='page.css' rel='stylesheet'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();
print $page->getTopSection();

require_once("sidebar.php");

print "<div class='header'>";
	print "<h1>Results Page</h1>";
print "</div>";

if(isset($_POST['search']))
{
	$data = array("Search_Result" => $_POST['search']);

	$dataJson = json_encode($data);

	$postString = "data=" . urlencode($dataJson);

	$contentLength = strlen($postString);

	$header = array(
	  'Content-Type: application/x-www-form-urlencoded',
	  'Content-Length: ' . $contentLength
	);

	$url = "http://cnmtsrv2.uwsp.edu/~abink741/wsresults.php";

	$ch = curl_init();

	curl_setopt($ch,
		CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch,
		CURLOPT_POSTFIELDS, $postString);
	curl_setopt($ch,
		CURLOPT_HTTPHEADER, $header);
	curl_setopt($ch,
		CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch,
		CURLOPT_URL, $url);

	$return = curl_exec($ch);

	print $return;
	
	print "<table>";
		print "<tr><th>Insert Time</th>
								<th>Album Title</th>
								<th>Album Artist</th>
								<th>Album Length</th>
								<th>Status</th>
								<th>URL</th>
							</tr>";

			foreach($result as $album) {
				print "<tr><td>" . $album['inserttime'] . "</td>" . "<td>" . $album['albumtitle'] . 
					"<td>" . $album['albumartist'] . "</td>"  . "<td>" . $album['albumlength'] . "</td>" . 
					"<td>" . $album['status']  ."</td></tr>" . $album['url']  ."</td></tr>";
			}
				
		print "</table>";
	
	curl_close($ch);
}else
{
	print "<h2 id='error'> Please enter valid album artist or title. </h2>";
}
?>