<?php
include($_SERVER["DOCUMENT_ROOT"]."/config.php");
// yong mga error code ay mga abang ko lang para next time matrack ko mga error message na gagawin ko.
$eCode = "Sx0000";


// may tatry ako next time. gusto kong palitan yong "header()" ng function na to.
/*$data = array('eCode' => "Sx0000");
function sendPost(){
	$url = '/main.php';
	$options = array(
		'http' => array(
			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			'method'  => 'POST',
			'content' => http_build_query($data)
		)
	);
	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	if ($result === FALSE) { /* Handle error * }
}*/

if (!empty($_POST) && isset($_POST)) {
  $date_1 = mysqli_real_escape_string($conn, $_POST["date_1"]);
	$time_in = mysqli_real_escape_string($conn, $_POST["time_in"]);
	$time_out = mysqli_real_escape_string($conn, $_POST["time_out"]);
	$fname = mysqli_real_escape_string($conn, $_POST["fname"]);
	$mname = mysqli_real_escape_string($conn, $_POST["mname"]);
  $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
	$prisoner_no = mysqli_real_escape_string($conn, $_POST["prisoner_no"]);


		$conn->query("INSERT INTO tbl_visitor_items (
			date_1,
			time_in,
			time_out,
			lname,
			fname,
			mname,
      prisoner_no
			) VALUES (
			'$date_1',
			'$time_in',
			'$time_out',
			'$lname',
      '$fname',
			'$mname',
			'$prisoner_no')");

      echo "<script language='javascript'>alert('Visitor Information Registered!.');</script>"; 

  	header("Location: /main.php?error=".$eCode);
} else {
	// $data['eCode'] = "Fx0001";
	$eCode = "Fx0001";
	header("Location: /main.php?error=".$eCode);
}

?>

function
