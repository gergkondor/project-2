<?php
	include('../php/conn.php');

	$id=$_GET['id'];

	$query = $conn->prepare('DELETE FROM department WHERE id = ?');
	$query->bind_param("i", $id);
	$query->execute();


	// if(isset($_GET['id'])){
	// 	$id=$_GET['id'];
	// 	delete_data($conn, $id);
	// };

	// function delete_data($conn, $id) {
	// 	$query = $conn->prepare('DELETE FROM department WHERE id = ?');
	// 	$query->bind_param("i", $id);
	// 	$exec = $query->execute();

	// 	if($exec) {
	// 		echo json_encode($query);
	// 	} else {
	// 		$msg= "Error";
  //     print_r($msg);
	// 	}

	// }

	
	// if (false === $query) {
	// 	$output['status']['code'] = "400";
	// 	$output['status']['name'] = "executed";
	// 	$output['status']['description'] = "query failed";	
	// 	$output['data'] = [];

	// 	mysqli_close($conn);
	// 	echo json_encode($output);
	// 	exit;
	// }

	// $output['status']['code'] = "200";
	// $output['status']['name'] = "ok";
	// $output['status']['description'] = "success";
	// $output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
	// $output['data'] = [];
	
	mysqli_close($conn);

	// echo json_encode($output); 

	header('location:../index.html#departments');
?>