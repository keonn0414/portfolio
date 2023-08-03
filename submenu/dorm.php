
<div class="panel panel-default" id="">
	<div class="panel-heading" id="panel">
		<div class="media">
			<div class="media-left">
				<img src="/images/user accounts.png" class="media-object" style="width:60px">
			</div>
			<div class="media-body">
				<div class="col-sm-6">
					<h3>List of Inmate Dorm</h3>
				</div>
				<div class="col-sm-6">
					<select class="form-control" name="filter" id="filter" onchange="ShowdormSearch(this)">
					<?php include($_SERVER['DOCUMENT_ROOT']."/config.php");
                    $sql = "SELECT * FROM tbl_cell order by prison_no";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                      // output data of each row
                    		echo '<option value="All">All</option>';
                      while($row = $result->fetch_assoc()) {
									$status = $row['prison_no'];
									if ($status == 'Not Registered' || $status == 'Transferred' || $status == 'Released' || $status == 'Deceased') {

           							} else {
										echo '<option value="'.$row['prison_no'].'">'.$row['prison_no'].'</option>';
									}
                      }
                      $conn->close();
                    }
                    ?>
                	</select>
				</div>
					
			</div>
		</div>
	</div>
	<div class="panel panel-body" id="">
			<table class="table table-hover table-filter">
				<tbody id="dorm_list">
					<?php include $_SERVER["DOCUMENT_ROOT"]."/config.php";
					$result = $conn->query("SELECT * FROM `tbl_cell` order by prison_no");

					//display data on a table
					if (mysqli_num_rows($result) > 0) {

						while($row = $result->fetch_assoc()){ 
							$status = $row['prison_no'];
							if ($status == 'Not Registered' || $status == 'Transferred' || $status == 'Released' || $status == 'Deceased') {

           					} else {

							$result1 = $conn->query("SELECT id,lname,mname,fname,ReceivingJail,nationality FROM `tbl_inmate` where ReceivingJail='".$row["prison_no"]."'");
									while($row1 = $result1->fetch_assoc()){
									$EID = $row1["id"] + 1000;
									$Name = strtoupper($row1["lname"] . ' , ' . $row1["fname"] . ' ' . $row1["mname"]);
									$nationality = strtoupper($row1['nationality']);
									

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
								<p class="title" style="font-weight: 900;">
									<?php
										echo strtoupper($Name)." (".$EID.")";
									?>
								</p>
								<p class="summary"><?php echo $nationality . " - " . $status; ?></p>
							</div>
						</div>
						</td>
					</tr><?php 
								} //end of while getting inmate
							} // end of else
						}
					} else {
						echo '<tr><td>No Dorm found.</tr>';
					}
					?>
				</tbody>
			</table>
	</div>
</div>

