<?php
if(session_status() == PHP_SESSION_NONE){session_start();}  
?>
<div class="panel panel-default" id="">
  <div class="panel-heading" id="panel">
    <div class="media">
      <div class="media-left">
        <img src="/images/user accounts.png" class="media-object" style="width:60px">
      </div>
      <div class="media-body">
        <h3 class="text-primary">Property Details</h3>
        <div class="row col-sm-2 pull-right"><a onclick="showAddProperty()" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-plus"></span> Add</a></div>
      </div>

    </div>
  </div>
<div class="panel panel-body" id="innerBodyPanel">

<div class="row">
  <div class="col-sm-12">
    <div id="PanelOfProperty" >
    <?php
    include $_SERVER["DOCUMENT_ROOT"]."/SearchOfficer/Item/PropertyList.php";
    ?>
        </div>  
    </div>
</div>

</div>
</div>