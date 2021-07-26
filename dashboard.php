<?php
session_start();
if(!empty($_SESSION['account_type'])){
    if($_SESSION['account_type'] == 'Employee'){
        echo '<script language="javascript" type="text/javascript">';
        echo 'window.location.href ="dashboard.html";';
        echo '</script>';
    }elseif($_SESSION['account_type'] == 'Employer'){
        echo '<script language="javascript" type="text/javascript">';
        echo 'window.location.href ="dashboard_er.html";';
        echo '</script>';
    }
}else{
    //not login 
    echo '<script language="javascript" type="text/javascript">';
    echo 'window.location.href ="http://gradforce.xyz/planb/";';
    // will change the to index.html
    echo '</script>';
}
// Script to check what dashboard to log into. either the employer, or the emplooyee account.