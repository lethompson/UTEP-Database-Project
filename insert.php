<?php

include('connection.php');

if( isset( $_POST["add"] ) ) {
        
    // build a function that validates data
    function validateFormData( $formData ) {
        $formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
        return $formData;
    }

    // set all variables to empty by default
    $username = $email = $password = $role = "";
    
    // check to see if inputs are empty
    // create variables with form data
    // wrap the data with our function
    
    if( !$_POST["username"] ) {
        $nameError = "Please enter a username <br>";
    } else {
        $username = validateFormData( $_POST["username"] );
    }

    if( !$_POST["email"] ) {
        $emailError = "Please enter your email <br>";
    } else {
        $email = validateFormData( $_POST["email"] );
    }

    if( !$_POST["password"] ) {
        $passwordError = "Please enter a password <br>";
    } else {
        $password = validateFormData( $_POST["password"] );
    }
    
    if( !$_POST["thenumbers"] ) {
        $roleError = "Please select a role <br>";
    } else {
        $role = validateFormData( $_POST["thenumbers"] );
    }
    
    // check to see if each variable has data
    if( $username && $email && $password && $role) {
        $query = "INSERT INTO users (username, password, email, role)
        VALUES ('$username', '$password', '$email','$role')";

        if( mysqli_query( $conn, $query ) ) {
            echo "<div class='alert alert-success'>New record in database!</div>";
        } else {
            echo "Error: ". $query . "<br>" . mysqli_error($conn);
        }
    }
    
}

/*
MYSQL INSERT QUERY

INSERT INTO users (id, username, password, email, signup_date, biography)
VALUES (NULL, 'jacksonsmith', 'abc123', 'jack@son.com', CURRENT_TIMESTAMP, 'Hello! I'm Jackson. This is my bio.');

*/

//mysqli_close($conn);

?>

<!DOCTYPE html>

<html>

    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MySQL Insert</title>

        <!-- Bootstrap CSS -->
       <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        
   
        
      <!--  <div class="navbar">
            <a href="index.php">Home</a>
            <a href="index_insert.php">Display Database</a>
            <a href="logout.php">Logout</a>
        </div> -->


   <!-- <link rel="stylesheet" href="style1.css">-->
             
             

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Profile Page</title>
     
        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template -->
        <link href="css/landing-page.css" rel="stylesheet">
        
        <!-- DataTables CSS -->
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
        
        <style>
             
        body {margin:0;}

        .topnav {
          overflow: hidden;
          background-color: #333;
        }

        .topnav a {
          float: left;
          display: block;
          color: #f2f2f2;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
          font-size: 17px;
        }

        .topnav a:hover {
          background-color: #ddd;
          color: black;
        }

        .topnav .icon {
          display: none;
        }

        @media screen and (max-width: 600px) {
          .topnav a:not(:first-child) {display: none;}
          .topnav a.icon {
            float: right;
            display: block;
          }
        }

        @media screen and (max-width: 600px) {
          .topnav.responsive {position: relative;}
          .topnav.responsive .icon {
            position: absolute;
            right: 0;
            top: 0;
          }
          .topnav.responsive a {
            float: none;
            display: block;
            text-align: left;
          }

        }
        </style>
        

        
        
    </head>
    
    <body>
        
            <!-- Navigation -->
            <!--<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
              <div class="container">
                <a class="navbar-brand" href="#"><?php echo "Reyes Elementary School Science Fair"; ?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                      <a class="nav-link" href="admin_user.php"><?php echo "Admin UserPage"; ?></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="index_insert.php">All Users Registered</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>-->
        
         <!-- Nav -->
                <div class="topnav" id="myTopnav">
                  <a href="admin_user.php">Admin UserPage</a>
                  <a href="index_insert.php">All users registered</a>  
                  <a href="logout.php">Logout</a>
                  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
                </div>
                <!-- Nav -->
        
        <div class="container">
            <!--<h1>Insert Users</h1>-->
            <br><br>
            <p class="text-danger">* Required fields</p>
            <?php $nameError = $emailError = $passwordError = ""; ?>
            <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
                <small class="text-danger">* <?php echo $nameError; ?></small>
                <input type="text" placeholder="Username" name="username"><br><br>
                
                <small class="text-danger">* <?php echo $emailError; ?></small>
                <input type="text" placeholder="Email" name="email"><br><br>
                
                <small class="text-danger">* <?php echo $passwordError; ?></small>
                <input type="password" placeholder="Password" name="password"><br><br>
                
                <label for="select_1">Role:</label>
                <select class="form-control" id="select_1" name="thenumbers" style="max-width:14.2%;">
                  <option value="coordinator">Coordinator</option>
                  <option value="judge">Judge</option>
                  <option value="teacher">Teacher</option>
                </select><br>
                
                <input type="submit" name="add" value="Add users to system"><br><br>
            </form>
            
            
            <div class="container">
            <div class="panel-body">
            <div class="table-responsive">
            <h1>List of all users</h1>
            
            <?php

                $query2 = "SELECT * FROM users";
                $result_query = mysqli_query( $conn, $query2 );
                
               
                
            if( mysqli_num_rows($result_query) > 0 ) {

                 
                // we have data!
                // output the data

                echo "<table class='table table-striped table-bordered table-hover'><tr><th>ID</th><th>Username</th><th>Email</th><th>Role</th><th>Modify</th><th>Delete</th></tr>";

                while( $row = mysqli_fetch_assoc($result_query) ) {
                    
                    $id = $row["id"];
                    
                    echo "<tr><td>". $row["id"] ."</td><td>". $row["username"] ."</td><td>". $row["email"] ."</td><td>". $row["role"] ."</td><td> <a href ='modify_users_system.php?id=$id'>Edit</td><td> <a href ='delete_records.php?id=$id'>Delete</td></tr>";
                }

                echo "</table>";

            } else {
                echo "Whoops! No results.";
            }

            mysqli_close($conn);

            ?>
            
        </div>
                </div>
            
        </div>
        </div>
        
        
        
        <!--JavaScript -->
            <script>
            function myFunction() {
                var x = document.getElementById("myTopnav");
                if (x.className === "topnav") {
                    x.className += " responsive";
                } else {
                    x.className = "topnav";
                }
            }
            </script>
   
        
        <!-- jQuery -->
        <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
        
        <!-- Bootstrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>