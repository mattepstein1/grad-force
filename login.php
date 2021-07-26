<?php
if($_POST == null){
    echo "please post form";
    die();
}else{
    $host = "auth-db223.hostinger.com";
    $dbUsername = "u383316595_1";
    $dbPassword = "AbC123!@#";
    $dbname = "u383316595_1";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
      die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
    } else {
        $db=mysqli_connect($host,$dbUsername,$dbPassword ,$dbname); 
        // $email_address = get_safe_value($db, $_POST["emailaddress"]);
        // $password = get_safe_value($db, $_POST["password"]);
        $email_address = $_POST["emailaddress"];
        $password = $_POST["password"];
        if(!empty($email_address) && !empty($password)){
            $password = md5($password);
            $SELECT = "SELECT * From users Where email = ? and password = ? Limit 1";
            $res=mysqli_multi_query($db,"SELECT username, user_type From users Where email = '$email_address' and password = '$password' Limit 1");
            $result = mysqli_store_result($db);
            $rnum = $result->num_rows;
            if($rnum == 0){
                echo "check your email and password";
            }else{
                session_start();
                $_SESSION["email"] = $email_address;
                while($row = mysqli_fetch_row($result)){
                    $_SESSION['username']= $row[0];
                    $_SESSION["account_type"] = $row[1];
                    break;
                }
                echo '<script language="javascript" type="text/javascript">';
                echo 'window.location.href ="http://gradforce.xyz/planb/index-loginsuccessful.html";';
                echo '</script>';
            }
        }else{
            echo "filed can not be empty";
            die();
        }
    }
}
// Script to run the login process. Checks user data against the database and verifies whether information provided is vaid