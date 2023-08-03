<?php
include($_SERVER['DOCUMENT_ROOT']."/config.php");
if(session_status() == PHP_SESSION_NONE){session_start();}
if (isset($_POST['btnSaveProperty'])){
	  $ItemName = mysqli_real_escape_string($conn, $_POST["ItemName"]);
    $quantity = mysqli_real_escape_string($conn, $_POST["quantity"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);

        $sql = "INSERT INTO tbl_property  (
                      name,
                      quantity,
                      description,
                      Inmate_ID
                      ) VALUES (
                      '$ItemName',
                      '$quantity',
                      '$description',
                      '".$_SESSION['Temp_InmateID']."')";
                      if ($conn->query($sql) === TRUE) { ?>
                        <script type="text/javascript">
                          //alert("Property detail successfully added.");
                          location ="/main.php"
                        </script>
                      <?php
                      } else {
                          echo "Error: " . $sql . "<br>" . $conn->error;
                      }
}



?>
<div class="panel panel-default" id="">
	<div class="panel-heading" id="panel">
		<div class="media">
			<div class="media-left">
				<img src="/images/user accounts.png" class="media-object" style="width:60px">
			</div>
			<div class="media-body">
				<h3>Property of Inmates</h3>
			</div>

		</div>
	</div>
<div class="panel panel-body" id="innerBodyPanel">
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
		<!-- <legend style="font-weight: 900; color: #5050FF">Search</legend> -->
    <div class="row form-group">
        <div class="col-sm-9">
        	<label for="ItemName">Item Name :</label>
        	<input type="text" class="form-control" id="ItemName" name="ItemName">
        	
        </div>
        <div class="col-sm-3">
        	<label for="quantity">Quantity :</label>
        	<input type="number" class="form-control" id="quantity" name="quantity">
        </div>
        
    </div>
    <div class="row form-group">
        <div class="col-sm-12">
            <label for="description">Description :</label>
            <textarea class="form-control" name="description" style="resize: none;"></textarea>
        </div>
    </div>
    <div class="row">  
      
      		<div class="col-sm-8"></div>
      		<div class="col-sm-2">
      			<input type="submit" class="btn btn-success btn-block" name="btnSaveProperty" value="Save" />
      		</div>
      		<div class="col-sm-2">
      			<a   class="btn btn-warning btn-block" onclick="showPropertyList()">
	              <span class="glyphicon glyphicon-close"></span>
	                Cancel
	            </a>
      		</div>
      
    </div> 

	
	

</form>
</div>
</div>

