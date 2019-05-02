<?php
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

	$url = "http://cnmtsrv2.uwsp.edu/~abink741/sum.php";

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

	curl_close($ch);
}else
{
	print "<h2 id='error'> Please enter valid album artist or title. </h2>";
}
?>