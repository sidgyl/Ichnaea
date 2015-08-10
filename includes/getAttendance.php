<?php
	include_once 'DBConnection.php';
	include_once 'attendaceData.php';
	session_start();

	$classID = $_POST['classID'];
	$classDate = $_POST['classDate'];

	$myDBconnection = new DBconnection();
  	$myDBconnection->ConnectToDB();	
	$myresponse =  $myDBconnection->db->prepare("SELECT * FROM ".$classID." where class_date='".$classDate."';");
  	$myresponse->execute();
  	$result = $myresponse->fetchAll();

	$myresponse1 =  $myDBconnection->db->prepare("SELECT * FROM STUDENTS where CLASSID='".$classID."';");
  	$myresponse1->execute();
  	$result1 = $myresponse1->fetchAll();  	

  	$attendance = [];
  	$attendance['attendaceTable'] = $result;
  	$attendance['roster'] = $result1;

	echo json_encode($attendance);
?>