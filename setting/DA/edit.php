 <?php
include($_SERVER['DOCUMENT_ROOT']."/config.php");
if(session_status() == PHP_SESSION_NONE){session_start();}
if(isset($_GET) && !empty($_GET)) {
$_SESSION['DASettingID'] = $_GET['id'];
}
if (!empty($_POST)){
                            $sql = mysqli_query($conn,"UPDATE tbl_da SET 
                            name='" . mysqli_real_escape_string($conn,$_POST['CaseNameEdit']) . "'
                            where id=" . $_SESSION['DASettingID'] . "") or die ("ERROR : ". mysqli_error($conn));
                            ?>
                                 <script type="text/javascript">
                                 // alert("Case Successfully Updated.");
                                 location = "/main.php"
                                 </script> 
                            <?php
}

$sql = "SELECT * FROM tbl_da where id=".$_SESSION['DASettingID'] ;
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) { 
?>
<div class="row" style="margin-top: 20px;">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" id="EditDASettingForm">
    <div class="col-sm-12">
        <div class="form-group">
              <label for="">Name of Disciplinary Action :</label>
              <input type="text" name="CaseNameEdit" id="CaseNameEdit" class="form-control" value="<?php echo $row['name']; ?>">
        </div>
    <div class="row">
                    <div class="col-sm-8"></div>
                    <div class="col-sm-2">
                          <a class="btn btn-success btn-block" onclick="ConfirmEditDASetting()"><span class="glyphicon glyphicon-save"></span> Save</a>
                    </div>
                    <div class="col-sm-2">
                          <a class="btn btn-warning btn-block" onclick="showDAListSetting()"><span class="glyphicon glyphicon-exit"></span> Cancel</a>
                    </div>
    </div>
        
    </div>
    </form>
</div>
<?php } ?>
<script type="text/javascript">
	function ConfirmEditDASetting(){
      
      var r = confirm("Are you sure you want to update this Disciplinary Action under \"" +  document.getElementById('CaseNameEdit').value +"\" ?");
      if (r == true) {
          $('#EditDASettingForm').submit();
      } else {
         
      }
    }
</script>