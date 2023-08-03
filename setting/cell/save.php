<?php include($_SERVER['DOCUMENT_ROOT']."/config.php");
if(session_status() == PHP_SESSION_NONE){session_start();}
    $CellNum = mysqli_real_escape_string($conn, $_POST["CellNum"]);

                $sql = "SELECT * FROM tbl_cell where prison_no='".$CellNum."'" ;
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  ?> <script type="text/javascript"> alert("Cell number already exist"); location ="/main.php" </script> <?php
              } else {
                  $sql = "INSERT INTO tbl_cell  (
                  prison_no
                  ) VALUES (
                  '$CellNum')";
                  if ($conn->query($sql) === TRUE) { ?>
                  <script type="text/javascript">
                  // alert("Cell successfully added.");
                  location ="/main.php"
                  </script>
                  <?php
                  } else {
                       echo "Error: " . $sql . "<br>" . $conn->error;
                  }
              }
?>       
              
