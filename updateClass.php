<?php
	include_once 'includes/DBconnection.php';

	$classID = $_POST['ClassID'];
  $instructorID = $_POST['instructorID'];
  session_start();
  // $classID='CSE4317';
  // $instructorID='sid_gyl@yahoo.co.in';

  $startTime = $_POST['startTime'];
  $endTime = $_POST['endTime'];
  $startDate = $_POST['startDate'];
  $endDate = $_POST['endDate'];
  $cutOffTime = $_POST['cutOffTime'];
  $counter = 0;
  $classDay = "";
  $dayArray = $_POST['day'];
  while($counter < count($dayArray))
  {
    $classDay = $classDay.$dayArray[$counter].",";
    $counter = $counter + 1;
  }
  $classDay = substr($classDay, 0, -1);

//set up mysql connection
  mysql_connect("localhost", "root", "Laelaps") or die(mysql_error());
  //select database
  mysql_select_db("ichnaea") or die(mysql_error());

	// echo $classID.'<br>';
  $query = 'UPDATE class SET STARTTIME =\''.$startTime.'\', ENDTIME =\''.$endTime.'\',STARTDATE=\''.$startDate.'\', ENDDATE=\''.$endDate.'\', CUTOFFTIME =\''.$cutOffTime.'\', DAYS =\''.$classDay.'\' WHERE CLASSID =\''.$classID.'\' AND INSTRUCTOR_ID=\''.$instructorID."'";

  //echo $query;
	$myresponse=mysql_query($query);

  if($myresponse)
  {
    echo "The class has been succesfully updated.";
    $_SESSION['successMessage'] = 'The database was updated successfully';
  }
  else
  {
    echo "Error in updating class.";
    $_SESSION['errorMessage'] = 'There was an error updating the database';
  }
  header('Location: editClass.php');
?>