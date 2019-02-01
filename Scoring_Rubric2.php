<?php
include('connection.php');

//Start the session
 
session_start();


//include('addition.php');

$query = "SELECT * FROM student_scoring_rubric";
$result = mysqli_query( $conn, $query );

//  include("addition.php");

//include('connection.php');

if( isset( $_POST["entry"] ) ) {
        
       
                    
                    //Scientific Method
                     $scientific_meth1 = $_POST['presented1'];
                   
                    
                    
                     $scientific_meth6 = $_POST['variables1'];
                
                    
                     $scientific_meth11 = $_POST['clear1'];
                  
                    
                    
                     $scientific_meth16 = $_POST['the1'];
           
                     $scientific_meth21 = $_POST['and1'];
                    
                    
                     $scientific_meth26 = $_POST['suff1'];
                 
                    
                    
                     $scientific_meth31 = $_POST['finalist1'];
                    
                    
                     $scientic_meth_total = ($scientific_meth1 +
                         $scientific_meth6 + $scientific_meth11+
                         $scientific_meth16 + $scientific_meth21 +
                         $scientific_meth26 + $scientific_meth31);
                    
                    //Scientific Knowledge
                    $scientific_know1 = $_POST['a1'];
              
                    
                    $scientific_know6 = $_POST['clearly1'];
                   
                    
                    
                    $scientific_know11 = $_POST['used1'];
               
                    
                    
                    $scientific_know16 = $_POST['student1'];
                   
                    
                    
                    $scientic_know_total = ($scientific_know1 +  $scientific_know6 + $scientific_know11
                        + $scientific_know16);
                        
                        
                    //Presentation    
                    $presentation_1 = $_POST['offers1'];
                   
                    $presentation_6 = $_POST['important1'];
               
                    
                    $presentation_11 = $_POST['pictures1'];
                  
                    
                    $presentation_16 = $_POST['understands1'];
                    
                    
                    $presentation_21 = $_POST['concise1'];
                 
                    
                    $presentation_26 = $_POST['includes1'];
                   
                    
                    $presentation_total = ($presentation_1 + $presentation_6 + $presentation_11 +
                    $presentation_16 + $presentation_21 + $presentation_26);
                    
                    
                    //Creativity
                    $creativity_1 = $_POST['presents1'];
                  
                    
                    $creativity_6 = $_POST['investigated1'];
                
                    
                    $creativity_11 = $_POST['shows1'];
                   
                    
                    $creativity_total = ($creativity_1 + $creativity_6 + $creativity_11); 
                 
                    //Total of all classifcations
                     $total = ($scientic_meth_total + $scientic_know_total + $presentation_total + $creativity_total);
                    
                     $name=$_POST['student_name'];
                     $grade_level=$_POST['grade'];
                     $teacher_name=$_POST['teacher_name'];
                     $project=$_POST['project'];
                     $category=$_POST['thenumbers'];
    
    
    
    
    // check to see if each variable has data
    if( $name && $grade_level && $teacher_name && $project && $category && $total) {
       // $query = "INSERT INTO student_name JOIN student JOIN teacher_name JOIN project (fname, lname, grade_level, school,fname_teacher,lname_teacher,name)
       // VALUES ('$fname', '$lname', '$grade_level','$school','$fname_teacher','$lname_teacher',$project)";
        
        $query = "INSERT INTO student_scoring_rubric (student_name, teacher_name,category,project_title,grade,total)
        VALUES ('$name', '$teacher_name','$category','$project','$grade_level','$total')";

        if( mysqli_query( $conn, $query ) ) {
            echo "<div class='alert alert-success'>New record in database!</div>";
        } else {
            echo "Error: ". $query . "<br>" . mysqli_error($conn);
        }
    }
    
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Scoring Rubric</title>
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
  <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template -->
       <link href="css/landing-page.css" rel="stylesheet"> 
    <!--</head>-->
    
         <!--<link href="css/sb-admin.css" rel="stylesheet">-->
    
<link rel="stylesheet" href="css/rubric_style.css">
<style type="text/css">
    .bs-example{
    	margin: 20px;
    }
    table,th,td {
        border: 1px solid black;
        border-spacing: 0;
        border-collapse: collapse;
        text-align: left;
        padding:8px;
    }
</style>
    
        <style> 
    input[type=text] {
        width: 100%;
        padding: 6px 10px;
        margin: 0.5px 0;
        box-sizing: border-box;
        border: none;
        color: blue;
    }
    </style>
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
                      <a class="nav-link" href="user.php"><?php echo "User HomePage"; ?></a>
                    </li> 
                    <li class="nav-item">
                      <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
    
    
    <br><br>
<div class="bs-example" style="overflow-x:auto;">
<form method="post" action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>">
        <table class="table" method="post" action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>">
            <thead>
                <tr>
                 <th colspan="6" style="text-align:center" bgcolor="#DCDCDC">Reyes Elementary School Science Fair Judging Rubric</th>

                </tr>
                <tr>
                  <th>Student Name: <input type="text" name="Student" maxlength="20" size="60" placeholder="Student Name"></th>
                  <th colspan="5">Teacher Name: <input type="text" name="Teacher" maxlength="20" size="60" placeholder="Teacher Name"></th>
                </tr>
                <tr>
                <!--  <th>Category: <input type="checkbox" name="category"> Life Science 
                     <input type="checkbox" value="physical science"> Physical Science 
                     <input type="checkbox" value="earth science"> Earth Science
                     <input type="checkbox" value="chemistry"> Chemistry
                     <input type="checkbox" value="math"> Math

                 </th> -->
                  <th>
                            <label for="select_1">Category:</label>
                         <select class="form-control" id="select_1" name="Category" style="max-width:13.5%;">
                          <option value="chemistry">Chemistry</option>
                          <option value="math">Math</option>
                          <option value="physical science">Physical Science</option>
                          <option value="life science">Life Science</option>
                          <option value="earth science">Earth Science</option>
                        </select><br>
                    
                    
                  </th>
                  <th colspan="5">Grade: <input type="text" name="Grade" maxlength="4" size="4" placeholder="5th"></th>
                </tr>
                <tr>
                    <th>Project title: <input type="text" name="Project" maxlength="20" size="60" placeholder="Student Project title"></th>
                 <th>Superior<br>5</th>
                    <th>Above Average<br>4</th>
                    <th>Average<br>3</th>
                    <th>Below Average<br>2</th>
                    <th>Minimal<br>1</th>
                </tr>
                <tr>
                    <th bgcolor="#DCDCDC" >Scientific Method   (35 points)</th>
                    <th bgcolor="#DCDCDC" colspan="5"></th>
                    <!--<th bgcolor="#DCDCDC"></th>
                    <th bgcolor="#DCDCDC"></th>
                    <th bgcolor="#DCDCDC"></th>
                    <th bgcolor="#DCDCDC"></th>-->
                   <!--<th class="rotate"><div><span>Scientific Method</span></div></th> -->
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Presented a question that could be answered through experimentation.</td>
                   <!-- <td><input type="text" name="presented1" maxlength="4" size="4" placeholder="5"></td>
                    <td><input type="text" name="presented2" maxlength="4" size="4" placeholder="4"></td>
                    <td><input type="text" name="presented3" maxlength="4" size="4" placeholder="3"></td>
                    <td><input type="text" name="presented4" maxlength="4" size="4" placeholder="2"></td>
                    <td><input type="text" name="presented5" maxlength="4" size="4" placeholder="1"></td>-->
                    <td colspan="6">
                        <!--<label for="select_1">Category:</label>-->
                         <select class="form-control"  name="presented1" style="max-width:13.5%;">
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select><br>
                    
                    </td>

                </tr>
                <tr>
                    <td>Variables and controls are defined, appropriate and complete.</td>
                       <td colspan="6">
                        <!--<label for="select_1">Category:</label>-->
                         <select class="form-control"  name="variables1" style="max-width:13.5%;">
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select><br>
                    
                    </td>
                    
                    
                 <!--   <td><input type="text" name="variables1" maxlength="4" size="4" placeholder="5"></td>
                    <td><input type="text" name="variables2" maxlength="4" size="4" placeholder="4"></td>
                    <td><input type="text" name="variables3" maxlength="4" size="4" placeholder="3"></td>
                    <td><input type="text" name="variables4" maxlength="4" size="4" placeholder="2"></td>
                    <td><input type="text" name="variables5" maxlength="4" size="4" placeholder="1"></td>-->
                    

                </tr>
                <tr>
                    <td>Clear procedural plan for testing the hypothesis, includes use of control variables.</td>
                    <!--<td><input type="text" name="clear1" maxlength="4" size="4" placeholder="5"></td>
                    <td><input type="text" name="clear2" maxlength="4" size="4" placeholder="4"></td>
                    <td><input type="text" name="clear3" maxlength="4" size="4" placeholder="3"></td>
                    <td><input type="text" name="clear4" maxlength="4" size="4" placeholder="2"></td>
                    <td><input type="text" name="clear5" maxlength="4" size="4" placeholder="1"></td> -->
                    
                       <td colspan="6">
                        <!--<label for="select_1">Category:</label>-->
                         <select class="form-control"  name="clear1" style="max-width:13.5%;">
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select><br>
                    
                    </td>
                </tr>

                <tr>
                   <td>The conclusions are based on multiple trials (at least 3) and adequate subjects were used.</td>
                   <!-- <td><input type="text" name="the1" maxlength="4" size="4" placeholder="5"></td>
                    <td><input type="text" name="the2" maxlength="4" size="4" placeholder="4"></td>
                    <td><input type="text" name="the3" maxlength="4" size="4" placeholder="3"></td>
                    <td><input type="text" name="the4" maxlength="4" size="4" placeholder="2"></td>
                    <td><input type="text" name="the5" maxlength="4" size="4" placeholder="1"></td>-->
                    
                       <td colspan="6">
                        <!--<label for="select_1">Category:</label>-->
                         <select class="form-control"  name="the1" style="max-width:13.5%;">
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select><br>
                    
                    </td>
                </tr>

                <tr>
                  <td>Clear and thorough process for data observations and collection</td>
                   <!-- <td><input type="text" name="and1" maxlength="4" size="4" placeholder="5"></td>
                    <td><input type="text" name="and2" maxlength="4" size="4" placeholder="4"></td>
                    <td><input type="text" name="and3" maxlength="4" size="4" placeholder="3"></td>
                    <td><input type="text" name="and4" maxlength="4" size="4" placeholder="2"></td>
                    <td><input type="text" name="and5" maxlength="4" size="4" placeholder="1"></td> -->
                       <td colspan="6">
                        <!--<label for="select_1">Category:</label>-->
                         <select class="form-control"  name="and1" style="max-width:13.5%;">
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select><br>
                    
                    </td>
                </tr>

                <tr>
                   <td>Sufficient data was collected to support interpretation and conclusions.</td>
                       <td colspan="6">
                        <!--<label for="select_1">Category:</label>-->
                         <select class="form-control"  name="suff1" style="max-width:13.5%;">
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select><br>
                    
                    </td>
                    <!--<td><input type="text" name="suff1" maxlength="4" size="4" placeholder="5"></td>
                    <td><input type="text" name="suff2" maxlength="4" size="4" placeholder="4"></td>
                    <td><input type="text" name="suff3" maxlength="4" size="4" placeholder="3"></td>
                    <td><input type="text" name="suff4" maxlength="4" size="4" placeholder="2"></td>
                    <td><input type="text" name="suff5" maxlength="4" size="4" placeholder="1"></td>-->
                </tr>

                <tr>
                   <td>The finalist has an idea of what future research is warranted.</td>
                       <td colspan="6">
                        <!--<label for="select_1">Category:</label>-->
                         <select class="form-control"  name="finalist1" style="max-width:13.5%;">
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select><br>
                    
                    </td>
                  <!--  <td><input type="text" name="finalist1" maxlength="4" size="4" placeholder="5"></td>
                    <td><input type="text" name="finalist2" maxlength="4" size="4" placeholder="4"></td>
                    <td><input type="text" name="finalist3" maxlength="4" size="4" placeholder="3"></td>
                    <td><input type="text" name="finalist4" maxlength="4" size="4" placeholder="2"></td>
                    <td><input type="text" name="finalist5" maxlength="4" size="4" placeholder="1"></td>-->
                </tr>
            </tbody>

            <thead>
            <tr>
                    <th bgcolor="#DCDCDC">Scientific Knowledge (20 points)</th>
                    <th bgcolor="#DCDCDC" colspan="5"></th>
                   <!-- <th bgcolor="#DCDCDC"></th>
                    <th bgcolor="#DCDCDC"></th>
                    <th bgcolor="#DCDCDC"></th>
                    <th bgcolor="#DCDCDC"></th>-->
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>A minimum of three-age-appropriate sources for background research.</td>
                       <td colspan="6">
                        <!--<label for="select_1">Category:</label>-->
                         <select class="form-control"  name="a1" style="max-width:13.5%;">
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select><br>
                    
                    </td>
                   <!-- <td><input type="text" name="a1" maxlength="4" size="4" placeholder="5"></td>
                    <td><input type="text" name="a2" maxlength="4" size="4" placeholder="4"></td>
                    <td><input type="text" name="a3" maxlength="4" size="4" placeholder="3"></td>
                    <td><input type="text" name="a4" maxlength="4" size="4" placeholder="2"></td>
                    <td><input type="text" name="a5" maxlength="4" size="4" placeholder="1"></td>-->

                </tr>
                <tr>
                    <td>Clearly identified and explained key scientific concepts relating to the experiment.</td>
                       <td colspan="6">
                        <!--<label for="select_1">Category:</label>-->
                         <select class="form-control"  name="clearly1" style="max-width:13.5%;">
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select><br>
                    
                    </td>
                <!--    <td><input type="text" name="clearly1" maxlength="4" size="4" placeholder="5"></td>
                    <td><input type="text" name="clearly2" maxlength="4" size="4" placeholder="4"></td>
                    <td><input type="text" name="clearly3" maxlength="4" size="4" placeholder="3"></td>
                    <td><input type="text" name="clearly4" maxlength="4" size="4" placeholder="2"></td>
                    <td><input type="text" name="clearly5" maxlength="4" size="4" placeholder="1"></td>-->

                </tr>
                <tr>
                    <td>Used scientific principles and/or mathematical formulas correctly in the experiment.</td>
                       <td colspan="6">
                        <!--<label for="select_1">Category:</label>-->
                         <select class="form-control"  name="used1" style="max-width:13.5%;">
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select><br>
                    
                    </td>
                  <!--  <td><input type="text" name="used1" maxlength="4" size="4" placeholder="5"></td>
                    <td><input type="text" name="used2" maxlength="4" size="4" placeholder="4"></td>
                    <td><input type="text" name="used3" maxlength="4" size="4" placeholder="3"></td>
                    <td><input type="text" name="used4" maxlength="4" size="4" placeholder="2"></td>
                    <td><input type="text" name="used5" maxlength="4" size="4" placeholder="1"></td>-->
                </tr>

                <tr>
                   <td>Student suggests changes to the experimental procedure and/or possibilities for further study, while evaluating the success and effectiveness of the project.</td>
                       <td colspan="6">
                        <!--<label for="select_1">Category:</label>-->
                         <select class="form-control"  name="student1" style="max-width:13.5%;">
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select><br>
                    
                    </td>
                    <!--<td><input type="text" name="student1" maxlength="4" size="4" placeholder="5"></td>
                    <td><input type="text" name="student2" maxlength="4" size="4" placeholder="4"></td>
                    <td><input type="text" name="student3" maxlength="4" size="4" placeholder="3"></td>
                    <td><input type="text" name="student4" maxlength="4" size="4" placeholder="2"></td>
                    <td><input type="text" name="student5" maxlength="4" size="4" placeholder="1"></td>-->
                </tr>

            </tbody>

             <thead>
            <tr>
                    <th bgcolor="#DCDCDC">Presentation (30 points)</th>
                    <th bgcolor="#DCDCDC" colspan="5"></th>
                    <!--<th bgcolor="#DCDCDC"></th>
                    <th bgcolor="#DCDCDC"></th>
                    <th bgcolor="#DCDCDC"></th>
                    <th bgcolor="#DCDCDC"></th>-->
                </tr>
            </thead>

            <tbody>
            <tr>
                    <td>Offers clarity of graphics and legends.</td>
                   <td colspan="6">
                        <!--<label for="select_1">Category:</label>-->
                         <select class="form-control"  name="offers1" style="max-width:13.5%;">
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select><br>
                    
                    </td>
                  <!--  <td><input type="text" name="offers1" maxlength="4" size="4" placeholder="5"></td>
                    <td><input type="text" name="offers2" maxlength="4" size="4" placeholder="4"></td>
                    <td><input type="text" name="offers3" maxlength="4" size="4" placeholder="3"></td>
                    <td><input type="text" name="offers4" maxlength="4" size="4" placeholder="2"></td>
                    <td><input type="text" name="offers5" maxlength="4" size="4" placeholder="1"></td>-->

                </tr>
                <tr>
                    <td>The important phases of the project are presented in a orderly manner.</td>
                       <td colspan="6">
                        <!--<label for="select_1">Category:</label>-->
                         <select class="form-control"  name="important1" style="max-width:13.5%;">
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select><br>
                    
                    </td>
                   <!-- <td><input type="text" name="important1" maxlength="4" size="4" placeholder="5"></td>
                    <td><input type="text" name="important2" maxlength="4" size="4" placeholder="4"></td>
                    <td><input type="text" name="important3" maxlength="4" size="4" placeholder="3"></td>
                    <td><input type="text" name="important4" maxlength="4" size="4" placeholder="2"></td>
                    <td><input type="text" name="important5" maxlength="4" size="4" placeholder="1"></td>-->

                </tr>
                <tr>
                    <td>Pictures and diagrams effectively convey information about the science fair project.</td>
                       <td colspan="6">
                        <!--<label for="select_1">Category:</label>-->
                         <select class="form-control"  name="pictures1" style="max-width:13.5%;">
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select><br>
                    
                    </td>
                  <!--  <td><input type="text" name="pictures1" maxlength="4" size="4" placeholder="5"></td>
                    <td><input type="text" name="pictures2" maxlength="4" size="4" placeholder="4"></td>
                    <td><input type="text" name="pictures3" maxlength="4" size="4" placeholder="3"></td>
                    <td><input type="text" name="pictures4" maxlength="4" size="4" placeholder="2"></td>
                    <td><input type="text" name="pictures5" maxlength="4" size="4" placeholder="1"></td>-->
                </tr>

                <tr>
                   <td>Understands the basic science relevance of the project.</td>
                       <td colspan="6">
                        <!--<label for="select_1">Category:</label>-->
                         <select class="form-control"  name="understands1" style="max-width:13.5%;">
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select><br>
                    
                    </td>
                    <!--<td><input type="text" name="understands1" maxlength="4" size="4" placeholder="5"></td>
                    <td><input type="text" name="understands2" maxlength="4" size="4" placeholder="4"></td>
                    <td><input type="text" name="understands3" maxlength="4" size="4" placeholder="3"></td>
                    <td><input type="text" name="understands4" maxlength="4" size="4" placeholder="2"></td>
                    <td><input type="text" name="understands5" maxlength="4" size="4" placeholder="1"></td>-->
                </tr>

                <tr>
                  <td>Offers clear, concise, and thoughful responses to questions.</td>
                       <td colspan="6">
                        <!--<label for="select_1">Category:</label>-->
                         <select class="form-control"  name="concise1" style="max-width:13.5%;">
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select><br>
                    
                    </td>
                    <!--<td><input type="text" name="concise1" maxlength="4" size="4" placeholder="5"></td>
                    <td><input type="text" name="concise2" maxlength="4" size="4" placeholder="4"></td>
                    <td><input type="text" name="concise3" maxlength="4" size="4" placeholder="3"></td>
                    <td><input type="text" name="concise4" maxlength="4" size="4" placeholder="2"></td>
                    <td><input type="text" name="concise5" maxlength="4" size="4" placeholder="1"></td>-->
                </tr>

                <tr>
                   <td>Includes a lab notebook (High school requires a research paper).</td>
                       <td colspan="6">
                        <!--<label for="select_1">Category:</label>-->
                         <select class="form-control"  name="includes1" style="max-width:13.5%;">
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select><br>
                    
                    </td>
                   <!-- <td><input type="text" name="includes1" maxlength="4" size="4" placeholder="5"></td>
                    <td><input type="text" name="includes2" maxlength="4" size="4" placeholder="4"></td>
                    <td><input type="text" name="includes3" maxlength="4" size="4" placeholder="3"></td>
                    <td><input type="text" name="includes4" maxlength="4" size="4" placeholder="2"></td>
                    <td><input type="text" name="includes5" maxlength="4" size="4" placeholder="1"></td>-->
                </tr>
            </tbody>

            <thead>
            <tr>
                    <th bgcolor="#DCDCDC">Creativity (15 points)</th>
                    <th bgcolor="#DCDCDC" colspan="5"></th>
                   <!-- <th bgcolor="#DCDCDC"></th>
                    <th bgcolor="#DCDCDC"></th>
                    <th bgcolor="#DCDCDC"></th>
                    <th bgcolor="#DCDCDC"></th>-->
                </tr>

            </thead>

            <tbody>
            <tr>
                    <td>Student presents the relevance of the project.</td>
                       <td colspan="6">
                        <!--<label for="select_1">Category:</label>-->
                         <select class="form-control"  name="presents1" style="max-width:13.5%;">
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select><br>
                    
                    </td>
                   <!-- <td><input type="text" name="presents1" maxlength="4" size="4" placeholder="5"></td>
                    <td><input type="text" name="presents2" maxlength="4" size="4" placeholder="4"></td>
                    <td><input type="text" name="presents3" maxlength="4" size="4" placeholder="3"></td>
                    <td><input type="text" name="presents4" maxlength="4" size="4" placeholder="2"></td>
                    <td><input type="text" name="presents5" maxlength="4" size="4" placeholder="1"></td>-->

                </tr>
                <tr>
                    <td>Investigated an original question, used an original approach, or technique.</td>
                       <td colspan="6">
                        <!--<label for="select_1">Category:</label>-->
                         <select class="form-control"  name="investigated1" style="max-width:13.5%;">
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select><br>
                    
                    </td>
                    <!--<td><input type="text" name="investigated1" maxlength="4" size="4" placeholder="5"></td>
                    <td><input type="text" name="investigated2" maxlength="4" size="4" placeholder="4"></td>
                    <td><input type="text" name="investigated3" maxlength="4" size="4" placeholder="3"></td>
                    <td><input type="text" name="investigated4" maxlength="4" size="4" placeholder="2"></td>
                    <td><input type="text" name="investigated5" maxlength="4" size="4" placeholder="1"></td>-->

                </tr>
                <tr>
                    <td>Shows enthusiasm and interest in the project.</td>
                       <td colspan="6">
                        <!--<label for="select_1">Category:</label>-->
                         <select class="form-control"  name="shows1" style="max-width:13.5%;">
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select><br>
                    
                    </td>
                   <!-- <td><input type="text" name="shows1" maxlength="4" size="4" placeholder="5"></td>
                    <td><input type="text" name="shows2" maxlength="4" size="4" placeholder="4"></td>
                    <td><input type="text" name="shows3" maxlength="4" size="4" placeholder="3"></td>
                    <td><input type="text" name="shows4" maxlength="4" size="4" placeholder="2"></td>
                    <td><input type="text" name="shows5" maxlength="4" size="4" placeholder="1"></td>-->
                </tr>


            </tbody>

          

         <!--   <thead>
                <tr>
                   <th colspan="6">
                      Total: <?php echo $total; ?>
                   </th>
                    
                    
                    

                </tr>
            
            
            </thead> -->
        
            <thead>
              <tr>
                <th colspan="6">
                <button class="btn btn-danger btn-sm" type="submit" name="entry">Add Entry</button>  
                 </th>
              </tr>
            
            </thead>
            
             
        </table>
        <!--<button class="btn btn-danger btn-sm" type="submit" name="add">Calculate total</button>-->
     <!--    <button class="btn btn-danger btn-sm" type="submit" name="entry">Add entry</button>-->
</form>
         <!--<input type="submit" value="Calculate total"/>-->
          <!-- <input type="submit" name="add" value="Add Entry"><br><br>-->
     <div class="container">
            
            <br><br>
            
            <h1>Student Projects and Scores in Science Fair</h1>
            
            <?php

            if( mysqli_num_rows($result) > 0 ) {

                // we have data!
                // output the data

                echo "<table class='table table-bordered'><tr><th>ID</th><th>Student Name</th><th>Grade</th><th>Teacher</th><th>Project Title</th><th>Category</th><th>Total</th><th>Edit</th><th>Delete</th></tr>";

                while( $row = mysqli_fetch_assoc($result) ) {
                    
                   $id = $row["id"];
                    
                    echo "<tr><td>". $row["id"] ."</td><td>". $row["student_name"] ."</td><td>". $row["grade"] ."</td><td>". $row["teacher_name"]."</td><td>". $row["project_title"]."</td><td>".     $row["category"]."</td><td>".$row["total"]."</td><td><a href ='modify_scoring_rubric.php?id=$id'>Edit</td><td> <a href ='delete_scoring_rubric.php?id=$id'>Delete</td</tr>";
                    
                    //echo "<tr><td>". $row["id"] ."</td><td>". $row["username"] ."</td><td>". $row["email"] ."</td></tr>";
                    
                    /*
                    
                        echo "<tr><td>". $row["id"] ."</td><td>". $row["name"] ."</td><td>". $row["grade_level"] ."</td><td>". $row["school"] ."</td><td>". $row["teacher_name"]."</td><td>". $row["project_title"]."</td><td>".     $row["category"]."</td><td>".$row["description"]."</td><td><a href ='view_student_project.php?id=$id'>Edit</td><td> <a href ='delete_student_project_records.php?id=$id'>Delete</td></tr>";
                    
                    */
                    
                    
                    
                }

                echo "</table>";

            } else {
                echo "Whoops! No results.";
            }

            mysqli_close($conn);

            ?>
    </div>
    
        
</div>
   
</body>
</html>                            