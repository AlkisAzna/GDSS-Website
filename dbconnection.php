<?php
	$conn = new mysqli('localhost:3306', 'root', '', 'gdss_system');
	// Check connection
	if ($conn -> connect_errno) {
		echo "Failed to connect to MySQL: " . $conn	 -> connect_error;
		exit();
 	}
?>

