<?php include $_SERVER["DOCUMENT_ROOT"]."/head.php"; ?>

    <div class="row" style="margin-bottom: 50px;">
        <div class="col-sm-3">
              <div class="panel panel-default" id="hhh" style="">
                <div class="panel-heading" id="panelh">
                            <div class="row">
                                <div class="col-sm-1">
                                    <img src="images/home.png" class="media-object" style="width:20px">
                                </div>
                                    <div class="col-sm-9">
                                        <h4 class="media-heading"><a href="/main.php" style="color: white; cursor:hand;">Home</a></h4>

                                    </div>
                            <?php if ($_SESSION['Emp_pos'] == 'Admin' || $_SESSION['Emp_pos'] =='Paralegal Officer'){ ?>
                            <div class="col-sm-1">
                                    <div class="dropdown" style="margin-top: 5px;">
                                      <span class="glyphicon glyphicon-bell dropdown-toggle unread-count" type="button" data-toggle="dropdown"></span> <!-- test.css pangalan nung source kung saan galing ung number -->
                                        <ul class="dropdown-menu scrollable-menu" >
                                          <li class="well well-sm bg bg-primary" style="background-color: #01bcb0;">
                                              <div class="text-center" style="color:#ffffff; "><b>Hearing Notification</b></div>
                                          </li>
                                          <?php
                                           $today = date("Y-m-d");
                                           $result = mysqli_query($conn,"Select * from tbl_hearingdetails");
                                           ?>
                                           <table class="table table-bordered">
                                              <tr>
                                                  <th style="width: 35%">Name</th>
                                                  <th style="width: 30%">Title</th>
                                                  <th style="width: 30%">From</th>
                                              </tr>
                                           
                                           <?php
                                           while($row = mysqli_fetch_array($result)){
                                                 $result1 = mysqli_query($conn,"Select * from tbl_inmate where id=".$row['Inmate_ID']);
                                                 while($row1 = mysqli_fetch_array($result1)){
                                                  $_SESSION['InmateNameNotif'] = strtoupper($row1['lname']. ', '.$row1['fname']. ' '.$row1['mname']);

                                                 }
                                              if (strtotime($row['HearingDate']) >= strtotime($today)) { ?>
                                                    <!-- <li class="well well-sm" style="color:#000000;"> -->
                                                    <tr>
                                                        <td style="width: 35%"> <?php echo $_SESSION["InmateNameNotif"]; ?></td>
                                                        <td style="width: 30%"> <?php echo $row['HearingTitle']; ?></td>
                                                        <td style="width: 30%"> <?php echo date("m-d-Y",strtotime($row['HearingDate'])); ?></td>
                                                    </tr>    
                                                            
                                                    <!-- </li> -->

                                              <?php } 

                                              // echo '<li class="btn btn-default">'.strtotime($row['HearingDate']).' kkk '.strtotime($today).'</li>'; 
                                           } //end of while
                                          ?>
                                           </table>
                                           <li class="well well-sm" style="background-color: #01bcb0;">
                                              <div class="text-center" style="color:#ffffff; cursor:hand;">Disciplinary Action Notification</div>
                                          </li>
                                          <table class="table table-bordered">
                                              <tr>
                                                  <th style="width: 30%">Name</th>
                                                  <th style="width: 30%">Title</th>
                                                  <th style="width: 20%">From</th>
                                                  <th style="width: 20%">To</th>
                                              </tr>
                                          <?php
                                           $today = date("Y-m-d");
                                           $result = mysqli_query($conn,"Select * from tbl_dadetails");
                                           while($row = mysqli_fetch_array($result)){
                                                 $result1 = mysqli_query($conn,"Select * from tbl_inmate where id=".$row['Inmate_ID']);
                                                 while($row1 = mysqli_fetch_array($result1)){
                                                  $_SESSION['InmateNameNotif'] = strtoupper($row1['lname']. ', '.$row1['fname']. ' '.$row1['mname']);

                                                 }
                                                 $result2 = mysqli_query($conn,"Select * from tbl_da where id=".$row['da']);
                                                 while($row2 = mysqli_fetch_array($result2)){
                                                  $_SESSION['DaName'] = strtoupper($row2['name']);

                                                 }
                                              if (strtotime($row['dato']) >= strtotime($today)) { ?>
                                                    <!-- <li class="well well-sm" style="color:#000000;" > -->
                                                    <tr>
                                                        <td style="width: 35%"> <?php echo $_SESSION["InmateNameNotif"]; ?></td>
                                                        <td style="width: 30%"> <?php echo $_SESSION['DaName']; ?></td>
                                                        <td style="width: 20%"> <?php echo date("m-d-Y",strtotime($row['dafrom'])); ?></td>
                                                        <td style="width: 20%"> <?php echo date("m-d-Y",strtotime($row['dato'])); ?></td>
                                                    </tr> 
                                                            
                                                    <!-- </li> -->

                                              <?php } 

                                              // echo '<li class="btn btn-default">'.strtotime($row['HearingDate']).' kkk '.strtotime($today).'</li>'; 
                                           }
                                          ?>
                                          </table>
                                          
                                        </ul>
                                    </div>
                            </div>
                            <?php } ?>
                            </div>
                            
                </div>
                <div class="panel-heading" id="panelh">
                            <div class="media">
                                <div class="media-left">
                                    <img src="images/inmate-info-icon.png" class="media-object" style="width:20px">
                                </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Dashboard</h4>
                                    </div>
                            </div>
                </div>
                <table class="table1">
                  <!--   <tr>
                        <td colspan="2"><center><legend style="font-weight: 900; color: #2a79d3;"></legend></center></td>
                    </tr> -->
                    <tr>
                        <td colspan="2"><label style="color: #2a79d3;"><span class="glyphicon glyphicon-user"> </span> <?php echo ucwords($_SESSION['Emp_name']); ?></label></td>
                    </tr>
                    <tr>
                        <td colspan="2"><label style="color: #2a79d3;"><span class="glyphicon glyphicon-wrench"> </span> <?php echo ucwords($_SESSION['Emp_pos']); ?></label></td>
                    </tr>
                    <!-- <tr>
                        <?php if ($_SESSION['Emp_pos'] == 'Admin') { ?>  
                              <td colspan="2"><a onclick="showInmateList()" style="color: #2a79d3;"> Total Inmate <span class="badge badge-success"><?php echo ucwords($_SESSION['TotalInmate']); ?></span></a></td>
                          <?php } else { ?>
                              <td colspan="2"><a  style="color: #2a79d3;"> Total Inmate <span class="badge badge-success"><?php echo ucwords($_SESSION['TotalInmate']); ?></span></a></td>
                          <?php  } ?>
                        
                    </tr> -->
                    <!-- <tr>
                        <td><label style="color: #2a79d3;"> Male <span class="badge badge-success"><?php echo ucwords($_SESSION['MaleCount']); ?></span></label></td>
                        <td><label style="color: #2a79d3;">Female <span class="badge badge-warning"><?php echo ucwords($_SESSION['FemaleCount']); ?></span></label></td>
                    </tr> -->
                </table>
                <div class="panel-heading" id="panelh">
                            <div class="media">
                                <div class="media-left">
                                    <img src="images/documents-icon.png" class="media-object" style="width:20px">
                                </div>
                                    <div class="media-body">
                                        <a data-toggle="collapse" href="#submenu" style="color: #ffffff; font-size: 18px;">Menu  </a> <span class="glyphicon glyphicon-chevron-down" style="font-size: 13px;""></span>
                                    </div>
                            </div>
                           
                </div>
                <?php include($_SERVER['DOCUMENT_ROOT']."/submenu.php"); ?>  
                <!--</div>
                 <div class="panel panel-default" id="hhh" style="">
                  
                </div> 
                 <div class="panel panel-default" id="hhh" style="">-->
                        <div class="panel-heading" id="panelh">
                            <div class="media">
                                <div class="media-left">
                                    <img src="images/Settings-icon.png" class="media-object" style="width:20px">
                                </div>
                                    <div class="media-body">
                                        <a data-toggle="collapse" href="#settingpage" style="color: #ffffff; font-size: 18px; cursor:hand;">Settings  </a> <span class="glyphicon glyphicon-chevron-down" style="font-size: 13px;""></span>
                                        <!-- <h4 class="media-heading"></h4> -->
                                    </div>
                            </div>
                        </div>
                <!-- setting side -->
                  <div id="settingpage" class="panel-collapse collapse">
                      <div class="panel-body">
                              <table class="table1">
                                      <?php if ($_SESSION['Emp_pos'] == 'Admin') { ?>  
                                          <tr>
                                              <td colspan="2"><a onclick="ShowOfficerAdd()" style="color: #2a79d3; cursor:hand;"><span><img src="images/User accounts.png" style="width:20px; "></span>  Add Officer(s) Account </a></td>
                                          </tr>
                                          <tr>
                                              <td colspan="2"><a onclick="showAccounts()" style="color: #2a79d3; cursor:hand;"><span><img src="images/User accounts.png" style="width:20px; "></span>  Total Officer(s) Account <span class="label label-primary pull-right"><?php echo ucwords($_SESSION['TotalUser']); ?></span></a></td>
                                          </tr>
                                          <tr>
                                              <td colspan="2"><a onclick="ShowlogGlobal()" style="color: #2a79d3; cursor:hand;"><span><img src="images/Settings-icon.png" style="width:20px; "></span>  Logs </a></td>
                                          </tr>
                                          <tr>
                                              <td colspan="2"><a onclick="showSetting()" style="color: #2a79d3; cursor:hand;"><span><img src="images/Settings-icon.png" style="width:20px; "></span>  Settings </a></td>
                                          </tr>
                                      <?php } elseif ($_SESSION['Emp_pos'] == 'Jail Nurse') { ?> 
                                          
                                          <tr>
                                              <td colspan="2"><a onclick="showAccounts()" style="color: #2a79d3; cursor:hand;"><span><img src="images/User accounts.png" style="width:20px; "></span>  Total Officer(s) Account <span class="label label-primary pull-right"><?php echo ucwords($_SESSION['TotalUser']); ?></span></a></td>
                                          </tr>
                                      <?php } else { ?>
                                          
                                      <?php  } ?>
                                      <tr>
                                          <td colspan="2"><a style="color: #2a79d3; cursor:hand;" onclick="ShowAbout()"><span><img src="images/about-us.png" style="width:20px; "></span> About Us</a></td>
                                      </tr>
                              </table>
                            </div>
                    </div>
                <!-- end of setting side -->
                
                              <table class="table" style="background-color: #fcfcfc;">
                                      <tr>
                                        <td><center> <b style="color: #2a79d3;">DORM #</b></center></td>
                                        <td><center><b style="color: #2a79d3;">POPULATION</b></center></td>
                                      </tr>
                                      <?php
                                      //cell no.
                                      $result1 = mysqli_query($conn,"Select * from tbl_cell ORDER BY prison_no");
                                          while($row1 = mysqli_fetch_array($result1)){
                                              $CellNo = strtoupper($row1['prison_no']);
                                              $result = mysqli_query($conn,"SELECT id,ReceivingJail FROM tbl_inmate where ReceivingJail='".$CellNo."'");
                                              
                                              $PopulationNo = mysqli_num_rows($result); 
                                              if ($CellNo == 'NOT REGISTERED') { ?>
                                                <tr style="color: #ef2113;">
                                                    <td><center><?php echo $CellNo; ?></center></td>
                                              <?php } elseif ($CellNo == 'TRANSFERRED'){ ?>
                                                <tr style="color: #f442d4;"> 
                                                    <td><center><?php echo $CellNo. ' JAIL'; ?></center></td>
                                              <?php } elseif ($CellNo == 'DECEASED'){ ?>
                                                <tr style="color: #ff8411;"> 
                                                    <td><center><?php echo $CellNo; ?></center></td>
                                              <?php } else { ?>
                                                <tr>
                                                <td><center><?php echo $CellNo; ?></center></td>
                                              <?php } ?>
                                                    
                                                    <td ><center><?php echo $PopulationNo; ?></center></td>
                                                </tr>
                                              <?php
                                              
                                          }

                                      ?>
                                      <tr style="color: #0ec923; font-size: 22px;">
                                                    <td><center><b>TOTAL INMATE</b></center></td>
                                                    <td ><center><b><?php echo $_SESSION['DormPopulation']; ?></b></center></td>
                                      </tr>
                              </table>
                         
                
                <table class="table1">
                  
                </table>
            </div>
          </div>

        <div class="col-sm-9" >
            <div class="" >
                <div class="well" style="margin-left: 10px; background-image: linear-gradient(to top, #dfe9f3 0%, white 50%);">

                    <div class="row content">
                        <div class="col-sm-12">
                        <table class="table1">
                                    <tr>
                                        <td style="width: 30%; text-align:right;"> <h4 style="font-weight: 900; " > Search Inmate here:<!-- <span class="glyphicon glyphicon-search"></span> --></h4>
                                        </td>
                                        <td style="width: 50%;">
                                         
                                            <select class="selectpicker show-tick form-control" data-size="8" data-live-search="true" title="Search Here" id="SearchTxt" onchange="ShowRecord()">
                      
                                            <?php  
                                                  include($_SERVER['DOCUMENT_ROOT']."/config.php");
                                                  $sql = "SELECT id,lname,mname,fname FROM tbl_inmate order by lname";
                                                  $result = $conn->query($sql);

                                                  if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    while($row = $result->fetch_assoc()) {
                                                        $EmpID = $row['id'] + 1000;
                                                        echo '<option value="'.$row['id'].'">('.$EmpID.') '.ucwords($row['lname'].', '.$row['fname'].' '.$row['mname']).'</option>';
                                                    }
                                                    $conn->close();
                                                  }
                                              
                                            ?>
                                            </select>
                                        </td>
                                    
                                        <!-- <td style="width: 5%;">
                                            <a onclick="ShowRecord()" class="btn btn-success btn-block" style="height: 35px;"><span class="glyphicon glyphicon-search"></span></a>
                                        </td> -->

                                        <?php if ($_SESSION['Emp_pos'] == 'Paralegal Officer' || $_SESSION['Emp_pos'] == 'Admin') { ?>
                                        <td style="width: 15%;">
                                            <a href="/addinmate.php" class="btn btn-primary btn-block" style="height: 35px;"><span class="glyphicon glyphicon-plus"></span> Add Inmate </a>
                                        </td>
                                        <?php } ?>
                                    </tr>
                        </table>
                        </div>
                    </div>
                    <div id="MainPanel" >
                    <div class="row content" id="">
                        <div class="panel-body" >
                            <div class="col-sm-12" id="InmateGraph"></div>
                        </div>
                    </div>
                    <div class="row content" id="">
                        <div class="panel-body">
                              <div class="col-sm-12" id="GenderGraph"></div>
                        </div>
                    </div>
                    <div class="row content" id="">
                        <div class="panel-body">
                              <div class="col-sm-12" id="DeathGraph"></div>
                        </div>
                    </div>
                    <div class="row content" id="">
                        <div class="panel-body">
                              <div class="col-sm-12" id="StatusGraph"></div>
                        </div>
                    </div>
                    <div class="row content" id="">
                        <div class="panel-body">
                              <div class="col-sm-12" id="CaseGraph"></div>
                        </div>
                    </div>
                    <!-- <div class="row content" style="margin-top: 30px;">
                        
                                <div class="col-sm-12 text-center" id="headBg">
                                <legend style="font-weight: 900; color: #ffffff;">List of Inmates</legend>
                                </div>
                            
                        <div class="col-sm-6"> 
                            <div class="row" style="overflow-y:auto; max-height:330px;">
                                <div class="col-sm-12">
                                <table class="table">
                                    <tbody>
                                      <tr>
                                          <th colspan="2"><center>Male</center></th>
                                      </tr>
                                      <tr>
                                          <th>ID</th>
                                          <th>Name</th>
                                      </tr>
                                      <?php 
                                      
                                      include $_SERVER["DOCUMENT_ROOT"]."/config.php";
                                      $result = mysqli_query($conn,"SELECT * FROM `tbl_inmate` where gender='Male' order by lname");
                                      if (!$result || mysqli_num_rows($result) == 0) {
                                      echo '<tr><td><legend style="font-weight: 900; color: #f2190e">No Record of Inmate found.</legend></td></tr>';  
                                          } else {
                                            while($row = mysqli_fetch_assoc($result)){ ?>
                                              <tr>
                                                  <td><?php $EmpID = $row['id'] + 1000; echo $EmpID; ?></td>
                                                  <td><?php echo strtoupper($row['lname'].", ".$row["fname"]." ".$row["mname"])." (".$row["alias"].")"; ?></td>
                                              </tr>
                                              <?php
                                            }
                                          } ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row" style="overflow-y:auto; max-height:330px;">
                                <div class="col-sm-12">
                                <table class="table">
                                    <tbody>
                                      <tr>
                                          <th colspan="2"><center>Female</center></th>
                                      </tr>
                                      <tr>
                                          <th>ID</th>
                                          <th>Name</th>
                                      </tr>
                                      <?php 
                                      
                                      include $_SERVER["DOCUMENT_ROOT"]."/config.php";
                                      $result = mysqli_query($conn,"SELECT * FROM `tbl_inmate` where gender='Female' order by lname");
                                      if (!$result || mysqli_num_rows($result) == 0) {
                                      echo '<tr><td><legend style="font-weight: 900; color: #f2190e">No Record of Inmate found.</legend></td></tr>';  
                                          } else {
                                            while($row = mysqli_fetch_assoc($result)){ ?>
                                              <tr>
                                                  <td><?php $EmpID = $row['id'] + 1000; echo $EmpID; ?></td>
                                                  <td><?php echo strtoupper($row['lname'].", ".$row["fname"]." ".$row["mname"])." (".$row["alias"].")"; ?></td>
                                              </tr>
                                              <?php
                                            }
                                          } ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include $_SERVER["DOCUMENT_ROOT"]."/footer.php"; ?>