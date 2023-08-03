
<?php 
include $_SERVER["DOCUMENT_ROOT"]."/head.php"; 
include($_SERVER['DOCUMENT_ROOT']."/config.php");
if(session_status() == PHP_SESSION_NONE){session_start();}
if (!empty($_POST)){

                      //$result = $conn->query($sql);
try {
                $msg= upload();  //this will upload your image
                ?>
                    <script type="text/javascript">
                        alert("Record Successfully Saved.");
                        location ="/main.php"
                    </script>
                <?php
              }
                catch(Exception $e) {
                echo $e->getMessage();
                echo 'Sorry, could not upload file';
                }
}
function upload() {
   include($_SERVER['DOCUMENT_ROOT']."/config.php");
    $maxsize = 10000000; //set to approx 10 MB

    //check associated error code
    if($_FILES['userfile']['error']==UPLOAD_ERR_OK) {

        //check whether file is uploaded with HTTP POST
        if(is_uploaded_file($_FILES['userfile']['tmp_name'])) {

            //checks size of uploaded image on server side
            if( $_FILES['userfile']['size'] < $maxsize) {

               //checks whether uploaded file is of image type
              //if(strpos(mime_content_type($_FILES['userfile']['tmp_name']),"image")===0) {
                 $finfo = finfo_open(FILEINFO_MIME_TYPE);
                if(strpos(finfo_file($finfo, $_FILES['userfile']['tmp_name']),"image")===0) {

                    // prepare the image for insertion
                    $imgData =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));
                    // $NoOfConviction = mysqli_real_escape_string($conn, $_POST["NoOfConviction"]);
                    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
                    $mname = mysqli_real_escape_string($conn, $_POST["mname"]);
                    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
                    $alias = mysqli_real_escape_string($conn, $_POST["alias"]);
                    $bday = mysqli_real_escape_string($conn, $_POST["bday"]);
                    $bplace = mysqli_real_escape_string($conn, $_POST["CivilStatus"]);
                    $nationality = mysqli_real_escape_string($conn, $_POST["nationality"]);
                    $religion = mysqli_real_escape_string($conn, $_POST["religion"]);
                    $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
                    $Weight = mysqli_real_escape_string($conn, $_POST["Weight"]);
                    $Height = mysqli_real_escape_string($conn, $_POST["Height"]);
                    $Hair = mysqli_real_escape_string($conn, $_POST["Hair"]);
                    $EyeColor = mysqli_real_escape_string($conn, $_POST["EyeColor"]);
                    $Complexion = mysqli_real_escape_string($conn, $_POST["Complexion"]);
                    $BertillionMark = mysqli_real_escape_string($conn, $_POST["BertillionMark"]);
                    $father = mysqli_real_escape_string($conn, $_POST["father"]);
                    $mother = mysqli_real_escape_string($conn, $_POST["mother"]);
                    $partner = mysqli_real_escape_string($conn, $_POST["partner"]);
                    $childNo = mysqli_real_escape_string($conn, $_POST["childNo"]);
                    $kin = mysqli_real_escape_string($conn, $_POST["kin"]);
                    $address = mysqli_real_escape_string($conn, $_POST["address"]);
                    $ReceivedDate = mysqli_real_escape_string($conn, $_POST["ReceivedDate"]);
                    $TransferDate = mysqli_real_escape_string($conn, $_POST["TransferDate"]);
                    $ReceivingJail = mysqli_real_escape_string($conn, $_POST["ReceivingJail"]);
                    $PreparedBy = mysqli_real_escape_string($conn, $_POST["PreparedBy"]);
                    $VerifiedBy = mysqli_real_escape_string($conn, $_POST["VerifiedBy"]);
                    

                      $sql = "INSERT INTO tbl_inmate  (
                      lname,
                      mname,
                      fname,
                      alias,
                      bday,
                      CivilStatus,
                      nationality,
                      religion,
                      gender,
                      WeightV,
                      HeightV,
                      Hair,
                      EyeColor,
                      Complexion,
                      BertillionMark,
                      father,
                      mother,
                      partner,
                      childNo,
                      Nearestkin,
                      AddressV,
                      ReceivedDate,
                      TransferDate,
                      ReceivingJail,
                      PreparedBy,
                      VerifiedBy,
                      NoOfConviction,
                      img
                      ) VALUES (
                      '$lname',
                      '$mname',
                      '$fname',
                      '$alias',
                      '$bday',
                      '$bplace',
                      '$nationality',
                      '$religion',
                      '$gender',
                      '$Weight',
                      '$Height',
                      '$Hair',
                      '$EyeColor',
                      '$Complexion',
                      '$BertillionMark',
                      '$father',
                      '$mother',
                      '$partner',
                      '$childNo',
                      '$kin',
                      '$address',
                      '$ReceivedDate',
                      '$TransferDate',
                      '$ReceivingJail',
                      '$PreparedBy',
                      '$VerifiedBy',
                      '1',
                      '{$imgData}')";
                      if ($conn->query($sql) === TRUE) { ?>
                        <script type="text/javascript">
                          //Alert("Inmate record successfully saved.");
                          location = "main.php?r=AddInmate"
                        </script>
                      <?php
                      } else {
                          echo "Error: " . $sql . "<br>" . $conn->error;
                      }


            //         $sql = "INSERT INTO tbl_item
            // (name, category,img)
            // VALUES ('".
            //   mysqli_real_escape_string($conn,$_POST['TxtItem'])."',
            // '". mysqli_real_escape_string($conn,$_POST['CmbCat']). "',
            // '{$imgData}')";
            // $result = $conn->query($sql);
            // $sql = "INSERT INTO tbl_logs
            // (name, category,img,event,user,`date`)
            // VALUES ('".
            //   mysqli_real_escape_string($conn,$_POST['TxtItem'])."',
            // '". mysqli_real_escape_string($conn,$_POST['CmbCat']). "',
            // '{$imgData}','Add items','".$_SESSION['id_login']."','".date("Y-m-d h:i:sa")."')";
            // $result = $conn->query($sql);
            // $conn->close();
                    // insert the image
                    // mysqli_query($conn,$sql) or die("Error in Query: " . mysqli_error($conn ));
                    //$msg='<p>Image successfully saved in database with id ='. mysqli_insert_id($conn ).' </p>';
                }
                else
                    $msg="<p>Uploaded file is not an image.</p>";
            }
             else {
                // if the file is not less than the maximum allowed, print an error
                $msg='<div>File exceeds the Maximum File limit</div>
                <div>Maximum File limit is '.$maxsize.' bytes</div>
                <div>File '.$_FILES['userfile']['name'].' is '.$_FILES['userfile']['size'].
                ' bytes</div><hr />';
                }
        }
        else
            $msg="File not uploaded successfully.";

    }
    else {
        $msg= file_upload_error_message($_FILES['userfile']['error']);
    }
    //return $msg;
}
// Function to return error message based on error code

