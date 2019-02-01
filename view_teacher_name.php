<?php
require("connection.php");
$id =$_REQUEST['id'];


$result = mysqli_query($conn,"select  * FROM teacher_name WHERE id = '$id'");

$test = mysqli_fetch_array($result);

if (!$test) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

if (!$result) 
		{
		die("Error: Data not found..");
		}
					
                $fname_teacher=$test["fname_teacher"] ;
				$lname_teacher= $test["lname_teacher"] ;	
                
                
				

if(isset($_POST['save']))
{	
	
    $fname_teachersave = $_POST['fname_teacher'];
	$lname_teacersave = $_POST['lname_teacher'];
   
    
	

	
    mysqli_query($conn,"UPDATE teacher_name set fname_teacher='$fname_teachersave',lname_teacher='$lname_teacersave' WHERE id = '$id'")
       	or die("Connection failed: " . mysqli_connect_error() ); 
	echo "Saved!";
	
	header("Location: add_teacher_name.php");			
}
mysqli_close($conn);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Modify Teacher Names</title>
    
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
</head>

<body>

    
    <div class="container">
  <h2>Modify teacher first and last name</h2>
  <form method="post">
    <div class="form-group">
      <label for="fname">First Name:</label>
      <input type="text" class="form-control" name="fname_teacher" value="<?php echo $fname_teacher ?>">
    </div>
    <div class="form-group">
      <label for="lname">Last Name:</label>
      <input type="text" class="form-control" name="lname_teacher" value="<?php echo $lname_teacher ?>">
    </div>  
    <button type="submit" class="btn btn-default" name="save" value="save">Save</button>
  </form>
</div>
    


    

</body>
</html>
