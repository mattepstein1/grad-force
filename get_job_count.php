<?php
$host = "auth-db223.hostinger.com";
$dbUsername = "u383316595_1";
$dbPassword = "AbC123!@#";
$dbname = "u383316595_1";

$db=mysqli_connect($host,$dbUsername,$dbPassword ,$dbname); 
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
$SELECT = "SELECT * From job";
    //Prepare statement 
$result = $conn->query($SELECT);
$attr=$result->fetch_all();
echo count($attr);
// PHP Script that connects to the database and retrives the total number of jobs