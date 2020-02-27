<?php
	include '../../includes/config.php';
	$id = $_REQUEST['id'];
	$query1 = "DELETE FROM CAR WHERE Car_id = '$id'";
	$result1 = $conn->query($query1);
	if($result1 === TRUE){
		$query2 = "DELETE FROM CAR_DESIGN WHERE Car_id = '$id'";
		$result2 = $conn->query($query2);
		if($result2 === TRUE){
			echo "<script type = \"text/javascript\">
					alert(\"Car Successfully Deleted\");
					window.location = (\"car_data.php\")
				</script>";
		}
	}
?>
