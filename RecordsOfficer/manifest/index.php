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
				<h3 class="text-primary">Manifest Details</h3>
				<div class="row col-sm-2 pull-right"><a onclick="showAddManifest()" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-plus"></span> Add</a></div>
			</div>

		</div>
	</div>
<div class="panel panel-body" id="innerBodyPanel">

<div class="row">
	<div class="col-sm-12">
		<div id="PanelOfManifest" >
		<?php
		include $_SERVER["DOCUMENT_ROOT"]."/RecordsOfficer/Manifest/manifestList.php";
		?>
      	</div>	
    </div>
</div>

</div>
</div>