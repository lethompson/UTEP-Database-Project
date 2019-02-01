<?php
   include('session.php');
?>

<!DOCTYPE html>

<html>

    <head>
        

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
        
        
        
        
      <!--  <div class="navbar">
            <a href="index.php">Home Page</a>
            <a href="index_insert.php">Display Database</a>
            <a href="insert.php">Add Users</a>
        </div> -->


    <link rel="stylesheet" href="style1.css">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin Page</title>

        <!-- Bootstrap CSS -->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">-->
        
          <!-- New CSS style -->
            <!-- Bootstrap core CSS -->
            <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

            <!-- Custom fonts for this template -->
            <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
            <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

            <!-- Custom styles for this template -->
            <link href="css/landing-page.css" rel="stylesheet">
        
            <!-- New CSS style -->
    </head>
    
    <body> 
        
        <!-- Nav -->
        <div class="topnav" id="myTopnav">
          <a href="index.php">Home Page</a>
          <a href="index_insert.php">Registered Users</a>
          <a href="insert.php">Add Users</a>
          <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
        </div>
        <!-- Nav -->
        
        
       <!-- <div class="container">
            <h1><?php echo "admin"; ?> Profile Page</h1>
            <p class="lead">Welcome <?php echo $_SESSION['login_user']; ?></p>
            
            <p><a href="logout.php" class="btn btn-danger btn-sm">Log out</a></p>
            
        </div>-->
        
        
             <header class="intro-header">
              <div class="container">
                <div class="intro-message">
                    
                    <h1><?php echo "Reyes Elementary"; ?> School</h1>
                <p class="lead">Welcome <?php echo $_SESSION['login_user']; ?></p>
            
                <p><a href="logout.php" class="btn btn-danger btn-sm">Log out</a></p>
                    
                </div>
              </div>
            </header>
        
        
        
        
        <section class="content-section-b">

              <div class="container">

                  
                <div class="row">
                  <div class="col-lg-5 mr-auto order-lg-2">
                    <hr class="section-heading-spacer">
                      
                               
            
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Science Fair:<br>the value of science fair project</h2>
                    <p class="lead">A student chooses a scientific question he or she would like to answer. Then, library and Internet research on the question give the student the background information he or she needs to formulate a hypothesis and design an experiment. After writing a report to summarize this research, the student performs the experiment, draws his or her conclusions, and presents the results to teachers and classmates using a display board.
                      <!--<a target="_blank" href="http://www.psdcovers.com/">PSDCovers</a>! Visit their website to download some of their awesome, free photoshop actions!</p>-->
                  </div>
                  <div class="col-lg-5 ml-auto order-lg-1">
                    <!--<img class="img-fluid" src="img/dog.png" alt="">-->
                    <img class="img-fluid" src="img/science-fair.png" alt="">
                  </div>
                </div>

              </div>
              <!-- /.container -->

            </section>
        
        
        
        
        
        
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
        
        <footer>
          <div class="container">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="index.php">Home</a>
              </li>
              <li class="footer-menu-divider list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="login.php">Login</a>
              </li>
              <li class="footer-menu-divider list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#About">About</a>
              </li>
              <li class="footer-menu-divider list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#contact">Contact</a>
              </li>
            </ul>
            <p class="copyright text-muted small">Copyright &copy; Team Legacy <?php echo date("Y"); ?>. All Rights Reserved</p>
          </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        
    </body>
</html>
