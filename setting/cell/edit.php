 <?php
include($_SERVER['DOCUMENT_ROOT']."/config.php");
if(session_status() == PHP_SESSION_NONE){session_start();}
if(isset($_GET) && !empty($_GET)) {
$_SESSION['CellSettingID'] = $_GET['id'];
}
if (!empty($_POST)){
                            $sql = mysqli_query($conn,"UPDATE tbl_cell SET 
                            prison_no='" . mysqli_real_escape_string($conn,$_POST['CellNoEdit']) . "'
                            where id=" . $_SESSION['CellSettingID'] . "") or die ("ERROR : ". mysqli_error($conn));
                            ?>
                                 <script type="text/javascript">
                                 // alert("Cell Successfully Updated.");
                                 location = "/main.php"
                                 </script> 
                            <?php
}

$sql = "SELECT * FROM tbl_cell where id=".$_SESSION['CellSettingID'] ;
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) { 
?>
<div class="row" style="margin-top: 20px;">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" id="EditCellSettingForm1">
    <div class="col-sm-12">
        <div class="form-group">
              <label for="">Number of Dorm :</label>
              <input type="text" name="CellNoEdit" id="CellNoEdit" class="form-control" value="<?php echo $row['prison_no']; ?>">
        </div>
    <div class="row">
                    <div class="col-sm-8"></div>
                    <div class="col-sm-2">
                          <a class="btn btn-success btn-block" onclick="ConfirmEditCellSetting()"><span class="glyphicon glyphicon-save"></span> Save</a>
                    </div>
                    <div class="col-sm-2">
                          <a class="btn btn-warning btn-block" onclick="showCellListSetting()"><span class="glyphicon glyphicon-exit"></span> Cancel</a>
                    </div>
    </div>
        
    </div>
    </form>
</div>
<?php } ?>
<script type="text/javascript">
	function ConfirmEditCellSetting(){
      
      var r = confirm("Are you sure you want to update this dorm under \"" +  document.getElementById('CellNoEdit').value +"\" ?");
      if (r == true) {
          $('#EditCellSettingForm1').submit();
      } else {
         
      }
    }
</script>