<?php 
if(session_status() == PHP_SESSION_NONE){session_start();}
include $_SERVER["DOCUMENT_ROOT"]."/config.php";
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
                "data": [';
                while($row = $result->fetch_assoc()) {
            	//countValue
            	$result1 = mysqli_query($conn,"SELECT id,Offenses FROM tbl_casedetails where Offenses='".$row['name']."'");
            	${'$CaseCountt'.'$ctr'} = mysqli_num_rows($result1);
            	echo	'{
                        "label": "'.strtoupper($row['name']).'",
                        "value": "'.${'$CaseCountt'.'$ctr'}.'",
                        "link": "/main.php?r=inmate"
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
?>
<!DOCTYPE html>
<html>
<head>
			<link rel="stylesheet" type="text/css" href="/css/sticky-footer.css">
            <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
            <script src="/js/jquery.min.js"></script>
            <script src="/js/bootstrap.min.js"></script>

            <script src="/js/bootstrap-select.js"></script>
            <link rel="stylesheet" type="text/css" href="/css/bootstrap-select.css">
            <link rel="stylesheet" type="text/css" href="/css/test.css">
</head>
<body>
<div class="col-sm-12" id="InmateGraph"></div>
</body>
</html>