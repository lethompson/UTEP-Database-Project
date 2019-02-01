<?php
   //Specify the Database server host
   define('DB_SERVER', 'localhost');
   //Specify the Database username
   define('DB_USERNAME', 'root');
   //Specify the Database password
   define('DB_PASSWORD', '');
   //Choose the Database (name)
   define('DB_DATABASE', 'AWSEDU');
   //We make the connection.
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>
