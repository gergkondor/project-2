<?php
	include('../conn.php');
	
	$id = $_GET['id'];
	
	$name = $_POST['name'];
	$locationID = $_POST['locationID'];
	
	// mysqli_query($conn,"UPDATE department SET name='$name', locationID='$locationID' WHERE id='$id'");

	$query = $conn->prepare("UPDATE department SET name=?, locationID=? WHERE id=?");
	
	$query->bind_param("sii", $name, $locationID, $id);

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
	$output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
	$output['data'] = [];
	
	mysqli_close($conn);

	echo json_encode($output); 


	header('location:../index.php');

?>