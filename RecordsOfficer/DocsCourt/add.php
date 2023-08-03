
<div class="panel panel-default" id="">
	<div class="panel-heading" id="panel">
		<div class="media">
			<div class="media-left">
				<img src="/images/user accounts.png" class="media-object" style="width:60px">
			</div>
			<div class="media-body">
				<h3>Upload Court Documents</h3>
			</div>

		</div>
	</div>
<div class="panel panel-body" id="innerBodyPanel">
	<form id="accountSearch" name="accountSeach">
		<legend style="font-weight: 900; color: #5050FF">Search</legend>
    <div class="col-sm-12">
        <div class="col-sm-4">
          <div class="form-group">
              <label for="fname">Date of Report:</label>
              <input type="text" class="form-control" id="date_of_report" name="date_of_report" placeholder="Date of Report" >
            </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
              <label for="fname">Prisoner #:</label>
              <input type="text" class="form-control" id="prisoner_number" name="prisoner_number" placeholder="Prisoner Number" >
            </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
              <label for="fname">Case #:</label>
              <input type="text" class="form-control" id="case_number" name="case_number" placeholder="Case Number" >
            </div>
        </div>
      </div>

      <div class="col-sm-12">
          <div class="col-sm-4">
          <div class="form-group">
              <label for="lname">Family Name:</label>
              <input type="text" class="form-control" id="lname" name="lname" placeholder="Family Name">
            </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
              <label for="fname">First Name:</label>
              <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" >
            </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="mname">Middle Name:</label>
            <input type="text" class="form-control" id="mname" name="mname" placeholder="Middle Name" >
            </div>
        </div>
      </div>

      <div class="col-sm-12">
      		<div class="col-sm-8"></div>
      		<div class="col-sm-2">
      			<a  name="btnsubmit" class="btn btn-success btn-block" >
	              <span class="glyphicon glyphicon-plus"></span>
	                Add
	            </a>
      		</div>
      		<div class="col-sm-2">
      			<a  name="btnsubmit" class="btn btn-danger btn-block" onclick="showDocsFromCourt()">
	              <span class="glyphicon glyphicon-close"></span>
	                Cancel
	            </a>
      		</div>
      </div>

	</form>
	<div id="innerLowerBodyPanel" style="display: none;">

	</div>

<script type="text/javascript">
	document.getElementById("add").onclick = function() {
		$("#innerBodyPanel").load("/account/create.php");
		this.style.display = "none";
	};

	document.getElementById("srchSubmit").onclick = function(){
		var data = "eid="+document.getElementById("eid").value+"&name="+document.getElementById("name").value+"&position="+document.getElementById("position").value;
		$("#innerLowerBodyPanel").load("/account/view.php?"+data);
		document.getElementById("innerLowerBodyPanel").style.display = "initial";
	};
</script>
</div>
</div>

<?php /*
<head>
	<title></title>
	<link rel="stylesheet" href="/css/bootstrap.min.css">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/bootstrap-select.css">
   <script src="/js/bootstrap-select.js"></script>
</head>
<body class="container">
<div class="row">
	<div class="col-sm-6">
		<div class="form-group">
			<label for="lname">Lastname</label>
			<input type="text" name="lname" class="form-control" placeholder="Lastname" />
			<label for="fname">Firstname</label>
			<input type="text" name="fname" class="form-control" placeholder="Firstname" />
			<label for="mname">Middlename</label>
			<input type="text" name="mname" class="form-control" placeholder="Firstname" />
			<div class="row">
				<div class="col-sm-6">

					<div class="form-group">
							<label for="gender">Gender</label>
					<!-- </div> -->
					<!-- <div class="col-sm-12"> -->
						<select class="selectpicker show-tick form-control" title="Choose Gender">
			                <option value="criminal">Female</option>
			                <option value="civil">Male</option>
						</select>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="Nationality">Nationality</label>
					<!-- </div>
					<div class="col-sm-12"> -->
						<select class="selectpicker show-tick form-control" data-size="8" data-live-search="true" title="Choose Nationality">

		                <?php
							include($_SERVER['DOCUMENT_ROOT']."/config.php");
							$sql = "SELECT nationality FROM tbl_countries order by nationality";
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
						    // output data of each row
						    while($row = $result->fetch_assoc()) {
						        echo '<option value="'.$row['nationality'].'">'.$row['nationality'].'</option>';
						    }
						    $conn->close();
							}

						?>
						</select>
					</	div>
				</div>
			</div>

			<!-- <div class="row">
				<div class="col-sm-6"></div>
				<div class="col-sm-6"></div>
			</div>
			<div class="row">
			<div class="col-sm-6">

			</div>
			<div class="col-sm-6">

			</div>
			</div> -->

		</div>
			<button class="btn btn-block btn-success"><span class="glyphicon glyphicon-save"></span> Add</button>
	</div>
	<div class="col-sm-6">

	</div>
</div>

*/
?>
