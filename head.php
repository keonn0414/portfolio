<?php
if(session_status() == PHP_SESSION_NONE){session_start();}
if (empty($_SESSION) || !isset($_SESSION['signed_in'], $_SESSION['Emp_pos']) || (isset($_SESSION['signed_in']) && $_SESSION['signed_in'] === false)) header('location: /index.php');
include $_SERVER["DOCUMENT_ROOT"]."/config.php";
// Count case
$result = mysqli_query($conn,"SELECT id FROM tbl_casedetails");
$_SESSION['caseCount'] = mysqli_num_rows($result);
// Count hearing
$result = mysqli_query($conn,"SELECT id FROM tbl_hearingdetails");
$_SESSION['HearingCount'] = mysqli_num_rows($result);
// Count Jail Booking
$result = mysqli_query($conn,"SELECT id FROM tbl_jailbooking");
$_SESSION['JailCount'] = mysqli_num_rows($result);
// Count Programs
$result = mysqli_query($conn,"SELECT id FROM tbl_programs");
$_SESSION['programCount'] = mysqli_num_rows($result);
// Count Property
$result = mysqli_query($conn,"SELECT id FROM tbl_property");
$_SESSION['propertyCount'] = mysqli_num_rows($result);
// Count Medical
$result = mysqli_query($conn,"SELECT id FROM tbl_medical");
$_SESSION['medicalCount'] = mysqli_num_rows($result);
// Count Dental
$result = mysqli_query($conn,"SELECT id FROM tbl_dental");
$_SESSION['dentalCount'] = mysqli_num_rows($result);
// Count Dental


//Count User
$result = mysqli_query($conn,"SELECT id FROM tbl_users");
$_SESSION['TotalUser'] = mysqli_num_rows($result);
//count visitor
$result = mysqli_query($conn,"SELECT id FROM tbl_visitor");
$_SESSION['TotalVisitor'] = mysqli_num_rows($result);
//count items
$result = mysqli_query($conn,"SELECT id FROM tbl_visitor_items");
$_SESSION['TotalVisitorItem'] = mysqli_num_rows($result);
//count DA
$result = mysqli_query($conn,"SELECT id FROM tbl_dadetails");
$_SESSION['dacount'] = mysqli_num_rows($result);
// $_SESSION['MaleCount'] = $Male;
// $_SESSION['FemaleCount'] = $Female;
//Gender
$result = mysqli_query($conn,"SELECT id,gender FROM tbl_inmate where gender='Female' AND ReceivingJail !='Deceased' AND ReceivingJail!='Released' AND ReceivingJail!='Transferred'");
$_SESSION['female'] = mysqli_num_rows($result);
$result = mysqli_query($conn,"SELECT id,gender FROM tbl_inmate where gender='Male' AND ReceivingJail !='Deceased' AND ReceivingJail!='Released' AND ReceivingJail!='Transferred'");
$_SESSION['male'] = mysqli_num_rows($result);

//Inmate Status
$result = mysqli_query($conn,"SELECT id,ReceivingJail FROM tbl_inmate where ReceivingJail='Deceased'");
$_SESSION['deceasedCount'] = mysqli_num_rows($result);
$result = mysqli_query($conn,"SELECT id,ReceivingJail FROM tbl_inmate where ReceivingJail='Released'");
$_SESSION['ReleasedCount'] = mysqli_num_rows($result);
$result = mysqli_query($conn,"SELECT id,ReceivingJail FROM tbl_inmate where ReceivingJail='Transferred'");
$_SESSION['TransferredCount'] = mysqli_num_rows($result);
$result = mysqli_query($conn,"SELECT id,ReceivingJail FROM tbl_inmate where ReceivingJail='Not Registered'");
$_SESSION['NotRegisteredCount'] = mysqli_num_rows($result);
// Count Inmate
$result = mysqli_query($conn,"SELECT id FROM tbl_inmate");
$_SESSION['TotalInmate'] = mysqli_num_rows($result);
$_SESSION['DormPopulation'] = $_SESSION['TotalInmate'] - ($_SESSION['deceasedCount'] + $_SESSION['ReleasedCount']+$_SESSION['TransferredCount']);
$Registered = $_SESSION['TotalInmate'] - ($_SESSION['deceasedCount'] + $_SESSION['ReleasedCount']+$_SESSION['TransferredCount']+$_SESSION['NotRegisteredCount']);
$LiveCount = $_SESSION['DormPopulation']- $_SESSION['deceasedCount'];

