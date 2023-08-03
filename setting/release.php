<?php
include($_SERVER['DOCUMENT_ROOT']."/config.php");
if(session_status() == PHP_SESSION_NONE){session_start();}
if (isset($_POST['btnSaveRelease'])){
    $JailName = mysqli_real_escape_string($conn, $_POST["JailName"]);
    $Remarks = mysqli_real_escape_string($conn, $_POST["Remarks"]);
        $sql = mysqli_query($conn,"UPDATE tbl_inmate SET 
                            ReceivingJail='Released',
                            Remarks='".$_POST['Remarks']."'
                            where id=" . $_SESSION['Temp_InmateID'] . "") or die ("ERROR : ". mysqli_error($conn));
                            ?>
                                 <script type="text/javascript">
                                 // alert("Inmate Released.");
                                 location ="/main.php"
                                 </script> 
                            <?php 
        
}
?>