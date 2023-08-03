<?php 

?>
<div class="panel panel-default" id="">
	<div class="panel-heading" id="panel">
		<div class="media">
			<div class="media-left">
				<img src="/images/user accounts.png" class="media-object" style="width:60px">
			</div>
			<div class="media-body">
				<div class="col-sm-4">
					<h3>List of Inmate Case(s)</h3>
				</div>
				<div class="col-sm-3">
				<select class="form-control" name="Casefilter" id="Casefilter" onchange="ShowCaseGlobalSearch(this)">
					<?php
                    include($_SERVER['DOCUMENT_ROOT']."/config.php");
                    $sql = "SELECT id,name FROM tbl_case order by name";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                      // output data of each row
                    		echo '<option value="All">All</option>';
                      while($row = $result->fetch_assoc()) {
                      	  	if(isset($_GET) && !empty($_GET)) {
									$CaseSearch = $_GET['case'];
									if ($CaseSearch == $row['id']) {
										echo '<option value="'.$row['id'].'" selected>'.$row['name'].'</option>';
									} else {
										echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
									}
							} else {
                          		echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                      		}
                      }
                      $conn->close();
                    } ?>
				</select>
				</div>
				<div class="col-sm-3">
					<select class="form-control" onchange="ShowCaseResolved(this)">
						<option value="All">All</option>
						<option value="1">Resolved</option>
						<option value="0">Unresolved</option>						
					</select>
				</div>
				<div class="col-sm-2"><a onclick="PrintCaseList()" class="btn btn-success btn-block">Print</a>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-body" id="">
			<table class="table table-hover table-filter">
				<tbody id="caseGlobal_list">
					<?php include $_SERVER["DOCUMENT_ROOT"]."/config.php";
					if(isset($_GET) && !empty($_GET)) {
							$result = $conn->query("SELECT * FROM `tbl_case` where id='".$_GET['case']."'");
							while($row = $result->fetch_assoc()) { 
								$CaseName = $row['name'];
							}
							$result = $conn->query("SELECT * FROM `tbl_casedetails` where Offenses='".$CaseName."' order by Offenses ASC");
				    } else {
							$result = $conn->query("SELECT * FROM `tbl_casedetails` order by Offenses ASC");
					}
					//display data on a table
					if (mysqli_num_rows($result) > 0) {

						while($row = $result->fetch_assoc()){ 
							$result12 = mysqli_query($conn,"SELECT * FROM `tbl_case` where `name`='".$row['Offenses']."'");
										if (!$result12 || mysqli_num_rows($result12) == 0) {
												$_SESSION['CaseInfo1'] = "No Information";	
										} else {
											while($row12 = mysqli_fetch_assoc($result12)){
												if (empty($row12['CaseInfo'])) {
													$_SESSION['CaseInfo1'] = "No Information";
												} else{
													$_SESSION['CaseInfo1'] = $row12['CaseInfo'];
												}

												
											}
										}
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
										echo strtoupper($row['Offenses'])." <small>(" . $Name ." - ".$EID.")</small>";
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
								<p class="summary"><?php echo $row['caseNo']; ?>
								<span> - 
								<?php
								
								echo $_SESSION['CaseInfo1'];
								?>
								</span></p>
							</div>
						</div>
						</td>
					</tr><?php
							} // end of else
						}
					} else {
						echo '<tr><td>No Case found.</tr>';
					}
					?>
				</tbody>
			</table>
	</div>
</div>

