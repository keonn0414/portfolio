<?php
include($_SERVER['DOCUMENT_ROOT']."/config.php");
if(session_status() == PHP_SESSION_NONE){session_start();}
if (isset($_POST['btnSaveTransferCell'])){
	$sql = mysqli_query($conn,"UPDATE tbl_inmate SET 
                            ReceivingJail='" . mysqli_real_escape_string($conn,$_POST['ReceivingJail']) . "'
                            where id=" . $_SESSION['Temp_InmateID'] . "") or die ("ERROR : ". mysqli_error($conn));
                            ?>
                                 <script type="text/javascript">
                                 // alert("Inmate Record Successfully Updated.");
                                 location ="/main.php"
                                 </script> 
                            <?php 
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
				<h3 class="text-primary">Transfer Dorm Details</h3>
				<!-- <div class="row col-sm-2 pull-right"><a onclick="showAddInmateCaseParalegal()" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-plus"></span> ADD</a></div> -->
			</div>

		</div>
	</div>
<div class="panel panel-body" id="innerBodyPanel">
<form  role="form"  method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" >
<div class="row">
	<div class="col-sm-4"></div>
	<div class="col-sm-4">
              <div class="form-group">
                <label for="ReceivingJail">Receiving Jail</label>
                <select name="ReceivingJail" id="ReceivingJail" class="form-control">

                  <?php
                    include($_SERVER['DOCUMENT_ROOT']."/config.php");
                    $sql = "SELECT * FROM tbl_cell order by prison_no";
                    $result2 = $conn->query($sql);

                    if ($result2->num_rows > 0) {
                      // output data of each row
                      while($row2 = $result2->fetch_assoc()) {
                          if ($row['ReceivingJail'] == $row2['prison_no']){
                          echo '<option value="'.$row2['prison_no'].'" selected>'.$row2['prison_no'].'</option>';
                          } elseif ($row2['prison_no'] == 'Not Registered'  || $row2['prison_no'] == 'Transferred' || $row2['prison_no'] == 'Released') {}
                          else {
                            echo '<option value="'.$row2['prison_no'].'">'.$row2['prison_no'].'</option>';
                          } 
                      }
                      $conn->close();
                    } ?>
                </select>
              </div>
      </div>
      <div class="col-sm-4"></div>
</div>
<div class="row" style="margin-bottom: 90px;">
      <div class="form-group">
              <div class="col-sm-8"></div>
              <div class="col-sm-2">
                <input type="submit" class="btn btn-success btn-block" name="btnSaveTransferCell" value="Save" />
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