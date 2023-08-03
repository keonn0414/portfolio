<?php
if(session_status() == PHP_SESSION_NONE){session_start();}
if (empty($_SESSION) || !isset($_SESSION['signed_in'], $_SESSION['Emp_pos']) || (isset($_SESSION['signed_in']) && $_SESSION['signed_in'] === false)) header('location: /index.php');
 ?>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/bjmp-logo.png" type="image/png" />
        <title>Bureau of Jail Management and Penology</title>
            <link rel="stylesheet" href="/css/bootstrap.min.css">
            <script src="/js/jquery.min.js"></script>
            <script src="/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="/css/bootstrap-select.css">
            <script src="/js/bootstrap-select.js"></script>
    <style type="text/css">
            @font-face {
                        font-family: mainFont;
                        src: url(fonts/Amble-Regular.ttf);
                        }
            #headBg{
            background-image:linear-gradient(60deg, #29323c 0%, #485563 100%);
            color: white
            }
            #hhh{
                background-image: linear-gradient(to top, #dfe9f3 0%, white 100%);
            }
            #hrefs{
                color: white;
                font-family: mainFont;
                font-size: 20px;
            }
            #desc{
                font-size: 16px;
                text-align: justify;
            }
            #panelh{
                background-image:linear-gradient(60deg, #29323c 0%, #485563 100%);
                color: white
            }
            body{

                 font-family: mainFont;
            }
    </style>
</head>
<body style="overflow-x: hidden;">
    <nav class="navbar navbar-default" id="headBg">
      <div class="container-fluid" >
        <div class="navbar-header" >
          <a class="navbar-brand" href="#" id="hrefs">Bureau of Jail Management and Penology Management Information System </a>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="logout.php" id="hrefs"><span class="glyphicon glyphicon-log-in"></span> Log-out</a></li>
        </ul>
      </div>
    </nav>
