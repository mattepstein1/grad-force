<?php
 $brr=array();
 session_start();
 $brr[0] = $_SESSION["username"];
 $brr[1] = $_SESSION["email"];
 $brr[2] = $_SESSION["account_type"];
 echo implode('^',$brr);
// Script to get the amount of trimes an applicant has applied 