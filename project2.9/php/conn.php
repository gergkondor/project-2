<?php
 
	$conn = mysqli_connect("localhost","companydirectory","companydirectory","companydirectory");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
 
?>