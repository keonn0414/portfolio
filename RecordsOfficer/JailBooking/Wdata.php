

<form method="POST" action="/RecordsOfficer/JailBooking/save1.php" enctype="multipart/form-data">
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
                            <input type="text" name="CaseNoJailBooking" class="form-control" />
                        </div>
                  </div>
                  <div class="col-sm-4">
                        <div class="form-group">
                            <center><label><?php echo $_SESSION['PrisonNo']; ?></label></center>
                        </div>
                  </div>
                  <div class="col-sm-4">
                        <div class="form-group">
                            <input type="date" name="DateReport" class="form-control">
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
                              <input type="text" name="Bplace" class="form-control">
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                <div class="form-group">
                  <div class="form-inline">
                      <div class="col-sm-12">
                          
                          <label>Educational Attainment : </label>
                          <input type="text" name="educ" class="form-control">
                          
                      </div>
                  </div>
                </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                  <div class="form-inline">
                      <div class="col-sm-12">
                          <label>Occupational : </label>
                          <input type="text" name="work" class="form-control">
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
                          <input type="text" name="Offense" class="form-control">
                      </div>
                  </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                  <div class="form-inline">
                      <div class="col-sm-12">
                          <label>Place of Arrest : </label>
                          <input type="text" name="PlaceArrest" class="form-control">
                      </div>
                  </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                  <div class="form-inline">
                      <div class="col-sm-12">
                          <label>Date of Arrest : </label>
                          <input type="date" name="DateArrest" class="form-control">
                      </div>
                  </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                  <div class="form-inline">
                      <div class="col-sm-12">
                          <label>Arresting Oficer : </label>
                          <input type="text" name="ArrestOfficer" class="form-control">
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
                          <input type="date" name="DateConfined" class="form-control">
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-2 pull-right">
                      <a class="btn btn-warning btn-block" onclick="showProfileHomeTab()">Cancel</a>
                  </div>
                  <div class="col-sm-2 pull-right">
                      <input type="submit" name="BtnSubmitJailBooking" class="btn btn-success btn-block" value="Save">
                  </div>
              </div>
</form>