<?php
	include('../conn.php');
	
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$jobtitle=$_POST['jobtitle'];
	$email=$_POST['email'];
	$departmentID=$_POST['departmentID'];
	
	// mysqli_query($conn,"INSERT INTO personnel (firstName, lastName, email) VALUES ('$firstname', '$lastname', '$email')");

	$query = $conn->prepare("INSERT INTO personnel (firstName, lastName, jobTitle, email, departmentID) VALUES (?, ?, ?, ?, ?)");

	$query->bind_param("ssssi", $firstname, $lastname, $jobtitle, $email, $departmentID);

	$query->execute();
	
	if (false === $query) {

		$output['status']['code'] = "400";
		$output['status']['name'] = "executed";
		$output['status']['description'] = "query failed";	
		$output['data'] = [];

		// mysqli_close($conn);

		echo json_encode($output); 

		exit;

	}

	$output['status']['code'] = "200";
	$output['status']['name'] = "ok";
	$output['status']['description'] = "success";
	$output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
	$output['data'] = [];
	
	// mysqli_close($conn);

	echo json_encode($output); 



	header('location:../index.php');

?>