<?php
require("connection.php");
$id =$_REQUEST['id'];


$result = mysqli_query($conn,"select  * FROM student_name WHERE id = '$id'");

$test = mysqli_fetch_array($result);

if (!$test) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

if (!$result) 
		{
		die("Error: Data not found..");
		}
					
                $fname=$test["fname"] ;
				$lname= $test["lname"] ;	
                
                
				

if(isset($_POST['save']))
{	
	
    $fname_save = $_POST['fname'];
	$lname_save = $_POST['lname'];
   
    
	

	
    mysqli_query($conn,"UPDATE student_name set fname='$fname_save',lname='$lname_save' WHERE id = '$id'")
       	or die("Connection failed: " . mysqli_connect_error() ); 
	echo "Saved!";
	
	header("Location: add_student_name.php");	// Original header
}
mysqli_close($conn);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Modify Student Names</title>
    
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
</head>

<body>

    
    <div class="container">
  <h2>Modify student first and last name</h2>
  <form method="post">
    <div class="form-group">
      <label for="fname">First Name:</label>
      <input type="text" class="form-control" name="fname" value="<?php echo $fname ?>">
    </div>
    <div class="form-group">
      <label for="lname">Last Name:</label>
      <input type="text" class="form-control" name="lname" value="<?php echo $lname ?>">
    </div>  
    <button type="submit" class="btn btn-default" name="save" value="save">Save</button>
  </form>
</div>
    


    

</body>
</html>
