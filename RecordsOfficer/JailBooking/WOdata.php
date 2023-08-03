
<?php if(session_status() == PHP_SESSION_NONE){session_start();}
while($row = mysqli_fetch_assoc($result)){  
?>
<div class="row">
  <div class="col-sm-10"></div>
  <div class="col-sm-2 ">
      <a href="<?php echo '/RecordsOfficer/JailBooking/del.php?id='.$row['id']; ?>" class="btn btn-danger pull-right" style="margin-left: 10px;" ><span class="glyphicon glyphicon-trash"></span></a>
      <a onclick="ShowJailBookingEdit(this)" id="<?php echo $row['id']; ?>" class="btn btn-default pull-right"><span class="glyphicon glyphicon-pencil"></span></a>
      
  </div>
  
</div>
<div class="row">
                  <div class="form-group">
                      <div class="col-sm-4">
                        <div class="form-group">
                            <label for="CaseNoJailBooking">Case No :</label>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                            <center><label>Prison No :</label></center>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                            <label>Date of this Report</label>
                        </div>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-4">
                        <div class="form-group">
                            <?php echo $row['Case_no']; ?>
                        </div>
                  </div>
                  <div class="col-sm-4">
                        <div class="form-group">
                            <center><label><?php echo $_SESSION['PrisonNo']; ?></label></center>
                        </div>
                  </div>
                  <div class="col-sm-4">
                        <div class="form-group">
                            <?php echo $row['DateReport']; ?>
                        </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-6">
                        <div class="form-group">
                            <label>Name : <?php echo $_SESSION['Temp_InmateFullname']; ?></label>
                        </div>
                  </div>
                  <div class="col-sm-6">
                        <div class="form-group">
                            <label>Sex : <?php echo $_SESSION['Gender']; ?></label>
                        </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-3">
                      <div class="form-group">
                          <label>Alias : <?php echo $_SESSION['alias']; ?></label>
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="form-group">
                          <label>Civil Status : <?php echo $_SESSION['CivilStatus']; ?></label>
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="form-group">
                          <label>Weight : <?php echo $_SESSION['WeightV']; ?></label>
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="form-group">
                          <label>Height : <?php echo $_SESSION['HeightV']; ?></label>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-4">
                      <div class="form-group">
                          <label>Address : </label>
                      </div>
                  </div>
                  <div class="col-sm-4">
                      <div class="form-group">
                          <label>Hair :</label>
                      </div>
                  </div>
                  <div class="col-sm-4">
                      <div class="form-group">
                          <label>Eyes : </label>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-4">
                      <div class="form-group">
                          <label><?php echo $_SESSION['AddressV']; ?></label>
                      </div>
                  </div>
                  <div class="col-sm-4">
                      <div class="form-group">
                          <label><?php echo $_SESSION['Hair']; ?></label>
                      </div>
                  </div>
                  <div class="col-sm-4">
                      <div class="form-group">
                          <label><?php echo $_SESSION['Eyecolor']; ?></label>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-12">
                      <label>Date of Birth : <?php echo $_SESSION['bday']; ?></label>
                  </div>
              </div>
              <div class="row">
                  <div class="form-group">
                      <div class="form-inline">
                          <div class="col-sm-12">
                              <label>Place of Birth : </label>
                              <?php echo $row['Bplace']; ?>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                <div class="form-group">
                  <div class="form-inline">
                      <div class="col-sm-12">
                          
                          <label>Educational Attainment : </label>
                          <?php echo $row['Educational']; ?>
                          
                      </div>
                  </div>
                </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                  <div class="form-inline">
                      <div class="col-sm-12">
                          <label>Occupational : </label>
                          <?php echo $row['Work']; ?>
                      </div>
                  </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                  <div class="col-sm-12">
                      <label>Religion : <?php echo $_SESSION['religion']; ?></label>
                  </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                  <div class="col-sm-12">
                      <label>Citizenship : <?php echo $_SESSION['nationality']; ?></label>
                  </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                  <div class="form-inline">
                      <div class="col-sm-12">
                          <label>Offense : </label>
                          <?php echo $row['offense']; ?>
                      </div>
                  </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                  <div class="form-inline">
                      <div class="col-sm-12">
                          <label>Place of Arrest : </label>
                          <?php echo $row['PlaceArrest']; ?>
                      </div>
                  </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                  <div class="form-inline">
                      <div class="col-sm-12">
                          <label>Date of Arrest : </label>
                          <?php echo $row['DateArrest']; ?>
                      </div>
                  </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                  <div class="form-inline">
                      <div class="col-sm-12">
                          <label>Arresting Oficer : </label>
                          <?php echo $row['ArrrestingOfficer']; ?>
                      </div>
                  </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                  <div class="col-sm-12">
                      <label>Nearest of Kin : <?php echo $_SESSION['NearestKin']; ?></label>
                  </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                  <div class="col-sm-12">
                      <label>Distinguishing Marks : <?php echo $_SESSION['BertillionMark']; ?></label>
                  </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                  <div class="form-inline">
                      <div class="col-sm-12">
                          <label>Date Confined : </label>
                          <?php echo $row['DateConfined']; ?>
                      </div>
                  </div>
              </div>
              <!-- <div class="row">
                  <div class="col-sm-2 pull-right">
                      <a class="btn btn-danger btn-block">Print</a>
                  </div>
              </div> -->

<?php } ?> 