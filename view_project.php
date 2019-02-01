<?php
require("connection.php");


$id =$_REQUEST['id'];

//$result = mysqli_query($conn,"SELECT * FROM users WHERE id  = '$id'");
//$result = mysqli_query($conn,"select  * FROM student_name JOIN student JOIN teacher_name JOIN project WHERE id = '$id'");

//$result = mysqli_query($conn,"select  * FROM student_name, student, teacher_name, project WHERE student.id = teacher_name.id AND student.id = '$id'");

//ORIGINAL QUERY
// $result = mysqli_query($conn,"select  * FROM student_name, student, teacher_name, project WHERE student_name.id = '$id' AND student.id = teacher_name.id AND student.id='$id'");

$result = mysqli_query($conn,"select  * FROM project WHERE id = '$id'");

$test = mysqli_fetch_array($result);

if (!$test) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

if (!$result) 
		{
		die("Error: Data not found..");
		}
				$name=$test["name"] ;	
                $year=$test["year"] ;
				$description= $test["description"] ;	
                $picture=$test["picture"] ;
                
				

if(isset($_POST['save']))
{	
	$name_save = $_POST['name'];
    $year_save = $_POST['year'];
	$description_save = $_POST['description'];
    $picture_save = $_POST['picture'];
    
	

	
    mysqli_query($conn,"UPDATE project set name='$name_save',year='$year_save',description='$description_save',picture='$picture_save'WHERE id = '$id'")
       	or die("Connection failed: " . mysqli_connect_error() ); 
	echo "Saved!";
	
	header("Location: add_project.php");			
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
  <h2>Modify student project</h2>
  <form method="post">
    <div class="form-group">
      <label for="name">Project Name:</label>
      <input type="text" class="form-control" name="name" value="<?php echo $name ?>">
    </div>
    <div class="form-group">
      <label for="year">Year:</label>
      <input type="text" class="form-control" name="year" value="<?php echo $year ?>">
    </div>
    <div class="form-group">
      <label for="description">Short Description:</label>
      <input type="text" class="form-control" name="description" value="<?php echo $description ?>">
    </div>  
     <div class="form-group">
      <label for="picture">Picture filename:</label>
      <input type="text" class="form-control" name="picture" value="<?php echo $picture ?>">
    </div> 
    <button type="submit" class="btn btn-default" name="save" value="save">Save</button>
  </form>
</div>
    


    

</body>
</html>
