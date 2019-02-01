<?php
   //We include the configuration file
   include("config.php");
   $error = "";
   //Start the session
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      //Building the query
      $sql = "SELECT * FROM login WHERE username = '$myusername' and password = '$mypassword'";

      //Performs a query on the database
      $result = mysqli_query($db,$sql);

      //Fetch a result row as an associative, a numeric array, or both
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $active = $row['user_id'];
      
      //Gets the number of rows in a result
      $count = mysqli_num_rows($result);
     
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($myusername == "admin" && $mypassword == "admin1") {
         $_SESSION['login_user'] = $myusername;
         
         header("location: admin.php");
      }else if ($myusername == "user" && $mypassword == "user1"){ 
         $_SESSION['login_user'] = $myusername;
   
         header("location: user.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<!DOCTYPE html>

<html>

    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <link rel="stylesheet" href="style1.css">
    </head>
    
    <body>
        <div class="container">
            <h1>Login</h1>
            <p class="lead">Use this form to log in to your account</p>
            <?php $loginError = "";?>
            <?php echo $loginError; ?>
            
            <form class="form-inline" action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
                
                <div class="form-group">
                    <label for="login-username" class="sr-only">Username</label>
                    <input type="text" class="form-control" id="login-username" placeholder="username" name="username">
                </div>
                <div class="form-group">
                    <label for="login-password" class="sr-only">Password</label>
                    <input type="password" class="form-control" id="login-password" placeholder="password" name="password">
                </div>
                <button type="submit" class="btn btn-default" name="login">Login!</button>
                
            </form>
            
            
        </div>
        
        <!-- jQuery -->
        <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
        
        <!-- Bootstrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>