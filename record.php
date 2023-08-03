<?php
include($_SERVER['DOCUMENT_ROOT']."/config.php");
if(session_status() == PHP_SESSION_NONE){session_start();}
if(isset($_GET) && !empty($_GET)) {
$_SESSION['Temp_InmateID'] = $_GET['id'];
    if (!empty($_GET['r'])){ ?>
          <script type="text/javascript">
          <?php if ($_GET['r'] == 'caselist') { ?>
                      $('#CaseTab').click();
          <?php } elseif ($_GET['r'] == 'hearinglist') { ?>  
                      $('#HearingTab').click();
          <?php } elseif ($_GET['r'] == 'dalist') { ?>  
                      $('#DaTab').click();   
          <?php } //close of r = caselist ?>
          </script>
    <?php
    } // close of r empty
}
//echo $_SESSION['Temp_InmateID']. ' r '. $_GET['r'];
$result = mysqli_query($conn,"Select id,ReceivingJail,fname,mname,lname from tbl_inmate where id=".$_SESSION['Temp_InmateID']);
    while($row = mysqli_fetch_array($result)){
      $_SESSION['Temp_status'] = $row['ReceivingJail'];
      $_SESSION['Temp_sentence'] = 'Bailable';
      $_SESSION['InmateName'] = $row['lname'] . ' , '. $row['fname'].' '.$row['mname'];
            $result1 = mysqli_query($conn,"Select * from tbl_casedetails where Inmate_ID=".$_SESSION['Temp_InmateID']);
            while($row1 = mysqli_fetch_array($result1)){
                  $result2 = mysqli_query($conn,"Select * from tbl_case where name='".$row1['Offenses']."'");
                  while($row2 = mysqli_fetch_array($result2)){
                    if ($row2['CaseInfo'] == 'Non-Bailable'){
                      $_SESSION['Temp_sentence'] = $row2['CaseInfo'];
                      break;
                    } else {
                      $_SESSION['Temp_sentence'] = "Bailable";
                    }
                    
                  }
              if ($_SESSION['Temp_sentence'] == 'Non-Bailable'){
                      break;
                    }
            }
      if ($_SESSION['Temp_sentence'] == 'Non-Bailable'){
                      break;
                    }
    }

?>
<div></div>
<div class="row">
      <?php
            if ($_SESSION['Emp_pos'] == 'Records Officer') {
                    include($_SERVER['DOCUMENT_ROOT']."/previlege/record.php"); 
            } elseif ($_SESSION['Emp_pos'] == 'Paralegal Officer') {
                    include($_SERVER['DOCUMENT_ROOT']."/previlege/paralegal.php");
            } elseif ($_SESSION['Emp_pos'] == 'IWD unit Officer') {
                    include($_SERVER['DOCUMENT_ROOT']."/previlege/iwd.php");
            } elseif ($_SESSION['Emp_pos'] == 'Search Officer') {
                     include($_SERVER['DOCUMENT_ROOT']."/previlege/search.php");
            } elseif ($_SESSION['Emp_pos'] == 'Custodial Officer') {
                     include($_SERVER['DOCUMENT_ROOT']."/previlege/custodial.php");
            } elseif ($_SESSION['Emp_pos'] == 'Jail Nurse') {
                     include($_SERVER['DOCUMENT_ROOT']."/previlege/jail.php");
            } else {
                    include($_SERVER['DOCUMENT_ROOT']."/previlege/admin.php");
            }
      ?>
</div>
<?php

?>