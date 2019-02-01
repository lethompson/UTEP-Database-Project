<?php
  include("connection.php");  

	$id =$_REQUEST['id'];
	
	
	// sending query
	mysqli_query($conn,"DELETE FROM teacher_name WHERE id = '$id'")
	or die("Connection failed: " . mysqli_connect_error() );  	
	
	header("Location: add_teacher_name.php");
?>