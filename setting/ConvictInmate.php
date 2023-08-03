<?php
include($_SERVER['DOCUMENT_ROOT']."/config.php");
if(session_status() == PHP_SESSION_NONE){session_start();}
if (isset($_POST['btnSaveConvict'])){
    $JailName = mysqli_real_escape_string($conn, $_POST["JailName"]);
    $Remarks = mysqli_real_escape_string($conn, $_POST["Remarks"]);
        $sql = mysqli_query($conn,"UPDATE tbl_inmate SET 
                            ReceivingJail='Not Registered',
                            NoOfConviction='".$_SESSION['NoOfConviction']."'
                            where id=" . $_SESSION['Temp_InmateID'] . "") or die ("ERROR : ". mysqli_error($conn));
                            ?>
                                 <script type="text/javascript">
                                 // alert("Inmate Successfully Convicted.");
                                 location ="/main.php"
                                 </script> 
                            <?php 
        
}


$sql = "SELECT id,ReceivingJail,NoOfConviction FROM tbl_inmate where id=".$_SESSION['Temp_InmateID'] ;
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) { 
            $_SESSION['NoOfConviction'] = $row['NoOfConviction'] + 1; 
?>
<div class="panel panel-default" id="">
	<div class="panel-heading" id="panel">
		<div class="media">
			<div class="media-left">
				<img src="/images/user accounts.png" class="media-object" style="width:60px">
			</div>
			<div class="media-body">
				<h3 class="text-primary">Release Inmate Details</h3>
				<!-- <div class="row col-sm-2 pull-right"><a onclick="showAddInmateCaseParalegal()" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-plus"></span> ADD</a></div> -->
			</div>

		</div>
	</div>
<div class="panel panel-body" id="innerBodyPanel">
<form  role="form"  method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" >

	<div class="row form-group">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
          <p for="JailName">Are you sure you want to convict<b> <?php echo strtoupper($_SESSION['InmateName']); ?></b>?</p>
          <!-- <p style="color: #f22f21;"><b>Note :</b></p>
          <p><i>All Records / Data of this inmate are disable after releasing.</i></p> -->
          
        </div>
        <div class="col-sm-3"></div> 
        
  </div>
  
<div class="row" style="margin-bottom: 90px;">
      <div class="form-group">
              <div class="col-sm-3"></div>
              <div class="col-sm-3">
                <input type="submit" class="btn btn-success btn-block" name="btnSaveConvict" value="Save" />
              </div>
              <div class="col-sm-3">
                <a class="btn btn-warning btn-block" onclick="ShowHomeTab()"><span class="glyphicon glyphicon-close"></span> Cancel
                    </a>
              </div>
              <div class="col-sm-3"></div>
      </div>
  </div>

</div>
</form>
</div>
<?php } ?>