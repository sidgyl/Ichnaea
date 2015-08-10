<?php
	include_once 'includes/DBconnection.php';
  session_start();
//set up mysql connection
mysql_connect("localhost", "root", "") or die(mysql_error());
//select database
mysql_select_db("ichnaea") or die(mysql_error());

    $result = $_POST['students'];

    for($i = 0; $i < count($result); $i++)
    {
      $studentID = substr($result[$i], 0, 7);
      $classID = substr($result[$i], 8, 7);

      $query = "DELETE FROM students WHERE STUDENTID = '".$studentID."'"." AND CLASSID = '".$classID."'";
      //echo $query;
      $myresponse = mysql_query($query);
      $_SESSION['classID'] = $classID;

      if($myresponse)
      {
        $_SESSION['successMessage'] = 'Removal successful';
      }
      else
      {
        $_SESSION['errorMessage'] = 'There was an error removing student from the class';
      }
    }
  header('Location: removeStudent.php');

?>