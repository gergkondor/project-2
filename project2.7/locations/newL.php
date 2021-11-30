<?php
	include('../conn.php');
	
	$name=$_POST['name'];

	
	// mysqli_query($conn,"INSERT INTO location (name) VALUES ('$name')");


	$query = $conn->prepare('INSERT INTO location (name) VALUES(?)');

	$query->bind_param("s", $name);

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