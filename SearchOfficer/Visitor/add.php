
<form name="visitorInfo" id="visitorInfo" action="SearchOfficer/Visitor/save.php" method="post">
<div class="panel panel-default" id="">
	<div class="panel-heading" id="panel">
		<div class="media">
			<div class="media-left">
				<img src="/images/user accounts.png" class="media-object" style="width:60px">
			</div>
			<div class="media-body">
				<h3>Visitor Information</h3>
			</div>

		</div>
	</div>
	<div class="panel panel-body" id="innerBodyPanel">
		<div class="col-sm-9">
			<legend style="font-weight: 900; color: #5050FF">Visitor Property Receipt</legend>
		</div>

		<div class="panel panel-body">
		<div class="row">
		<div class="col-sm-12">
			<div class="col-sm-4">
				<div class="form-group">
					<label for="bday">Date:</label>
					<input type="date" name="date_1" id="date_1" class="form-control" placeholder="Date (mm/dd/yyy)">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="bday">Time-in:</label>
					<input type="date" name="time_in" id="time_in" class="form-control" placeholder="Time-in">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="bday">Time-out:</label>
					<input type="date" name="time_out" id="time_out" class="form-control" placeholder="Time-out">
				</div>
			</div>
		</div>

		<div class="col-sm-12">
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<div class="form-group">
						<label for="lname">Last Name:</label>
						<input type="text" class="form-control" id="lname" name="lname" placeholder="Family Name" >
					</div>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<div class="form-group">
						<label for="fname">First Name:</label>
						<input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" >
					</div>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<div class="form-group">
						<label for="mname">Middle Name:</label>
						<input type="text" class="form-control" id="mname" name="mname" placeholder="Middle Name" >
					</div>
				</div>
			</div>

			<div class="col-sm-12">
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

					</div>
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<div class="form-group">
							<label for="fname">Prisoner ID to Visit:</label>
							<input type="text" class="form-control" id="prison_no" name="prison_no" placeholder="Prisoner Number" >
						</div>
					</div>

				</div>


			<div class="row">
				<div class="col-sm-12">
					<div class="col-sm-2">
					</div>
					<div class="col-sm-8">
						<table class="table table-hover table-bordered" id="add_item_row">
							<tr>
								<th style="width: 30%;">Item Brought in</th>
								<th style="width: 70%;">Description</th>
							</tr>
						</table>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-2 pull-right">
					<a class="btn btn-primary btn-block" onclick="add_item()"><span class="glyphicon glyphicon-plus"></span>Add Row</a>
				</div>
			</div>

			<div class="row">
				<br>
					<div class="form-group">
									<div class="col-sm-12"></div>
									<div class="col-sm-4">

									</div>
									<div class="col-sm-2">
										<input type="submit" class="btn btn-success btn-block" name="btnSave" value="Save" />
									</div>
									<div class="col-sm-2">
										<a class="btn btn-warning btn-block" onclick="showVisitor()"><span class="glyphicon glyphicon-close"></span> Cancel
												</a>
									</div>
					</div>
			</div>

		</div>
	</div>
	</div>
</div>
</form>
