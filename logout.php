<?php
include $_SERVER["DOCUMENT_ROOT"]."/config.php";
if(session_status() == PHP_SESSION_NONE){session_start();}
date_default_timezone_set("ASIA/MANILA");
$conn->query("INSERT INTO tbl_logs 
                            (
                            name,
                            position,
                            event,
                            transaction_date
                            ) VALUES (
                            '" . mysqli_real_escape_string($conn,$_SESSION['Emp_name']) . "',
                            '" . mysqli_real_escape_string($conn,$_SESSION['Emp_pos']) . "',
                            '" . mysqli_real_escape_string($conn,'Logout') . "',
                            '" . mysqli_real_escape_string($conn,date("Y/m/d h:i:sa")) . "'
                            )") or die ("Error" . mysqli_error($conn));

$_SESSION['logout'] = true;
header("location: /index.php");
?>