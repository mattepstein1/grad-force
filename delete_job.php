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
        $id = mysqli_real_escape_string($db, $_POST["id"]);
        if(!empty($id)){
            $DELETE = "delete from job where id = ?";
            $stmt = $conn->prepare($DELETE);
            $stmt->bind_param("i", intval($id));
            $stmt->execute();
            $stmt->close();
        }else{
            echo "filed can not be empty";
            die();
        }
    }
}
// Script to delete an existing job from the database