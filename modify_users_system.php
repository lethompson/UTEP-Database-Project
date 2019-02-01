<?php
require("connection.php");
$id =$_REQUEST['id'];



$result = mysqli_query($conn,"select  * FROM users WHERE  id = '$id'");


$test = mysqli_fetch_array($result);

if (!$test) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

if (!$result) 
		{
		die("Error: Data not found..");
		}
				$username=$test["username"] ;
				$email= $test["email"] ;	
               // $role=$test["role"] ;
				
				

if(isset($_POST['save']))
{	
	$username_save = $_POST['username'];
	$email_save = $_POST['email'];
    $role_save = $_POST['thenumbers'];

    
	

	mysqli_query($conn,"UPDATE users SET username ='$username_save',role='$role_save',
            email ='$email_save' WHERE id = '$id'")
       	or die("Connection failed: " . mysqli_connect_error()); 
	echo "Saved!";
	
	header("Location: insert.php");			
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
      <label for="username">Username:</label>
      <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
    </div>
    <label for="select_1">Role:</label>
                <select class="form-control" id="select_1" name="thenumbers" style="max-width:14.2%;">
                  <option value="coordinator">Coordinator</option>
                  <option value="judge">Judge</option>
                  <option value="teacher">Teacher</option>
    </select><br>
    <button type="submit" class="btn btn-default" name="save" value="save">Save</button>
  </form>
</div>
    


    

</body>
</html>
