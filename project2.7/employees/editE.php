<?php
	include('../conn.php');
	
	$id=$_GET['id'];
	
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$jobtitle=$_POST['jobtitle'];
	$email=$_POST['email'];
	$departmentID=$_POST['departmentID'];
	
	// mysqli_query($conn,"UPDATE personnel SET firstName='$firstname', lastName='$lastname', email='$email' WHERE id='$id'");

	$query = $conn->prepare("UPDATE personnel SET firstName=?, lastName=?, jobtitle=?, email=?, departmentID=? WHERE id=?");
	
	$query->bind_param("ssssii", $firstname, $lastname, $jobtitle, $email, $departmentID, $id);	

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