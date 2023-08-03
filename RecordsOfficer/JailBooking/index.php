<?php
if(session_status() == PHP_SESSION_NONE){session_start();}  
?>
<div class="panel panel-default" id="">
  <div class="panel-heading" id="panel">
    <div class="media">
      <div class="media-left">
        <img src="/images/user accounts.png" class="media-object" style="width:60px">
      </div>
      <div class="media-body">
        <h3 class="text-primary">Jail Booking Details</h3>
        <!-- <div class="row col-sm-2 pull-right"><a onclick="showAddHearingDetail()" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-plus"></span> ADD</a></div> -->
      </div>

    </div>
  </div>
<div class="panel panel-body" id="innerBodyPanel">

<div class="row">
  <div class="col-sm-12" id="JailBookingMainPanel">
    
    <?php
    
    include $_SERVER["DOCUMENT_ROOT"]."/config.php";
    $result = mysqli_query($conn,"SELECT * FROM `tbl_inmate` where id=".$_SESSION['Temp_InmateID']);
    while($row = mysqli_fetch_assoc($result)){
        $_SESSION['Temp_InmateFullname'] = $row['fname'] . ' ' .$row['mname'].' '.$row['lname'];
        $_SESSION['PrisonNo'] = $row['ReceivingJail'];
        $_SESSION['Gender'] = $row['gender'];
        $_SESSION['alias'] = $row['alias'];
        $_SESSION['CivilStatus'] = $row['CivilStatus'];
        $_SESSION['WeightV'] = $row['WeightV'];
        $_SESSION['HeightV'] = $row['HeightV'];
        $_SESSION['AddressV'] = $row['AddressV'];
        $_SESSION['Hair'] = $row['Hair'];
        $_SESSION['Eyecolor'] = $row['Eyecolor'];
        $_SESSION['bday'] = $row['bday'];
        $_SESSION['religion'] = $row['religion'];
        $_SESSION['nationality'] = $row['nationality'];
        $_SESSION['NearestKin'] = $row['NearestKin'];
        $_SESSION['BertillionMark'] = $row['BertillionMark'];
        //$_SESSION[''] = $row[''];
    }
    $result = mysqli_query($conn,"SELECT * FROM `tbl_jailbooking` where Inmate_ID=".$_SESSION['Temp_InmateID']);
     
          if (!$result || mysqli_num_rows($result) == 0) { 
              include($_SERVER['DOCUMENT_ROOT']."/RecordsOfficer/JailBooking/Wdata.php");
          } else {
              include($_SERVER['DOCUMENT_ROOT']."/RecordsOfficer/JailBooking/WOdata.php");
        } ?>
   
    </div>
</div>

</div>
</div>