if ($_SESSION['Emp_pos'] == 'Records Officer') {
    echo '<script type="text/javascript" src="js/fusioncharts.js"></script>
    <script type="text/javascript" src="js/fusioncharts.charts.js"></script>
    <script type="text/javascript">
      FusionCharts.ready(function () {
        var ageGroupChart = new FusionCharts({
            type: "pie2d",
            renderAt: "InmateGraph",
            width: "100%",
            height: "70%",
            dataFormat: "json",
            dataSource: {
                "chart": {
                    "caption": "Summary of Inmate Population",
                    "paletteColors": "#0075c2,#8e0000,#f45b00,#f2c500,#02effc,#1afc01",
                    "bgColor": "#ffffff",
                    "showBorder": "0",
                    "use3DLighting": "0",
                    "showShadow": "0",
                    "enableSmartLabels": "0",
                    "startingAngle": "0",
                    "showPercentValues": "1",
                    "showPercentInTooltip": "0",
                    "decimals": "1",
                    "captionFontSize": "14",
                    "subcaptionFontSize": "14",
                    "baseFontSize": "14",
                    "subcaptionFontBold": "0",
                    "toolTipColor": "#ffffff",
                    "toolTipBorderThickness": "0",
                    "toolTipBgColor": "#000000",
                    "toolTipBgAlpha": "80",
                    "toolTipBorderRadius": "2",
                    "toolTipPadding": "5",
                    "showHoverEffect":"1",
                    "showLegend": "1",
                    "legendBgColor": "#ffffff",
                    "legendBorderAlpha": "0",
                    "legendShadow": "0",
                    "legendItemFontSize": "16",
                    "legendItemFontColor": "#666666"

                },
                "data": [
                    {
                        "label": "Inmate",
                        "value": "'.$_SESSION['TotalInmate'].'",
                        "link": "/main.php?r=inmate"
                    }, 
                    {
                        "label": "Case",
                        "value": "'.$_SESSION['caseCount'].'",
                        
                    },
                    {
                        "label": "Hearing",
                        "value": "'.$_SESSION['HearingCount'].'",
                        
                    },
                    {
                        "label": "Jail Booking",
                        "value": "'.$_SESSION['JailCount'].'",
                        "link": "/main.php?r=jail"
                    },
                    {
                        "label": "Program",
                        "value": "'.$_SESSION['programCount'].'",
                        
                    },
                    {
                        "label": "Medical",
                        "value": "'.$_SESSION['medicalCount'].'",
                        
                    }
                ]
            }
        }).render();
    }); </script>';
    //Male Female Graph
    echo '<script type="text/javascript" src="js/fusioncharts.js"></script>
    <script type="text/javascript" src="js/fusioncharts.charts.js"></script>
    <script type="text/javascript">
      FusionCharts.ready(function () {
        var ageGroupChart = new FusionCharts({
            type: "pie2d",
            renderAt: "GenderGraph",
            width: "100%",
            height: "70%",
            dataFormat: "json",
            dataSource: {
                "chart": {
                    "caption": "Summary of Inmate Sex",
                    "paletteColors": "#6ba3ff,#6aff7c",
                    "bgColor": "#ffffff",
                    "showBorder": "0",
                    "use3DLighting": "0",
                    "showShadow": "0",
                    "enableSmartLabels": "0",
                    "startingAngle": "0",
                    "showPercentValues": "1",
                    "showPercentInTooltip": "0",
                    "decimals": "1",
                    "captionFontSize": "14",
                    "subcaptionFontSize": "14",
                    "subcaptionFontBold": "0",
                    "toolTipColor": "#ffffff",
                    "toolTipBorderThickness": "0",
                    "toolTipBgColor": "#000000",
                    "toolTipBgAlpha": "80",
                    "toolTipBorderRadius": "2",
                    "toolTipPadding": "5",
                    "baseFontSize": "14",
                    "showHoverEffect":"1",
                    "showLegend": "1",
                    "legendBgColor": "#ffffff",
                    "legendBorderAlpha": "0",
                    "legendShadow": "0",
                    "legendItemFontSize": "16",
                    "legendItemFontColor": "#666666"

                },
                "data": [
                    {
                        "label": "Male",
                        "value": "'.$_SESSION['male'].'",
                    }, 
                    {
                        "label": "Female",
                        "value": "'.$_SESSION['female'].'",
                    }
                ]
            }
        }).render();
    }); </script>';
} elseif ($_SESSION['Emp_pos'] == 'Paralegal Officer') {
    echo '<script type="text/javascript" src="js/fusioncharts.js"></script>
    <script type="text/javascript" src="js/fusioncharts.charts.js"></script>
    <script type="text/javascript">
      FusionCharts.ready(function () {
        var ageGroupChart = new FusionCharts({
            type: "pie2d",
            renderAt: "InmateGraph",
            width: "100%",
            height: "70%",
            dataFormat: "json",
            dataSource: {
                "chart": {
                    "caption": "Summary of Inmate Population",
                    "paletteColors": "#0075c2,#8e0000,#f45b00,#f2c500,#02effc,#1afc01",
                    "bgColor": "#ffffff",
                    "showBorder": "0",
                    "use3DLighting": "0",
                    "showShadow": "0",
                    "enableSmartLabels": "0",
                    "startingAngle": "0",
                    "showPercentValues": "1",
                    "showPercentInTooltip": "0",
                    "decimals": "1",
                    "captionFontSize": "14",
                    "subcaptionFontSize": "14",
                    "subcaptionFontBold": "0",
                    "toolTipColor": "#ffffff",
                    "toolTipBorderThickness": "0",
                    "toolTipBgColor": "#000000",
                    "toolTipBgAlpha": "80",
                    "toolTipBorderRadius": "2",
                    "toolTipPadding": "5",
                    "baseFontSize": "14",
                    "showHoverEffect":"1",
                    "showLegend": "1",
                    "legendBgColor": "#ffffff",
                    "legendBorderAlpha": "0",
                    "legendShadow": "0",
                    "legendItemFontSize": "16",
                    "legendItemFontColor": "#666666"

                },
                "data": [
                    {
                        "label": "Inmate",
                        "value": "'.$_SESSION['TotalInmate'].'",
                        "link": "/main.php?r=inmate"
                    }, 
                    {
                        "label": "Case",
                        "value": "'.$_SESSION['caseCount'].'",
                        "link": "/main.php?r=case"
                    },
                    {
                        "label": "Hearing",
                        "value": "'.$_SESSION['HearingCount'].'",
                        "link": "/main.php?r=hearing"
                    },
                    {
                        "label": "Jail Booking",
                        "value": "'.$_SESSION['JailCount'].'",
                        
                    },
                    {
                        "label": "Program",
                        "value": "'.$_SESSION['programCount'].'",
                        
                    },
                    {
                        "label": "Medical",
                        "value": "'.$_SESSION['medicalCount'].'",
                        
                    }
                ]
            }
        }).render();
    }); </script>';
    //Male Female Graph
    echo '<script type="text/javascript" src="js/fusioncharts.js"></script>
    <script type="text/javascript" src="js/fusioncharts.charts.js"></script>
    <script type="text/javascript">
      FusionCharts.ready(function () {
        var ageGroupChart = new FusionCharts({
            type: "pie2d",
            renderAt: "GenderGraph",
            width: "100%",
            height: "70%",
            dataFormat: "json",
            dataSource: {
                "chart": {
                    "caption": "Summary of Inmate Sex",
                    "paletteColors": "#6ba3ff,#6aff7c",
                    "bgColor": "#ffffff",
                    "showBorder": "0",
                    "use3DLighting": "0",
                    "showShadow": "0",
                    "enableSmartLabels": "0",
                    "startingAngle": "0",
                    "showPercentValues": "1",
                    "showPercentInTooltip": "0",
                    "decimals": "1",
                    "captionFontSize": "14",
                    "subcaptionFontSize": "14",
                    "subcaptionFontBold": "0",
                    "baseFontSize": "14",
                    "toolTipColor": "#ffffff",
                    "toolTipBorderThickness": "0",
                    "toolTipBgColor": "#000000",
                    "toolTipBgAlpha": "80",
                    "toolTipBorderRadius": "2",
                    "toolTipPadding": "5",
                    "showHoverEffect":"1",
                    "showLegend": "1",
                    "legendBgColor": "#ffffff",
                    "legendBorderAlpha": "0",
                    "legendShadow": "0",
                    "legendItemFontSize": "16",
                    "legendItemFontColor": "#666666"

                },
                "data": [
                    {
                        "label": "Male",
                        "value": "'.$_SESSION['male'].'",
                    }, 
                    {
                        "label": "Female",
                        "value": "'.$_SESSION['female'].'",
                    }
                ]
            }
        }).render();
    }); </script>';
} elseif ($_SESSION['Emp_pos'] == 'IWD unit Officer') {
    echo '<script type="text/javascript" src="js/fusioncharts.js"></script>
    <script type="text/javascript" src="js/fusioncharts.charts.js"></script>
    <script type="text/javascript">
      FusionCharts.ready(function () {
        var ageGroupChart = new FusionCharts({
            type: "pie2d",
            renderAt: "InmateGraph",
            width: "100%",
            height: "70%",
            dataFormat: "json",
            dataSource: {
                "chart": {
                    "caption": "Summary of Inmate Population",
                    "paletteColors": "#0075c2,#8e0000,#f45b00,#f2c500,#02effc,#1afc01",
                    "bgColor": "#ffffff",
                    "showBorder": "0",
                    "use3DLighting": "0",
                    "showShadow": "0",
                    "enableSmartLabels": "0",
                    "startingAngle": "0",
                    "showPercentValues": "1",
                    "showPercentInTooltip": "0",
                    "decimals": "1",
                    "captionFontSize": "14",
                    "baseFontSize": "14",
                    "subcaptionFontSize": "14",
                    "subcaptionFontBold": "0",
                    "toolTipColor": "#ffffff",
                    "toolTipBorderThickness": "0",
                    "toolTipBgColor": "#000000",
                    "toolTipBgAlpha": "80",
                    "toolTipBorderRadius": "2",
                    "toolTipPadding": "5",
                    "showHoverEffect":"1",
                    "showLegend": "1",
                    "legendBgColor": "#ffffff",
                    "legendBorderAlpha": "0",
                    "legendShadow": "0",
                    "legendItemFontSize": "16",
                    "legendItemFontColor": "#666666"

                },
                "data": [
                    {
                        "label": "Inmate",
                        "value": "'.$_SESSION['TotalInmate'].'",
                        "link": "/main.php?r=inmate"
                    }, 
                    {
                        "label": "Case",
                        "value": "'.$_SESSION['caseCount'].'",
                        
                    },
                    {
                        "label": "Hearing",
                        "value": "'.$_SESSION['HearingCount'].'",
                        
                    },
                    {
                        "label": "Jail Booking",
                        "value": "'.$_SESSION['JailCount'].'",
                        
                    },
                    {
                        "label": "Program",
                        "value": "'.$_SESSION['programCount'].'",
                        "link": "/main.php?r=program"
                    },
                    {
                        "label": "Medical",
                        "value": "'.$_SESSION['medicalCount'].'",
                        
                    }
                ]
            }
        }).render();
    }); </script>';
    //Male Female Graph
    echo '<script type="text/javascript" src="js/fusioncharts.js"></script>
    <script type="text/javascript" src="js/fusioncharts.charts.js"></script>
    <script type="text/javascript">
      FusionCharts.ready(function () {
        var ageGroupChart = new FusionCharts({
            type: "pie2d",
            renderAt: "GenderGraph",
            width: "100%",
            height: "70%",
            dataFormat: "json",
            dataSource: {
                "chart": {
                    "caption": "Summary of Inmate Sex",
                    "paletteColors": "#6ba3ff,#6aff7c",
                    "bgColor": "#ffffff",
                    "showBorder": "0",
                    "use3DLighting": "0",
                    "showShadow": "0",
                    "enableSmartLabels": "0",
                    "startingAngle": "0",
                    "showPercentValues": "1",
                    "showPercentInTooltip": "0",
                    "decimals": "1",
                    "captionFontSize": "14",
                    "subcaptionFontSize": "14",
                    "subcaptionFontBold": "0",
                    "toolTipColor": "#ffffff",
                    "toolTipBorderThickness": "0",
                    "toolTipBgColor": "#000000",
                    "toolTipBgAlpha": "80",
                    "toolTipBorderRadius": "2",
                    "toolTipPadding": "5",
                    "showHoverEffect":"1",
                    "showLegend": "1",
                    "legendBgColor": "#ffffff",
                    "legendBorderAlpha": "0",
                    "baseFontSize": "14",
                    "legendShadow": "0",
                    "legendItemFontSize": "16",
                    "legendItemFontColor": "#666666"

                },
                "data": [
                    {
                        "label": "Male",
                        "value": "'.$_SESSION['male'].'",
                    }, 
                    {
                        "label": "Female",
                        "value": "'.$_SESSION['female'].'",
                    }
                ]
            }
        }).render();
    }); </script>';
} elseif ($_SESSION['Emp_pos'] == 'Search Officer') {
    echo '<script type="text/javascript" src="js/fusioncharts.js"></script>
    <script type="text/javascript" src="js/fusioncharts.charts.js"></script>
    <script type="text/javascript">
      FusionCharts.ready(function () {
        var ageGroupChart = new FusionCharts({
            type: "pie2d",
            renderAt: "InmateGraph",
            width: "100%",
            height: "70%",
            dataFormat: "json",
            dataSource: {
                "chart": {
                    "caption": "Summary of Inmate Population",
                    "paletteColors": "#0075c2,#8e0000,#f45b00,#f2c500,#02effc,#1afc01",
                    "bgColor": "#ffffff",
                    "showBorder": "0",
                    "use3DLighting": "0",
                    "showShadow": "0",
                    "enableSmartLabels": "0",
                    "startingAngle": "0",
                    "showPercentValues": "1",
                    "showPercentInTooltip": "0",
                    "decimals": "1",
                    "captionFontSize": "14",
                    "subcaptionFontSize": "14",
                    "baseFontSize": "14",
                    "subcaptionFontBold": "0",
                    "toolTipColor": "#ffffff",
                    "toolTipBorderThickness": "0",
                    "toolTipBgColor": "#000000",
                    "toolTipBgAlpha": "80",
                    "toolTipBorderRadius": "2",
                    "toolTipPadding": "5",
                    "showHoverEffect":"1",
                    "showLegend": "1",
                    "legendBgColor": "#ffffff",
                    "legendBorderAlpha": "0",
                    "legendShadow": "0",
                    "legendItemFontSize": "16",
                    "legendItemFontColor": "#666666"

                },
                "data": [
                    {
                        "label": "Inmate",
                        "value": "'.$_SESSION['TotalInmate'].'",
                        "link": "/main.php?r=inmate"
                    }, 
                    {
                        "label": "Case",
                        "value": "'.$_SESSION['caseCount'].'",
                        
                    },
                    {
                        "label": "Hearing",
                        "value": "'.$_SESSION['HearingCount'].'",
                        
                    },
                    {
                        "label": "Jail Booking",
                        "value": "'.$_SESSION['JailCount'].'",
                        
                    },
                    {
                        "label": "Program",
                        "value": "'.$_SESSION['programCount'].'",
                        
                    },
                    {
                        "label": "Medical",
                        "value": "'.$_SESSION['medicalCount'].'",
                        
                    }
                ]
            }
        }).render();
    }); </script>';
    //Male Female Graph
    echo '<script type="text/javascript" src="js/fusioncharts.js"></script>
    <script type="text/javascript" src="js/fusioncharts.charts.js"></script>
    <script type="text/javascript">
      FusionCharts.ready(function () {
        var ageGroupChart = new FusionCharts({
            type: "pie2d",
            renderAt: "GenderGraph",
            width: "100%",
            height: "70%",
            dataFormat: "json",
            dataSource: {
                "chart": {
                    "caption": "Summary of Inmate Sex",
                    "paletteColors": "#6ba3ff,#6aff7c",
                    "bgColor": "#ffffff",
                    "showBorder": "0",
                    "use3DLighting": "0",
                    "showShadow": "0",
                    "enableSmartLabels": "0",
                    "startingAngle": "0",
                    "showPercentValues": "1",
                    "baseFontSize": "14",
                    "showPercentInTooltip": "0",
                    "decimals": "1",
                    "captionFontSize": "14",
                    "subcaptionFontSize": "14",
                    "subcaptionFontBold": "0",
                    "toolTipColor": "#ffffff",
                    "toolTipBorderThickness": "0",
                    "toolTipBgColor": "#000000",
                    "toolTipBgAlpha": "80",
                    "toolTipBorderRadius": "2",
                    "toolTipPadding": "5",
                    "showHoverEffect":"1",
                    "showLegend": "1",
                    "legendBgColor": "#ffffff",
                    "legendBorderAlpha": "0",
                    "legendShadow": "0",
                    "legendItemFontSize": "16",
                    "legendItemFontColor": "#666666"

                },
                "data": [
                    {
                        "label": "Male",
                        "value": "'.$_SESSION['male'].'",
                    }, 
                    {
                        "label": "Female",
                        "value": "'.$_SESSION['female'].'",
                    }
                ]
            }
        }).render();
    }); </script>';
} elseif ($_SESSION['Emp_pos'] == 'Custodial Officer') {
    echo '<script type="text/javascript" src="js/fusioncharts.js"></script>
    <script type="text/javascript" src="js/fusioncharts.charts.js"></script>
    <script type="text/javascript">
      FusionCharts.ready(function () {
        var ageGroupChart = new FusionCharts({
            type: "pie2d",
            renderAt: "InmateGraph",
            width: "100%",
            height: "70%",
            dataFormat: "json",
            dataSource: {
                "chart": {
                    "caption": "Summary of Inmate Population",
                    "paletteColors": "#0075c2,#8e0000,#f45b00,#f2c500,#02effc,#1afc01",
                    "bgColor": "#ffffff",
                    "showBorder": "0",
                    "use3DLighting": "0",
                    "showShadow": "0",
                    "enableSmartLabels": "0",
                    "startingAngle": "0",
                    "showPercentValues": "1",
                    "showPercentInTooltip": "0",
                    "decimals": "1",
                    "captionFontSize": "14",
                    "subcaptionFontSize": "14",
                    "subcaptionFontBold": "0",
                    "toolTipColor": "#ffffff",
                    "toolTipBorderThickness": "0",
                    "toolTipBgColor": "#000000",
                    "toolTipBgAlpha": "80",
                    "toolTipBorderRadius": "2",
                    "toolTipPadding": "5",
                    "baseFontSize": "14",
                    "showHoverEffect":"1",
                    "showLegend": "1",
                    "legendBgColor": "#ffffff",
                    "legendBorderAlpha": "0",
                    "legendShadow": "0",
                    "legendItemFontSize": "16",
                    "legendItemFontColor": "#666666"

                },
                "data": [
                    {
                        "label": "Inmate",
                        "value": "'.$_SESSION['TotalInmate'].'",
                        "link": "/main.php?r=inmate"
                    }, 
                    {
                        "label": "Case",
                        "value": "'.$_SESSION['caseCount'].'",
                        
                    },
                    {
                        "label": "Hearing",
                        "value": "'.$_SESSION['HearingCount'].'",
                        
                    },
                    {
                        "label": "Jail Booking",
                        "value": "'.$_SESSION['JailCount'].'",
                        
                    },
                    {
                        "label": "Program",
                        "value": "'.$_SESSION['programCount'].'",
                        
                    },
                    {
                        "label": "Medical",
                        "value": "'.$_SESSION['medicalCount'].'",
                        
                    }
                ]
            }
        }).render();
    }); </script>';
    //Male Female Graph
    echo '<script type="text/javascript" src="js/fusioncharts.js"></script>
    <script type="text/javascript" src="js/fusioncharts.charts.js"></script>
    <script type="text/javascript">
      FusionCharts.ready(function () {
        var ageGroupChart = new FusionCharts({
            type: "pie2d",
            renderAt: "GenderGraph",
            width: "100%",
            height: "70%",
            dataFormat: "json",
            dataSource: {
                "chart": {
                    "caption": "Summary of Inmate Sex",
                    "paletteColors": "#6ba3ff,#6aff7c",
                    "bgColor": "#ffffff",
                    "showBorder": "0",
                    "use3DLighting": "0",
                    "showShadow": "0",
                    "enableSmartLabels": "0",
                    "startingAngle": "0",
                    "showPercentValues": "1",
                    "showPercentInTooltip": "0",
                    "decimals": "1",
                    "captionFontSize": "14",
                    "subcaptionFontSize": "14",
                    "subcaptionFontBold": "0",
                    "toolTipColor": "#ffffff",
                    "toolTipBorderThickness": "0",
                    "toolTipBgColor": "#000000",
                    "baseFontSize": "14",
                    "toolTipBgAlpha": "80",
                    "toolTipBorderRadius": "2",
                    "toolTipPadding": "5",
                    "showHoverEffect":"1",
                    "showLegend": "1",
                    "legendBgColor": "#ffffff",
                    "legendBorderAlpha": "0",
                    "legendShadow": "0",
                    "legendItemFontSize": "16",
                    "legendItemFontColor": "#666666"

                },
                "data": [
                    {
                        "label": "Male",
                        "value": "'.$_SESSION['male'].'",
                    }, 
                    {
                        "label": "Female",
                        "value": "'.$_SESSION['female'].'",
                    }
                ]
            }
        }).render();
    }); </script>';
} elseif ($_SESSION['Emp_pos'] == 'Jail Nurse') {
    echo '<script type="text/javascript" src="js/fusioncharts.js"></script>
    <script type="text/javascript" src="js/fusioncharts.charts.js"></script>
    <script type="text/javascript">
      FusionCharts.ready(function () {
        var ageGroupChart = new FusionCharts({
            type: "pie2d",
            renderAt: "InmateGraph",
            width: "100%",
            height: "70%",
            dataFormat: "json",
            dataSource: {
                "chart": {
                    "caption": "Summary of Inmate Population",
                    "paletteColors": "#0075c2,#8e0000,#f45b00,#f2c500,#02effc,#1afc01",
                    "bgColor": "#ffffff",
                    "showBorder": "0",
                    "use3DLighting": "0",
                    "showShadow": "0",
                    "enableSmartLabels": "0",
                    "startingAngle": "0",
                    "showPercentValues": "1",
                    "showPercentInTooltip": "0",
                    "decimals": "1",
                    "captionFontSize": "14",
                    "subcaptionFontSize": "14",
                    "baseFontSize": "14",
                    "subcaptionFontBold": "0",
                    "toolTipColor": "#ffffff",
                    "toolTipBorderThickness": "0",
                    "toolTipBgColor": "#000000",
                    "toolTipBgAlpha": "80",
                    "toolTipBorderRadius": "2",
                    "toolTipPadding": "5",
                    "showHoverEffect":"1",
                    "showLegend": "1",
                    "legendBgColor": "#ffffff",
                    "legendBorderAlpha": "0",
                    "legendShadow": "0",
                    "legendItemFontSize": "16",
                    "legendItemFontColor": "#666666"

                },
                "data": [
                    {
                        "label": "Inmate",
                        "value": "'.$_SESSION['TotalInmate'].'",
                        "link": "/main.php?r=inmate"
                    }, 
                    {
                        "label": "Case",
                        "value": "'.$_SESSION['caseCount'].'",
                        
                    },
                    {
                        "label": "Hearing",
                        "value": "'.$_SESSION['HearingCount'].'",
                        
                    },
                    {
                        "label": "Jail Booking",
                        "value": "'.$_SESSION['JailCount'].'",
                        
                    },
                    {
                        "label": "Program",
                        "value": "'.$_SESSION['programCount'].'",
                        
                    },
                    {
                        "label": "Medical",
                        "value": "'.$_SESSION['medicalCount'].'",
                        "link": "/main.php?r=medical"
                    }
                ]
            }
        }).render();
    }); </script>';
    //Male Female Graph
    echo '<script type="text/javascript" src="js/fusioncharts.js"></script>
    <script type="text/javascript" src="js/fusioncharts.charts.js"></script>
    <script type="text/javascript">
      FusionCharts.ready(function () {
        var ageGroupChart = new FusionCharts({
            type: "pie2d",
            renderAt: "GenderGraph",
            width: "100%",
            height: "70%",
            dataFormat: "json",
            dataSource: {
                "chart": {
                    "caption": "Summary of Inmate Sex",
                    "paletteColors": "#6ba3ff,#6aff7c",
                    "bgColor": "#ffffff",
                    "showBorder": "0",
                    "use3DLighting": "0",
                    "showShadow": "0",
                    "enableSmartLabels": "0",
                    "startingAngle": "0",
                    "showPercentValues": "1",
                    "showPercentInTooltip": "0",
                    "decimals": "1",
                    "captionFontSize": "14",
                    "subcaptionFontSize": "14",
                    "subcaptionFontBold": "0",
                    "toolTipColor": "#ffffff",
                    "toolTipBorderThickness": "0",
                    "baseFontSize": "14",
                    "toolTipBgColor": "#000000",
                    "toolTipBgAlpha": "80",
                    "toolTipBorderRadius": "2",
                    "toolTipPadding": "5",
                    "showHoverEffect":"1",
                    "showLegend": "1",
                    "legendBgColor": "#ffffff",
                    "legendBorderAlpha": "0",
                    "legendShadow": "0",
                    "legendItemFontSize": "16",
                    "legendItemFontColor": "#666666"

                },
                "data": [
                    {
                        "label": "Male",
                        "value": "'.$_SESSION['male'].'",
                    }, 
                    {
                        "label": "Female",
                        "value": "'.$_SESSION['female'].'",
                    }
                ]
            }
        }).render();
    }); </script>';
    //Death Graph
    
    

    echo '<script type="text/javascript" src="js/fusioncharts.js"></script>
    <script type="text/javascript" src="js/fusioncharts.charts.js"></script>
    <script type="text/javascript">
      FusionCharts.ready(function () {
        var ageGroupChart = new FusionCharts({
            type: "pie2d",
            renderAt: "DeathGraph",
            width: "100%",
            height: "70%",
            dataFormat: "json",
            dataSource: {
                "chart": {
                    "caption": "Summary of Inmate Population Status",
                    "paletteColors": "#fc7674,#6aff7c",
                    "bgColor": "#ffffff",
                    "showBorder": "0",
                    "use3DLighting": "0",
                    "showShadow": "0",
                    "enableSmartLabels": "0",
                    "startingAngle": "0",
                    "showPercentValues": "1",
                    "showPercentInTooltip": "0",
                    "decimals": "1",
                    "captionFontSize": "14",
                    "subcaptionFontSize": "14",
                    "subcaptionFontBold": "0",
                    "toolTipColor": "#ffffff",
                    "toolTipBorderThickness": "0",
                    "toolTipBgColor": "#000000",
                    "toolTipBgAlpha": "80",
                    "toolTipBorderRadius": "2",
                    "toolTipPadding": "5",
                    "baseFontSize": "14",
                    "showHoverEffect":"1",
                    "showLegend": "1",
                    "legendBgColor": "#ffffff",
                    "legendBorderAlpha": "0",
                    "legendShadow": "0",
                    "legendItemFontSize": "16",
                    "legendItemFontColor": "#666666"

                },
                "data": [
                    {
                        "label": "Deceased",
                        "value": "'.$_SESSION['deceasedCount'].'",
                    }, 
                    {
                        "label": "Alive",
                        "value": "'.$LiveCount.'",
                    }
                ]
            }
        }).render();
    }); </script>';
    // $_SESSION['deceasedCount']
    // $_SESSION['ReleasedCount']
    // $_SESSION['TransferredCount']
    // $_SESSION['NotRegisteredCount']
    // $_SESSION['TotalInmate']
    
    //Status Graph
    echo '<script type="text/javascript" src="js/fusioncharts.js"></script>
    <script type="text/javascript" src="js/fusioncharts.charts.js"></script>
    <script type="text/javascript">
      FusionCharts.ready(function () {
        var ageGroupChart = new FusionCharts({
            type: "pie2d",
            renderAt: "StatusGraph",
            width: "100%",
            height: "70%",
            dataFormat: "json",
            dataSource: {
                "chart": {
                    "caption": "Summary of Inmate Status",
                    "paletteColors": "#00f21c,#ef2113,#727070,#fff711,#ff8411",
                    "bgColor": "#ffffff",
                    "showBorder": "0",
                    "use3DLighting": "0",
                    "showShadow": "0",
                    "enableSmartLabels": "0",
                    "startingAngle": "0",
                    "showPercentValues": "1",
                    "showPercentInTooltip": "0",
                    "decimals": "1",
                    "captionFontSize": "14",
                    "subcaptionFontSize": "14",
                    "subcaptionFontBold": "0",
                    "toolTipColor": "#ffffff",
                    "toolTipBorderThickness": "0",
                    "toolTipBgColor": "#000000",
                    "toolTipBgAlpha": "80",
                    "toolTipBorderRadius": "2",
                    "toolTipPadding": "5",
                    "showHoverEffect":"1",
                    "showLegend": "1",
                    "baseFontSize": "14",
                    "legendBgColor": "#ffffff",
                    "legendBorderAlpha": "0",
                    "legendShadow": "0",
                    "legendItemFontSize": "16",
                    "legendItemFontColor": "#666666"

                },
                "data": [
                    {
                        "label": "Registered",
                        "value": "'.$Registered.'",
                    },
                    {
                        "label": "Not Registered",
                        "value": "'.$_SESSION['NotRegisteredCount'].'",
                    },
                    {
                        "label": "Released",
                        "value": "'.$_SESSION['ReleasedCount'].'",
                    }, 
                    {
                        "label": "Transferred Jail",
                        "value": "'.$_SESSION['TransferredCount'].'",
                    },
                    {
                        "label": "Deceased",
                        "value": "'.$_SESSION['deceasedCount'].'",
                    }
                ]
            }
        }).render();
    }); </script>';
} else {
    // Overall Graph
    echo '<script type="text/javascript" src="js/fusioncharts.js"></script>
    <script type="text/javascript" src="js/fusioncharts.charts.js"></script>
    <script type="text/javascript">
      FusionCharts.ready(function () {
        var ageGroupChart = new FusionCharts({
            type: "pie2d",
            renderAt: "InmateGraph",
            width: "100%",
            height: "70%",
            dataFormat: "json",
            dataSource: {
                "chart": {
                    "caption": "Summary of Inmate Details",
                    "paletteColors": "#0075c2,#8e0000,#f45b00,#f2c500,#02effc,#f442dc,#1afc01",
                    "bgColor": "#ffffff",
                    "showBorder": "0",
                    "use3DLighting": "0",
                    "showShadow": "0",
                    "enableSmartLabels": "0",
                    "startingAngle": "0",
                    "showPercentValues": "1",
                    "showPercentInTooltip": "0",
                    "decimals": "1",
                    "captionFontSize": "22",
                    "baseFontSize": "14",
                    "subcaptionFontSize": "14",
                    "subcaptionFontBold": "0",
                    "toolTipColor": "#ffffff",
                    "toolTipBorderThickness": "0",
                    "toolTipBgColor": "#000000",
                    "toolTipBgAlpha": "80",
                    "toolTipBorderRadius": "2",
                    "toolTipPadding": "5",
                    "showHoverEffect":"1",
                    "showLegend": "1",
                    "legendBgColor": "#ffffff",
                    "legendBorderAlpha": "0",
                    "legendShadow": "0",
                    "legendItemFontSize": "16",
                    "legendItemFontColor": "#666666"

                },
                "data": [
                    {
                        "label": "Inmate",
                        "value": "'.$_SESSION['TotalInmate'].'",
                        "link": "/main.php?r=inmate"
                    }, 
                    {
                        "label": "Case",
                        "value": "'.$_SESSION['caseCount'].'",
                        "link": "/main.php?r=case"
                    },
                    {
                        "label": "Hearing",
                        "value": "'.$_SESSION['HearingCount'].'",
                        "link": "/main.php?r=hearing"
                    },
                    {
                        "label": "Jail Booking",
                        "value": "'.$_SESSION['JailCount'].'",
                        "link": "/main.php?r=jail"
                    },
                    {
                        "label": "Program",
                        "value": "'.$_SESSION['programCount'].'",
                        "link": "/main.php?r=program"
                    },
                    {
                        "label": "Disciplinary Action",
                        "value": "'.$_SESSION['dacount'].'",
                        "link": "/main.php?r=da"
                    },
                    {
                        "label": "Medical",
                        "value": "'.$_SESSION['medicalCount'].'",
                        "link": "/main.php?r=medical"
                    }
                ]
            }
        }).render();
    }); </script>';

    //Male Female Graph
    echo '<script type="text/javascript" src="js/fusioncharts.js"></script>
    <script type="text/javascript" src="js/fusioncharts.charts.js"></script>
    <script type="text/javascript">
      FusionCharts.ready(function () {
        var ageGroupChart = new FusionCharts({
            type: "pie2d",
            renderAt: "GenderGraph",
            width: "100%",
            height: "70%",
            dataFormat: "json",
            dataSource: {
                "chart": {
                    "caption": "Summary of Inmate Sex",
                    "paletteColors": "#6ba3ff,#6aff7c",
                    "bgColor": "#ffffff",
                    "showBorder": "0",
                    "use3DLighting": "0",
                    "showShadow": "0",
                    "enableSmartLabels": "0",
                    "startingAngle": "0",
                    "showPercentValues": "1",
                    "showPercentInTooltip": "0",
                    "decimals": "1",
                    "baseFontSize": "14",
                    "captionFontSize": "14",
                    "subcaptionFontSize": "14",
                    "subcaptionFontBold": "0",
                    "toolTipColor": "#ffffff",
                    "toolTipBorderThickness": "0",
                    "toolTipBgColor": "#000000",
                    "toolTipBgAlpha": "80",
                    "toolTipBorderRadius": "2",
                    "toolTipPadding": "5",
                    "showHoverEffect":"1",
                    "showLegend": "1",
                    "legendBgColor": "#ffffff",
                    "legendBorderAlpha": "0",
                    "legendShadow": "0",
                    "legendItemFontSize": "16",
                    "legendItemFontColor": "#666666"

                },
                "data": [
                    {
                        "label": "Male",
                        "value": "'.$_SESSION['male'].'",
                    }, 
                    {
                        "label": "Female",
                        "value": "'.$_SESSION['female'].'",
                    }
                ]
            }
        }).render();
    }); </script>';

    //Death Graph
    
    

    echo '<script type="text/javascript" src="js/fusioncharts.js"></script>
    <script type="text/javascript" src="js/fusioncharts.charts.js"></script>
    <script type="text/javascript">
      FusionCharts.ready(function () {
        var ageGroupChart = new FusionCharts({
            type: "pie2d",
            renderAt: "DeathGraph",
            width: "100%",
            height: "70%",
            dataFormat: "json",
            dataSource: {
                "chart": {
                    "caption": "Summary of Inmate Population Status",
                    "paletteColors": "#fc7674,#6aff7c",
                    "bgColor": "#ffffff",
                    "showBorder": "0",
                    "use3DLighting": "0",
                    "showShadow": "0",
                    "enableSmartLabels": "0",
                    "startingAngle": "0",
                    "showPercentValues": "1",
                    "showPercentInTooltip": "0",
                    "decimals": "1",
                    "captionFontSize": "14",
                    "subcaptionFontSize": "14",
                    "subcaptionFontBold": "0",
                    "toolTipColor": "#ffffff",
                    "toolTipBorderThickness": "0",
                    "toolTipBgColor": "#000000",
                    "toolTipBgAlpha": "80",
                    "toolTipBorderRadius": "2",
                    "toolTipPadding": "5",
                    "showHoverEffect":"1",
                    "baseFontSize": "14",
                    "showLegend": "1",
                    "legendBgColor": "#ffffff",
                    "legendBorderAlpha": "0",
                    "legendShadow": "0",
                    "legendItemFontSize": "16",
                    "legendItemFontColor": "#666666"

                },
                "data": [
                    {
                        "label": "Deceased",
                        "value": "'.$_SESSION['deceasedCount'].'",
                    }, 
                    {
                        "label": "Alive",
                        "value": "'.$LiveCount.'",
                    }
                ]
            }
        }).render();
    }); </script>';
    // $_SESSION['deceasedCount']
    // $_SESSION['ReleasedCount']
    // $_SESSION['TransferredCount']
    // $_SESSION['NotRegisteredCount']
    // $_SESSION['TotalInmate']
    
    //Status Graph
    echo '<script type="text/javascript" src="js/fusioncharts.js"></script>
    <script type="text/javascript" src="js/fusioncharts.charts.js"></script>
    <script type="text/javascript">
      FusionCharts.ready(function () {
        var ageGroupChart = new FusionCharts({
            type: "pie2d",
            renderAt: "StatusGraph",
            width: "100%",
            height: "70%",
            dataFormat: "json",
            dataSource: {
                "chart": {
                    "caption": "Summary of Inmate Status",
                    "paletteColors": "#00f21c,#ef2113,#727070,#fff711,#ff8411",
                    "bgColor": "#ffffff",
                    "showBorder": "0",
                    "use3DLighting": "0",
                    "showShadow": "0",
                    "enableSmartLabels": "0",
                    "startingAngle": "0",
                    "baseFontSize": "14",
                    "showPercentValues": "1",
                    "showPercentInTooltip": "0",
                    "decimals": "1",
                    "captionFontSize": "14",
                    "subcaptionFontSize": "14",
                    "subcaptionFontBold": "0",
                    "toolTipColor": "#ffffff",
                    "toolTipBorderThickness": "0",
                    "toolTipBgColor": "#000000",
                    "toolTipBgAlpha": "80",
                    "toolTipBorderRadius": "2",
                    "toolTipPadding": "5",
                    "showHoverEffect":"1",
                    "showLegend": "1",
                    "legendBgColor": "#ffffff",
                    "legendBorderAlpha": "0",
                    "legendShadow": "0",
                    "legendItemFontSize": "16",
                    "legendItemFontColor": "#666666"

                },
                "data": [
                    {
                        "label": "Registered",
                        "value": "'.$Registered.'",
                    },
                    {
                        "label": "Not Registered",
                        "value": "'.$_SESSION['NotRegisteredCount'].'",
                    },
                    {
                        "label": "Released",
                        "value": "'.$_SESSION['ReleasedCount'].'",
                    }, 
                    {
                        "label": "Transferred Jail",
                        "value": "'.$_SESSION['TransferredCount'].'",
                    },
                    {
                        "label": "Deceased",
                        "value": "'.$_SESSION['deceasedCount'].'",
                    }
                ]
            }
        }).render();
    }); </script>';
    $result = mysqli_query($conn,"SELECT id FROM tbl_case");
$CaseCount = mysqli_num_rows($result);
//echo $CaseCount;
$sql = "SELECT * FROM tbl_case " ;
            $result = $conn->query($sql);
            $ctr = 0;
echo '<script type="text/javascript" src="js/fusioncharts.js"></script>
    <script type="text/javascript" src="js/fusioncharts.charts.js"></script>
    <script type="text/javascript">
      FusionCharts.ready(function () {
        var ageGroupChart = new FusionCharts({
            type: "pie2d",
            renderAt: "CaseGraph",
            width: "100%",
            height: "70%",
            dataFormat: "json",
            dataSource: {
                "chart": {
                    "caption": "Summary of Inmate Cases",
                    "paletteColors": "#0075c2,#8e0000,#f45b00,#f2c500,#02effc,#1afc01,#5174ad,#51a8ad,#a7bc51,#c558c9",
                    "bgColor": "#ffffff",
                    "showBorder": "0",
                    "use3DLighting": "0",
                    "showShadow": "0",
                    "enableSmartLabels": "0",
                    "startingAngle": "0",
                    "showPercentValues": "1",
                    "showPercentInTooltip": "0",
                    "decimals": "1",
                    "captionFontSize": "14",
                    "subcaptionFontSize": "14",
                    "baseFontSize": "14",
                    "subcaptionFontBold": "0",
                    "toolTipColor": "#ffffff",
                    "toolTipBorderThickness": "0",
                    "toolTipBgColor": "#000000",
                    "toolTipBgAlpha": "80",
                    "toolTipBorderRadius": "2",
                    "toolTipPadding": "5",
                    "showHoverEffect":"1",
                    "showLegend": "1",
                    "legendBgColor": "#ffffff",
                    "legendBorderAlpha": "0",
                    "legendShadow": "0",
                    "legendItemFontSize": "16",
                    "legendItemFontColor": "#666666"

                },
                "data": [';
                while($row = $result->fetch_assoc()) {
                //countValue
                $result1 = mysqli_query($conn,"SELECT id,Offenses FROM tbl_casedetails where Offenses='".$row['name']."'");
                ${'$CaseCountt'.'$ctr'} = mysqli_num_rows($result1);
                echo    '{
                        "label": "'.strtoupper($row['name']).'",
                        "value": "'.${'$CaseCountt'.'$ctr'}.'",
                        "link": "/main.php?r=caseValue&e='.$row['id'].'"
                    }';
                $ctr += 1;
                //echo ${'$CaseCountt'.'$ctr'};
                if ($ctr == $CaseCount) {
                    echo " ";
                } else {
                    echo ",";
                }
                
                }
                    
                echo ']
            }
        }).render();
    }); </script>';


}
$today = date("Y-m-d");
$hearing = 0;
$da = 0;
    $result = mysqli_query($conn,"Select * from tbl_hearingdetails");
    while($row = mysqli_fetch_array($result)){
            $result1 = mysqli_query($conn,"Select * from tbl_inmate where id=".$row['Inmate_ID']);
            if (strtotime($row['HearingDate']) >= strtotime($today)) { 
                $hearing += 1;
            }
    }
