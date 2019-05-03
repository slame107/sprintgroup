<?php
session_start();
require_once("template.php");
$page = new Template("Results");
$page->addHeadElement("<link href='page.css' rel='stylesheet'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();
print $page->getTopSection();

require_once("sidebar.php");



if(isset($_POST['search']))
{
 	$data = array("search" => $_POST['search']);
//var_dump($data);

	$dataJson = json_encode($data);
	//var_dump($dataJson);

	$postString = "data=" . urlencode($dataJson);
//var_dump($postString);
	$contentLength = strlen($postString);

	$header = array(
	  'Content-Type: application/x-www-form-urlencoded',
	  'Content-Length: ' . $contentLength
	);
	$url = "http://cnmtsrv2.uwsp.edu/~jmung222/wsresults.php";

	$ch = curl_init($url);// YOUR CODE HERE TO INITIALIZE A CURL RESOURCE

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

	$return = curl_exec($ch);// YOUR CODE HERE TO EXECUTE THE CURL CALL
//	var_dump($return);
//	var_dump($url);

//	print $return;
//var_dump($return);

	$result = json_decode($return, true);

//var_dump($result);


		if(!isset($result['Error2']))
		{
			print "<div class='header'>";
				print "<h1>Results Page</h1>";
			print "</div>";

		print "<table>";
			print "<tr><th>Insert Time</th>
									<th>Album Title</th>
									<th>Album Artist</th>
									<th>Album Length</th>
									<th>Status</th>
									<th>URL</th>
								</tr>";

//need to make sure $result isset here
		foreach($result as $album)
		{
				print "<tr><td>" . $album['inserttime'] . "</td>" . "<td>" . $album['albumtitle'] .
					"<td>" . $album['albumartist'] . "</td>"  . "<td>" . $album['albumlength'] . "</td>" .
					"<td>" . $album['status']  . "</td>" . "<td>" .  "<a href='".$album['url']."'>Buy CD</a>"  . "</td></tr>";
			}

		print "</table>";
		curl_close($ch);

  }
}
	else
	{
		$_SESSION['Error2']="notset";
		header("Location: search.php");
	}

?>
