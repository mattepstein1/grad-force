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
echo ArrToStr($attr);


function ArrToStr($arr){
    $brr=array();
    foreach($arr as $v){
        $brr[]=implode(',',$v);
    }
    return implode('^',$brr);
}
// PHP Scripts for getting the job lists