<div class="body col-sm-12" style="margin-bottom: 100px;">
    <div class="row">
        <div class="col-sm-3">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default" id="hhh">
                        <div class="panel-heading" id="panelh">
                            <div class="media">
                                <div class="media-left">
                                    <img src="images/documents-icon.png" class="media-object" style="width:20px">
                                </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Menu</h4>
                                    </div>
                            </div>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" >
                            <div class="panel-body" >
                                <table class="table" >
                                    <?php
                                    if ( $_SESSION['Emp_pos'] == "Records Officer") { ?>
                                        <!-- Records officer side -->
                                        <!-- Records officer side -->
                                        <!-- Records officer side -->
                                        <!-- Records officer side -->
                                        <!-- Records officer side -->
                                        <tr>
                                            <td>
                                                <a data-toggle="collapse" href="#RecordOfficerlist">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <img src="images/list-icon.png" class="media-object" style="width:20px">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="media-heading" style="font-size: 20px;">Inmate Status</h4>
                                                        </div>
                                                    </div>
                                                </a>
                                                    <div id="RecordOfficerlist" class="panel-collapse collapse in">
                                                        <div class="panel-body" >
                                                            <table class="tableTry">
                                                                <tr >
                                                                     <td style="font-size:16px; padding-bottom: 5px;">
                                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                                            <a onclick="showJailBooking()" style="cursor:hand;">
                                                                                Jail Booking report
                                                                            </a>
                                                                     </td>
                                                                </tr>
                                                                <tr>
                                                                     <td style="font-size:16px; padding-bottom: 5px;">
                                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                                            <a onclick="showManifest()" style="cursor:hand;">
                                                                                Manifestation
                                                                            </a>
                                                                     </td>
                                                                </tr>
                                                                <tr>
                                                                     <td style="font-size:16px; padding-bottom: 5px;">
                                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                                            <a onclick="showDocsFromCourt()" style="cursor:hand;">
                                                                                Documentation from court
                                                                            </a>
                                                                     </td>
                                                                </tr>
                                                                <tr>
                                                                     <td style="font-size:16px; padding-bottom: 5px;">
                                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                                            <a onclick="showCaseStatus()" style="cursor:hand;">
                                                                                Status Report
                                                                            </a>
                                                                     </td>
                                                                </tr>

                                                            </table>
                                                        </div>
                                                    </div>
                                            </td>
                                        </tr>
                                    <?php
                                    } elseif ($_SESSION['Emp_pos'] == "Paralegal Officer") { ?>
                                    <!-- Paralegal officer side -->
                                    <!-- Paralegal officer side -->
                                    <!-- Paralegal officer side -->
                                    <!-- Paralegal officer side -->
                                    <!-- Paralegal officer side -->
                                        <tr>
                                            <td>
                                                <a data-toggle="collapse" href="#ParalegalOfficerList">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <img src="images/list-icon.png" class="media-object" style="width:20px">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="media-heading" style="font-size: 20px;">Inmate Records</h4>
                                                        </div>
                                                    </div>
                                                </a>
                                                    <div id="ParalegalOfficerList" class="panel-collapse collapse in">
                                                        <div class="panel-body" >
                                                            <table class="tableTry">
                                                                <tr >
                                                                     <td style="font-size:16px; padding-bottom: 5px;">
                                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                                            <a onclick="showPersonalInfo()" style="cursor:hand;">
                                                                                Personal Information
                                                                            </a>
                                                                     </td>
                                                                </tr>
                                                                <tr >
                                                                     <td style="font-size:16px; padding-bottom: 5px;">
                                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                                            <a onclick="showInmateCaseParalegal()" style="cursor:hand;">
                                                                                Case of Inmates
                                                                            </a>
                                                                     </td>
                                                                </tr>
                                                                <tr >
                                                                     <td style="font-size:16px; padding-bottom: 5px;">
                                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                                            <a onclick="showInmateHearing()" style="cursor:hand;">
                                                                                Hearing of Inmates
                                                                            </a>
                                                                     </td>
                                                                </tr>
                                                                <tr >
                                                                     <td style="font-size:16px; padding-bottom: 5px;">
                                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                                            <a onclick="showInmateStatus()" style="cursor:hand;">
                                                                                Inmate Status
                                                                            </a>
                                                                     </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                            </td>
                                        </tr>
                                    <?php
                                    } elseif ($_SESSION['Emp_pos'] == "IWD unit Officer") { ?>
                                        <!-- IWD UNIT officer side -->
                                        <!-- IWD UNIT officer side -->
                                        <!-- IWD UNIT officer side -->
                                        <!-- IWD UNIT officer side -->
                                        <!-- IWD UNIT officer side -->
                                        <tr>
                                            <td>
                                                <a data-toggle="collapse" href="#InmatesProgramList">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <img src="images/health-icon.png" class="media-object" style="width:20px">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="media-heading" style="font-size: 20px;">Inmates Program</h4>
                                                        </div>
                                                    </div>
                                                </a>
                                                    <div id="InmatesProgramList" class="panel-collapse collapse in" >
                                                        <div class="panel-body" >
                                                            <table class="tableTry" >
                                                                <tr>
                                                                     <td style="font-size:16px; padding-bottom: 5px;">
                                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                                            <a onclick="showLivelihood()" style="cursor:hand;">
                                                                                Livelihood Projects
                                                                            </a>
                                                                     </td>
                                                                </tr>
                                                                <tr>
                                                                     <td style="font-size:16px; padding-bottom: 5px;">
                                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                                            <a onclick="showEducational()" style="cursor:hand;">
                                                                                Educational and Vocational Program
                                                                            </a>
                                                                     </td>
                                                                </tr>
                                                                <tr>
                                                                     <td style="font-size:16px; padding-bottom: 5px;">
                                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                                            <a onclick="showPhysicalFitness()" style="cursor:hand;">
                                                                                Physical Fitness Program
                                                                            </a>
                                                                     </td>
                                                                </tr>
                                                                <tr>
                                                                     <td style="font-size:16px; padding-bottom: 5px;">
                                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                                            <a onclick="showParticipants()" style="cursor:hand;">
                                                                                List of Participants
                                                                            </a>
                                                                     </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                            </td>
                                        </tr>
                                    <?php
                                    } elseif ($_SESSION['Emp_pos'] == "Search Officer") { ?>
                                        <!-- Search officer side -->
                                        <!-- Search officer side -->
                                        <!-- Search officer side -->
                                        <!-- Search officer side -->
                                        <!-- Search officer side -->
                                        <tr>
                                            <td>
                                                <a data-toggle="collapse" href="#VisitorDatalist">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <img src="images/health-icon.png" class="media-object" style="width:20px">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="media-heading" style="font-size: 20px;">Visitor Data</h4>
                                                        </div>
                                                    </div>
                                                </a>
                                                    <div id="VisitorDatalist" class="panel-collapse collapse in" >
                                                        <div class="panel-body" >
                                                            <table class="tableTry" >
                                                                <tr>
                                                                     <td style="font-size:16px; padding-bottom: 5px;">
                                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                                            <a onclick="showVisitor()" style="cursor:hand;">
                                                                                Visitor Information
                                                                            </a>
                                                                     </td>
                                                                </tr>
                                                                <tr>
                                                                     <td style="font-size:16px; padding-bottom: 5px;">
                                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                                            <a onclick="showItem()" style="cursor:hand;">
                                                                                Contraband Item Information
                                                                            </a>
                                                                     </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                            </td>
                                        </tr>
                                    <?php
                                    } elseif ($_SESSION['Emp_pos'] == "Custodial Officer") { ?>
                                        <!-- Custodial officer side -->
                                        <!-- Custodial officer side -->
                                        <!-- Custodial officer side -->
                                        <!-- Custodial officer side -->
                                        <!-- Custodial officer side -->
                                        <tr>
                                            <td>
                                                <a data-toggle="collapse" href="#InmatePropertylist">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <img src="images/health-icon.png" class="media-object" style="width:20px">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="media-heading" style="font-size: 20px;">Inmates Property Data</h4>
                                                        </div>
                                                    </div>
                                                </a>
                                                    <div id="InmatePropertylist" class="panel-collapse collapse in" >
                                                        <div class="panel-body" >
                                                            <table class="tableTry" >
                                                                <tr>
                                                                     <td style="font-size:16px; padding-bottom: 5px;">
                                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                                            <a onclick="showInmateProperty()" style="cursor:hand;">
                                                                                Inmate Property Information
                                                                            </a>
                                                                     </td>
                                                                </tr>

                                                            </table>
                                                        </div>
                                                    </div>
                                            </td>
                                        </tr>
                                    <?php
                                    } elseif ($_SESSION['Emp_pos'] == "Jail Nurse") { ?>
                                        <!-- Jail Nurse  side -->
                                        <!-- Jail Nurse  side -->
                                        <!-- Jail Nurse  side -->
                                        <!-- Jail Nurse  side -->
                                        <!-- Jail Nurse  side -->
                                        <tr>
                                            <td>
                                                <a data-toggle="collapse" href="#HealthDatalist">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <img src="images/health-icon.png" class="media-object" style="width:20px">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="media-heading" style="font-size: 20px;">Medical Records</h4>
                                                        </div>
                                                    </div>
                                                </a>
                                                    <div id="HealthDatalist" class="panel-collapse collapse in" >
                                                        <div class="panel-body" >
                                                            <table class="tableTry" >
                                                                <tr>
                                                                     <td style="font-size:16px; padding-bottom: 5px;">
                                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                                            <a onclick="showInmateMedicalRecord()" style="cursor:hand;">
                                                                                Inmate Health Records
                                                                            </a>
                                                                     </td>
                                                                </tr>
                                                                <tr>
                                                                     <td style="font-size:16px; padding-bottom: 5px;">
                                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                                            <a onclick="showOfficerMedicalRecord()" style="cursor:hand;">
                                                                                Officers Health Records
                                                                            </a>
                                                                     </td>
                                                                </tr>
                                                                <tr>
                                                                     <td style="font-size:16px; padding-bottom: 5px;">
                                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                                            <a onclick="showDesease()" style="cursor:hand;">
                                                                                Diseases Report
                                                                            </a>
                                                                     </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                            </td>
                                        </tr>
                                    <?php
                                    } else { ?>
                                        
                                    <?php
                                    }
                                    ?>



                                </table>
                            </div>
                        </div>
                </div>
                <div class="panel panel-default" id="hhh">
                        <div class="panel-heading" id="panelh">
                            <div class="media">
                                <div class="media-left">
                                    <img src="images/Settings-icon.png" class="media-object" style="width:20px">
                                </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Settings</h4>
                                    </div>
                            </div>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" >
                            <div class="panel-body" >
                                <table class="table" >
                                    <tr>
                                        <td>
                                            <a data-toggle="collapse" href="#userAcc">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <img src="images/User accounts.png" class="media-object" style="width:20px">
                                                    </div>
                                                    <div class="media-body" onclick="showAccounts()">
                                                        <h4 class="media-heading" style="font-size: 20px;">User Accounts</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a data-toggle="collapse" href="#aboutUs">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <img src="images/about-us.png" class="media-object" style="width:20px">
                                                    </div>
                                                    <div class="media-body" onclick="showAbout()">
                                                        <h4 class="media-heading" style="font-size: 20px;">About Us</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a data-toggle="collapse" href="#faq"a>
                                                <div class="media">
                                                    <div class="media-left">
                                                        <img src="images/FAQs-icon.png" class="media-object" style="width:20px">
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading" style="font-size: 20px;">FAQ's</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>
         <div class="col-sm-9 col-md-9">
            <div class="panel">
                    <div id="bodyPanel" style="display:none;"></div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
