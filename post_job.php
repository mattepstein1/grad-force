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
        $company = mysqli_real_escape_string($db, $_POST["company"]);
        $job_name = mysqli_real_escape_string($db, $_POST["job_name"]);
        $job_type = mysqli_real_escape_string($db, $_POST["job_type"]);
        $category = mysqli_real_escape_string($db, $_POST["category"]);
        $address = mysqli_real_escape_string($db, $_POST["address"]);
        $min = mysqli_real_escape_string($db, $_POST["min"]);
        $max = mysqli_real_escape_string($db, $_POST["max"]);
        $tag = mysqli_real_escape_string($db, $_POST["tag"]);
        $description = mysqli_real_escape_string($db, $_POST["description"]);
        setlocale(LC_TIME, 'en_US'); //language set english 
        $post_date = gmstrftime(" %d %b %Y ",time());
        session_start();
        $creator_email = mysqli_real_escape_string($db, $_SESSION["email"]);
        if(!empty($job_name) && !empty($job_type) && !empty($category) && !empty($address) &&!empty($creator_email)){
            $INSERT = "INSERT Into job(company,job_name, job_type, category, address,min,max, tag,descrption,creator_email,post_date) values (?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sssssiissss",$company, $job_name, $job_type, $category, $address, $min,$max,$tag,$description,$creator_email,$post_date);
            $stmt->execute();
            $stmt->close();
            echo '<script language="javascript" type="text/javascript">';
            echo 'window.location.href ="http://gradforce.xyz/planb/dashboard_er.html";';
            echo '</script>';
        }else{
            echo "filed can not be empty";
            die();
        }
    }
}
// Script to post a job from the form into the database