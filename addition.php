<?php

//Start the session
//   session_start();

                $total = "";

            include('connection.php');

            //Start the session
              // include("addition.php");
               session_start();



          //  $query = "SELECT * FROM student_scoring_rubric";
          //  $result = mysqli_query( $conn, $query );
                
/*
                $scientific_meth1 = $scientific_meth2 = $scientific_meth3 = $scientific_meth4 = 0;
               
                $scientific_meth5 = $scientific_meth6 = $scientific_meth7 = $scientific_meth8 = 0;

                $scientific_meth9 = $scientific_meth10 = $scientific_meth11 = $scientific_meth12 = 0;
                $scientific_meth13 = $scientific_meth14 = $scientific_meth15 = $scientific_meth16 = 0;
                $scientific_meth17 = $scientific_meth18 = $scientific_meth19 = $scientific_meth20 = 0;
                $scientific_meth21 = $scientific_meth22 = $scientific_meth23 = $scientific_meth24 = 0;
                $scientific_meth25 = $scientific_meth26 = $scientific_meth27 = $scientific_meth28 = 0;
                $scientific_meth29 = $scientific_meth30 = $scientific_meth31 = 0;*/
               
                if (isset( $_POST["entry"] )){
                    
                        // build a function that validates data
                   /* function validateFormData( $formData ) {
                        $formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
                        return $formData;
                    }

                    // set all variables to empty by default
                    $name = $grade_level  = $fname_teacher =  $project = $category = "";

                    // check to see if inputs are empty
                    // create variables with form data
                    // wrap the data with our function

                    if( !$_POST["student_name"] ) {
                        $nameError = "Please enter a name <br>";
                    } else {
                        $name = validateFormData( $_POST["student_name"] );
                    }

                    if( !$_POST["grade"] ) {
                        $gradelevelError = "Please enter a grade level <br>";
                    } else {
                        $grade_level = validateFormData( $_POST["grade"] );
                    }


                    if( !$_POST["teacher_name"] ) {
                        $teachernameError = "Please enter teacher name <br>";
                    } else {
                        $teacher_name = validateFormData( $_POST["teacher_name"] );
                    }

                    if( !$_POST["project"] ) {
                        $project_titleError = "Please enter project title <br>";
                    } else {
                        $project = validateFormData( $_POST["project"] );
                    }


                     if( !$_POST["category"] ) {
                        $categoryError = "Please specify category <br>";
                    } else {
                        $category = validateFormData( $_POST["thenumbers"] );
                    }*/

    
                    
                    
                    
                    //Scientific Method
                     $scientific_meth1 = $_POST['presented1'];
                     $scientific_meth2 = $_POST['presented2'];
                      $scientific_meth3 = $_POST['presented3'];
                     $scientific_meth4 = $_POST['presented4'];
                     $scientific_meth5 = $_POST['presented5'];
                    
                    
                     $scientific_meth6 = $_POST['variables1'];
                     $scientific_meth7 = $_POST['variables2'];
                     $scientific_meth8 = $_POST['variables3'];
                     $scientific_meth9 = $_POST['variables4'];
                     $scientific_meth10 = $_POST['variables5'];
                    
                     $scientific_meth11 = $_POST['clear1'];
                     $scientific_meth12 = $_POST['clear2'];
                     $scientific_meth13 = $_POST['clear3'];
                     $scientific_meth14 = $_POST['clear4'];
                     $scientific_meth15 = $_POST['clear5'];
                    
                    
                     $scientific_meth16 = $_POST['the1'];
                     $scientific_meth17 = $_POST['the2'];
                     $scientific_meth18 = $_POST['the3'];
                     $scientific_meth19 = $_POST['the4'];
                     $scientific_meth20 = $_POST['the5'];
                    
                     $scientific_meth21 = $_POST['and1'];
                     $scientific_meth22 = $_POST['and2'];
                     $scientific_meth23 = $_POST['and3'];
                     $scientific_meth24 = $_POST['and4'];
                     $scientific_meth25 = $_POST['and5'];
                    
                    
                     $scientific_meth26 = $_POST['suff1'];
                     $scientific_meth27 = $_POST['suff2'];
                     $scientific_meth28 = $_POST['suff3'];
                     $scientific_meth29 = $_POST['suff4'];
                     $scientific_meth30 = $_POST['suff5'];
                    
                    
                     $scientific_meth31 = $_POST['finalist1'];
                     $scientific_meth32 = $_POST['finalist2'];
                     $scientific_meth33 = $_POST['finalist3'];
                     $scientific_meth34 = $_POST['finalist4'];
                     $scientific_meth35 = $_POST['finalist5'];
                    
                     $scientic_meth_total = ($scientific_meth1 + $scientific_meth2 +
                         $scientific_meth3 + $scientific_meth4 + $scientific_meth5 +
                         $scientific_meth6 + $scientific_meth7 + $scientific_meth8 +
                        $scientific_meth9 + $scientific_meth10 + $scientific_meth11+
                         $scientific_meth12 + $scientific_meth13 + $scientific_meth14 +
                         $scientific_meth15 + $scientific_meth16 + $scientific_meth17 +
                         $scientific_meth18 + $scientific_meth19 + $scientific_meth20 +
                         $scientific_meth22 + $scientific_meth23 + $scientific_meth24 +
                         $scientific_meth25 + $scientific_meth26 + $scientific_meth27 +
                         $scientific_meth28 + $scientific_meth29 + $scientific_meth30 +
                         $scientific_meth31 + $scientific_meth32 + $scientific_meth33 +
                        $scientific_meth34 + $scientific_meth35);
                    
                    //Scientific Knowledge
                    $scientific_know1 = $_POST['a1'];
                    $scientific_know2 = $_POST['a2'];
                    $scientific_know3 = $_POST['a3'];
                    $scientific_know4 = $_POST['a4'];
                    $scientific_know5 = $_POST['a5'];
                    
                    $scientific_know6 = $_POST['clearly1'];
                    $scientific_know7 = $_POST['clearly2'];
                    $scientific_know8 = $_POST['clearly3'];
                    $scientific_know9 = $_POST['clearly4'];
                    $scientific_know10 = $_POST['clearly5'];
                    
                    
                    $scientific_know11 = $_POST['used1'];
                    $scientific_know12 = $_POST['used2'];
                    $scientific_know13 = $_POST['used3'];
                    $scientific_know14 = $_POST['used4'];
                    $scientific_know15 = $_POST['used5'];
                    
                    
                    $scientific_know16 = $_POST['student1'];
                    $scientific_know17 = $_POST['student2'];
                    $scientific_know18 = $_POST['student3'];
                    $scientific_know19 = $_POST['student4'];
                    $scientific_know20 = $_POST['student5'];
                    
                    
                    $scientic_know_total = ($scientific_know1 + $scientific_know2 + $scientific_know3
                        + $scientific_know4 + $scientific_know5 + $scientific_know6 + $scientific_know7
                        + $scientific_know8 + $scientific_know9 + $scientific_know10 + $scientific_know11
                        + $scientific_know12 + $scientific_know13 + $scientific_know14 + $scientific_know15
                        + $scientific_know16 + $scientific_know17 + $scientific_know18 + $scientific_know19
                        + $scientific_know20);
                        
                        
                    //Presentation    
                    $presentation_1 = $_POST['offers1'];
                    $presentation_2 = $_POST['offers2'];
                    $presentation_3 = $_POST['offers3'];
                    $presentation_4 = $_POST['offers4'];
                    $presentation_5 = $_POST['offers5'];
                    
                    $presentation_6 = $_POST['important1'];
                    $presentation_7 = $_POST['important2'];
                    $presentation_8 = $_POST['important3'];
                    $presentation_9 = $_POST['important4'];
                    $presentation_10 = $_POST['important5'];
                    
                    $presentation_11 = $_POST['pictures1'];
                    $presentation_12 = $_POST['pictures2'];
                    $presentation_13 = $_POST['pictures3'];
                    $presentation_14 = $_POST['pictures4'];
                    $presentation_15 = $_POST['pictures5'];
                    
                    $presentation_16 = $_POST['understands1'];
                    $presentation_17 = $_POST['understands2'];
                    $presentation_18 = $_POST['understands3'];
                    $presentation_19 = $_POST['understands4'];
                    $presentation_20 = $_POST['understands5'];
                    
                    $presentation_21 = $_POST['concise1'];
                    $presentation_22 = $_POST['concise2'];
                    $presentation_23 = $_POST['concise3'];
                    $presentation_24 = $_POST['concise4'];
                    $presentation_25 = $_POST['concise5'];
                    
                    $presentation_26 = $_POST['includes1'];
                    $presentation_27 = $_POST['includes2'];
                    $presentation_28 = $_POST['includes3'];
                    $presentation_29 = $_POST['includes4'];
                    $presentation_30 = $_POST['includes5'];
                    
                    $presentation_total = ($presentation_1 + $presentation_2 + $presentation_3 +
                    $presentation_4 + $presentation_5 + $presentation_6 + $presentation_7 +
                    $presentation_8 + $presentation_9 + $presentation_10 + $presentation_11 +
                    $presentation_12 + $presentation_13 + $presentation_14 + $presentation_15 +
                    $presentation_16 + $presentation_17 + $presentation_18 + $presentation_19
                    + $presentation_20 + $presentation_21 + $presentation_22 + $presentation_23
                    + $presentation_24 + $presentation_25 + $presentation_26 + $presentation_27
                    + $presentation_28 + $presentation_29 + $presentation_30);
                    
                    
                    //Creativity
                    $creativity_1 = $_POST['presents1'];
                    $creativity_2 = $_POST['presents2'];
                    $creativity_3 = $_POST['presents3'];
                    $creativity_4 = $_POST['presents4'];
                    $creativity_5 = $_POST['presents5'];
                    
                    $creativity_6 = $_POST['investigated1'];
                    $creativity_7 = $_POST['investigated2'];
                    $creativity_8 = $_POST['investigated3'];
                    $creativity_9 = $_POST['investigated4'];
                    $creativity_10 = $_POST['investigated5'];
                    
                    $creativity_11 = $_POST['shows1'];
                    $creativity_12 = $_POST['shows2'];
                    $creativity_13 = $_POST['shows3'];
                    $creativity_14 = $_POST['shows4'];
                    $creativity_15 = $_POST['shows5'];
                    
                    $creativity_total = ($creativity_1 + $creativity_2 + $creativity_3 + $creativity_4
                    + $creativity_5 + $creativity_6 + $creativity_7 + $creativity_8 + $creativity_9
                    + $creativity_10 + $creativity_11 + $creativity_12 + $creativity_13 + $creativity_14
                    + $creativity_15); 
                 
                    //Total of all classifcations
                     $total = ($scientic_meth_total + $scientic_know_total + $presentation_total + $creativity_total);
                    
                     $name=$_POST['student_name'];
                     $grade_level=$_POST['grade'];
                     $teacher_name=$_POST['teacher_name'];
                     $project=$_POST['project'];
                     $category=$_POST['thenumbers'];
                    
                    /*
                       $name = validateFormData( $_POST["student_name"] );
                    }

                    if( !$_POST["grade"] ) {
                        $gradelevelError = "Please enter a grade level <br>";
                    } else {
                        $grade_level = validateFormData( $_POST["grade"] );
                    }


                    if( !$_POST["teacher_name"] ) {
                        $teachernameError = "Please enter teacher name <br>";
                    } else {
                        $teacher_name = validateFormData( $_POST["teacher_name"] );
                    }

                    if( !$_POST["project"] ) {
                        $project_titleError = "Please enter project title <br>";
                    } else {
                        $project = validateFormData( $_POST["project"] );
                    }


                     if( !$_POST["category"] ) {
                        $categoryError = "Please specify category <br>";
                    } else {
                        $category = validateFormData( $_POST["thenumbers"] );
                    }*/
                    
                 }
                    
                
               
?>