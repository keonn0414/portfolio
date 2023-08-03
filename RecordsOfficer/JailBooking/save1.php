<?php
include($_SERVER['DOCUMENT_ROOT']."/config.php");
if(session_status() == PHP_SESSION_NONE){session_start();}
if (isset($_POST['BtnSubmitJailBooking'])){
    $CaseNoJailBooking = mysqli_real_escape_string($conn, $_POST["CaseNoJailBooking"]);
    $DateReport = mysqli_real_escape_string($conn, $_POST["DateReport"]);
    $Bplace = mysqli_real_escape_string($conn, $_POST["Bplace"]);
    $educ = mysqli_real_escape_string($conn, $_POST["educ"]);
    $work = mysqli_real_escape_string($conn, $_POST["work"]);
    $Offense = mysqli_real_escape_string($conn, $_POST["Offense"]);
    $PlaceArrest = mysqli_real_escape_string($conn, $_POST["PlaceArrest"]);
    $DateArrest = mysqli_real_escape_string($conn, $_POST["DateArrest"]);
    $ArrestOfficer = mysqli_real_escape_string($conn, $_POST["ArrestOfficer"]);
    $DateConfined = mysqli_real_escape_string($conn, $_POST["DateConfined"]);

        $sql = "INSERT INTO tbl_jailbooking (
                      Case_no,
                      DateReport,
                      Bplace,
                      Educational,
                      Work,
                      offense,
                      PlaceArrest,
                      DateArrest,
                      ArrrestingOfficer,
                      DateConfined,
                      Inmate_ID
                      ) VALUES (
                      '$CaseNoJailBooking',
                      '$DateReport',
                      '$Bplace',
                      '$educ',
                      '$work',
                      '$Offense',
                      '$PlaceArrest',
                      '$DateArrest',
                      '$ArrestOfficer',
                      '$DateConfined',
                      '".$_SESSION['Temp_InmateID']."')";
                      if ($conn->query($sql) === TRUE) { ?>
                        <script type="text/javascript">
                          // alert("Jail Booking detail successfully added.");
                          location ="/main.php"
                        </script>
                      <?php
                      } else {
                          echo "Error: " . $sql . "<br>" . $conn->error;
                      }
}



?>