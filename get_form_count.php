<?php
$host = "auth-db223.hostinger.com";
$dbUsername = "u383316595_1";
$dbPassword = "AbC123!@#";
$dbname = "u383316595_1";
$db=mysqli_connect($host,$dbUsername,$dbPassword ,$dbname); 
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
session_start();
if(!empty($_SESSION['account_type'])){
    if($_SESSION['account_type'] == 'Employee'){
        $email = $_SESSION["email"];
        $SELECT = "SELECT * From form where email = '$email'";
        //Prepare statement 
        $result = $conn->query($SELECT);
        $attr=$result->fetch_all();
        echo count($attr);
    }elseif($_SESSION['account_type'] == 'Employer'){
        $SELECT = "SELECT * From form ";
        $result = $conn->query($SELECT);
        $attr=$result->fetch_all();
        echo count($attr);
    }
}else{
    //not login 
    echo '<script language="javascript" type="text/javascript">';
    echo 'window.location.href ="http://gradforce.xyz/planb/index.html";';
    echo '</script>';
}
// Script to show how many forms have been submitted