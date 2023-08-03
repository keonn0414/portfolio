 <?php
include $_SERVER["DOCUMENT_ROOT"]."/head.php"; 
include($_SERVER['DOCUMENT_ROOT']."/config.php");
if(session_status() == PHP_SESSION_NONE){session_start();}
if(isset($_GET) && !empty($_GET)) {
//$_SESSION['Temp_InmateID'] = $_GET['id'];
}
if (!empty($_POST)){
                            $sql = mysqli_query($conn,"UPDATE tbl_inmate SET 
                            fname='" . mysqli_real_escape_string($conn,$_POST['fname']) . "', 
                            mname='" . mysqli_real_escape_string($conn,$_POST['mname']) . "', 
                            lname='" . mysqli_real_escape_string($conn,$_POST['lname']) . "',
                            alias='" . mysqli_real_escape_string($conn,$_POST['alias']) . "', 
                            CivilStatus='" . mysqli_real_escape_string($conn,$_POST['CivilStatus']) . "',
                            nationality='" . mysqli_real_escape_string($conn,$_POST['nationality']) . "',
                            religion='" . mysqli_real_escape_string($conn,$_POST['religion']) . "', 
                            gender='" . mysqli_real_escape_string($conn,$_POST['gender']) . "',  
                            CivilStatus='" . mysqli_real_escape_string($conn,$_POST['CivilStatus']) . "',
                            WeightV='" . mysqli_real_escape_string($conn,$_POST['Weight']) . "',
                            HeightV='" . mysqli_real_escape_string($conn,$_POST['Height']) . "',
                            Hair='" . mysqli_real_escape_string($conn,$_POST['Hair']) . "',
                            Eyecolor='" . mysqli_real_escape_string($conn,$_POST['EyeColor']) . "',
                            Complexion='" . mysqli_real_escape_string($conn,$_POST['Complexion']) . "',
                            BertillionMark='" . mysqli_real_escape_string($conn,$_POST['BertillionMark']) . "',
                            Father='" . mysqli_real_escape_string($conn,$_POST['father']) . "',
                            Mother='" . mysqli_real_escape_string($conn,$_POST['mother']) . "',
                            Partner='" . mysqli_real_escape_string($conn,$_POST['partner']) . "',
                            ChildNo='" . mysqli_real_escape_string($conn,$_POST['childNo']) . "',
                            NearestKin='" . mysqli_real_escape_string($conn,$_POST['kin']) . "',
                            AddressV='" . mysqli_real_escape_string($conn,$_POST['address']) . "',
                            ReceivedDate='" . mysqli_real_escape_string($conn,$_POST['ReceivedDate']) . "',
                            TransferDate='" . mysqli_real_escape_string($conn,$_POST['TransferDate']) . "',
                            ReceivingJail='" . mysqli_real_escape_string($conn,$_POST['ReceivingJail']) . "',
                            PreparedBy='" . mysqli_real_escape_string($conn,$_POST['PreparedBy']) . "',
                            VerifiedBy='" . mysqli_real_escape_string($conn,$_POST['VerifiedBy']) . "'
                            where id=" . $_SESSION['Temp_InmateID'] . "") or die ("ERROR : ". mysqli_error($conn));
                            ?>
                                 <script type="text/javascript">
                                 // alert("Inmate Record Successfully Updated.");
                                 location = "/main.php?r=addInmate"
                                 </script> 
                            <?php 
}
$sql = "SELECT * FROM tbl_inmate where id=".$_SESSION['Temp_InmateID'] ;
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) { 
 ?>
<div class="col-sm-12">
<form  role="form"  method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" > 

<div class="row" style="margin-top: 10px;">
    <div class="col-sm-7"></div>
    <div class="col-sm-2"><label for="NoOfConviction">No of Commitment:</label></div>
    <div class="col-sm-3"><label><?php echo htmlentities($row['NoOfConviction']); ?></label>
</div>
    <div class="row">
        <div class="col-sm-12">
          <legend style="font-weight: 900; color: #5050FF">Personal Details</legend>

          <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="lname">Last Name:</label>
                <input type="text" class="form-control" id="lname" name="lname"  value="<?php echo htmlentities($row['lname']); ?>" required>
              </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="fname">First Name:</label>
                <input type="text" class="form-control" id="fname" name="fname"  value="<?php echo htmlentities($row['fname']); ?>" required>
              </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="mname">Middle Name:</label>
                <input type="text" class="form-control" id="mname" name="mname"  value="<?php echo htmlentities($row['mname']); ?>" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="alias">Aliases:</label>
                <input type="text" class="form-control" id="alias" name="alias" value="<?php echo htmlentities($row['alias']); ?>"  >
              </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="bday">Birthdate:</label>
                <input type="date" name="bday" id="bday" class="form-control" value="<?php echo htmlentities($row['bday']); ?>" placeholder="Birthday (mm/dd/yyy)">
              </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="CivilStatus">Civil Status:</label>
                <!-- <input type="text" name="CivilStatus" id="CivilStatus" class="form-control" value="<?php echo htmlentities($row['CivilStatus']); ?>" placeholder="Civil Status"> -->
                <select name="CivilStatus" id="CivilStatus" class="selectpicker show-tick form-control" data-size="8" title="Choose Civil Status here">
                      <option value="Single">Single</option>
                      <option value="Married">Married</option>
                      <option value="Divorced">Divorced</option>
                      <option value="Widowed">Widowed</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="nationality">Nationality:</label>
                <select name="nationality" id="nationality" class="selectpicker show-tick form-control" data-size="8" title="Choose nationality here" data-live-search="true">

                  <?php
                    include($_SERVER['DOCUMENT_ROOT']."/config.php");
                    $sql1 = "SELECT nationality FROM tbl_countries order by nationality";
                    $result1 = $conn->query($sql1);

                    if ($result1->num_rows > 0) {
                      // output data of each row
                      while($row1 = $result1->fetch_assoc()) {
                          if ($row['nationality'] == $row1['nationality']){
                              echo '<option value="'.$row1['nationality'].'" selected>'.$row1['nationality'].'</option>';
                          } else {
                              echo '<option value="'.$row1['nationality'].'">'.$row1['nationality'].'</option>';
                          }
                          
                      }
                      $conn->close();
                    } ?>
                </select>
                
              </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="religion">Religion:</label>
                <select name="religion" id="religion" class="selectpicker show-tick form-control" data-size="8" title="Choose Religion here" data-live-search="true">
                      <option value="Roman Catholic">Roman Catholic</option>
                      <option value="Muslim/Islamic">Muslim/Islamic</option>
                      <option value="Buddhists">Buddhists</option>
                      <option value="Atheists">Atheists</option>
                      <option value="Protestants">Protestants</option>
                      <option value="El Shaddai">El Shaddai</option>
                      <option value="Church of the Nazarene">Church of the Nazarene</option>
                      <option value="Evangelical">Evangelical</option>
                      <option value="Ang Dating Daan">Ang Dating Daan</option>
                      <option value="Jehovah's Witnesses">Jehovah's Witnesses</option>
                      <option value="Aglipayan">Aglipayan</option>
                      <option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
                      <option value="Philippine Benevolent Missionary Association">Philippine Benevolent Missionary Association</option>
                </select>
              </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="gender">Sex:</label>
                <select name="gender" id="gender" class="form-control">
                  <option value="" selected disabled>Sex</option>
                  <?php if ($row['gender'] == 'Male') { ?>
                    <option value="Male" selected>Male</option>
                    <option value="Female">Female</option>
                    <?php
                    } elseif ($row['gender'] == 'Female') { ?>
                    <option value="Male" >Male</option>
                    <option value="Female" selected>Female</option>
                    <?php
                    } else { ?>
                    <option value="Male" >Male</option>
                    <option value="Female">Female</option>
                    <?php
                    } ?>
                  
                </select>
              </div>
            </div>
          </div>

    </div>  <!-- end of col-sm-9 -->
  </div> <!-- end of row -->
  <div class="row">
      <div class="col-sm-12">
          <legend style="font-weight: 900; color: #5050FF">Supplementary Details</legend>
      </div>
  </div>
  <div class="row">
      <div class="col-sm-4">
              <div class="form-group">
                <label for="Weight">Weight</label>
                <input type="number" name="Weight" id="Weight" class="form-control" value="<?php echo htmlentities($row['WeightV']); ?>" >
              </div>
      </div>
      <div class="col-sm-4">
              <div class="form-group">
                <label for="Height">Height</label>
                <input type="number" name="Height" id="Height" class="form-control" value="<?php echo htmlentities($row['HeightV']); ?>" >
              </div>
      </div>
      <div class="col-sm-4">
              <div class="form-group">
                <label for="Hair">Hair</label>
                <select name="Hair" id="Hair" class="selectpicker show-tick form-control" data-size="8" title="Choose Hair color here" data-live-search="true">
                      <option value="Blond">Blond</option>
                      <option value="Brown">Brown</option>
                      <option value="Red">Red</option>
                      <option value="Black">Black</option>
                      <option value="Gray">Gray</option>
                      <option value="White">White</option>
                </select>
              </div>
      </div>
  </div>
  <div class="row">
      <div class="col-sm-4">
              <div class="form-group">
                <label for="EyeColor">Color of the Eye</label>
                <select name="EyeColor" id="EyeColor" class="selectpicker show-tick form-control" data-size="8" title="Choose Eye color here" data-live-search="true">
                      <option value="Black">Black</option>
                      <option value="Brown">Brown</option>
                      <option value="Amber">Amber</option>
                      <option value="Blue">Blue</option>
                      <option value="Blue-Gray">Blue-Gray</option>
                      <option value="Green">Green</option>
                      <option value="Gray">Gray</option>
                      <option value="Hazel">Hazel</option>
                      <option value="Spectrum of colours">Spectrum of colours</option>
                      <option value="Violet">Violet</option>
                </select>
              </div>
      </div>
      <div class="col-sm-4">
              <div class="form-group">
                <label for="Complexion">Complexion</label>
                <select name="Complexion" id="Complexion" class="selectpicker show-tick form-control" data-size="8" title="Choose Hair color here" data-live-search="true">
                      <option value="Light skin">Light skin</option>
                      <option value="Fair skin">Fair skin</option>
                      <option value="Medium skin">Medium skin</option>
                      <option value="Olive skin">Olive skin</option>
                      <option value="Tan brown">Tan brown</option>
                      <option value="Black brown">Black brown</option>
                </select>
              </div>
      </div>
      <div class="col-sm-4">
              <div class="form-group">
                <label for="BertillionMark">Bertillion Mark</label>
                <input type="text" name="BertillionMark" id="BertillionMark" class="form-control" value="<?php echo htmlentities($row['BertillionMark']); ?>" >
              </div>
      </div>
  </div>
  <div class="row">
      <div class="col-sm-12">
          <legend style="font-weight: 900; color: #5050FF">Family Details</legend>
      </div>
  </div>
  <div class="row">
      <div class="col-sm-6">
              <div class="form-group">
                <label for="father">Father:</label>
                <input type="text" class="form-control" id="father" name="father" value="<?php echo htmlentities($row['Father']); ?>"  >
              </div>
      </div>

      <div class="col-sm-6">
              <div class="form-group">
                <label for="mother">Mother:</label>
                <input type="text" name="mother" id="mother" class="form-control" value="<?php echo htmlentities($row['Mother']); ?>" >
              </div>
      </div>


  </div>
  <div class="row">
      <div class="col-sm-4">
              <div class="form-group">
                <label for="partner">Husband / Wife:</label>
                <input type="text" name="partner" id="partner" class="form-control" value="<?php echo htmlentities($row['Partner']); ?>" >
              </div>
      </div>
      <div class="col-sm-4">
              <div class="form-group">
                <label for="childNo">No. of Children</label>
                <input type="number" name="childNo" id="childNo" class="form-control" value="<?php echo htmlentities($row['ChildNo']); ?>" >
              </div>
      </div>
      <div class="col-sm-4">
              <div class="form-group">
                <label for="kin">Nearest of Kin</label>
                <input type="text" name="kin" id="kin" class="form-control" value="<?php echo htmlentities($row['NearestKin']); ?>" >
              </div>
      </div>
  </div>
  <div class="row">
      <div class="col-sm-12">
          <div class="form-group">
                <label for="childNo">Address</label>
                <textarea class="form-control" name="address" id="address" rows="5"  style="resize: none;"><?php echo $row['AddressV']; ?></textarea>
          </div>
      </div>
  </div>
  <div class="row">
      <div class="col-sm-12">
          <legend style="font-weight: 900; color: #5050FF">Case Details</legend>
      </div>
  </div>
  
  <div class="row">
      <div class="col-sm-4">
              <div class="form-group">
                <label for="ReceivedDate">Date Received:</label>
                <input type="date" name="ReceivedDate" id="ReceivedDate" class="form-control" value="<?php echo htmlentities($row['ReceivedDate']); ?>" >
              </div>
      </div>
      <div class="col-sm-4">
              <div class="form-group">
                <label for="TransferDate">Date Transfer</label>
                <input type="date" name="TransferDate" id="TransferDate" class="form-control" value="<?php echo htmlentities($row['TransferDate']); ?>" >
              </div>
      </div>
      <div class="col-sm-4">
              <div class="form-group">
                <label for="ReceivingJail">Receiving Jail</label>
                <select name="ReceivingJail" id="ReceivingJail" class="selectpicker show-tick form-control" data-size="8" title="Choose jail here" data-live-search="true">

                  <?php
                    include($_SERVER['DOCUMENT_ROOT']."/config.php");
                    $sql = "SELECT * FROM tbl_cell order by prison_no";
                    $result2 = $conn->query($sql);

                    if ($result2->num_rows > 0) {
                      // output data of each row
                      while($row2 = $result2->fetch_assoc()) {
                          if ($row['ReceivingJail'] == $row2['prison_no']){
                          echo '<option value="'.$row2['prison_no'].'" selected>'.$row2['prison_no'].'</option>';
                          } else {
                            echo '<option value="'.$row2['prison_no'].'">'.$row2['prison_no'].'</option>';
                          } 
                      }
                      $conn->close();
                    } ?>
                </select>
              </div>
      </div>
  </div>
  <div class="row">
      <div class="col-sm-6">
              <div class="form-group">
                <label for="PreparedBy">Prepared By</label>
                <input type="text" name="PreparedBy" id="PreparedBy" class="form-control" value="<?php echo htmlentities($row['PreparedBy']); ?>" >
              </div>
      </div>
      <div class="col-sm-6">
              <div class="form-group">
                <label for="VerifiedBy">Verified and Checked by</label>
                <input type="text" name="VerifiedBy" id="VerifiedBy" class="form-control" value="<?php echo htmlentities($row['VerifiedBy']); ?>" >
              </div>
      </div>
  </div>
  <div class="row" style="margin-bottom: 90px;">
      <div class="form-group">
              <div class="col-sm-8"></div>
              <div class="col-sm-2">
                <input type="submit" class="btn btn-success btn-block" name="btnSave" value="Save" />
              </div>
              <div class="col-sm-2">
                <a class="btn btn-warning btn-block" href="/main.php"><span class="glyphicon glyphicon-close"></span> Cancel
                    </a>
              </div>
      </div>
  </div>
<?php } ?>
</form> 
</div>
<?php include $_SERVER["DOCUMENT_ROOT"]."/footer.php"; ?> 
