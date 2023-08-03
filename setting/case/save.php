<?php
include($_SERVER['DOCUMENT_ROOT']."/config.php");
if(session_status() == PHP_SESSION_NONE){session_start();}
    $CaseName = mysqli_real_escape_string($conn, $_POST["CaseName"]);
    $Caseinfo = mysqli_real_escape_string($conn, $_POST["CaseInfo"]);
        $sql = "INSERT INTO tbl_case  (
                      name,
                      CaseInfo
                      ) VALUES (
                      '$CaseName',
                      '$Caseinfo')";
                      if ($conn->query($sql) === TRUE) { ?>
                        <script type="text/javascript">
                          // alert("Case successfully added.");
                          location ="/main.php"
                        </script>
                      <?php
                      } else {
                          echo "Error: " . $sql . "<br>" . $conn->error;
                      }
?>