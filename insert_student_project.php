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
    
    if( !$_POST["name"] ) {
        $nameError = "Please enter a name <br>";
    } else {
        $name = validateFormData( $_POST["name"] );
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
    
    if( !$_POST["teacher_name"] ) {
        $teachernameError = "Please enter teacher name <br>";
    } else {
        $teacher_name = validateFormData( $_POST["teacher_name"] );
    }
    
    if( !$_POST["project_title"] ) {
        $project_titleError = "Please enter project title <br>";
    } else {
        $project = validateFormData( $_POST["project_title"] );
    }
    
    if( !$_POST["description"] ) {
        $descriptionError = "Please enter short project description <br>";
    } else {
        $description = validateFormData( $_POST["description"] );
    }
    
     if( !$_POST["category"] ) {
        $categoryError = "Please specify category <br>";
    } else {
        $category = validateFormData( $_POST["thenumbers"] );
    }
    
    
    // check to see if each variable has data
    if( $name && $grade_level && $school && $teacher_name && $project_title && $category && $description) {
       // $query = "INSERT INTO student_name JOIN student JOIN teacher_name JOIN project (fname, lname, grade_level, school,fname_teacher,lname_teacher,name)
       // VALUES ('$fname', '$lname', '$grade_level','$school','$fname_teacher','$lname_teacher',$project)";
        
        $query = "INSERT INTO student_project (name, grade_level, school, teacher_name,project_title,cateory,description)
        VALUES ('$name', '$grade_level','$school','$teacher_name','$project_title','$category','$description')";

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
                      <a class="nav-link" href="index_insert_student.php">Display Projects</a>
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
            <?php $nameError = $gradelevelError = $schoolError = $teachernameError =  $project_titleError = $descriptionError = ""; ?>
            <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
                <small class="text-danger">* <?php echo $nameError; ?></small>
                <input type="text" placeholder="Student name" name="name"><br><br>
                
                <small class="text-danger">* <?php echo $gradelevelError; ?></small>
                <input type="text" placeholder="Grade level" name="grade_level"><br><br>
                
                <small class="text-danger">* <?php echo $schoolError; ?></small>
                <input type="text" placeholder="School name" name="school"><br><br>
                
                <small class="text-danger">* <?php echo $teachernameError; ?></small>
                <input type="text" placeholder="Teacher name" name="teacher_name"><br><br>
                
                <small class="text-danger">* <?php echo $project_titleError; ?></small>
                <input type="text" placeholder="Title of project" name="project_title"><br><br>
                
                <label for="select_1">Category:</label>
                 <select class="form-control" id="select_1" name="thenumbers" style="max-width:13.5%;">
                  <option value="chemistry">Chemistry</option>
                  <option value="math">Math</option>
                  <option value="physical science">Physical Science</option>
                  <option value="life science">Life Science</option>
                  <option value="earth science">Earth Science</option>
                </select><br>
            
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

                
                $query2 = "select  * FROM student_project; ";
                
              //  $query2 = "select * FROM student_name, student, teacher_name, project WHERE student_name.id = teacher_name.id AND student.id = project.id; ";
                
                $result_query = mysqli_query( $conn, $query2 );
                
              
            if( mysqli_num_rows($result_query) > 0 ) {

                 
                // we have data!
                // output the data

                echo "<table class='table table-bordered'><tr><th>ID</th><th>Student Name</th><th>Grade</th><th>School</th><th>Teacher</th><th>Project Title</th><th>Category</th><th>Description</th><th>Modify</th><th>Delete</th></tr>";

                while( $row = mysqli_fetch_assoc($result_query) ) {
                    
                    $id = $row["id"];
                    
                    echo "<tr><td>". $row["id"] ."</td><td>". $row["name"] ."</td><td>". $row["grade_level"] ."</td><td>". $row["school"] ."</td><td>". $row["teacher_name"]."</td><td>". $row["project_title"]."</td><td>".     $row["category"]."</td><td>".$row["description"]."</td><td><a href ='view_student_project.php?id=$id'>Edit</td><td> <a href ='delete_student_project_records.php?id=$id'>Delete</td></tr>";
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