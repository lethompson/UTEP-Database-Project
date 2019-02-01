<?php
require("connection.php");
$id =$_REQUEST['id'];

//$result = mysqli_query($conn,"SELECT * FROM users WHERE id  = '$id'");
//$result = mysqli_query($conn,"select  * FROM student_name JOIN student JOIN teacher_name JOIN project WHERE id = '$id'");

//$result = mysqli_query($conn,"select  * FROM student_name, student, teacher_name, project WHERE student.id = teacher_name.id AND student.id = '$id'");

//ORIGINAL QUERY
// $result = mysqli_query($conn,"select  * FROM student_name, student, teacher_name, project WHERE student_name.id = '$id' AND student.id = teacher_name.id AND student.id='$id'");

 $result = mysqli_query($conn,"select  * FROM student_project WHERE id = '$id'");

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
                $grade_level=$test["grade_level"] ;
				$school= $test["school"] ;	
                $teachername=$test["teacher_name"] ;
                $project_title= $test["project_title"] ;
                $category= $test["category"] ;
                $description= $test["description"] ;
                
				

if(isset($_POST['save']))
{	
	$name_save = $_POST['name'];
    $grade_level_save = $_POST['grade_level'];
	$school_save = $_POST['school'];
    $teachername_save = $_POST['teacher_name'];
	$project_titlesave = $_POST['project_title'];
    $category_save = $_POST['thenumbers'];
    $description_save = $_POST['description'];
    
	

	
    mysqli_query($conn,"UPDATE student_project set name='$name_save',grade_level='$grade_level_save',school='$school_save',teacher_name='$teachername_save',project_title='$project_titlesave',category='$category_save',description='$description_save' WHERE id = '$id'")
       	or die("Connection failed: " . mysqli_connect_error() ); 
	echo "Saved!";
	
	header("Location: insert_student_project.php");			
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
<!--<form method="post">
<table>
	<tr>
		<td>Username:</td>
		<td><input type="text" name="username" value="<?php echo $Username ?>"/></td>
	</tr>
    
	<tr>
		<td>Email</td>
		<td><input type="text" name="email" value="<?php echo $Email ?>"/></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="save" value="save" /></td>
	</tr>
   
</table>

</form> -->
    
    <div class="container">
  <h2>Modify student registration</h2>
  <form method="post">
    <div class="form-group">
      <label for="name">name:</label>
      <input type="text" class="form-control" name="name" value="<?php echo $name ?>">
    </div>
    <div class="form-group">
      <label for="grade_level">grade level:</label>
      <input type="text" class="form-control" name="grade_level" value="<?php echo $grade_level ?>">
    </div>
    <div class="form-group">
      <label for="school">school:</label>
      <input type="text" class="form-control" name="school" value="<?php echo $school ?>">
    </div>  
     <div class="form-group">
      <label for="teacher_name">teacher name:</label>
      <input type="text" class="form-control" name="teacher_name" value="<?php echo $teachername ?>">
    </div> 
    <div class="form-group">
      <label for="project_title">Project:</label>
      <input type="text" class="form-control" name="project_title" value="<?php echo $project_title ?>">
    </div> 
      
     <label for="select_1">Category:</label>
     <select class="form-control" id="select_1" name="thenumbers" style="max-width:13.5%;">
                  <option value="chemistry">Chemistry</option>
                  <option value="math">Math</option>
                  <option value="physical science">Physical Science</option>
                  <option value="life science">Life Science</option>
                  <option value="earth science">Earth Science</option>
                </select><br>
    <div class="form-group">
      <label for="description">Description:</label>
      <input type="text" class="form-control" name="description" value="<?php echo $description ?>">
    </div>
    <button type="submit" class="btn btn-default" name="save" value="save">Save</button>
  </form>
</div>
    


    

</body>
</html>
