<?php 
include $_SERVER["DOCUMENT_ROOT"]."/config.php";
if(session_status() == PHP_SESSION_NONE){session_start();}
					$StatusFilter = $_GET['id'];
					if($_GET['id']=='All'){
						$result = $conn->query("SELECT * FROM `tbl_hearingdetails` order by Inmate_ID");
					} else {
						if ($StatusFilter == '1') {
							$result = $conn->query("SELECT * FROM `tbl_hearingdetails` where status='Resolved' order by Inmate_ID");
						} else {
							$result = $conn->query("SELECT * FROM `tbl_hearingdetails` where status='Unresolved' order by Inmate_ID");
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