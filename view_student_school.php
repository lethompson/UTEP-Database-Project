<?php
require("connection.php");
$id =$_REQUEST['id'];


$result = mysqli_query($conn,"select  * FROM student WHERE id = '$id'");

$test = mysqli_fetch_array($result);

if (!$test) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

if (!$result) 
		{
		die("Error: Data not found..");
		}
					
                $grade_level=$test["grade_level"] ;
				$school= $test["school"] ;	
                
                
				

if(isset($_POST['save']))
{	
	
    $grade_level_save = $_POST['grade_level'];
	$school_save = $_POST['school'];
   
    
	

	
    mysqli_query($conn,"UPDATE student set school='$school_save',grade_level='$grade_level_save' WHERE id = '$id'")
       	or die("Connection failed: " . mysqli_connect_error() ); 
	echo "Saved!";
	
	header("Location: add_student_info.php");			
}
mysqli_close($conn);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Modify Database</title>
    
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
</head>

<body>

    
    <div class="container">
  <h2>Modify student school and grade level</h2>
  <form method="post">
    <div class="form-group">
      <label for="grade_level">grade level:</label>
      <input type="text" class="form-control" name="grade_level" value="<?php echo $grade_level ?>">
    </div>
    <div class="form-group">
      <label for="school">school:</label>
      <input type="text" class="form-control" name="school" value="<?php echo $school ?>">
    </div>  
    <button type="submit" class="btn btn-default" name="save" value="save">Save</button>
  </form>
</div>
    


    

</body>
</html>
