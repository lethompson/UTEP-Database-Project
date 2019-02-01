<?php

$server     = "localhost";//DB server name
$username   = "root";//DB username
$password   = "";//DB password
$db         = "AWSEDU"; //DB name

// Create a connection
$conn = mysqli_connect( $server, $username, $password, $db );

// Check connection
if (!$conn) {
    die( "Connection failed: " . mysqli_connect_error() );
}

// echo "Connected successfully to a Database!";

?>