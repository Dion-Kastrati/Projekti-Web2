<?php 

$dbServerName = "localhost:3307";
$dbUsername = "root";
$dbPassword = "";
$dbName = "web2-database";


$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

if(!$conn){
    die("<script> alert(Database connection failed!) </script>" . mysqli_connect_error());
}

?> 