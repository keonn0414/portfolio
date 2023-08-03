 <?php
include($_SERVER['DOCUMENT_ROOT']."/config.php");
if(session_status() == PHP_SESSION_NONE){session_start();}
if(isset($_GET) && !empty($_GET)) {
$_SESSION['CaseSettingID'] = $_GET['id'];
}
if (!empty($_POST)){
                            $sql = mysqli_query($conn,"UPDATE tbl_case SET 
                            name='" . mysqli_real_escape_string($conn,$_POST['CaseNameEdit']) . "',
                            CaseInfo='" . mysqli_real_escape_string($conn,$_POST['CaseInfo']) . "'
                            where id=" . $_SESSION['CaseSettingID'] . "") or die ("ERROR : ". mysqli_error($conn));
                            ?>
                                 <script type="text/javascript">
                                 // alert("Case Successfully Updated.");
                                 location = "/main.php"
                                 </script> 
                            <?php
}

$sql = "SELECT * FROM tbl_case where id=".$_SESSION['CaseSettingID'] ;
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) { 
?>
<div class="row" style="margin-top: 20px;">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" id="EditCaseSettingForm">
    <div class="col-sm-12">
        <div class="form-group">
              <label for="">Name of Case :</label>
              <input type="text" name="CaseNameEdit" id="CaseNameEdit" class="form-control" value="<?php echo $row['name']; ?>">
              <label for="">Information :</label>
              <input type="text" name="CaseInfo" id="CaseInfo" class="form-control" value="<?php echo $row['CaseInfo']; ?>">
        </div>
    <div class="row">
                    <div class="col-sm-8"></div>
                    <div class="col-sm-2">
                          <a class="btn btn-success btn-block" onclick="ConfirmEditCaseSetting()"><span class="glyphicon glyphicon-save"></span> Save</a>
                    </div>
                    <div class="col-sm-2">
                          <a class="btn btn-warning btn-block" onclick="showCaseListSetting()"><span class="glyphicon glyphicon-exit"></span> Cancel</a>
                    </div>
    </div>
        
    </div>
    </form>
</div>
<?php } ?>
<script type="text/javascript">
	function ConfirmEditCaseSetting(){
      
      var r = confirm("Are you sure you want to update this case under \"" +  document.getElementById('CaseNameEdit').value +"\" ?");
      if (r == true) {
          $('#EditCaseSettingForm').submit();
      } else {
         
      }
    }
</script>