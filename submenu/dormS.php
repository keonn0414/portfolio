<?php 
include $_SERVER["DOCUMENT_ROOT"]."/config.php";
if(session_status() == PHP_SESSION_NONE){session_start();}
// echo $_GET['id'];
	// if($_GET['id']=='All'){

	// } else {
	// 		$result = $conn->query("SELECT * FROM `tbl_cell` where id=".$_GET['id']);
			
	// 		if (mysqli_num_rows($result) > 0) {

	// 			while($row = $result->fetch_assoc()){ 
	// 				$_SESSION['caseName'] = $row["name"];

	// 			}
	// 		}
	// }
					if($_GET['id']=='All'){
						$result = $conn->query("SELECT * FROM `tbl_cell` order by prison_no");
					} else {
					$result = $conn->query("SELECT * FROM `tbl_cell` where prison_no='".$_GET['id']."'");
					}
					//display data on a table
					if (mysqli_num_rows($result) > 0) {
							while($row = $result->fetch_assoc()){ 
							$status = $row['prison_no'];
							if ($status == 'Not Registered' || $status == 'Transferred' || $status == 'Released' || $status == 'Deceased') {

           					} else {

							$result1 = $conn->query("SELECT id,lname,mname,fname,ReceivingJail,nationality FROM `tbl_inmate` where ReceivingJail='".$row["prison_no"]."'");
							if (mysqli_num_rows($result1) > 0) {
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
						} // end of while row1
					} //end of if 
					else {
						echo '<tr><td>No Dorm found.</tr>';
					}
					} //end of else not registered
					} //end of while row
				} else {
						echo '<tr><td>No Dorm found.</tr>';
				}
					?>