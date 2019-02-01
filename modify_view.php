<?php
require("connection.php");
$id =$_REQUEST['id'];

//$result = mysqli_query($conn,"SELECT * FROM users WHERE id  = '$id'");
//$result = mysqli_query($conn,"select  * FROM student_name JOIN student JOIN teacher_name JOIN project WHERE id = '$id'");

//$result = mysqli_query($conn,"select  * FROM student_name, student, teacher_name, project WHERE student.id = teacher_name.id AND student.id = '$id'");

//ORIGINAL QUERY
// $result = mysqli_query($conn,"select  * FROM student_name, student, teacher_name, project WHERE student_name.id = '$id' AND student.id = teacher_name.id AND student.id='$id'");

 $result = mysqli_query($conn,"select  * FROM student_name, student, teacher_name, project WHERE student_name.id = student.id AND student.id = teacher_name.id AND student.id = '$id'");

// select  * FROM student_name, student, teacher_name, project WHERE student_name.id = student.id AND student.id = teacher_name.id AND student.id = project.id

//select  * FROM student_name, student, teacher_name, project WHERE student_name.id = student.id AND student.id = teacher_name.id AND student.id = project.id


// student_name.id = student.id AND student.id = teacher_name.id AND student.id = project.id
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
                $grade_level=$test["grade_level"] ;
				$school= $test["school"] ;	
                $fname_teacher=$test["fname_teacher"] ;
				$lname_teacher= $test["lname_teacher"] ;
                $project= $test["name"] ;
                $description= $test["description"] ;
				

if(isset($_POST['save']))
{	
	$fname_save = $_POST['fname'];
	$lname_save = $_POST['lname'];
    $grade_level_save = $_POST['grade_level'];
	$school_save = $_POST['school'];
    $fname_teacher_save = $_POST['fname_teacher'];
	$lname_teacher_save = $_POST['lname_teacher'];
    $project_save = $_POST['name'];
    $description_save = $_POST['description'];
    
	

	//mysqli_query($conn,"UPDATE users SET username ='$username_save',
     //       email ='$email_save' WHERE id = '$id'");
    //mysqli_query($conn,"UPDATE student_name JOIN student JOIN teacher_name JOIN project set fname='$fname_save',lname='$lname_save',grade_level='$grade_level_save',school='$school_save',fname_teacher='$fname_teacher_save',lname_teacher='$lname_teacher_save',name='$project_save'")
    mysqli_query($conn,"UPDATE student_name, student, teacher_name, project set fname='$fname_save',lname='$lname_save',grade_level='$grade_level_save',school='$school_save',fname_teacher='$fname_teacher_save',lname_teacher='$lname_teacher_save',name='$project_save',description='$description_save' WHERE student_name.id = teacher_name.id AND student_name.id = '$id'")
       	or die("Connection failed: " . mysqli_connect_error() ); 
	echo "Saved!";
	
	header("Location: insert_student.php");			
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
  <h2>Modify Database</h2>
  <form method="post">
    <div class="form-group">
      <label for="fname">fname:</label>
      <input type="text" class="form-control" name="fname" value="<?php echo $fname ?>">
    </div>
    <div class="form-group">
      <label for="lname">lname:</label>
      <input type="text" class="form-control" name="lname" value="<?php echo $lname ?>">
    </div>
    <div class="form-group">
      <label for="lname">grade level:</label>
      <input type="text" class="form-control" name="grade_level" value="<?php echo $grade_level ?>">
    </div>
    <div class="form-group">
      <label for="school">school:</label>
      <input type="text" class="form-control" name="school" value="<?php echo $school ?>">
    </div>  
     <div class="form-group">
      <label for="school">Fname teacher:</label>
      <input type="text" class="form-control" name="fname_teacher" value="<?php echo $fname_teacher ?>">
    </div> 
    <div class="form-group">
      <label for="school">Lname teacher:</label>
      <input type="text" class="form-control" name="lname_teacher" value="<?php echo $lname_teacher ?>">
    </div> 
    <div class="form-group">
      <label for="name">Project:</label>
      <input type="text" class="form-control" name="name" value="<?php echo $project ?>">
    </div> 
    <div class="form-group">
      <label for="description">Description:</label>
      <input type="text" class="form-control" name="description" value="<?php echo $description ?>">
    </div>
    <button type="submit" class="btn btn-default" name="save" value="save">Save</button>
  </form>
</div>
    


    

</body>
</html>
