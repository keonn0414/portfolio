<?php
include($_SERVER['DOCUMENT_ROOT']."/config.php");
if(session_status() == PHP_SESSION_NONE){session_start();}
if (isset($_POST['btnSaveManifest'])){
	$CityJail = mysqli_real_escape_string($conn, $_POST["CityJail"]);
    $CaseName = mysqli_real_escape_string($conn, $_POST["CaseName"]);
    $DateSign = mysqli_real_escape_string($conn, $_POST["DateSign"]);

        $sql = "INSERT INTO tbl_manifest  (
                      CityJail,
                      CaseName,
                      DateSign,
                      Inmate_ID
                      ) VALUES (
                      '$CityJail',
                      '$CaseName',
                      '$DateSign',
                      '".$_SESSION['Temp_InmateID']."')";
                      if ($conn->query($sql) === TRUE) { ?>
                        <script type="text/javascript">
                          //alert("Manifest detail successfully added.");
                          location ="/main.php"
                        </script>
                      <?php
                      } else {
                          echo "Error: " . $sql . "<br>" . $conn->error;
                      }
}



?>
<div class="panel panel-default" id="">
	<div class="panel-heading" id="panel">
		<div class="media">
			<div class="media-left">
				<img src="/images/user accounts.png" class="media-object" style="width:60px">
			</div>
			<div class="media-body">
				<h3>Manifest of Inmates</h3>
			</div>

		</div>
	</div>
<div class="panel panel-body" id="innerBodyPanel">
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
		<!-- <legend style="font-weight: 900; color: #5050FF">Search</legend> -->
    <div class="row form-group">
        <div class="col-sm-12">
        	<label for="CityJail">Jail Location :</label>
        </div>
        <div class="col-sm-12">
        	<input type="text" class="form-control" id="CityJail" name="CityJail">
        </div>
    </div>
    <div class="row form-group">
      
          <div class="col-sm-4">
          <div class="form-group">
              <label for="CaseName">Case Name :</label>
              <!-- <input type="text" class="form-control" id="CaseName" name="CaseName" > -->
              <select name="CaseName" class="form-control" required>
              <option disabled selected>Choose Option</option>
              <?php
              $result = $conn->query("SELECT id,Offenses FROM `tbl_casedetails` where Inmate_ID =".$_SESSION['Temp_InmateID']);
              //display data on a table
                  while($row = $result->fetch_assoc()){ 
                    echo '<option value="'.$row['id'].'">'.$row['Offenses'].'</option>';
                  }
              ?>
              </select>
            </div>
        </div>
        <!-- <div class="col-sm-4">
          <div class="form-group">
              <label for="CaseNo">Case No. :</label>
              <input type="text" class="form-control" id="CaseNo" name="CaseNo" disabled>
            </div>
        </div> -->
        <div class="col-sm-4">
          <div class="form-group">
            <label for="DateSign">Date Sign : </label>
            <input type="date" class="form-control" id="DateSign" name="DateSign">
            </div>
        </div>
    </div>
    <div class="row">  
      
      		<div class="col-sm-8"></div>
      		<div class="col-sm-2">
      			<input type="submit" class="btn btn-success btn-block" name="btnSaveManifest" value="Save" />
      		</div>
      		<div class="col-sm-2">
      			<a   class="btn btn-warning btn-block" onclick="showManifestlist()">
	              <span class="glyphicon glyphicon-close"></span>
	                Cancel
	            </a>
      		</div>
      
    </div> 

	
	

</form>
</div>
</div>

