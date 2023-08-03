<?php
include($_SERVER['DOCUMENT_ROOT']."/config.php");
if(session_status() == PHP_SESSION_NONE){session_start();}
if(isset($_GET) && !empty($_GET)) {
$_SESSION['Temp_OfficerID'] = $_GET['id'];
}
//echo $_SESSION['Temp_InmateID'];
$result = mysqli_query($conn,"Select * from tbl_users where ID=".$_SESSION['Temp_OfficerID']);
    while($row = mysqli_fetch_array($result)){
      $_SESSION['Temp_Officerstatus'] = $row['status'];
      $_SESSION['OfficerName'] = $row['lname'] . ' , '. $row['fname'].' '.$row['mname'];
    }

?>
<div></div>
<div class="row">
      <div class="col-sm-12">
            <ul class="nav nav-tabs">
                  <li class="active"><a href="#home" data-toggle="tab" id="ProfileHomeTabOfficer">Home</a></li>
                  <li class="dropdown" >
                    <a class="dropdown-toggle <?php if ($_SESSION['Temp_Officerstatus'] == 'Deceased') { ?> disabled <?php } ?>" data-toggle="dropdown" href="#">Medical Details
                    <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="#OMedical" id="OMedicalTab" data-toggle="tab">List of Medical status</a></li>
                            <li><a href="#ODental" id="ODentalTab" data-toggle="tab">List of Dental status</a></li>
                            <li><a href="#ODeceased"  data-toggle="tab">Deceased Details</a></li>
                          </ul>
                  </li>
                 
            </ul>

            <div class="tab-content">
                      <div id="home" class="tab-pane fade in active">
                        <?php include($_SERVER['DOCUMENT_ROOT']."/account/home.php"); //include($_SERVER['DOCUMENT_ROOT']."/previlege/personalinfo.php"); ?>
                      </div>
                      
                      <div id="OMedical" class="tab-pane fade">
                        <div id="OMedicalMainPanel">
                            <?php include($_SERVER['DOCUMENT_ROOT']."/JailNurse/OfficerMedical/index.php"); ?>
                        </div>
                      </div>
                      <div id="ODental" class="tab-pane fade">
                        <div id="ODentalMainPanel">
                            <?php include($_SERVER['DOCUMENT_ROOT']."/JailNurse/OfficerDental/index.php"); ?>
                        </div>
                      </div>
                      <div id="ODeceased" class="tab-pane fade">
                        <div id="ODeceasedMainPanel">
                            <?php include($_SERVER['DOCUMENT_ROOT']."/JailNurse/OfficerDeceased/index.php"); ?>
                        </div>
                      </div>
                      
              
          </div> <!-- Closing of <div class="tab-content">  -->
</div>
</div>