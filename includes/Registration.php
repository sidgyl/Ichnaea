<?php
  include_once 'DBconnection.php';
  include_once 'Instructor.php';
  include_once 'instructorClass.php';

  $myDBconnection = new DBconnection();
  $myDBconnection->ConnectToDB();

  $fname = $_POST['FirstName'];
  $lname = $_POST['LastName'];
  $email = $_POST['Email'];

  $myInstructor = new Instructor($fname, $lname, sha1($_POST['Password']), $_POST['Email']);

  $checkInstructor = $myInstructor->Selection($myDBconnection->db);
  session_start();
  // echo $checkInstructor->rowCount();

  if ($checkInstructor->rowCount() == 0) {
    if(!isset($_SESSION)){
      session_destroy();
    }
    $response = $myInstructor->Insertion($myDBconnection->db);
    if ($response == 0) {
      echo "Query Failed";
      $_SESSION['errorMessage'] = "There was an error inserting into the database. Please try again.";
      header('Location: ../registrationPage.php');
    }else{
      echo "query Successful";
      $_SESSION['Email'] = $email;  
      $_SESSION['name'] = $fname." ".$lname;
      $_SESSION['validCredentials'] = true;
      $myDBconnection->closeConnection();
      header('Location: ../LoginPage.php');
    }
    $myDBconnection->closeConnection();
      
  }else{
    $_SESSION['errorMessage'] = "An account for this email already exists.";
    header('Location: ../registrationPage.php');
  }
?>
