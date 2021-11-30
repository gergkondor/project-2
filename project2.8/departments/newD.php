<?php
	include('../conn.php');
	
	$name=$_POST['name'];
	$locationID=$_POST['locationID'];
	
	// mysqli_query($conn,"INSERT INTO department (name, locationID) VALUES ('$name', '$locationID')");
	// header('location:../index.php');

	$query = $conn->prepare('INSERT INTO department (name, locationID) VALUES(?,?)');

	$query->bind_param("si", $name, $locationID);

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

	header('location:../depIndex.php');

	
?>