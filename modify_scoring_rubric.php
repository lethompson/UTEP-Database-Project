<?php
require("connection.php");
$id =$_REQUEST['id'];

//$result = mysqli_query($conn,"SELECT * FROM users WHERE id  = '$id'");
//$result = mysqli_query($conn,"select  * FROM student_name JOIN student JOIN teacher_name JOIN project WHERE id = '$id'");

//$result = mysqli_query($conn,"select  * FROM student_name, student, teacher_name, project WHERE student.id = teacher_name.id AND student.id = '$id'");

//ORIGINAL QUERY
// $result = mysqli_query($conn,"select  * FROM student_name, student, teacher_name, project WHERE student_name.id = '$id' AND student.id = teacher_name.id AND student.id='$id'");

 $result = mysqli_query($conn,"select  * FROM student_scoring_rubric WHERE id = '$id'");

$test = mysqli_fetch_array($result);

if (!$test) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

if (!$result) 
		{
		die("Error: Data not found..");
		}
				$name=$test["student_name"] ;	
                $grade_level=$test["grade"] ;
                $teachername=$test["teacher_name"] ;
                $project_title= $test["project_title"] ;
                $category= $test["category"] ;
                $total= $test["total"] ;
                
				

if(isset($_POST['save']))
{	
	$name_save = $_POST['student_name'];
    $grade_level_save = $_POST['grade'];
    $teachername_save = $_POST['teacher_name'];
	$project_titlesave = $_POST['project_title'];
    $category_save = $_POST['thenumbers'];
    $total_save = $_POST['total'];
    
	

	
    mysqli_query($conn,"UPDATE student_scoring_rubric set student_name='$name_save',teacher_name='$teachername_save',category='$category_save',
    project_title='$project_titlesave',grade='$grade_level_save',total='$total_save'
    WHERE id = '$id'") or die("Connection failed: " . mysqli_connect_error() ); 
	echo "Saved!";
	
	header("Location: Scoring_Rubric.php");			
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
  <h2>Modify student registration</h2>
  <form method="post">
    <div class="form-group">
      <label for="student_name">name:</label>
      <input type="text" class="form-control" name="student_name" value="<?php echo $name ?>">
    </div>
    <div class="form-group">
      <label for="grade">grade level:</label>
      <input type="text" class="form-control" name="grade" value="<?php echo $grade_level ?>">
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
      <label for="total">Total:</label>
      <input type="text" class="form-control" name="total" value="<?php echo $total ?>">
    </div>
    <button type="submit" class="btn btn-default" name="save" value="save">Save</button>
  </form>
</div>
    


    

</body>
</html>
