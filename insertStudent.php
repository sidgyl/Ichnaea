<?php
	include_once 'includes/DBconnection.php';

//set up mysql connection
mysql_connect("localhost", "root", "") or die(mysql_error());
//select database
mysql_select_db("ichnaea") or die(mysql_error());
session_start();
    $classID = $_POST['classID'];
    $fName = $_POST['FirstName'];
    $lName = $_POST['LastName'];
    $studentID = $_POST['StudentID'];
    $rfid = $_POST['RFID'];
    $classID = $_SESSION['classID'];
    // $classID = $_POST['classID'];

    $query = "INSERT INTO `Students`(`STUDENTID`, `CLASSID`, `FNAME`, `LNAME`, `RFID`) VALUES ('".$studentID."', '".$classID."', '".$fName."', '".$lName."', '".$rfid."')";
    //echo $query;
    $myresponse = mysql_query($query);

    if($myresponse)
    {
      $_SESSION['successMessage'] = "Student ".$fName." ".$lName.' was successfully added to the database';
    }
    else
    {
      $_SESSION['errorMessage'] = "There was an error adding the student ".$fName." ".$lName." to the database";
    }
    // echo $query;
    header('Location: addStudent.php');
?>