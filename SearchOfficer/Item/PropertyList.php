<table class="table table-hover table-filter">
	<tbody id="proposal_list">
		<?php
		
		include $_SERVER["DOCUMENT_ROOT"]."/config.php";
		$result = mysqli_query($conn,"SELECT * FROM `tbl_property` where Inmate_ID=".$_SESSION['Temp_InmateID']);
		 
        		if (!$result || mysqli_num_rows($result) == 0) {
						echo '<tr><td><legend style="font-weight: 900; color: #f2190e">No Record of Property(s) found.</legend></td></tr>';	
				} else {
					while($row = mysqli_fetch_assoc($result)){ ?>
						<tr data-status="pagado" class='alert alert-info'>
							<td>
								<div class="media">
									<div class="media" id='<?php echo $row['id']; ?>'>
										<span class="media-meta pull-right" style="padding-right: 10px; text-align: right;">
										<!-- <a class="btn btn-default" id="<?php echo $row["id"]; ?>" onclick="showEditHearingDetail(this)">
										<span class="glyphicon glyphicon-print"></span>
										</a> -->
										<a class="btn btn-danger" href="/SearchOfficer/Item/del.php?id=<?php echo $row["id"]; ?>">
											              <span class="glyphicon glyphicon-trash"></span>
											            </a>
										</span>
										<p class="title" style="font-weight: 900;">
										<?php echo strtoupper($row['name']); ?>
										</p>
										<small class="summary"><?php echo $row['description']; ?></small>
									</div>
								 </div>
							</td>
						</tr><?php
					}
				} ?>
	</tbody>
</table>