$result = mysqli_query($conn,"Select * from tbl_dadetails");
    while($row = mysqli_fetch_array($result)){
            if (strtotime($row['dato']) >= strtotime($today)) { 
                $da += 1;
            }
    }
$_SESSION['NotifCount'] = $hearing + $da;
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/bjmp-logo.png" type="image/png" />
        <title>Bureau of Jail Management and Penology</title>
          


            <link rel="stylesheet" type="text/css" href="/css/sticky-footer.css">
            <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
            <script src="/js/jquery.min.js"></script>
            <script src="/js/bootstrap.min.js"></script>

            <script src="/js/bootstrap-select.js"></script>
            <link rel="stylesheet" type="text/css" href="/css/bootstrap-select.css">
            <link rel="stylesheet" type="text/css" href="/css/test.css">
            
    <style type="text/css">
            .unread-count:after {
                content: "<?php echo $_SESSION['NotifCount'] ?>";
                position: relative;
                left: -3px;
                top: -9px;
                font-size: 11px;
                text-align: center;
                border: 0px solid #890405;
                color: #fff;
                font-weight: bold;
                min-width: 50px;
               /* -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                border-radius: 30px;*/
                 border-radius: 50%;

                background-color: red;
                padding: 1px 5px 1px;
            }
            .scrollable-menu {
                height: auto;
                max-height: 300px;
                width: 500px;
                overflow-y:scroll;
                overflow-x: scroll;

            }
            @font-face {
                        font-family: mainFont;
                        src: url(fonts/Amble-Regular.ttf);
                        }
            #headBg{
            background-image:linear-gradient(60deg, #29323c 0%, #485563 100%);
            color: white
            }
            #footBg{
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
            .table1 {
              width: 100%;
              max-width: 100%;
              margin-bottom: 1rem;
              background-color: transparent;
            }
            .table1 th,
            .table1 td {
              padding: 0.75rem;
              vertical-align: top;

            }
            body{
                font-family: mainFont;
                background-image: linear-gradient(to top, #a8c9ea 0%, white 100%);
            }
    </style>
</head>

<body>
<nav class="navbar navbar-default" id="headBg">
      <div class="container-fluid" >
        <div class="navbar-header" >
          <a class="navbar-brand" href="/main.php" id="hrefs">BUREAU OF JAIL MANAGEMENT AND PENOLOGY MANAGEMENT INFORMATION SYSTEM</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="logout.php" id="hrefs"><span class="glyphicon glyphicon-log-in"></span> Log-out</a></li>
        </ul>
      </div>
    </nav>
 

<div class="container-fluid" id="MainBody">