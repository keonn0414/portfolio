
<div class="row" style="margin-top: 20px;">
    <form method="POST" action="/setting/case/save.php" enctype="multipart/form-data" id="AddCaseSettingForm">
    <div class="col-sm-12">
        <div class="form-group">
              <label for="">Name of Case :</label>
              <input type="text" name="CaseName" id="CaseName" class="form-control">
              <label for="">Information :</label>
              <input type="text" name="CaseInfo" id="CaseInfo" class="form-control">
        </div>
    <div class="row">
                    <div class="col-sm-8"></div>
                    <div class="col-sm-2">
                          <input type="submit" class="btn btn-success btn-block" name="BtnCaseSubmit" value="Submit">
                    </div>
                    <div class="col-sm-2">
                          <a class="btn btn-warning btn-block" onclick="showCaseListSettingAdd()"><span class="glyphicon glyphicon-exit"></span> Cancel</a>
                    </div>
    </div>
        
    </div>
    </form>
</div>
<script type="text/javascript">
  // function ConfirmAddCaseSetting(){
      
  //     var r = confirm("Are you sure you want to add this case under \"" + $('#CaseName').val() +"\" ?");
  //     if (r == true) {
  //         $('#AddCaseSettingForm').submit();
  //     } else {
         
  //     }
  //   }
</script>