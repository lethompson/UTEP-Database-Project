<?php
  include("connection.php");  

	$id =$_REQUEST['id'];
	
	
	// sending query
	mysqli_query($conn,"DELETE FROM users WHERE id = '$id'")
	or die("Connection failed: " . mysqli_connect_error() );  	
	
	header("Location: insert.php");
?>