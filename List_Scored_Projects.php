<?php

include('connection.php');

 // Start the session
   //session_start();

//$name=$_SESSION['Student'];
//$grade_level=$_SESSION['Grade'];
//$teacher_name=$_SESSION['Teacher'];
//$project=$_SESSION['Project'];
//$category=$_SESSION['Category'];
//$school="School";



/*
   $name=$_POST['Student'];
                     $grade_level=$_POST['Grade'];
                     $teacher_name=$_POST['Teacher'];
                     $project=$_POST['Project'];
                     $category=$_POST['Category'];
                     $school="Reyes Elementary";


*/


?>

<!DOCTYPE html>

<html>

    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">


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

        <title>Scoring Projects</title>
     
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
                      <a class="nav-link" href="user.php"><?php echo "User HomePage"; ?></a>
                    </li> 
                    <li class="nav-item">
                      <a class="nav-link" href="download_excel.php">Download Scores</a>
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
                  <a href="user.php">User HomePage</a>
                  <a href="download_excel.php">Download Scores</a> 
                  <a href="logout.php">Logout</a>
                  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
                </div>
                <!-- Nav -->
        
              
             <br><br><br><br>
             <div class="container">
             <div class="panel-body">
             <div class="table-responsive">
        
                    <h2>List of All Science Fair Project Scores</h2>

                    <?php


                        $query3 = "SELECT * FROM student_scoring_rubric; ";

                      //  $query2 = "select * FROM student_name, student, teacher_name, project WHERE student_name.id = teacher_name.id AND student.id = project.id; ";

                        $result_query3 = mysqli_query( $conn, $query3 );


                    if( mysqli_num_rows($result_query3) > 0 ) {


                        // we have data!
                        // output the data
                        

                        echo "<table class='table table-striped table-bordered table-hover'><tr><th>Unique ID</th><th>Student</th><th>Grade</th><th>School</th><th>Project</th><th>Teacher</th><th>Category</th><th>Score</th></tr>";
                         
                        $school = "Reyes Elementary";
                        while( $row = mysqli_fetch_assoc($result_query3) ) {

                            //$id = $row["id"];
                           
                  
                            echo "<tr><td>". $row["id"] ."</td><td>". $row["student_name"] ."</td><td>". $row["grade"] ."</td><td>".$school."</td><td>".$row["project_title"]."</td><td>".$row["teacher_name"]."</td><td>".$row["category"]."</td><td>".$row["total"]."</td></tr>";
                            
                           
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
        
           <!---------

                 echo "<tr><td>". $row["id"] ."</td><td>". $row["username"] ."</td><td>". $row["email"] ."</td><td>". $row["role"] ."</td><td> <a href ='modify_view.php?id=$id'>Edit</td><td> <a href ='delete_records.php?id=$id'>Delete</td></tr>";


           -->
            
            
            
        
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