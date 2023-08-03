</div>
<footer class="footer" id="footBg" >
      <div class="container text-center">
        <span >Copyright © 2017 All rights reserved.</span>
      </div>
</footer>
</body>

</html>
<script type="text/javascript">
                            // GLOBAL SECTION // GLOBAL SECTION
                            // GLOBAL SECTION // GLOBAL SECTION
                            // GLOBAL SECTION // GLOBAL SECTION
                            // GLOBAL Section // GLOBAL SECTION
  //Show inmate
  //Show inmate
  //Show inmate
  //Show inmate
  //Show inmate
  function ShowAddMainBody(){
      $("#MainBody").load("/Paralegal/InmateRecord/index.php");
  }
  function ShowOfficerAdd(){
      $("#MainPanel").load("/account/create.php");
  }
  function ShowInmateGlobal(){
      $('#MainPanel').load('/submenu/inmate.php');
  }
  function ShowlogGlobal(){
      $('#MainPanel').load('/submenu/logs.php');
  }
  function ShowCaseGlobal(){
          $('#MainPanel').load('/submenu/case.php');  
  }
  function ShowCaseGlobalGraph(CaseValue){
      $val = CaseValue;
      //alert($val);
      $('#MainPanel').load('/submenu/case.php?case='+$val);
      
      
  }
  function ShowDAGlobal(){
      $('#MainPanel').load('/submenu/da.php');
  }
  function ShowHearingGlobal(){
      $('#MainPanel').load('/submenu/hearing.php');
  }
  function ShowJailBookingGlobal(){
      $('#MainPanel').load('/submenu/jailbooking.php');
  }
  function ShowpropertyGlobal(){
      $('#MainPanel').load('/submenu/property.php');
  }
  function ShowMedicalGlobal(){
      $('#MainPanel').load('/submenu/medical.php');
  }
  function ShowDentalGlobal(){
      $('#MainPanel').load('/submenu/dental.php');
  }
  function ShowDeceasedGlobal(){
      $('#MainPanel').load('/submenu/deceased.php');
  }
  function ShowProgramGlobal(){
      $('#MainPanel').load('/submenu/program.php');
  }
  function ShowMedicalOfficerGlobal(){
      $('#MainPanel').load('/submenu/medicalofficer.php');
  }
  function ShowDentalOfficerGlobal(){
      $('#MainPanel').load('/submenu/DentalOfficer.php');
  }
  function ShowDeceasedlOfficerGlobal(){
      $('#MainPanel').load('/submenu/deceasedofficer.php');
  }
  function ShowListDorms(){
      $('#MainPanel').load('/submenu/dorm.php');
  }
  // Setting
  // Setting
  // Setting
  // Setting
  function ShowRecord(){
  		if ($('#SearchTxt').val() == "") {
  			alert("Please select inmate.");
  		} else {
  			var TheID = $('#SearchTxt').val();
        $('#MainPanel').load('/record.php?id='+TheID);
  		}
  		
    }
  function ShowCaseGlobalSearch(TheID){
      var val = TheID.value;
      $('#caseGlobal_list').load('/submenu/caseSearch.php?id='+val);
  }
  function ShowCaseResolved(TheID){
      var val = TheID.value;
      document.getElementById("Casefilter").selectedIndex = "0";
      //alert(Casefilter + ' ' +val);
      $('#caseGlobal_list').load('/submenu/caseR.php?id='+val);
  }
  function ShowDAResolved(TheID){
      var val = TheID.value;
      //document.getElementById("Casefilter").selectedIndex = "0";
      //alert(Casefilter + ' ' +val);
      $('#DAGlobal_list').load('/submenu/daR.php?id='+val);
  }
  function ShowdormSearch(TheID){
      var val = TheID.value;
      $('#dorm_list').load('/submenu/dormS.php?id='+val);
  }
  function ShowHearingGlobalSearch(TheID){
      var val = TheID.value;
      $('#HearingGlobal_list').load('/submenu/hearingSearch.php?id='+val);
  }
   function ShowHearingResolved(TheID){
      var val = TheID.value;
      document.getElementById("filterHearing").selectedIndex = "0";
      //alert(Casefilter + ' ' +val);
      $('#HearingGlobal_list').load('/submenu/hearingR.php?id='+val);
  }
  function ShowRecordGlobal(TheID){
      $('#MainPanel').load('/record.php?id='+TheID.id);
  }
  function showMyRecord(TheID){
      $('#MainPanel').load('/OfficerRecord.php?id='+TheID.id);
  }
  function ShowAbout(){
          $('#MainPanel').load('/about.php');
    }
  function showAccounts(){
        $('#MainPanel').load('account/users.php');
    }
  function showSetting(){
        $('#MainPanel').load('setting/');
    }
  function showInmateList(){
        $('#MainPanel').load('Paralegal/InmateRecord/InmateList.php');
    }
  //Show Visitor
  function ShowVisitorGlobal(){
      $('#MainPanel').load('/CustodialOfficer/Visitor/');
  }
  function ShowVisitorGlobalindi(){
      $('#VisitorPanel').load('/CustodialOfficer/Visitorindi/');
  }
  function ShowAddVisitor(){
      $('#MainPanel').load('/CustodialOfficer/Visitor/add.php');
  }
  function ShowAddVisitorindi(){
      $('#VisitorPanel').load('/CustodialOfficer/Visitorindi/add.php');
  }
  function showEditVisitor(TheID){
        $('#MainPanel').load('/CustodialOfficer/Visitor/edit.php?id='+TheID.id);
    }
  function showEditVisitorindi(TheID){
        $('#VisitorPanel').load('/CustodialOfficer/Visitorindi/edit.php?id='+TheID.id);
    }
  function DelVisitor(TheId){

      var r = confirm("Are you sure you want to delete this record under \"" + TheId.getAttribute("rname") +"\" ?");
      if (r == true) {
          location = '/CustodialOfficer/Visitor/del.php?id='+TheId.id
          //alert('Record Successfully deleted.');
          //location = '/main.php'
      } else {
         
      }
    }
  function DelVisitorindi(TheId){

      var r = confirm("Are you sure you want to delete this record under \"" + TheId.getAttribute("rname") +"\" ?");
      if (r == true) {
          location = '/CustodialOfficer/Visitorindi/del.php?id='+TheId.id
          //alert('Record Successfully deleted.');
          //location = '/main.php'
      } else {
         
      }
    }
  //Show Items
  function ShowItemsGlobal(){
      $('#MainPanel').load('/CustodialOfficer/items/');
  }
  function ShowItemsGlobalindi(){
      $('#VisitorItemPanel').load('/CustodialOfficer/itemsindi/');
  }
  function ShowAddItems(){
      $('#MainPanel').load('/CustodialOfficer/items/add.php');
  }
  function ShowAddItemsindi(){
      $('#VisitorItemPanel').load('/CustodialOfficer/itemsindi/add.php');
  }
  function showEditItems(TheID){
        $('#MainPanel').load('/CustodialOfficer/items/edit.php?id='+TheID.id);
    }
  function showEditItemsindi(TheID){
        $('#VisitorItemPanel').load('/CustodialOfficer/itemsindi/edit.php?id='+TheID.id);
    }
  function DelItems(TheId){

      var r = confirm("Are you sure you want to delete this record under \"" + TheId.getAttribute("rname") +"\" ?");
      if (r == true) {
          location = '/CustodialOfficer/items/del.php?id='+TheId.id
          //alert('Record Successfully deleted.');
          //location = '/main.php'
      } else {
         
      }
    }
  function DelItemsindi(TheId){

      var r = confirm("Are you sure you want to delete this record under \"" + TheId.getAttribute("rname") +"\" ?");
      if (r == true) {
          location = '/CustodialOfficer/itemsindi/del.php?id='+TheId.id
          //alert('Record Successfully deleted.');
          //location = '/main.php'
      } else {
         
      }
    }
  //PRINTS SECTION
  //PRINTS SECTION
  //PRINTS SECTION
  //PRINTS SECTION
  //PRINTS SECTION
  //PRINTS SECTION
  //PRINTS SECTION
  //PRINTS SECTION

  function PrintPersonalInfo(){
      var win = window.open('/prints/PersonalInformation.php', '_blank');
      win.focus();
   }
  function PrintR4A_Form(){
    var win = window.open('/prints/R4A_Form.php', '_blank');
    win.focus();
    
      
  }
  function PrintInmateList(){
      var win = window.open('/prints/inmate_list.php', '_blank');
      win.focus();
  }
  function PrintCaseList(){
      var win = window.open('/prints/Case_list.php', '_blank');
      win.focus();
  }
  function PrintLogList(){
      var win = window.open('/prints/logs.php', '_blank');
      win.focus();
  }
  function PrintDaList(){
      var win = window.open('/prints/da.php', '_blank');
      win.focus();
  }
  function PrintHearingList(){
      var win = window.open('/prints/Hearing_list.php', '_blank');
      win.focus();
  }
  function PrintJailList(){
      var win = window.open('/prints/Jail_list.php', '_blank');
      win.focus();
  }
  function PrintProgramList(){
      var win = window.open('/prints/Program_list.php', '_blank');
      win.focus();
  }
  function PrintPropertyList(){
      var win = window.open('/prints/Property_list.php', '_blank');
      win.focus();
  }
  function PrintMedicalList(){
      var win = window.open('/prints/Medical_list.php', '_blank');
      win.focus();
  }
  function PrintMedicalOfficerList(){
      var win = window.open('/prints/medicalofficer.php', '_blank');
      win.focus();
  }
  function PrintDentalList(){
      var win = window.open('/prints/dental.php', '_blank');
      win.focus();
  }
  function PrintDentalOfficerList(){
      var win = window.open('/prints/dentalofficer.php', '_blank');
      win.focus();
  }
  function PrintDeceasedList(){
      var win = window.open('/prints/deceased.php', '_blank');
      win.focus();
  }
  function PrintDeceasedOfficerList(){
      var win = window.open('/prints/deceasedofficer.php', '_blank');
      win.focus();
  }
  function PrintVisitorList(){
      var win = window.open('/prints/Visitor_List.php', '_blank');
      win.focus();
  }
  function PrintVisitorItemList(){
      var win = window.open('/prints/VisitorItem_list.php', '_blank');
      win.focus();
  }
  function PrintManifest(TheId){
      var win = window.open('/prints/manifest.php?id='+TheId.id, '_blank');
      win.focus();
  }
  //Images Upload
  //Images Upload
  //Images Upload
  //Images Upload
  //Images Upload
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
    //ProgramsSection
    //ProgramsSection
    //ProgramsSection
    //ProgramsSection
    //ProgramsSection
    function showAddPrograms(){
        $('#ProgramMainPanel').load('IWDUnitOfficer/programs/add.php');
    }
    function showEditPrograms(TheID){
        $('#ProgramMainPanel').load('IWDUnitOfficer/programs/edit.php?id='+ TheID.id);
    }
    function showProgramList(){
        $('#ProgramMainPanel').load('IWDUnitOfficer/programs/index.php');
    }
    //MedicalSection
    //MedicalSection
    //MedicalSection
    //MedicalSection
    //MedicalSection
    function showAddMedical(){
        $('#MedicalMainPanel').load('JailNurse/Inmate/add.php');
    }
    function showMedicalList(){
        $('#MedicalMainPanel').load('JailNurse/Inmate/index.php');
    }
    //MedicalSectionOfficer
    //MedicalSectionOfficer
    //MedicalSectionOfficer
    //MedicalSectionOfficer
    //MedicalSectionOfficer
    function showAddMedicalOfficer(){
        $('#OMedicalMainPanel').load('JailNurse/OfficerMedical/add.php');
    }
    function showMedicalListOfficer(){
        $('#OMedicalMainPanel').load('JailNurse/OfficerMedical/index.php');
    }
    //Dental Section
    //Dental Section
    //Dental Section
    //Dental Section
    function showAddDental(){
        $('#DentalMainPanel').load('JailNurse/Dental/add.php');
    }
    function showdentalList(){
        $('#DentalMainPanel').load('JailNurse/Dental/index.php');
    }
    //Dental SectionOfficer
    //Dental SectionOfficer
    //Dental SectionOfficer
    //Dental SectionOfficer
    function showAddDentalOfficer(){
        $('#ODentalMainPanel').load('JailNurse/OfficerDental/add.php');
    }
    function showdentalListOfficer(){
        $('#ODentalMainPanel').load('JailNurse/OfficerDental/index.php');
    }
     //Deceased Section
     //Deceased Section
     //Deceased Section
     //Deceased Section
    function showAddDeceased(TheID){
        $('#DeceasedMainPanel').load('JailNurse/Deceased/add.php?id='+ TheID.id);
    }
    function showDeceasedList(){
        $('#DeceasedMainPanel').load('JailNurse/Deceased/index.php');
    }



    //PropertySection
    //PropertySection
    //PropertySection
    //PropertySection
    //PropertySection
    function showAddProperty(){
        $('#PropertyMainPanel').load('SearchOfficer/Item/add.php');
    }
    function showPropertyList(){
        $('#PropertyMainPanel').load('SearchOfficer/Item/index.php');
    }
    //Manifest Section
    //Manifest Section
    //Manifest Section
    //Manifest Section
    //Manifest Section
    function showAddManifest(){
        $('#ManifestMainPanel').load('RecordsOfficer/manifest/add.php');
    }
    function showManifestlist(){
        $('#ManifestMainPanel').load('RecordsOfficer/manifest/index.php');
    }
    //Case Section
    //Case Section
    //Case Section
    //Case Section
    //Case Section
    //Case Section
    //Case Section
    
    function showCaseParalegal(){
        $('#CasesPanel').load('Paralegal/InmateCase/CaseList.php');
    }
    function showAddInmateCaseParalegal(){
        $('#CasesPanel').load('Paralegal/InmateCase/add.php');
    }
    function showEditInmateCaseParalegal(TheID){
        $('#CasesPanel').load('Paralegal/InmateCase/edit.php?id='+TheID.id);
    }
    function showStatusInmateCaseParalegal(TheID){
        $('#CasesPanel').load('Paralegal/InmateCase/status.php?id='+TheID.id);
    }
    // Personal Information
    // Personal Information
    // Personal Information
    // Personal Information
    // Personal Information
    // Personal Information
    function showPersonalInfo (){
      $('#PersonalInfoPanel').load('/Paralegal/InmateRecord/PersonalInfo.php');
      
    }
    //Hearing Details Section
    //Hearing Details Section
    //Hearing Details Section
    //Hearing Details Section
    function showHearingDetail (){
      $('#HearingPanel').load("/Paralegal/InmateHearing/HearingList.php");
    }
    function showAddHearingDetail (){
      $('#HearingPanel').load("/Paralegal/InmateHearing/add.php");
    }
    function showEditHearingDetail (TheID){
      $('#HearingPanel').load("/Paralegal/InmateHearing/edit.php?id="+TheID.id);
    }
    function showStatusInmatehearingParalegal(TheID){
        $('#HearingPanel').load('Paralegal/InmateHearing/status.php?id='+TheID.id);
    }
    //DA details section
    //DA details section
    //DA details section
    //DA details section
    //DA details section
    function showAddDADetail (){
      $('#DAPanel').load("/Paralegal/da/add.php");
    }
    function showEditDADetail (TheID){
      $('#DAPanel').load("/Paralegal/da/edit.php?id="+TheID.id);
    }
    function showDADetail (){
      $('#DAPanel').load("/Paralegal/da/daList.php");
    }
    function showStatusInmatedaParalegal(TheID){
        $('#DAPanel').load('Paralegal/da/status.php?id='+TheID.id);
    }
    //Case Setting
    //Case Setting
    //Case Setting
    //Case Setting
    //Case Setting
    //Case Setting
    function showCaseListSetting(){
      //$('#CaseListSettingPanel').empty();
      $('#CaseListSettingPanel').load("/setting/case/index.php");
    }
    function showDAListSetting(){
      //$('#CaseListSettingPanel').empty();
      $('#DAListSettingPanel').load("/setting/DA/index.php");
    }
    function showDAListSettingAdd(){
      //$('#CaseListSettingPanel').empty();
      $('#ListOfDATab').click();
    }
    function showCaseListSettingAdd(){
      //$('#CaseListSettingPanel').empty();
      $('#ListOfCaseTab').click();
    }
    function showCellListSetting(){
      //$('#CaseListSettingPanel').empty();
      $('#CellListSettingPanel').load("/setting/cell/index.php");
    }
    function showCellListSettingAdd(){
      //$('#CaseListSettingPanel').empty();
      $('#ListOfCellTab').click();
    }
    function ShowHomeTab(){
      //$('#CaseListSettingPanel').empty();
      $('#ProfileHomeTab').click();
    }
    function ShowOfficerDental(){
      //$('#CaseListSettingPanel').empty();
      $('#ODentalTab').click();
    }
    function ShowOfficermedical(){
      //$('#CaseListSettingPanel').empty();
      $('#OMedicalTab').click();
    }
    function ShowOfficerHome(){
      //$('#CaseListSettingPanel').empty();
      $('#ProfileHomeTabOfficer').click();
    }
    //Show JAil Booking Edit
    //Show JAil Booking Edit
    //Show JAil Booking Edit
    //Show JAil Booking Edit
    //Show JAil Booking Edit
    function ShowJailBookingEdit(TheID){
        $('#JailBookingMainPanel').load('/RecordsOfficer/JailBooking/edit.php?id='+TheID.id);
    }
    function showProfileHomeTab(){
      //$('#CaseListSettingPanel').empty();
      $('#ProfileHomeTab').click();
    }
    //Images Upload
    //Images Upload
    //Images Upload
    //Images Upload
    //Images Upload
    function ShowImagesEdit(TheID){
        $('#PersonalInfoPanel').load('InmateRecords/edit_images.php?id='+TheID.id);
    }
    function DeleteConfirm(TheId){

      var r = confirm("Are you sure you want to delete this record under \"" + TheId.getAttribute("rname") +"\" ?");
      if (r == true) {
          location = '/inmaterecords/delete.php?eid='+TheId.id
          //alert('Record Successfully deleted.');
          //location = '/main.php'
      } else {
         
      }
    }
    <?php if(isset($_GET) && !empty($_GET)) { ?>
            <?php if ($_GET["r"] == "inmate") { ?>
                ShowInmateGlobal();
            <?php } elseif ($_GET["r"] == "case") { ?>
                ShowCaseGlobal();
            <?php } elseif ($_GET["r"] == "hearing") { ?>
                ShowHearingGlobal();
            <?php } elseif ($_GET["r"] == "jail") { ?>
                ShowJailBookingGlobal();
            <?php } elseif ($_GET["r"] == "program") { ?>
                ShowProgramGlobal();
            <?php } elseif ($_GET["r"] == "medical") { ?>
                ShowMedicalGlobal();
            <?php } elseif ($_GET["r"] == "Visitor") { ?>
                ShowVisitorGlobal();
            <?php } elseif ($_GET["r"] == "da") { ?>
                ShowDAGlobal();
            <?php } elseif ($_GET["r"] == "VisitorItem") { ?>
                ShowItemsGlobal();
            <?php } elseif ($_GET['r'] == "caseValue") { ?>
                var CaseValue = <?php echo $_GET['e']; ?>;
                ShowCaseGlobalGraph(CaseValue)
            <?php } elseif ($_GET['r'] == "caselist") { ?>
                var InmateIDTemp = <?php echo $_SESSION['Temp_InmateID']; ?>;
                $('#MainPanel').load('/record.php?id='+InmateIDTemp+'&r=caselist');
            <?php } elseif ($_GET['r'] == "hearinglist") { ?>
                var InmateIDTemp = <?php echo $_SESSION['Temp_InmateID']; ?>;
                $('#MainPanel').load('/record.php?id='+InmateIDTemp+'&r=hearinglist');
            <?php } elseif ($_GET['r'] == "dalist") { ?>
                var InmateIDTemp = <?php echo $_SESSION['Temp_InmateID']; ?>;
                $('#MainPanel').load('/record.php?id='+InmateIDTemp+'&r=dalist');
            <?php  } // end of else ?>

    <?php } // end of get ?>
                  
    

</script>