<script type="text/javascript">
    // Paralegal Officer Side
    function showPersonalInfo(){
        $('#bodyPanel').load('InmateRecords/inmate_records.php');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    function updt(TheID){
        $('#bodyPanel').load('InmateRecords/edit.php?id='+TheID.id);
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    function ShowImagesEdit(TheID){
        $('#bodyPanel').load('InmateRecords/edit_images.php?id='+TheID.id);
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    function showInmateCaseParalegal(){
        $('#bodyPanel').load('Paralegal/InmateCase/');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    function showInmateCaseParalegal(){
        $('#bodyPanel').load('Paralegal/InmateCase/');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    function showAddInmateCaseParalegal(){
        $('#bodyPanel').load('Paralegal/InmateCase/add.php');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    function showEditInmateCaseParalegal(TheID){
        $('#bodyPanel').load('Paralegal/InmateCase/edit.php?id='+TheID.id);
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    function showInmateStatus(){
        $('#bodyPanel').load('Paralegal/InmateStatus/');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    function showAddInmateStatus(){
        $('#bodyPanel').load('Paralegal/InmateStatus/add.php');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    function showInmateHearing(){
        $('#bodyPanel').load('Paralegal/InmateHearing/');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    function showAddInmateHearing(){
        $('#bodyPanel').load('Paralegal/InmateHearing/add.php');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    //Records Officer Side
    function showJailBooking(){
        $('#bodyPanel').load('RecordsOfficer/JailBooking/');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    function showAddJailBooking(){
        $('#bodyPanel').load('RecordsOfficer/JailBooking/add.php');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    function showManifest(){
        $('#bodyPanel').load('RecordsOfficer/manifest/');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    function showAddManifest(){
        $('#bodyPanel').load('RecordsOfficer/manifest/add.php');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    function showDocsFromCourt(){
        $('#bodyPanel').load('RecordsOfficer/DocsCourt/');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    function showAddDocsFromCourt(){
        $('#bodyPanel').load('RecordsOfficer/DocsCourt/add.php');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    function showCaseStatus(){
        $('#bodyPanel').load('RecordsOfficer/StatusReport/');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    function showAddCaseStatus(){
        $('#bodyPanel').load('RecordsOfficer/StatusReport/add.php');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    //IWD UNIT OFFICE Side
    function showEducational(){
        $('#bodyPanel').load('IWDUnitOfficer/Educational/');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    function showAddEducational(){
        $('#bodyPanel').load('IWDUnitOfficer/Educational/add.php');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    function showLivelihood(){
        $('#bodyPanel').load('IWDUnitOfficer/Livelihood/');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    function showAddLivelihood(){
        $('#bodyPanel').load('IWDUnitOfficer/Livelihood/add.php');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    function showParticipants(){
        $('#bodyPanel').load('IWDUnitOfficer/Participants/');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    function showAddParticipants(){
        $('#bodyPanel').load('IWDUnitOfficer/Participants/add.php');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    function showPhysicalFitness(){
        $('#bodyPanel').load('IWDUnitOfficer/PhysicalFitness/');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    function showAddPhysicalFitness(){
        $('#bodyPanel').load('IWDUnitOfficer/PhysicalFitness/add.php');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    //Search Officer
    function showVisitor(){
        $('#bodyPanel').load('SearchOfficer/Visitor/');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    function showAddVisitor(){
        $('#bodyPanel').load('SearchOfficer/Visitor/add.php');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    function showItem(){
        $('#bodyPanel').load('SearchOfficer/Item/');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    function showAddItem(){
        $('#bodyPanel').load('SearchOfficer/Item/add.php');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    //Custodial Officer Side
    function showInmateProperty(){
        $('#bodyPanel').load('CustodialOfficer/');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    function showAddInmateProperty(){
        $('#bodyPanel').load('CustodialOfficer/add.php');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    //Jail Nurse
    function showInmateMedicalRecord(){
        $('#bodyPanel').load('JailNurse/Inmate/');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    function showAddInmateMedicalRecord(){
        $('#bodyPanel').load('JailNurse/Inmate/add.php');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    function showOfficerMedicalRecord(){
        $('#bodyPanel').load('JailNurse/Officer/');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    function showAddOfficerMedicalRecord(){
        $('#bodyPanel').load('JailNurse/Officer/add.php');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    function showDesease(){
        $('#bodyPanel').load('JailNurse/Desease/');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    function showAddDesease(){
        $('#bodyPanel').load('JailNurse/Desease/add.php');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    // about us side
    function showAbout(){
        $('#bodyPanel').load('/about.php');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    // User Account Side
    function showAccounts(){
        $('#bodyPanel').load('account/users.php');
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    // Search Case of Inmate Side
    function showSearchCaseOfInmate(){
        var lnameVal = encodeURI($('#lnameSearch').val());
        var fnameVal =encodeURI($('#fnameSearch').val());
        var mnameVal =encodeURI($('#mnameSearch').val());

        $('#PanelCaseOfInmate').load('Paralegal/InmateCase/search.php?l='+lnameVal+'&f='+fnameVal+'&m='+mnameVal);
        document.getElementById("PanelCaseOfInmate").style.display = 'initial';
    }
    // Search hearing
    function showSearchHearingOfInmate(){
        var lnameVal = encodeURI($('#lnameSearch').val());
        var fnameVal =encodeURI($('#fnameSearch').val());
        var mnameVal =encodeURI($('#mnameSearch').val());

        $('#PanelCaseOfHearing').load('Paralegal/InmateHearing/search.php?l='+lnameVal+'&f='+fnameVal+'&m='+mnameVal);
        document.getElementById("PanelCaseOfHearing").style.display = 'initial';
    }
    //show case details
    function showCaseList(TheID){

        $('#bodyPanel').load('Paralegal/InmateCase/CaseList.php?id='+TheID.id);
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    // show hearing details
    function showHearingList(TheID){

        $('#bodyPanel').load('Paralegal/InmateHearing/HearingList.php?id='+TheID.id);
        document.getElementById("bodyPanel").style.display = 'initial';
    }
    function print_inmate_list(){
      var win = window.open('/prints/inmate_list.php', '_blank');
      win.focus();
    }
    //Upload Image
    function sampl(){
                    document.getElementById("userfile").click();
                    // document.getElementById("btn_save").style.display = 'initial';
                    // document.getElementById("btn_cancel").style.display = 'initial';

                }
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                    $('#yess')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function fileSelected(input){
            document.getElementById(attachement_label).innerHTML = "File: " + input.files[0].name;
    }
    //delete row
    function delete_row(no)
      {
       document.getElementById("row"+no+"").outerHTML="";
      }
    //addrow on table
    function add_row()
    {
        //generate code
        var chars = "123456789";
        var string_length = 8;
        var randomstring = '';
        for (var i=0; i<string_length; i++) {
        var rnum = Math.floor(Math.random() * chars.length);
        randomstring += chars.substring(rnum,rnum+1);
        }
        var table=document.getElementById("InmateTbl");
        var table_len=(table.rows.length);

        var row = table.insertRow(table_len).outerHTML="<tr id='row"+randomstring+"'><td id='offense_row"+randomstring+"' style='width: 16%;'><input type='text' class='form-control' placeholder='Offense' id='offense_row"+randomstring+"' /></td><td id='case_row"+randomstring+"' style='width: 10%;'><input type='text' class='form-control' placeholder='Case No' id='case_row"+randomstring+"' /></td><td id='date_row"+randomstring+"' style='width: 10%;'><input type='date' class='form-control' placeholder='Format MM/DD/YYYY' id='date_row"+randomstring+"' /></td><td id='court_row"+randomstring+"' style='width: 10%;'><input type='text' class='form-control' placeholder='Court' id='court_row"+randomstring+"' /></td><td id='sentence_row"+randomstring+"' style='width: 24%;'><div class='row'><div class='col-sm-6'><input type='text' class='form-control' placeholder='Min' id='minSentence_row"+randomstring+"' /></div><div class='col-sm-6'><input type='text' class='form-control' placeholder='Max' id='maxSentence_row"+randomstring+"' /></div></div></td><td id='expiration_row"+randomstring+"' style='width: 10%;'><input type='text' class='form-control' placeholder='Expiration' id='expiration_row"+randomstring+"' /></td><td id='gcta_row"+randomstring+"' style='width: 15%;'><input type='text' class='form-control' placeholder='GCTA Max' id='WoGcta_row"+randomstring+"' /></td><td style='width: 5%;'><a class='btn btn-danger btn-block' onclick='delete_row("+randomstring+")'><span class='glyphicon glyphicon-trash'></span></a></td></tr>";
    }
    function add_item()
    {
        //generate code
        var chars = "123456789";
        var string_length = 8;
        var randomstring = '';
        for (var i=0; i<string_length; i++) {
        var rnum = Math.floor(Math.random() * chars.length);
        randomstring += chars.substring(rnum,rnum+1);
        }
        var table=document.getElementById("add_item_row");
        var table_len=(table.rows.length);

        var row = table.insertRow(table_len).outerHTML="<tr id='row"+randomstring+"'><td id='unit_row"+randomstring+"' style='width: 30%;'><input type='text' class='form-control' placeholder='Unit' id='unit_row"+randomstring+"' /></td><td id='description_row"+randomstring+"' style='width: 70%;'><input type='text' class='form-control' placeholder='Description' id='description_row"+randomstring+"' /></td><td style='width: 5%;'><a class='btn btn-danger btn-block' onclick='delete_row("+randomstring+")'><span class='glyphicon glyphicon-trash'></span></a></td></tr>";
    }

    <?php //if(isset($_GET) && !empty($_GET)) { ?>
            <?php //if ($_GET["r"] == "addInmate") { ?>
                //showPersonalInfo();
            <?php //} elseif ($_GET["process"] == "addinv") { ?>
                //ShowBranch();
     <?php //} else { ?>
        //window.onload = ShowAbout;
     <?php
     //} }?>
     //<td id='quant_row"+randomstring+"' style='width: 20%;'>"+quanV+"</td><td style='width: 20%;' id='price_row"+randomstring+"'>"+priceV+"</td><td style='width: 20%;' id='total_row"+randomstring+"'>"+totalV+"</td><td td style='width: 10%;'><a class='btn btn-danger btn-block' onclick='delete_row("+randomstring+")'><span class='glyphicon glyphicon-trash'></span></a></td>
</script>