function file_upload_error_message($error_code) {
    switch ($error_code) {
        case UPLOAD_ERR_INI_SIZE:
            return 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
        case UPLOAD_ERR_FORM_SIZE:
            return 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
        case UPLOAD_ERR_PARTIAL:
            return 'The uploaded file was only partially uploaded';
        case UPLOAD_ERR_NO_FILE:
            return 'No file was uploaded';
        case UPLOAD_ERR_NO_TMP_DIR:
            return 'Missing a temporary folder';
        case UPLOAD_ERR_CANT_WRITE:
            return 'Failed to write file to disk';
        case UPLOAD_ERR_EXTENSION:
            return 'File upload stopped by extension';
        default:
            return 'Unknown upload error';
    }
}
?>

<!--<form  role="form"  method="POST" action="" enctype="multipart/form-data" >
-->

<!-- <style type="text/css">
  .body{
                font-family: mainFont;
                background-image: linear-gradient(to top, #a8c9ea 0%, white 100%);
            }
</style> -->
<!-- <div class="row">sdadasdasd</div> -->
<form class="" name="inmateInfo" id="inmateInfo" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
<div class="panel panel-default" style="margin-bottom: 30px;">
  <div class="panel-heading" id="panel">
    <div class="media">
      <div class="media-left">
        <img src="/images/inmate-info-icon.png" class="media-object" style="width:60px;">

      </div>

      <div class="media-body">
            <div class="col-sm-2 pull-right">
                  <div class="row">
                        <div class="col-sm-6">
                              
                        </div>
                        <div class="col-sm-6" >
                              <div class="row">
                              <a href="/main.php" class="btn btn-warning btn-block">Cancel</a>
                              </div>
                        </div>
                  </div>
                  
            </div>
          <h3>Inmate Registration</h3>

      </div>
    </div>

  </div>
  <div class="panel panel-body">
    <div class="row">
        <div class="col-sm-7"></div>
        <div class="col-sm-2"><!-- <label for="NoOfConviction">No. of Conviction</label>--></div> 
        <div class="col-sm-3"><!-- <input type="text" class="form-control" id="NoOfConviction" name="NoOfConviction" placeholder="No. of Conviction" required> --></div>
    </div>
    <div class="row">

    <div class="col-sm-3" style="min-height: 250px;">
        <div class="row">
            <div class="col-sm-12">
                <center><label for="yess" class="Text-muted">Picture</label></center>
                <input type="file" name="userfile" id="userfile" onchange="readURL(this);" style="display:none;">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <center><img  class="" style="height:200px; width:200px;" onclick="sampl()" id="yess" name="yess" alt="Click here to upload picture" /></center>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <center><label id="attachement_label" class="Text-muted">Click box to upload picture.</label></center>
            </div>
        </div>
    </div>


    <div class="col-sm-9">
          <legend style="font-weight: 900; color: #5050FF;">Personal Details</legend>

          <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="lname">Last Name:</label>
                <input type="text" class="form-control" id="lname" name="lname"  required>
              </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="fname">First Name:</label>
                <input type="text" class="form-control" id="fname" name="fname"  required>
              </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="mname">Middle Name:</label>
                <input type="text" class="form-control" id="mname" name="mname"  required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="alias">Aliases:</label>
                <input type="text" class="form-control" id="alias" name="alias"  >
              </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="bday">Birthdate:</label>
                <input type="date" name="bday" id="bday" class="form-control" placeholder="Birthday (mm/dd/yyy)">
              </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="CivilStatus">Civil Status:</label>
                <!-- <input type="text" name="bplace" id="bplace" class="form-control" placeholder="Civil Status"> -->
                <select name="CivilStatus" id="CivilStatus" class="selectpicker show-tick form-control" data-size="8" title="Choose Civil Status here">
                      <option value="Single">Single</option>
                      <option value="Married">Married</option>
                      <option value="Divorced">Divorced</option>
                      <option value="Widowed">Widowed</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="nationality">Nationality:</label>
                <!-- <input type="text" class="form-control" name="nationality" id="nationality" placeholder="Nationality"> -->
                 <select name="nationality" id="nationality" class="selectpicker show-tick form-control" data-size="8" title="Choose nationality here" data-live-search="true">

                  <?php
                    include($_SERVER['DOCUMENT_ROOT']."/config.php");
                    $sql = "SELECT nationality FROM tbl_countries order by nationality";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                          echo '<option value="'.$row['nationality'].'">'.$row['nationality'].'</option>';
                      }
                      $conn->close();
                    } ?>
                </select> 
              </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="religion">Religion:</label>
                <!-- <input type="text" class="form-control" name="religion" id="religion" placeholder="Religion"> -->
                <select name="religion" id="religion" class="selectpicker show-tick form-control" data-size="8" title="Choose Religion here" data-live-search="true">
                      <option value="Roman Catholic">Roman Catholic</option>
                      <option value="Muslim/Islamic">Muslim/Islamic</option>
                      <option value="Buddhists">Buddhists</option>
                      <option value="Atheists">Atheists</option>
                      <option value="Protestants">Protestants</option>
                      <option value="El Shaddai">El Shaddai</option>
                      <option value="Church of the Nazarene">Church of the Nazarene</option>
                      <option value="Evangelical">Evangelical</option>
                      <option value="Ang Dating Daan">Ang Dating Daan</option>
                      <option value="Jehovah's Witnesses">Jehovah's Witnesses</option>
                      <option value="Aglipayan">Aglipayan</option>
                      <option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
                      <option value="Philippine Benevolent Missionary Association">Philippine Benevolent Missionary Association</option>
                </select>
              </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="gender">Sex:</label>
                <select name="gender" id="gender" class="selectpicker show-tick form-control" title="Choose sex here" required>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
            </div>
          </div>

    </div>  <!-- end of col-sm-9 -->
  </div> <!-- end of row -->
  <div class="row">
      <div class="col-sm-12">
          <legend style="font-weight: 900; color: #5050FF;">Supplementary Details</legend>
      </div>
  </div>
  <div class="row">
      <div class="col-sm-4">
              <div class="form-group">
                <label for="Weight">Weight</label>
                <input type="number" name="Weight" id="Weight" class="form-control" placeholder="Weight (kg)">
              </div>
      </div>
      <div class="col-sm-4">
              <div class="form-group">
                <label for="Height">Height</label>
                <input type="number" name="Height" id="Height" class="form-control" placeholder="Height (cm)">
              </div>
      </div>
      <div class="col-sm-4">
              <div class="form-group">
                <label for="Hair">Hair</label>
                <!-- <input type="text" name="Hair" id="Hair" class="form-control" placeholder="Hair"> -->
                <select name="Hair" id="Hair" class="selectpicker show-tick form-control" data-size="8" title="Choose Hair color here" data-live-search="true">
                      <option value="Blond">Blond</option>
                      <option value="Brown">Brown</option>
                      <option value="Red">Red</option>
                      <option value="Black">Black</option>
                      <option value="Gray">Gray</option>
                      <option value="White">White</option>
                </select>
              </div>
      </div>
  </div>
  <div class="row">
      <div class="col-sm-4">
              <div class="form-group">
                <label for="EyeColor">Color of the Eye</label>
                <!-- <input type="text" name="EyeColor" id="EyeColor" class="form-control" placeholder="Color of the Eye"> -->
                <select name="EyeColor" id="EyeColor" class="selectpicker show-tick form-control" data-size="8" title="Choose Eye color here" data-live-search="true">
                      <option value="Black">Black</option>
                      <option value="Brown">Brown</option>
                      <option value="Amber">Amber</option>
                      <option value="Blue">Blue</option>
                      <option value="Blue-Gray">Blue-Gray</option>
                      <option value="Green">Green</option>
                      <option value="Gray">Gray</option>
                      <option value="Hazel">Hazel</option>
                      <option value="Spectrum of colours">Spectrum of colours</option>
                      <option value="Violet">Violet</option>
                </select>
              </div>
      </div>
      <div class="col-sm-4">
              <div class="form-group">
                <label for="Complexion">Complexion</label>
                <!-- <input type="text" name="Complexion" id="Complexion" class="form-control" placeholder="Complexion"> -->
                <select name="Complexion" id="Complexion" class="selectpicker show-tick form-control" data-size="8" title="Choose Hair color here" data-live-search="true">
                      <option value="Light skin">Light skin</option>
                      <option value="Fair skin">Fair skin</option>
                      <option value="Medium skin">Medium skin</option>
                      <option value="Olive skin">Olive skin</option>
                      <option value="Tan brown">Tan brown</option>
                      <option value="Black brown">Black brown</option>
                </select>
              </div>
      </div>
      <div class="col-sm-4">
              <div class="form-group">
                <label for="BertillionMark">Bertillion Mark</label>
                <input type="text" name="BertillionMark" id="BertillionMark" class="form-control" >
              </div>
      </div>
  </div>
  <div class="row">
      <div class="col-sm-12">
          <legend style="font-weight: 900; color: #5050FF;">Family Details</legend>
      </div>
  </div>
  <div class="row">
      <div class="col-sm-6">
              <div class="form-group">
                <label for="father">Father:</label>
                <input type="text" class="form-control" id="father" name="father">
              </div>
      </div>

      <div class="col-sm-6">
              <div class="form-group">
                <label for="mother">Mother:</label>
                <input type="text" name="mother" id="mother" class="form-control">
              </div>
      </div>


  </div>
  <div class="row">
      <div class="col-sm-4">
              <div class="form-group">
                <label for="partner">Husband / Wife:</label>
                <input type="text" name="partner" id="partner" class="form-control">
              </div>
      </div>
      <div class="col-sm-4">
              <div class="form-group">
                <label for="childNo">No. of Children</label>
                <input type="number" name="childNo" id="childNo" class="form-control">
              </div>
      </div>
      <div class="col-sm-4">
              <div class="form-group">
                <label for="childNo">Nearest of Kin</label>
                <input type="text" name="kin" id="kin" class="form-control">
              </div>
      </div>
  </div>
  <div class="row">
      <div class="col-sm-12">
          <div class="form-group">
                <label for="childNo">Address</label>
                <textarea class="form-control" name="address" id="address" rows="5" style="resize: none;"></textarea>
          </div>
      </div>
  </div>
  <div class="row">
      <div class="col-sm-12">
          <legend style="font-weight: 900; color: #5050FF;">Case Details</legend>
      </div>
  </div>
  
  <div class="row">
      <div class="col-sm-4">
              <div class="form-group">
                <label for="ReceivedDate">Date Received:</label>
                <input type="date" name="ReceivedDate" id="ReceivedDate" class="form-control" placeholder="(mm/dd/yyyy)">
              </div>
      </div>
      <div class="col-sm-4">
              <div class="form-group">
                <label for="TransferDate">Date Transfer</label>
                <input type="date" name="TransferDate" id="TransferDate" class="form-control" placeholder="(mm/dd/yyyy)">
              </div>
      </div>
      <div class="col-sm-4">
              <div class="form-group">
                <label for="ReceivingJail">Receiving Jail</label>
                <!-- <input type="text" name="ReceivingJail" id="ReceivingJail" class="form-control" placeholder="Receiving Jail"> -->
                <select name="ReceivingJail" id="ReceivingJail" class="selectpicker show-tick form-control" data-size="8" title="Choose jail here" data-live-search="true">

                  <?php
                    include($_SERVER['DOCUMENT_ROOT']."/config.php");
                    $sql = "SELECT id,prison_no FROM tbl_cell order by prison_no";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                          if ($row['prison_no'] == 'Not Registered'){
                          echo '<option value="'.$row['prison_no'].'" selected>'.$row['prison_no'].'</option>';
                          } elseif ($row['prison_no'] == 'Transferred'  || $row['prison_no'] == 'Released') {} 
                          else {
                          echo '<option value="'.$row['prison_no'].'">'.$row['prison_no'].'</option>';
                          }
                      }
                      $conn->close();
                    } ?>
                </select>
              </div>
      </div>
  </div>
  <div class="row">
      <div class="col-sm-6">
              <div class="form-group">
                <label for="PreparedBy">Prepared By</label>
                <input type="text" name="PreparedBy" id="PreparedBy" class="form-control" >
              </div>
      </div>
      <div class="col-sm-6">
              <div class="form-group">
                <label for="VerifiedBy">Verified and Checked by</label>
                <input type="text" name="VerifiedBy" id="VerifiedBy" class="form-control" >
              </div>
      </div>
  </div>
  <div class="row">
      <div class="col-sm-12">
          <hr class="btn-muted">
      </div>
  </div>
  <div class="row">
      <div class="form-group">
              <div class="col-sm-8"></div>
              <div class="col-sm-2">
                <input type="submit" class="btn btn-success btn-block" name="btnSave" value="Save" />
              </div>
              <div class="col-sm-2">
                <a class="btn btn-warning btn-block" href="/main.php"><span class="glyphicon glyphicon-close"></span> Cancel
                    </a>
              </div>
      </div>
  </div>
  <div class="row">
      <div class="col-sm-8"></div>
  </div>
  </div>
</form>

<?php include $_SERVER["DOCUMENT_ROOT"]."/footer.php"; ?>