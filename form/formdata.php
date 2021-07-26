<?php
if ($_POST == null) {
} else {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $university = $_POST['university'];
  $educationl = $_POST['educationl'];
  $visatype = $_POST['visatype'];
  $workexp = $_POST['workexp'];
  $joy_name = $_POST['joy_name'];


  if (!empty($firstname) || !empty($lastname) || !empty($email) || !empty($phone) || !empty($university) || !empty($educationl) || !empty($visatype) || !empty($workexp) || !empty($joytype)) {

    $host = "auth-db223.hostinger.com";
    $dbUsername = "u383316595_1";
    $dbPassword = "AbC123!@#";
    $dbname = "u383316595_1";

    $db = mysqli_connect($host, $dbUsername, $dbPassword, $dbname);
    // // REGISTER USER
    // receive all input values from the form
    $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $university = mysqli_real_escape_string($db, $_POST['university']);
    $educationl = mysqli_real_escape_string($db, $_POST['educationl']);
    $visatype = mysqli_real_escape_string($db, $_POST['visatype']);
    $workexp = mysqli_real_escape_string($db, $_POST['workexp']);
    $joy_name = mysqli_real_escape_string($db, $_POST['joy_name']);


    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
      die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
    } else {
      $SELECT = "SELECT firstname From form Where email = ? Limit 1";
      $INSERT = "INSERT Into form (firstname, lastname, email, phone, university, educationl, visatype, workexp, joy_name)values (?,?,?,?,?,?,?,?,?)";

      //Prepare statement
      $stmt = $conn->prepare($SELECT);
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $stmt->bind_result($email);
      $stmt->store_result();
      $rnum = $stmt->num_rows;
      if ($rnum == 0) {
        $stmt->close();
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("sssisssss", $firstname, $lastname, $email, $phone, $university, $educationl, $visatype, $workexp, $joy_name);
        $stmt->execute();
        echo "New record inserted sucessfully";
        header("Location: http://gradforce.xyz/planb/index-loginsuccessful.html");
      } else {
        echo "Someone already register using this email";
      }
      $stmt->close();
      $conn->close();
    }

    //   // form validation: ensure that the form is correctly filled ...
    //   // by adding (array_push()) corresponding error unto $errors array
    //   if (empty($firstname)) {
    //     array_push($errors, "firstname is required");
    //   }
    //   if (empty($lastname)) {
    //     array_push($errors, "lastname is required");
    //   }
    //   if (empty($email)) {
    //     array_push($errors, "email is required");
    //   }
    //   if (empty($phone)) {
    //     array_push($errors, "phone is required");
    //   }
    //   if (empty($university)) {
    //     array_push($errors, "university is required");
    //   }
    //   if (empty($educationl)) {
    //     array_push($errors, "educationl is required");
    //   }
    //   if (empty($visatype)) {
    //     array_push($errors, "visatype is required");
    //   }
    //   if (empty($workexp)) {
    //     array_push($errors, "workexp is required");
    //   }
    //   if (empty($joytype)) {
    //     array_push($errors, "joytype is required");
    //   }
  } else {
    echo "All field are required";
    die();
  }
}