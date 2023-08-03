
<div class="row" style="margin-top: 20px;">
    <form method="POST" action="/setting/cell/save.php" enctype="multipart/form-data" id="AddCellSettingForm">
    <div class="col-sm-12">
        <div class="form-group">
              <label for="">Number of Dorm :</label>
              <input type="text" name="CellNum" id="CellNum" class="form-control">
        </div>
    <div class="row">
                    <div class="col-sm-8"></div>
                    <div class="col-sm-2">
                    <input type="submit" class="btn btn-success btn-block" name="BtnCellSubmit" value="Submit">
                          <!-- <a class="btn btn-success btn-block" onclick="ConfirmAddCellSetting()"><span class="glyphicon glyphicon-save"></span> Save</a> -->
                          <!-- <input type="submit" name="BtnSubmitCell" id="BtnSubmitCell" value="Submit"> -->
                    </div>
                    <div class="col-sm-2">
                          <a class="btn btn-warning btn-block" onclick="showCellListSettingAdd()"><span class="glyphicon glyphicon-exit"></span> Cancel</a>
                    </div>
    </div>
        
    </div>
    </form>
</div>
<script type="text/javascript">
  // function ConfirmAddCellSetting(){
      
  //     var r1 = confirm("Are you sure you want to add this cell under \"" + $('#CellNum').val() +"\" ?");
  //     if (r1 == true) {
  //         $('#AddCellSettingForm').submit();
  //     } else {
         
  //     }
  //   }
</script>