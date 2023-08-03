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
          <a class="navbar-brand" href="#" id="hrefs">Bureau of Jail Management and Penology Management Information System</a>
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
                                        <h4 class="media-heading">Hello, Paralegal Officer!</h4>
                                    </div>
                            </div>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" >
                            <div class="panel-body" >
                                <table class="table" >
                                    <tr>
                                        <td>
                                            <a data-toggle="collapse" href="#irlist">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <img src="images/list-icon.png" class="media-object" style="width:20px">
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading" style="font-size: 20px;">Records</h4>
                                                    </div>
                                                </div>
                                            </a>
                                                <div id="irlist" class="panel-collapse collapse in">
                                                    <div class="panel-body" >
                                                        <table class="tableTry">
                                                            <tr >
                                                                 <td style="font-size:16px; padding-bottom: 5px;">
                                                                    <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                                        <a onclick="showInmateRecord()" style="cursor:hand;">
                                                                          Inmate Records
                                                                        </a>
                                                                 </td>
                                                            </tr>
                                                            <tr>
                                                              <td style="font-size:16px; padding-bottom: 5px;">
                                                                 <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                                     <a onclick="showManifest()" style="cursor:hand;">
                                                                         my progress ends here
                                                                         <!-- CAN UPLOAD A SCANNED COPY OF THE MANIFESTS UNDER A SPECIFIC INMATE RECORD-->
                                                                     </a>
                                                              </td>
                                                              <tr>
                                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                                   <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                                       <a onclick="showCourtDocuments()" style="cursor:hand;">
                                                                         my progress ends here
                                                                           <!-- CAN UPLOAD A SCANNED COPY OF THE Court Documents UNDER A SPECIFIC INMATE RECORD-->
                                                                       </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                              <td style="font-size:16px; padding-bottom: 5px;">
                                                                 <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                                     <a onclick="showCaseStatus()" style="cursor:hand;">
                                                                         my progress ends here
                                                                         <!-- CAN UPLOAD A SCANNED COPY OF THE Court Documents UNDER A SPECIFIC INMATE RECORD-->
                                                                     </a>
                                                              </td>
                                                          </tr>
                                                           <!--  <tr>
                                                                 <td style="font-size:16px; padding-bottom: 5px;">
                                                                    <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                                        <a onclick="showCriminalRecords()" style="cursor:hand;">
                                                                            Criminal Records
                                                                        </a>
                                                                 </td>
                                                            </tr>
                                                            <tr>
                                                                 <td style="font-size:16px; padding-bottom: 5px;">
                                                                    <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                                        <a onclick="showDAInformation()" style="cursor:hand;">
                                                                            Disciplinary Action Information
                                                                        </a>
                                                                 </td>
                                                            </tr>
                                                            <tr>
                                                                 <td style="font-size:16px; padding-bottom: 5px;">
                                                                    <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                                        <a onclick="showLivelihoodAct()" style="cursor:hand;">
                                                                            Livelihood Activities
                                                                        </a>
                                                                 </td>
                                                            </tr>
                                                            <tr>
                                                                 <td style="font-size:15px; padding-bottom: 5px;">
                                                                    <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                                        <a onclick="showEducVocProg()" style="cursor:hand;">
                                                                            Educational & Vocational Programs
                                                                        </a>
                                                                 </td>
                                                            </tr>
                                                            <tr>
                                                                 <td style="font-size:16px; padding-bottom: 5px;">
                                                                    <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                                        <a onclick="showPhysicalCulDev()" style="cursor:hand;">
                                                                            Physical & Cultural Development
                                                                        </a>
                                                                 </td>
                                                            </tr> -->
                                                        </table>
                                                    </div>
                                                </div>
                                        </td>
                                    </tr>

                          <!--          <tr>
                                        <td>
                                            <a data-toggle="collapse" href="#rlist">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <img src="images/reports-icon.png" class="media-object" style="width:20px">
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading" style="font-size: 20px;">Reports</h4>
                                                    </div>
                                                </div>
                                            </a>
                                                <div id="rlist" class="panel-collapse collapse in" >
                                                    <div class="panel-body" >
                                                        <table class="tableTry" >
                                                            <tr>
                                                                 <td style="font-size:16px; padding-bottom: 5px;">
                                                                    <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                                        <a onclick="showDetSumRep()" style="cursor:hand;">
                                                                            Detainees Summary Report
                                                                        </a>
                                                                 </td>
                                                            </tr>
                                                            <tr>
                                                                 <td style="font-size:15px; padding-bottom: 5px;">
                                                                    <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                                        <a onclick="showComCrimeSumRep()" style="cursor:hand;">
                                                                            Committed Crimes Summary Report
                                                                        </a>
                                                                 </td>
                                                            </tr>
                                                            <tr>
                                                                 <td style="font-size:15px; padding-bottom: 5px;">
                                                                    <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                                        <a onclick="showDeathCasSumRep()" style="cursor:hand;">
                                                                            Death / Casualties Summary Report
                                                                        </a>
                                                                 </td>
                                                            </tr>
                                                           <tr>
                                                                 <td style="font-size:16px; padding-bottom: 5px;">
                                                                    <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                                        <a onclick="showExRep()" style="cursor:hand;">
                                                                            Ex-inmate / Ex-prisoner Report
                                                                        </a>
                                                                 </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                        </td>
                                    </tr> -->
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
                                <!--    <tr>
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
                                    </tr> -->
                                    <tr>
                                        <td>
                                            <a data-toggle="collapse" href="#aboutUs">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <img src="images/about-us.png" class="media-object" style="width:20px">
                                                    </div>
                                                    <div class="media-body">
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
    function showInmateRecord(){
        $('#bodyPanel').load('Paralegal/inmate_info.php');
        document.getElementById("bodyPanel").style.display = 'initial';
    }


    function showAccounts(){
        $('#bodyPanel').load('account/users.php');
        document.getElementById("bodyPanel").style.display = 'initial';
        // var positionSearch = document.getElementById("position");
        // positionSearch.setAttributes("class", "selectpicker show-tick form-control");
        // positionSearch.setAttributes("data-size", "3");
        // positionSearch.setAttributes("data-live-search", "true");
        // positionSearch.setAttributes("title", "Choose Position");

        // var xhttp = new XMLHttpRequest();
        // xhttp.open("GET", "account/users.php", true);
        // // xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        // // var data = "";
        // xhttp.send();
        // xhttp.onreadystatechange = function() {
        //     if (this.readyState == 4 && this.status == 200) {
        //         document.getElementById("bodyPanel").innerHTML = this.responseText;
        //     }
        // };
    }
</script>
