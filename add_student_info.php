<?php

include('connection.php');


if( isset( $_POST["add"] ) ) {
        
    // build a function that validates data
    function validateFormData( $formData ) {
        $formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
        return $formData;
    }

    // set all variables to empty by default
   $grade_level = $school = "";
    
    // check to see if inputs are empty
    // create variables with form data
    // wrap the data with our function
    
    if( !$_POST["grade_level"] ) {
        $gradelevelError = "Please enter a grade level <br>";
    } else {
        $grade_level = validateFormData( $_POST["grade_level"] );
    }
    
    if( !$_POST["school"] ) {
        $schoolError = "Please enter a school <br>";
    } else {
        $school = validateFormData( $_POST["school"] );
    }
        
    // check to see if each variable has data
    if( $grade_level && $school) {     
        $query = "INSERT INTO student (school, grade_level)
        VALUES ('$school', '$grade_level')";

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

        <title>Student Info</title>

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

        <title>Student School</title>
     
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
        
        <script type="text/javascript">
            function delete_id(id)
            {
                 if(confirm('Sure To Remove This Record ?'))
                 {
                    window.location.href='delete_student_school_records.php?delete_id='+id;
                 }
            }
        </script>
        
    </head>
    
    <body>
        
            <!-- Navigation -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
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
                      <a class="nav-link" href="add_student_name.php"><?php echo "Add/Edit Student Name"; ?></a>
                    </li>   
                    <li class="nav-item">
                      <a class="nav-link" href="add_teacher_name.php"><?php echo "Add/Edit Teacher of Project"; ?></a>
                    </li> 
                    <li class="nav-item">
                      <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
        
        <div class="container">
            <h1>Insert Users</h1>
            <br><br>
            <p class="text-danger">* Required fields</p>
            <?php $gradelevelError = $schoolError = ""; ?>
            <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
                
                <small class="text-danger">* <?php echo $gradelevelError; ?></small>
                <input type="text" placeholder="Grade level" name="grade_level"><br><br>
                
                <small class="text-danger">* <?php echo $schoolError; ?></small>
                <input type="text" placeholder="School name" name="school"><br><br>
                
                
                <input type="submit" name="add" value="Add School &amp Grade"><br><br>
            </form>
            
            
            <div class="container">
            <div class="panel-body">
            <div class="table-responsive">
            <h2>List of student's school and grade level</h2>
            
            <?php

                
                $query2 = "select  * FROM student; ";
                
              //  $query2 = "select * FROM student_name, student, teacher_name, project WHERE student_name.id = teacher_name.id AND student.id = project.id; ";
                
                $result_query = mysqli_query( $conn, $query2 );
                
              
            if( mysqli_num_rows($result_query) > 0 ) {

                 
                // we have data!
                // output the data

                echo "<table class='table table-striped table-bordered table-hover'><tr><th>Unique ID</th><th>School</th><th>Grade</th></tr>";

                while( $row = mysqli_fetch_assoc($result_query) ) {
                    
                    $id_t = $row["id"];
                    
                    
                   //  echo "<tr><td>". $row["id"] ."</td><td>". $row["school"] ." <sub><a href ='view_student_school.php?id=$id_t'>Edit</a>|</sub><sub><a href ='delete_student_school_records.php?id=$id_t'>Delete</a></sub></td><td>". $row["grade_level"] ."<sub><a href ='add_student_name.php?id=$id_t'>Student Name</a></sub></td></tr>";
                    
                    //onclick="return confirm(''Are you sure you want to delete??');"
                    
                    /*echo "<tr><td>". $row["id"] ."</td><td>". $row["school"] ." <sub><a href ='view_student_school.php?id=$id_t'>Edit</a>|</sub><sub><a href='javascript:delete_id(<?php echo $id_t; ?>)'>Delete</a></sub></td><td>". $row["grade_level"] ."<sub><a href ='add_student_name.php?id=$id_t'>Student Name</a></sub></td></tr>";*/
        
                    echo "<tr><td>". $row["id"] ."</td><td>". $row["school"] ." <sub><a href ='view_student_school.php?id=$id_t'>Edit</a>|</sub><sub><a onClick=\"javascript: return confirm('Please confirm deletion');\" href ='delete_student_school_records.php?id=$id_t'>Delete</a></sub></td><td>". $row["grade_level"] ."<sub><a href ='add_student_name.php?id=$id_t'>Student Name</a>|</sub><sub><a href ='add_teacher_name.php?id=$id_t'>Teacher</a></sub></td></tr>";
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
        
        
        
        
   
        
        <!-- jQuery -->
        <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
        
        <!-- Bootstrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>