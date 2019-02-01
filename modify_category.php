<?php
require("connection.php");
$id =$_REQUEST['id'];

$result = mysqli_query($conn,"select  * FROM category WHERE id = '$id'");

$test = mysqli_fetch_array($result);

if (!$test) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

if (!$result) 
		{
		die("Error: Data not found..");
		}
                $category= $test["name"] ;
               
                
				

if(isset($_POST['save']))
{	
    $category_save = $_POST['thenumbers'];

    
	

	
    mysqli_query($conn,"UPDATE category set name='$category_save'
    WHERE id = '$id'") or die("Connection failed: " . mysqli_connect_error() ); 
	echo "Saved!";
	
	header("Location: add_category.php");			
}
mysqli_close($conn);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Modify Category Choice</title>
    
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
</head>

<body>

    
    <div class="container">
  <h2>Modify student category choice</h2>
  <form method="post">    
     <label for="select_1">Category:</label>
     <select class="form-control" id="select_1" name="thenumbers" style="max-width:13.5%;">
                  <option value="Chemistry">Chemistry</option>
                  <option value="Math">Math</option>
                  <option value="Physical Science">Physical Science</option>
                  <option value="Life Science">Life Science</option>
                  <option value="Earth Science">Earth Science</option>
                </select><br>
    <button type="submit" class="btn btn-default" name="save" value="save">Save</button>
  </form>
</div>
    


    

</body>
</html>
