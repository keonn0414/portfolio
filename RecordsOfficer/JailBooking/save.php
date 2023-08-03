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
  $case_no = mysqli_real_escape_string($conn, $_POST["case_no"]);
	$prison_no = mysqli_real_escape_string($conn, $_POST["prison_no"]);
	$date_of_report = mysqli_real_escape_string($conn, $_POST["date_of_report"]);
	$fname = mysqli_real_escape_string($conn, $_POST["fname"]);
	$mname = mysqli_real_escape_string($conn, $_POST["mname"]);
  $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
	$sex = mysqli_real_escape_string($conn, $_POST["sex"]);
  $age = mysqli_real_escape_string($conn, $_POST["age"]);
  $alias = mysqli_real_escape_string($conn, $_POST["alias"]);
  $civil_status = mysqli_real_escape_string($conn, $_POST["civil_status"]);
  $height = mysqli_real_escape_string($conn, $_POST["height"]);
  $weight = mysqli_real_escape_string($conn, $_POST["weight"]);
  $address = mysqli_real_escape_string($conn, $_POST["address"]);
  $hair = mysqli_real_escape_string($conn, $_POST["hair"]);
  $eye = mysqli_real_escape_string($conn, $_POST["eye"]);
  $dob = mysqli_real_escape_string($conn, $_POST["dob"]);
  $place_of_birth = mysqli_real_escape_string($conn, $_POST["place_of_birth"]);
  $education = mysqli_real_escape_string($conn, $_POST["education"]);
  $occupation = mysqli_real_escape_string($conn, $_POST["occupation"]);
  $religion = mysqli_real_escape_string($conn, $_POST["religion"]);
  $citizenship = mysqli_real_escape_string($conn, $_POST["citizenship"]);
  $offense = mysqli_real_escape_string($conn, $_POST["offense"]);
  $place_of_arrest = mysqli_real_escape_string($conn, $_POST["place_of_arrest"]);
  $date_of_arrest = mysqli_real_escape_string($conn, $_POST["date_of_arrest"]);
  $arresting_officer = mysqli_real_escape_string($conn, $_POST["arresting_officer"]);
  $kin = mysqli_real_escape_string($conn, $_POST["kin"]);
  $kin_address = mysqli_real_escape_string($conn, $_POST["kin_address"]);
  $marks = mysqli_real_escape_string($conn, $_POST["marks"]);
  $others = mysqli_real_escape_string($conn, $_POST["others"]);
  $date_confined = mysqli_real_escape_string($conn, $_POST["date_confined"]);
  $valuables = mysqli_real_escape_string($conn, $_POST["valuables"]);
  $receipt_no = mysqli_real_escape_string($conn, $_POST["receipt_no"]);

		$conn->query("INSERT INTO tbl_jailbook (
			case_no,
      prison_no,
      date_of_report,
      lname,
      fname,
      mname,
      sex,
      age,
      alias,
      civil_status,
      height,
      weight,
      address,
      hair,
      eye,
      dob,
      place_of_birth,
      education,
      occupation,
      religion,
      citizenship,
      offense,
      place_of_arrest,
      date_of_arrest,
      arresting_officer,
      kin,
      kin_address,
      marks,
      others,
      date_confined,
      valuables,
      receipt_no
			) VALUES (
			'$case_no',
			'$prisoner_no',
			'$date_of_report',
			'$lname',
      '$fname',
			'$mname',
      '$sex',
      '$age',
      '$alias',
      '$civil_status',
      '$height',
      '$weight',
      '$address',
      '$hair',
      '$eye',
      '$dob',
      '$place_of_birth',
      '$education',
      '$occupation',
      '$religion',
      '$citizenship',
      '$offense',
      '$place_of_arrest',
      '$date_of_arrest',
      '$arresting_officer',
      '$kin',
      '$kin_address',
      '$marks',
      '$others',
      '$date_confined',
      '$valuables',
			'$receipt_no')");

      echo "<script language='javascript'>alert('Inmate Information Registered!.');</script>";

  	header("Location: /main.php?error=".$eCode);
} else {
	// $data['eCode'] = "Fx0001";
	$eCode = "Fx0001";
	header("Location: /main.php?error=".$eCode);
}

?>

function
