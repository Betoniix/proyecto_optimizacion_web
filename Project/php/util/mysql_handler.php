<?php
$host="localhost";
$port=3305;
$user="root";
$password="";
$dbname="opti_rss";

$con = new mysqli($host, $user, $password, $dbname, $port)
 or die ('Could not connect to the database server' . mysqli_connect_error());

 
    
?>