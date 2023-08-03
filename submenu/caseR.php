<?php 
include $_SERVER["DOCUMENT_ROOT"]."/config.php";
if(session_status() == PHP_SESSION_NONE){session_start();}
$StatusFilter = $_GET['id'];
//$CaseFilter = $_GET['C'];

	if($_GET['id']=='All'){

	} else {
			$result = $conn->query("SELECT * FROM `tbl_case` where id=".$_GET['id']);
			
			if (mysqli_num_rows($result) > 0) {

				while($row = $result->fetch_assoc()){ 
					$_SESSION['caseName'] = $row["name"];

				}
			}
	}
					if($_GET['id']=='All'){
						$result = $conn->query("SELECT * FROM `tbl_casedetails` order by Offenses ASC");
					} else {
						if ($StatusFilter == '1') {
							$result = $conn->query("SELECT * FROM `tbl_casedetails` where status='Resolved' order by Offenses ASC");
						} else {
							$result = $conn->query("SELECT * FROM `tbl_casedetails` where status='Unresolved' order by Offenses ASC");
						}
					
					}
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
								echo $_SESSION['CaseInfo1'];
								?>
								</span></p>
							</div>
						</div>
						</td>
					</tr><?php
						}
					}
					} else {
						echo '<tr><td>No Case found.</tr>';
					}
					?>