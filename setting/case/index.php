<div class="row" style="margin-top: 20px;">
    <table class="table table-hover table-filter">
        <tbody id="proposal_list">
        <?php include $_SERVER["DOCUMENT_ROOT"]."/config.php";
        $result = $conn->query("SELECT * FROM `tbl_case`");

        //display data on a table
        if (mysqli_num_rows($result) > 0) {

          while($row = $result->fetch_assoc()){ 
          $id = $row['id'] + 1000;
          ?>
        <tr data-status="pagado" class='alert alert-info'>
          <td>
          <div class="media">
            <div class="media" id='<?php echo $row['ID']; ?>'>
              <span class="media-meta pull-right" style="padding-right: 10px; text-align: right;">
                <a class="btn btn-default" id="<?php echo $row["id"]; ?>" onclick="showEditCaseSetting(this)" >
                  <span class="glyphicon glyphicon-pencil"></span>
                </a> 
                <a class="btn btn-danger" onclick="DeleteConfirmCaseSetting(this)" id="<?php echo $row["id"]; ?>" rname="<?php echo ucwords($row['name']) ?>"><span class="glyphicon glyphicon-trash"></span>
                </a>
              </span>
              <p class="title" style="font-weight: 900;">
                <?php
                  echo strtoupper($row['name']);
                ?>
                <span> (
                  <?php
                  echo strtoupper($row['CaseInfo']);
                  ?>
                ) </span>
              </p>
            </div>
          </div>
          </td>
        </tr><?php
          }
        } else {
          echo '<tr><td>No Case found.</tr>';
        }
        ?>
      </tbody>
  </table>
</div>
<script type="text/javascript">
  function DeleteConfirmCaseSetting(TheId){

      var r = confirm("Are you sure you want to delete this record under \"" + TheId.getAttribute("rname") +"\" ?");
      if (r == true) {
          location = '/setting/case/del.php?eid='+TheId.id
      } else {
         
      }
    }
    function showEditCaseSetting(TheID){
      $('#CaseListSettingPanel').load("/setting/case/edit.php?id="+TheID.id);
    }
</script>