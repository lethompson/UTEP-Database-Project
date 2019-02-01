<?php

include('connection.php');


session_start();

$id =$_REQUEST['id'];



if( isset( $_POST["add"] ) ) {
        
    // build a function that validates data
    function validateFormData( $formData ) {
        $formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
        return $formData;
    }

    // set all variables to empty by default
   $fname = $lname = $id_new="";
    
    // check to see if inputs are empty
    // create variables with form data
    // wrap the data with our function
    
    if( !$_POST["fname"] ) {
        $fnameError = "Please enter student first name <br>";
    } else {
        $fname = validateFormData( $_POST["fname"] );
    }
    
    if( !$_POST["lname"] ) {
        $lnameError = "Please enter student last name <br>";
    } else {
        $lname = validateFormData( $_POST["lname"] );
    }
    
     if( !$_POST["thenumbers"] ) {
        $id_Error = "Wrong id <br>";
    } else {
        $id_new = validateFormData( $_POST["thenumbers"] );
    }
        
    // check to see if each variable has data
    if( $id_new && $fname && $lname) {     
        $query = "INSERT INTO student_name (id,fname, lname)
        VALUES ('$id_new','$fname', '$lname')";

        if( mysqli_query( $conn, $query ) ) {
            echo "<div class='alert alert-success'>New record in database!</div>";
        } else {
            echo "Error: ". $query . "<br>" . mysqli_error($conn);
        }
    }
    
}


?>

<!DOCTYPE html>

<html>

    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Add Student Names</title>

        <!-- Bootstrap CSS -->
       <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->


   <!-- <link rel="stylesheet" href="style1.css">-->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

     
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
          <!--  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
              <div class="container">
                <a class="navbar-brand" href="#"><?php echo "Reyes Elementary School Science Fair"; ?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                  <ul class="navbar-nav ml-auto">
                     <li class="nav-item">
                      <a class="nav-link" href="user.php"><?php echo "User HomePage"; ?></a>
                    </li> 
                    <li class="nav-item">
                      <a class="nav-link" href="add_category.php">Add Project Category</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="add_student_info.php">Edit Student Registration</a>
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
          <!--<a href="add_student_name.php">Add Student names</a>-->
          <a href="user.php">User HomePage</a>
          <a href="add_category.php">Add Project Category</a>
          <a href="add_student_info.php">Edit Student Registration</a>
          <a href="logout.php">Logout</a>
          <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
        </div>
        <!-- Nav -->
        
        <div class="container">
            <br><br>
            <!--<h1>Insert Student Names in Science Fair</h1>
            <br><br>-->
            <p class="text-danger">* Required fields</p>
            <?php $fnameError = $lnameError = ""; ?>
            <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
                <label for="select_1">Student id:</label>
                 <select class="form-control" id="select_1" name="thenumbers" style="max-width:13.5%;">
                  <option value="<?php echo $id; ?>"><?php echo $id; ?></option>
                </select><br>
                
                <small class="text-danger">* <?php echo $fnameError; ?></small>
                <input type="text" placeholder="First Name" name="fname"><br><br>
                
                <small class="text-danger">* <?php echo $lnameError; ?></small>
                <input type="text" placeholder="Last Name" name="lname"><br><br>
                
                
                <input type="submit" name="add" value="Add Student Name"><br><br>
            </form>
            
            
            <div class="container">
            <div class="panel-body">
            <div class="table-responsive">
            <h2>Student's school and grade</h2>
            
            <?php

                
                $query2 = "select  * FROM student_name; ";
                
              //  $query2 = "select * FROM student_name, student, teacher_name, project WHERE student_name.id = teacher_name.id AND student.id = project.id; ";
                
                $result_query = mysqli_query( $conn, $query2 );
                
              
            if( mysqli_num_rows($result_query) > 0 ) {

                 
                // we have data!
                // output the data

                echo "<table class='table table-striped table-bordered table-hover'><tr><th>Unique ID</th><th>First Name</th><th>Last Name</th></tr>";

                while( $row = mysqli_fetch_assoc($result_query) ) {
                    
                    $id_t = $row["id"];
                    
                    echo "<tr><td>". $row["id"] ."</td><td>". $row["fname"] ."</td><td>". $row["lname"] ." <sub><a href ='add_category.php?id=$id_t'>Category</a></sub></td></tr>";
                }

                echo "</table>";

            } else {
                echo "Whoops! No results.";
            }

           // mysqli_close($conn);

            ?>
            
        </div>
            <br><br>
            <!-------------Another Table-------------------------->
            
            <div class="container">
                <h2>List of Student's name, school and grade</h2>

                <?php


                    $query3 = "select  * FROM student S,student_name ST WHERE S.id = ST.id; ";

                  //  $query2 = "select * FROM student_name, student, teacher_name, project WHERE student_name.id = teacher_name.id AND student.id = project.id; ";

                    $result_query3 = mysqli_query( $conn, $query3 );


                if( mysqli_num_rows($result_query3) > 0 ) {


                    // we have data!
                    // output the data

                    echo "<table class='table table-striped table-bordered table-hover'><tr><th>Unique ID</th><th>First Name</th><th>Last Name</th><th>School</th><th>Grade</th></tr>";

                    while( $row = mysqli_fetch_assoc($result_query3) ) {

                        $id_t = $row["id"];

                        echo "<tr><td>". $row["id"] ."</td><td>". $row["fname"] ." <sub><a href ='view_student_name.php?id=$id_t'>Edit</a>|</sub><sub><a  onClick=\"javascript: return confirm('Please confirm deletion');\" href ='delete_student_name_records.php?id=$id_t'>Delete</a></sub></td><td>". $row["lname"] ." <sub><a href ='view_student_name.php?id=$id_t'>Edit</a>|</sub><sub><a  onClick=\"javascript: return confirm('Please confirm deletion');\" href ='delete_student_name_records.php?id=$id_t'>Delete</a></sub></td><td>".$row['school']." <sub><a href ='view_student_school.php?id=$id_t'>Edit</a>|</sub><sub><a  onClick=\"javascript: return confirm('Please confirm deletion');\" href ='delete_student_school_records.php?id=$id_t'>Delete</sub></td><td>".$row['grade_level']." <sub><a href ='view_student_school.php?id=$id_t'>Edit</a>|</sub><sub><a  onClick=\"javascript: return confirm('Please confirm deletion');\" href ='delete_student_school_records.php?id=$id_t'>Delete</sub></td></tr>";
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