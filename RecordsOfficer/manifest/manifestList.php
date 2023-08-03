<table class="table table-hover table-filter">
	<tbody id="proposal_list">
		<?php
		
		include $_SERVER["DOCUMENT_ROOT"]."/config.php";
		$result = mysqli_query($conn,"SELECT * FROM `tbl_manifest` where Inmate_ID=".$_SESSION['Temp_InmateID']);
		
        		if (!$result || mysqli_num_rows($result) == 0) {
						echo '<tr><td><legend style="font-weight: 900; color: #f2190e">No Record of Manifest(s) found.</legend></td></tr>';	
				} else {
					while($row = mysqli_fetch_assoc($result)){ 
							$result1 = mysqli_query($conn,"SELECT * FROM `tbl_casedetails` where id='".$row['CaseName']."'");
							while($row1 = mysqli_fetch_assoc($result1)){ 
									$CaseName = $row1['Offenses'];
									}
						?>
						<tr data-status="pagado" class='alert alert-info'>
							<td>
								<div class="media">
									<div class="media" id='<?php echo $row['id']; ?>'>
										<span class="media-meta pull-right" style="padding-right: 10px; text-align: right;">
										<a class="btn btn-default" id="<?php echo $row["id"]; ?>" onclick="PrintManifest(this)">
										<span class="glyphicon glyphicon-print"></span>
										</a>
										<a class="btn btn-danger" href="/RecordsOfficer/Manifest/del.php?id=<?php echo $row["id"]; ?>">
											              <span class="glyphicon glyphicon-trash"></span>
											            </a>
										</span>
										<p class="title" style="font-weight: 900;">
										<?php echo strtoupper($CaseName); ?>
										</p>
										<p class="summary"><?php echo $row['CaseNo']; ?><small> Date : <i><?php echo $row['DateSign']; ?></i></small></p>
									</div>
								 </div>
							</td>
						</tr><?php
							

					}
				} ?>
	</tbody>
</table>