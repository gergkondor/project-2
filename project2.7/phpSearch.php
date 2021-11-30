<?php

$search = $_POST['search'];

include('conn.php');

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "SELECT * FROM personnel WHERE firstName like '%$search%'";

$resultS = $conn->query($sql);

if ($resultS->num_rows > 0){
while($row = $resultS->fetch_assoc() ){
	echo $row["firstName"]."  ".$row["lastName"]."  ".$row["departmentID"]."<br>";
}
} else {
	echo "0 records";
}

$conn->close();

?>