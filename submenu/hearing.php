
<div class="panel panel-default" id="">
	<div class="panel-heading" id="panel">
		<div class="media">
			<div class="media-left">
				<img src="/images/user accounts.png" class="media-object" style="width:60px">
			</div>
			<div class="media-body">
				
				<div class="col-sm-4">
					<h4>List of Inmate Hearing(s)</h4>
				</div>
				<div class="col-sm-3">
				<select class="form-control" name="filterHearing" id="filterHearing" onchange="ShowHearingGlobalSearch(this)">
					<option value="None">Filter Month here</option>
					<option value="All">All</option>
					<option value="January">January</option>
					<option value="February">February</option>
					<option value="March">March</option>
					<option value="April">April</option>
					<option value="May">May</option>
					<option value="June">June</option>
					<option value="July">July</option>
					<option value="August">August</option>
					<option value="September">September</option>
					<option value="October">October</option>
					<option value="November">November</option>
					<option value="December">December</option>
				</select>
				</div>
				<div class="col-sm-3">
					<select class="form-control" onchange="ShowHearingResolved(this)">
						<option value="All">All</option>
						<option value="1">Resolved</option>
						<option value="0">Unresolved</option>						
					</select>
				</div>
				<div class="col-sm-2"><a onclick="PrintHearingList()" class="btn btn-success btn-block">Print</a>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-body" id="">
			<table class="table table-hover table-filter">
				<tbody id="HearingGlobal_list">
					<?php include $_SERVER["DOCUMENT_ROOT"]."/config.php";
					$result = $conn->query("SELECT * FROM `tbl_hearingdetails` order by Inmate_ID");

					//display data on a table
					if (mysqli_num_rows($result) > 0) {

						while($row = $result->fetch_assoc()){ 
							$EID = $row["Inmate_ID"] + 1000;
							$result1 = $conn->query("SELECT id,lname,mname,fname,ReceivingJail FROM `tbl_inmate` where id=".$row["Inmate_ID"]);
							while($row1 = $result1->fetch_assoc()){
							$Name = ucwords($row1["lname"] . ' , ' . $row1["fname"] . ' ' . $row1["mname"]);
							$status = $row1['ReceivingJail'];
							}
							
							if ($status == 'Deceased' || $status == 'Transferred' || $status == 'Released') {

           					} else {
							?>

					<tr data-status="pagado" class='alert alert-info'>
						<td>
						<div class="media">
							<div class="media" id='<?php echo $row['id']; ?>'>
								<!-- <span class="media-meta pull-right" style="padding-right: 10px; text-align: right;">
									<a class="btn btn-danger" href="/account/delete.php?eid=<?php echo $row["id"]; ?>">
										<span class="glyphicon glyphicon-trash"></span>
									</a>
									<a class="btn btn-primary" id="<?php echo $row["ID"]; ?>" onclick="updt(this)">
										<span class="glyphicon glyphicon-pencil"></span>
									</a>
								</span> -->
								<span class="title" style="font-weight: 900;">
									<?php
										echo strtoupper($row['HearingTitle'])." <small>(" . $Name ." - ".$EID.")</small>";
									?>
								</span>
								<?php
								if ($row['status'] == 'Resolved') {
										$CaseStat = 'Resolved'; ?>
										<span class="label label-success"><?php echo $CaseStat; ?></span>
										<?php } else {
										$CaseStat = 'Unresolved'; ?>
										<span class="label label-warning"><?php echo $CaseStat; ?></span>
								<?php } ?>
								<p class="summary"><?php echo strtoupper(date("F j, Y",strtotime($row['HearingDate']))); ?></p>
							</div>
						</div>
						</td>
					</tr><?php }// end of else
						}
					} else {
						echo '<tr><td>No Hearing found.</tr>';
					}
					?>
				</tbody>
			</table>
	</div>
</div>

