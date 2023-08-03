<div class="row">
<div class="col-sm-12">
            <ul class="nav nav-tabs">
                  <!-- <li class="active"><a href="#home" data-toggle="tab">Home</a></li> -->
                  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">CASE DETAILS
                    <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="#AddCase" data-toggle="tab">ADD NEW CASE</a></li>
                            <li><a href="#CaseList" data-toggle="tab" id="ListOfCaseTab">LIST OF CASE</a></li>
                          </ul>
                  </li>
                  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">DORM DETAILS
                    <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="#AddCell" data-toggle="tab">ADD NEW DORM</a></li>
                            <li><a href="#CellList" data-toggle="tab" id="ListOfCellTab">LIST OF DORM(s)</a></li>
                          </ul>
                  </li>
                  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Disciplinary Action (DA) Details
                    <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="#AddDA" data-toggle="tab">Add new Disciplinary Details</a></li>
                            <li><a href="#DAList" data-toggle="tab" id="ListOfDATab">LIST OF DA's</a></li>
                          </ul>
                  </li>
                 
            </ul>

            <div class="tab-content">
                      
                      
                      <div id="AddCase" class="tab-pane fade">
                        <div id="CasesPanel">
                        <?php include($_SERVER['DOCUMENT_ROOT']."/setting/case/add.php"); ?>
                        </div>
                      </div>
                      <div id="CaseList" class="tab-pane fade">
                        <div id="CaseListSettingPanel">
                          <?php include($_SERVER['DOCUMENT_ROOT']."/setting/case/index.php"); ?>
                        </div>
                      </div>
                      <div id="AddCell" class="tab-pane fade">
                        <div id="CellAddPanel">
                        <?php include($_SERVER['DOCUMENT_ROOT']."/setting/cell/add.php"); ?>
                        </div>
                      </div>
                      <div id="CellList" class="tab-pane fade">
                        <div id="CellListSettingPanel">
                        <?php include($_SERVER['DOCUMENT_ROOT']."/setting/cell/index.php"); ?>
                        </div>
                      </div>

                      <div id="AddDA" class="tab-pane fade">
                        <div id="DAAddPanel">
                        <?php include($_SERVER['DOCUMENT_ROOT']."/setting/DA/add.php"); ?>
                        </div>
                      </div>
                      <div id="DAList" class="tab-pane fade">
                        <div id="DAListSettingPanel">
                        <?php include($_SERVER['DOCUMENT_ROOT']."/setting/DA/index.php"); ?>
                        </div>
                      </div>
                      
              
          </div> <!-- Closing of <div class="tab-content">  -->
</div>
</div>