<?php
  include("connection.php");  

	$id =$_REQUEST['id'];
	
	//if(isset($_GET['delete_id'])){
        // sending query
        mysqli_query($conn,"DELETE FROM student WHERE id = '$id'")
        or die("Connection failed: " . mysqli_connect_error() );  	

        header("Location: add_student_info.php");
        
   // }
?>
