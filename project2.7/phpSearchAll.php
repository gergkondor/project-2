<?php

$search = $_POST['search'];

include('conn.php');



$sql = "SELECT * FROM personnel p
								 WHERE p.firstName LIKE '%$search%'
								 OR p.lastName LIKE '%$search%'
								--  OR d.name LIKE '%$search%'
								--  OR l.name LIKE '%$search%'
								 ";

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