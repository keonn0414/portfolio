<?php
include($_SERVER['DOCUMENT_ROOT']."/config.php");
if(session_status() == PHP_SESSION_NONE){session_start();}
if (isset($_POST['btnSaveTransferJail'])){
    $JailName = mysqli_real_escape_string($conn, $_POST["JailName"]);
    $Remarks = mysqli_real_escape_string($conn, $_POST["Remarks"]);
        $sql = mysqli_query($conn,"UPDATE tbl_inmate SET 
                            ReceivingJail='Transferred'
                            where id=" . $_SESSION['Temp_InmateID'] . "") or die ("ERROR : ". mysqli_error($conn));
        $sql = "INSERT INTO tbl_transfer  (
                      place,
                      remarks,
                      Inmate_ID
                      ) VALUES (
                      '$JailName',
                      '$Remarks',
                      '".$_SESSION['Temp_InmateID']."')";
	
                      if ($conn->query($sql) === TRUE) { ?>
                        <script type="text/javascript">
                          // alert("Trasnfer Done.");
                          location ="/main.php"
                        </script>
                      <?php
                      } else {
                          echo "Error: " . $sql . "<br>" . $conn->error;
                      }
}


$sql = "SELECT id,ReceivingJail FROM tbl_inmate where id=".$_SESSION['Temp_InmateID'] ;
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {  
?>
<div class="panel panel-default" id="">
	<div class="panel-heading" id="panel">
		<div class="media">
			<div class="media-left">
				<img src="/images/user accounts.png" class="media-object" style="width:60px">
			</div>
			<div class="media-body">
				<h3 class="text-primary">Transfer Jail Details</h3>
				<!-- <div class="row col-sm-2 pull-right"><a onclick="showAddInmateCaseParalegal()" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-plus"></span> ADD</a></div> -->
			</div>

		</div>
	</div>
<div class="panel panel-body" id="innerBodyPanel">
<form  role="form"  method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" >

	<div class="row form-group">
        <div class="col-sm-12">
          <label for="JailName">Jail Name :</label>
          <input type="text" class="form-control" id="JailName" name="JailName">
          
        </div>
        
        
  </div>
  <div class="row form-group">
        <div class="col-sm-12">
          <label for="Remarks">Remarks :</label>
          <textarea class="form-control" id="Remarks" name="Remarks" rows="5" style="resize: none;"></textarea>
        </div>
  </div>
<div class="row" style="margin-bottom: 90px;">
      <div class="form-group">
              <div class="col-sm-8"></div>
              <div class="col-sm-2">
                <input type="submit" class="btn btn-success btn-block" name="btnSaveTransferJail" value="Save" />
              </div>
              <div class="col-sm-2">
                <a class="btn btn-warning btn-block" onclick="ShowHomeTab()"><span class="glyphicon glyphicon-close"></span> Cancel
                    </a>
              </div>
      </div>
  </div>

</div>
</form>
</div>
<?php } ?>