<?php
include($_SERVER['DOCUMENT_ROOT']."/config.php");
// sql to delete a record
$sql = "DELETE FROM tbl_cell WHERE id=".$_GET['eid'];

if ($conn->query($sql) === TRUE) { ?>
	<script type="text/javascript">
		// alert("Record deleted successfully");
		location = "/main.php"
	</script>
    
<?php } else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>