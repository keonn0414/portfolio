
<div class="panel panel-default" id="">
	<div class="panel-heading" id="panel">
		<div class="media">
			<div class="media-left">
				<img src="/images/user accounts.png" class="media-object" style="width:60px">
			</div>
			<div class="media-body">
				<h3>List of Deceased Inmate</h3>
				<span class="pull-right"><a onclick="PrintDeceasedList()" class="btn btn-success">Print</a></span>
			</div>
		</div>
	</div>
	<div class="panel panel-body" id="">
			<table class="table table-hover table-filter">
				<tbody id="proposal_list">
					<?php include $_SERVER["DOCUMENT_ROOT"]."/config.php";
					$result = $conn->query("SELECT * FROM `tbl_inmate` where ReceivingJail='Deceased'");

					//display data on a table
					if (mysqli_num_rows($result) > 0) {

						while($row = $result->fetch_assoc()){ 
							$EID = $row["id"] + 1000;
							// $result1 = $conn->query("SELECT id,lname,mname,fname FROM `tbl_inmate` where id=".$row["Inmate_ID"]);
							// while($row1 = $result1->fetch_assoc()){
							$Name = ucwords($row["lname"] . ' , ' . $row["fname"] . ' ' . $row["mname"]);
							// }
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
								<span class="media-meta pull-right"><?php echo $row['DeceasedDate']; ?></span>
								<p class="title" style="font-weight: 900;">
									<?php
										echo strtoupper($Name)." <small>(".$EID.")</small>";
									?>
								</p>

								<!-- <p class="summary"><?php echo $row['findings']; ?></p> -->
							</div>
						</div>
						</td>
					</tr><?php
						}
					} else {
						echo '<tr><td>No Deceased found.</tr>';
					}
					?>
				</tbody>
			</table>
	</div>
</div>

