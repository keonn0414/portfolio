<?php
include($_SERVER['DOCUMENT_ROOT']."/config.php");
// sql to delete a record
$sql = "DELETE FROM tbl_jailbooking WHERE id=".$_GET['id'];

if ($conn->query($sql) === TRUE) { ?>
	<script type="text/javascript">
		// alert("Record deleted successfully");
		location = "/main.php?r=addInmate"
	</script>
    
<?php } else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>