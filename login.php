<?php
   //We include the configuration file
   include("config.php");
   $error = "";
   //Start the session
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      //echo "1 -- $var";
      //$myusername = mysqli_real_escape_string($db,$_POST['username']);
      //$mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      $myusername = $_POST['username'];
      $mypassword = $_POST['password'];
       //echo "---->". $_POST['username']."....".$_POST['password'];
      
      //Building the query
     # $sql = "SELECT * FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $var_coord = $var_teach = $var_judge = "";
      $var_coord = "coordinator";
      $var_teach = "teacher";
      $var_judge = "judge";
       
     # $sql = "SELECT * FROM users WHERE role = '$var_coord' OR role = '$var_teach' OR role = '$var_judge'";
      $sql = "SELECT * FROM users WHERE username = '$myusername' AND password = '$mypassword'";
      echo $sql;
       //Performs a query on the database
      $result = mysqli_query($db,$sql);

      //Fetch a result row as an associative, a numeric array, or both
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      
       
      $coord = $row['role'];   
      $active = $row['id'];
      
      //Gets the number of rows in a result
      $count = mysqli_num_rows($result);
       echo "$count";
     
      // If result matched $myusername and $mypassword, table row must be 1 row
     // if($myusername == "admin" && $mypassword == "admin1") {
      if($row['username'] and $row['password'] and $row['role'] == 'coordinator') {
         $_SESSION['login_user'] = $myusername;
         
         header("location: admin_user.php");
      }else if ($row['username'] and $row['password'] and $row['role'] == 'teacher'){ 
         $_SESSION['login_user'] = $myusername;
   
         header("location: user.php");
      }else if ($row['username'] and $row['password'] and $row['role'] == 'judge'){
           $_SESSION['login_user'] = $myusername;
   
         header("location: user.php");
       }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login Science Fair System</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
         <form  action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
          <div class="form-group">
            <label for="exampleInputUsername1">Username</label>
            <input class="form-control" id="exampleInputUsername1" type="text" aria-describedby="usernameHelp" placeholder="Enter username" name="username">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password" name="password">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
        </form>
        <div class="text-center">
          <!--<a class="d-block small mt-3" href="register.html">Register an Account</a>-->
          <!--<a class="d-block small" href="forgot-password.html">Forgot Password?</a>-->
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/popper/popper.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
