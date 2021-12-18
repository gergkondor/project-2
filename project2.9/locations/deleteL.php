<?php
	include('../php/conn.php');

	$id=$_GET['id'];

	$query = $conn->prepare('DELETE FROM location WHERE id = ?');
	$query->bind_param("i", $id);
	$query->execute();
	

	if (false === $query) {
		$output['status']['code'] = "400";
		$output['status']['name'] = "executed";
		$output['status']['description'] = "query failed";	
		$output['data'] = [];

		mysqli_close($conn);
		echo json_encode($output);
		exit;
	}

	$output['status']['code'] = "200";
	$output['status']['name'] = "ok";
	$output['status']['description'] = "success";
	$output['data'] = [];
	
	mysqli_close($conn);

	echo json_encode($output); 

	header('location:../index.html#locations');
?>