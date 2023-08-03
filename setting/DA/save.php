<?php 
include($_SERVER['DOCUMENT_ROOT']."/config.php");
$CaseName = mysqli_real_escape_string($conn, $_POST["CaseName"]);

        $sql = "INSERT INTO tbl_da  (
                      name
                      ) VALUES (
                      '$CaseName')";
                      if ($conn->query($sql) === TRUE) { 
                        //header("Location: /main.php");
                        ?>
                        <script type="text/javascript">
                          location="/main.php"
                        </script>
                      <?php
                      }
                      ?>