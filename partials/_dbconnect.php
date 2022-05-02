<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "users";

$con = mysqli_connect($server, $username, $password,$dbname);

if(!$con){
    die("Could not connect to the database".mysqli_connect_error());
}
//echo "Successfully connected to the database";

?>
