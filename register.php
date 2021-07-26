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
        $user_name = mysqli_real_escape_string($db, $_POST["username-register"]);
        $email_address = mysqli_real_escape_string($db, $_POST["emailaddress-register"]);
        $password = mysqli_real_escape_string($db, $_POST["password-register"]);
        $account_type = mysqli_real_escape_string($db, $_POST["account-type-radio"]);
        if(!empty($user_name) && !empty($email_address) && !empty($password) && !empty($account_type)){
            $SELECT = "SELECT * From users Where email = ? Limit 1";
            $stmt = $conn->prepare($SELECT);
            $stmt->bind_param("s", $email_address);
            $stmt->execute();
            $stmt->store_result();
            $rnum = $stmt->num_rows;
            if($rnum > 0){
                echo "address has been registered";
            }else{
                $password = md5($password);
                $INSERT = "INSERT Into users (username, email, user_type, password) values (?,?,?,?)";
                $stmt->close();
                $stmt = $conn->prepare($INSERT);
                $stmt->bind_param("ssss", $user_name, $email_address, $account_type, $password);
                $stmt->execute();
                $stmt->close();
                session_start();
                $_SESSION['username']= $user_name;
                $_SESSION["email"] = $email_address;
                $_SESSION["account_type"] = $account_type;
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
// Script for registration to the database