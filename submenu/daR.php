<?php 
include $_SERVER["DOCUMENT_ROOT"]."/config.php";
if(session_status() == PHP_SESSION_NONE){session_start();}
$StatusFilter = $_GET['id'];
//$CaseFilter = $_GET['C'];

	
					if($_GET['id']=='All'){
						$result = $conn->query("SELECT * FROM `tbl_dadetails` order by dafrom ASC");
					} else {
						if ($StatusFilter == '1') {
							$result = $conn->query("SELECT * FROM `tbl_dadetails` where status='Resolved' order by dafrom ASC");
						} else {
							$result = $conn->query("SELECT * FROM `tbl_dadetails` where status='Unresolved' order by dafrom ASC");
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
							$result2 = $conn->query("SELECT * FROM `tbl_da` where id=".$row["da"]);
							
								if (mysqli_num_rows($result2) == 0) {
										$NameDA = 'Unknown';
										
								} else {
										while($row2 = $result2->fetch_assoc()){
										$NameDA = ucwords($row2["name"]);
										}
								}

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
										echo $NameDA." <small>(" . $Name ." - ".$EID.")</small>";
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
								<p class="summary"><?php echo $row['dafrom'].' - '.$row['dato']; ?></p>
							</div>
						</div>
						</td>
					</tr><?php
							}//end of else
						}
					} else {
						echo '<tr><td>No Disciplinary Action found.</tr>';
					}
					?>