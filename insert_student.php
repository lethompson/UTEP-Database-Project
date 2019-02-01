<?php

include('connection.php');

if( isset( $_POST["add"] ) ) {
        
    // build a function that validates data
    function validateFormData( $formData ) {
        $formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
        return $formData;
    }

    // set all variables to empty by default
    $fname = $lname = $grade_level = $school = $fname_teacher = $lname_teacher = $project = $description = "";
    
    // check to see if inputs are empty
    // create variables with form data
    // wrap the data with our function
    
    if( !$_POST["fname"] ) {
        $fnameError = "Please enter a firstname <br>";
    } else {
        $fname = validateFormData( $_POST["fname"] );
    }

    if( !$_POST["lname"] ) {
        $lnameError = "Please enter your lastname <br>";
    } else {
        $lname = validateFormData( $_POST["lname"] );
    }

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
    
    if( !$_POST["fname_teacher"] ) {
        $fnameteacherError = "Please enter teacher firstname <br>";
    } else {
        $fname_teacher = validateFormData( $_POST["fname_teacher"] );
    }
    
    if( !$_POST["lname_teacher"] ) {
        $lnameteacherError = "Please enter teacher lastname <br>";
    } else {
        $lname_teacher = validateFormData( $_POST["lname_teacher"] );
    }
    
    if( !$_POST["name"] ) {
        $projectError = "Please enter project title <br>";
    } else {
        $project = validateFormData( $_POST["name"] );
    }
    
    if( !$_POST["description"] ) {
        $projectError = "Please enter short project description <br>";
    } else {
        $description = validateFormData( $_POST["description"] );
    }
    
    
    // check to see if each variable has data
    if( $fname && $lname && $grade_level && $school && $fname_teacher && $lname_teacher && $project && $description) {
       // $query = "INSERT INTO student_name JOIN student JOIN teacher_name JOIN project (fname, lname, grade_level, school,fname_teacher,lname_teacher,name)
       // VALUES ('$fname', '$lname', '$grade_level','$school','$fname_teacher','$lname_teacher',$project)";
        
        $query = "INSERT INTO student_name, student, teacher_name, project (fname, lname, grade_level, school,fname_teacher,lname_teacher,name,description)
        VALUES ('$fname', '$lname','$grade_level','$school','$fname_teacher','$lname_teacher','$project','$description')";

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
                      <a class="nav-link" href="index.php"><?php echo "Home"; ?></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="index_insert.php">Display Database</a>
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

            <p class="text-danger">* Required fields</p>
            <?php $fnameError = $lnameError = $gradelevelError = $schoolError = $teacherfnameError = $teacherlnameError = $projectError = $descriptionError = ""; ?>
            <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
                <small class="text-danger">* <?php echo $fnameError; ?></small>
                <input type="text" placeholder="Student Firstname" name="fname"><br><br>
                
                <small class="text-danger">* <?php echo $lnameError; ?></small>
                <input type="text" placeholder="Student Lastname" name="lname"><br><br>
                
                <small class="text-danger">* <?php echo $gradelevelError; ?></small>
                <input type="text" placeholder="grade level" name="grade_level"><br><br>
                
                <small class="text-danger">* <?php echo $schoolError; ?></small>
                <input type="text" placeholder="Name of School" name="school"><br><br>
                
                <small class="text-danger">* <?php echo $teacherfnameError; ?></small>
                <input type="text" placeholder="First name of teacher" name="fname_teacher"><br><br>
                
                <small class="text-danger">* <?php echo $teacherlnameError; ?></small>
                <input type="text" placeholder="Last name of teacher" name="lname_teacher"><br><br>
                
                 <small class="text-danger">* <?php echo $projectError; ?></small>
                <input type="text" placeholder="Project name" name="name"><br><br>
                
                 <small class="text-danger">* <?php echo $descriptionError; ?></small>
                <input type="text" placeholder="Short description" name="description"><br><br>
                
              <!--  <label for="select_1">Role:</label>
                <select class="form-control" id="select_1" name="thenumbers" style="max-width:14.2%;">
                  <option value="coordinator">Coordinator</option>
                  <option value="judge">Judge</option>
                  <option value="teacher">Teacher</option>
                </select><br>-->
                
                <input type="submit" name="add" value="Add Entry"><br><br>
            </form>
            
            
            <div class="container">
            <h2>Student's with project</h2>
            
            <?php

                //$query2 = "SELECT * FROM users";
                //$query2 = "select  * FROM student_name JOIN student JOIN teacher_name JOIN project WHERE student_name.id = student.id AND student.id = teacher_name.id AND student.id = project.id; ";
                
                $query2 = "select  * FROM student_name, student, teacher_name, project WHERE student_name.id = student.id AND student.id = teacher_name.id AND student.id = project.id; ";
                
              //  $query2 = "select * FROM student_name, student, teacher_name, project WHERE student_name.id = teacher_name.id AND student.id = project.id; ";
                
                $result_query = mysqli_query( $conn, $query2 );
                
              
            if( mysqli_num_rows($result_query) > 0 ) {

                 
                // we have data!
                // output the data

                echo "<table class='table table-bordered'><tr><th>ID</th><th>Fname</th><th>Lname</th><th>grade level</th><th>School </th><th>teacher</th><th>Project</th><th>Description</th><th>Modify</th><th>Delete</th></tr>";

                while( $row = mysqli_fetch_assoc($result_query) ) {
                    
                    $id = $row["id"];
                    
                    echo "<tr><td>". $row["id"] ."</td><td>". $row["fname"] ."</td><td>". $row["lname"] ."</td><td>". $row["grade_level"] ."</td><td>". $row["school"]."</td><td>". $row["fname_teacher"]."     ".$row["lname_teacher"]."</td><td>".$row["name"]."</td><td>".$row["description"]."</td><td><a href ='modify_view.php?id=$id'>Edit</td><td> <a href ='delete_records.php?id=$id'>Delete</td></tr>";
                }

                echo "</table>";

            } else {
                echo "Whoops! No results.";
            }

            mysqli_close($conn);

            ?>
            
        </div>
            
        </div>
        
        
        
        
   
        
        <!-- jQuery -->
        <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
        
        <!-- Bootstrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>